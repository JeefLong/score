<?php

/**
 *  版权所有禁止转载,违者必究
 *     Citybay@163.com
 *    软著持有人:Citybay
 * */
use Comm\Tool;
use Logic\BaseController;
use Yaf\Session;
use Logs\ADLogController;

// Index controller
Final class PositController extends BaseController {

    // 公共输出
    use \OutSend\Out;

    private $req;          // 请求信息
    private $view;         // 渲染器
    private static $session;
    private static $sess;

    // 非法登录信息的拦截
    public function init() {

        self::$sess = Session::getInstance();
        if (!self::$sess->__isset('_agent_user')) {
            self::redirect('/Agent/Login/Index');
        }
        self::$session = self::$sess->__get('_agent_user');
        $this->req = $this->getRequest()->getRequest();

        // 初始化一次ses计数器
        if (!self::$sess->__isset('passcnt')) {
            self::$sess->__set('passcnt', array('passcount' => 0));
        }

        // 获得View渲染对象
        $this->view = $this->getView();
        $this->view->assign('Ctrl', $this->getRequest()->controller);
        $this->view->assign('Act', $this->getRequest()->action);
        return TRUE;
    }

    //首页
    public function IndexAction() {
        return TRUE;
    }

    // 充值
    public function AddPositAction() {
        $uname = isset($this->req['uname']) ? trim($this->req['uname']) : NULL;
        if (!empty($uname)) {
            $this->view->assign('uname', $uname);
        } else {
            $this->view->assign('uname', NULL);
        }
        $mod = DbModel::Init();
        $ret = $mod->table('angent_info')->get_one('gold', array('id' => self::$session['uid']));
        $rest_gold = $ret['gold'];
        $this->view->assign('rest_gold', floor($rest_gold));
        $this->view->display('Agent/Posit/Add_Posit.html');
        return TRUE;
    }

    // 充值动作
    public function AjaxAddPositAction() {
        $agt_name = isset($this->req['agent_name']) ? $this->req['agent_name'] : NULL;


        $charge_gold = isset($this->req['charge_gold']) ? $this->req['charge_gold'] : NULL;
        $charge_desc = isset($this->req['charge_desc']) ? $this->req['charge_desc'] : NULL;
        //       $charge_pass = isset($this->req['charge_pass']) ? $this->req['charge_pass'] : NULL;
        //       $passcount = self::$sess->__get('passcnt');
//        if (isset($passcount['passcount']) && $passcount['passcount'] > 3) {
//            self::$sess->del('_agent_user');
//            self::$sess->del('passcnt');
//            self::OutMsg(array('ecode' => 400, 'emsg' => '密码错误次数太多，您已被系统踢出!'));
//        }

        if (empty($agt_name)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '代理名称不能为空'));
        }
        if (empty($charge_gold) || !is_numeric($charge_gold) || $charge_gold < 1) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '充值数量不正确'));
        }

        $mod = DbModel::Init();

        //     $agt_s = $mod->table('angent_info')->get_one('`id`', '`agent_name` = ' . $agt_name);
//
//        if (!empty($agt_s['id'])) {
//            $dret['id'] = $agt_s['id'];
//        } else {
//             self::OutMsg(array('ecode' => 400, 'emsg' => '代理名称错误'));
//        }
        //  $dret['id']=1;

        $dret = $mod->table('angent_info')->get_one('`id`, `gold`, `agent_status`', array('agent_name' => $agt_name, 'ref_id' => self::$session['uid']));
        $sret = $mod->table('angent_info')->get_one('`gold`,`tread_pass`', array('id' => self::$session['uid']));
        if (empty($sret)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '当前代理无效'));
            self::$sess->del('_agent_user');
        }

//        if (empty($sret['tread_pass'])) {
//            self::OutMsg(array('ecode' => 400, 'emsg' => '未设置支付密码，请先设置支付密码'));
//        }
//        if ($sret['tread_pass'] != md5(md5($charge_pass))) {
//            self::$sess->__set('passcnt', array('passcount' => $passcount['passcount'] + 1));
//            self::OutMsg(array('ecode' => 400, 'emsg' => '支付密码错误,错误次数:' . $passcount['passcount']));
//        }

        if (empty($dret)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '目标代理不存在'));
        }

        if ($dret['agent_status'] != 1) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '目标代理不可用,请核实代理状态'));
        }

        if ($sret['gold'] - $charge_gold < 0) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '您的房卡不足,请先充值'));
        }


        $mod->table('angent_info')->start();
        $mod->table('order_gold')->start();
        $flag = 0;
        $dflag = 0;
        //给下级冲入
        $up_arr = array(
            'game_gold' => $dret['gold'] + $charge_gold,
        );

        $ret_up = $mod->table('angent_info')->up_data($up_arr, array('id' => $dret['id'], 'ref_id' => self::$session['uid']));
        if ($ret_up) {
            $flag = 1;
        }
        // 扣除当前
        $des_arr = array(
            'game_gold' => $sret['gold'] - $charge_gold,
        );
        $des_up = $mod->table('angent_info')->up_data($des_arr, array('id' => self::$session['uid']));
        if ($des_up) {
            $dflag = 1;
        }
        ////////////交易记录硬性添加，记录是否有效，取决于事物返回的flag////////////
        $osn = $this->getSn();
        // 减币记录
        $redu_data = array(
            'order_sn' => $osn,
            'order_type' => 3,
            'agent_id' => self::$session['uid'],
            'op_agent_id' => $dret['id'],
            'game_gold' => 0 - $charge_gold,
            'befor_gold' => $sret['gold'],
            'after_gold' => $sret['gold'] - $charge_gold,
            'order_status' => ($flag && $dflag),
            'tread_time' => NOW,
            'order_desc' => '给下线充值: ' . $charge_desc . ' OPT: [' . self::$session['uid'] . ']',
        );

        $ret_redu = $mod->table('order_gold')->add_data($redu_data);

        // 加币记录
        $add_data = array(
            'order_sn' => $osn,
            'order_type' => 4,
            'agent_id' => $dret['id'],
            'op_agent_id' => self::$session['uid'],
            'game_gold' => $charge_gold,
            'befor_gold' => $dret['gold'],
            'after_gold' => $dret['gold'] + $charge_gold,
            'order_status' => ($flag && $dflag),
            'tread_time' => NOW,
            'order_desc' => '获得上线充值: ' . $charge_desc . ' OPT: [' . self::$session['uid'] . ']',
        );
        $ret_add = $mod->table('order_gold')->add_data($add_data);

        // 扣款成功
        if ($flag && $dflag) {
            // 记账成功
            if ($ret_add && $ret_redu) {
                $mod->table('angent_info')->commit();
                $mod->table('order_gold')->commit();
                $lmod->add_data(array('uid' => self::$session['uid'], 'action' => '' . serialize($redu_data), 'addr' => Tool::getip(), 'act_time' => NOW));
                $lmod->add_data(array('uid' => self::$session['uid'], 'action' => '' . serialize($add_data), 'addr' => Tool::getip(), 'act_time' => NOW));
                ADLogController::AgLog('代理充值【扣除】', $redu_data, self::$session['uid']);
                ADLogController::AgLog('代理充值【增加】', $add_data, $dret['id']);

                self::OutMsg(array('ecode' => 200, 'emsg' => '操作成功'));
            } else {
                // 扣款成功但是记账失败也要全部回滚
                $mod->table('angent_info')->rollback();
                $mod->table('order_gold')->rollback();
                self::OutMsg(array('ecode' => 400, 'emsg' => '操作失败'));
            }
        } else {
            // 扣款失败就要回滚
            $mod->table('angent_info')->rollback();
            if ($ret_add && $ret_redu) {
                // 但是记账成功，不过无效，可以提交无效的账单
                $mod->table('order_gold')->commit();
            }
            self::OutMsg(array('ecode' => 400, 'emsg' => '操作失败'));
        }
        return TRUE;
    }

    // 玩家
    public function PlayerPositAction() {
        $mod = DbModel::Init();
        $ret = $mod->table('angent_info')->get_one('gold', array('id' => self::$session['uid']));
        $rest_gold = $ret['gold'];
        $this->view->assign('rest_gold', floor($rest_gold));
        $this->view->display('Agent/Posit/User_Posit.html');
        return TRUE;
    }

    // 玩家充值动作
    public function AjaxPlayerPositAction() {
        $dest_id = isset($this->req['dest_id']) ? $this->req['dest_id'] : NULL;
        $charge_gold = isset($this->req['charge_gold']) ? $this->req['charge_gold'] : NULL;
        $charge_desc = isset($this->req['charge_desc']) ? $this->req['charge_desc'] : NULL;
        $charge_pass = isset($this->req['charge_pass']) ? $this->req['charge_pass'] : NULL;
        $passcount = self::$sess->__get('passcnt');

//        if (isset($passcount['passcount']) && $passcount['passcount'] > 3) {
//            self::$sess->del('_agent_user');
//            self::$sess->del('passcnt');
//            self::OutMsg(array('ecode' => 400, 'emsg' => '密码错误次数太多，您已被系统踢出!'));
//        }


        if (!is_numeric($dest_id) || $dest_id < 0) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '玩家ID不正确'));
        }

        if (empty($charge_gold) || !is_numeric($charge_gold) || $charge_gold < 1) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '数量不正确'));
        }

        $mod = DbModel::Init();
        $sret = $mod->table('angent_info')->get_one('`gold`, `tread_pass`', array('id' => self::$session['uid']));
        if (empty($sret)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '当前代理无效'));
            self::$sess->del('_agent_user');
        }

//        if (empty($sret['tread_pass'])) {
//            self::OutMsg(array('ecode' => 400, 'emsg' => '未设置支付密码，请先设置支付密码'));
//        }
//        
//        if ($sret['tread_pass'] != md5(md5($charge_pass))) {
//            self::$sess->__set('passcnt', array('passcount' => $passcount['passcount'] + 1));
//            self::OutMsg(array('ecode' => 400, 'emsg' => '支付密码错误,错误次数: ' . $passcount['passcount']));
//        }

        $dret = $mod->table('t_users')->get_one('`status`, `gems`', array('userid' => $dest_id), array('userid' => 'desc'));

        if (empty($dret)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '玩家ID不存在'));
        }

        if (1 != $dret['status']) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '玩家状态错误'));
        }

        $rest = $sret['gold'] - $charge_gold;
        $add = $dret['gems'] + $charge_gold;
        if ($rest < 1) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '您的房卡数量不足'));
        }

        $flag = 0;
        $dflag = 0;
        $mod->start();
        $ssret = $mod->table('angent_info')->up_data(array('gold' => $rest), array('id' => self::$session['uid']));
        $ddret = $mod->table('t_users')->up_data(array('gems' => $add), array('userid' => $dest_id));
        if ($ssret) {
            $flag = 1;
        }
        if ($ddret) {
            $dflag = 1;
        }

        $osn = $this->getSn('order_gold');
        $o_data = array(
            'order_sn' => $osn,
            'order_type' => 1,
            'agent_id' => self::$session['uid'],
            'op_player_id' => $dest_id,
            'game_gold' => 0 - $charge_gold,
            'befor_gold' => $sret['gold'],
            'after_gold' => $rest,
            'order_status' => ($flag && $dflag),
            'tread_time' => NOW,
            'order_desc' => '给玩家充值: ' . $charge_desc . ' OPT: [' . self::$session['uid'] . ']',
        );
        $odret_add = $mod->table('order_gold')->add_data($o_data);
        // 扣款成功
        if ($flag && $dflag) {
            // 记账成功
            if ($odret_add) {
                $mod->table('angent_info')->commit();
                $mod->table('t_users')->commit();
                $mod->table('order_gold')->commit();
                ADLogController::AgLog('玩家充值【扣除】', $o_data, self::$session['uid']);
                self::OutMsg(array('ecode' => 200, 'emsg' => '操作成功'));
            } else {
                // 扣款成功但是记账失败也要全部回滚
                $mod->rollback();
                self::OutMsg(array('ecode' => 400, 'emsg' => '操作失败'));
            }
        } else {
            // 扣款失败就要回滚
            $mod->rollback();
            self::OutMsg(array('ecode' => 400, 'emsg' => '操作失败'));
        }
        return TRUE;


//        
//
//        if ($odret_add) {
//            $mod->table('angent_info')->commit();
//            $lmod->add_data(array('uid' => self::$session['uid'], 'action' => '房卡转让' . serialize($s_data) . serialize($d_data), 'addr' => Tool::getip(), 'act_time' => NOW));
//            self::OutMsg(array('ecode' => 200, 'emsg' => '操作成功'));
//        } else {
//            $mod->table('angent_info')->rollback();
//            self::OutMsg(array('ecode' => 400, 'emsg' => '操作失败'));
//        }
    }

    /*
     * 生成订单号
     */

    private function getSn($table = 'order_card') {
        $sn = Tool::makeorder();
        $mod = DbModel::Init();
        $ret = $mod->table($table)->get_count(array('order_sn' => $sn));
        if ($ret >= 1) {
            $this->getSn($table);
        }
        return $sn;
    }

}
