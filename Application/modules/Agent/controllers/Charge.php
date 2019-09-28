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
Final class ChargeController extends BaseController {

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
    public function AddChargeAction() {
        $uname = isset($this->req['uname']) ? trim($this->req['uname']) : NULL;
        if (!empty($uname)) {
            $this->view->assign('uname', $uname);
        } else {
            $this->view->assign('uname', NULL);
        }
        $mod = DbModel::Init();
        $ret = $mod->table('angent_info')->get_one('card', array('id' => self::$session['uid']));
        $rest_gold = $ret['card'];
        $this->view->assign('rest_gold', floor($rest_gold));
        $this->view->display('Agent/Charge/Add_Charge.html');
        return TRUE;
    }

    // 充值动作
    public function AjaxAddChargeAction() {
        $agt_name = isset($this->req['agent_name']) ? $this->req['agent_name'] : NULL;
        $charge_card = isset($this->req['charge_gold']) ? $this->req['charge_gold'] : NULL;
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
        if (empty($charge_card) || !is_numeric($charge_card) || $charge_card < 1) {
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

        $dret = $mod->table('angent_info')->get_one('`id`, `card`, `agent_status`', array('agent_name' => $agt_name, 'ref_id' => self::$session['uid']));
        $sret = $mod->table('angent_info')->get_one('`card`,`tread_pass`', array('id' => self::$session['uid']));
        if (empty($sret)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '当前代理无效'));
            //self::$sess->del('_agent_user');
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

        if ($sret['card'] - $charge_card < 0) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '您的房卡不足,请先充值'));
        }
        $mod->start();
        $flag = 0;
        $dflag = 0;
        //给下级冲入
        $up_arr = array(
            'card' => $dret['card'] + $charge_card,
        );

        $ret_up = $mod->table('angent_info')->up_data('`card` = `card` + ' . $charge_card, array('id' => $dret['id'], 'ref_id' => self::$session['uid']));
        if ($ret_up) {
            $flag = 1;
        }
        // 扣除当前
        $des_arr = array(
            'card' => $sret['card'] - $charge_card,
        );
        $des_up = $mod->table('angent_info')->up_data('`card` = `card` - ' . $charge_card, array('id' => self::$session['uid']));
        if ($des_up) {
            $dflag = 1;
        }
        ////////////交易记录硬性添加，记录是否有效，取决于事物返回的flag////////////
        $osn = $this->getSn('order_card');
        // 减币记录
        $redu_data = array(
            'order_sn' => $osn,
            'order_type' => 3,
            'agent_id' => self::$session['uid'],
            'op_agent_id' => $dret['id'],
            'game_card' => 0 - $charge_card,
            'befor_card' => $sret['card'],
            'after_card' => $sret['card'] - $charge_card,
            'order_status' => ($flag && $dflag),
            'tread_time' => NOW,
            'order_desc' => '给下线充值: ' . $charge_desc . ' OPT: [' . self::$session['uid'] . ']',
        );

        $ret_redu = $mod->table('order_card')->add_data($redu_data);

        // 加币记录
        $add_data = array(
            'order_sn' => $osn,
            'order_type' => 4,
            'agent_id' => $dret['id'],
            'op_agent_id' => self::$session['uid'],
            'game_card' => $charge_card,
            'befor_card' => $dret['card'],
            'after_card' => $dret['card'] + $charge_card,
            'order_status' => ($flag && $dflag),
            'tread_time' => NOW,
            'order_desc' => '获得上线充值: ' . $charge_desc . ' OPT: [' . self::$session['uid'] . ']',
        );
        $ret_add = $mod->table('order_card')->add_data($add_data);

        //扣款成功
        if ($flag && $dflag) {
            // 记账成功
            if ($ret_add && $ret_redu) {
                ADLogController::AgLog('代理充值【扣除】', $redu_data, self::$session['uid']);
                ADLogController::AgLog('代理充值【增加】', $add_data, $dret['id']);
                $mod->commit();
                self::OutMsg(array('ecode' => 200, 'emsg' => '操作成功'));
            } else {
                // 扣款成功但是记账失败也要全部回滚
                $mod->rollback();
                self::OutMsg(array('ecode' => 400, 'emsg' => '操作失败'));
            }
        } else {
            //扣款失败
            $mod->rollback();
            self::OutMsg(array('ecode' => 400, 'emsg' => '操作失败'));
        }

        return TRUE;
    }

    // 玩家
    public function PlayerChargeAction() {
        $mod = DbModel::Init();
        $ret = $mod->table('angent_info')->get_one('card', array('id' => self::$session['uid']));
        $rest_gold = $ret['card'];
        $this->view->assign('rest_gold', floor($rest_gold));
        $this->view->display('Agent/Charge/User_Charge.html');
        return TRUE;
    }

    // 玩家充值动作
    public function AjaxPlayerChargeAction() {
        $dest_id = isset($this->req['dest_id']) ? $this->req['dest_id'] : NULL;
        $charge_card = isset($this->req['charge_gold']) ? $this->req['charge_gold'] : NULL;
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

        if (empty($charge_card) || !is_numeric($charge_card) || $charge_card < 1) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '数量不正确'));
        }

        $mod = DbModel::Init();

        $sret = $mod->table('angent_info')->get_one('`card`, `tread_pass`,`club_id`', array('id' => self::$session['uid']));
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

        $dret = $pmod->table('t_users')->get_one('`status`, `gems`,`club_id`', array('userid' => $dest_id), array('userid' => 'desc'));


        if (empty($dret)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '玩家ID不存在'));
        }

        if (1 != $dret['status']) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '玩家状态错误'));
        }

        $rest = $sret['card'] - $charge_card;
        $add = $dret['gems'] + $charge_card;
        if ($rest < 1) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '您的房卡数量不足'));
        }

        ///////////////////// 
        if (($sret['club_id'] >= 0) && ($dret['club_id'] > 0) && ($sret['club_id'] != $dret['club_id'])) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '非本俱乐部成员'));
        }

        $clb = $mod->table('t_clubs')->get_one('`status`', array('club_id' => $sret['club_id']));
        if (isset($clb['status']) && ($clb['status'] < 1)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '俱乐部被关闭'));
        }

        $flag = 0;
        $dflag = 0;
        $mod->start();
        $ssret = $mod->table('angent_info')->up_data(array('card' => $rest), array('id' => self::$session['uid']));
        $ddret = $pmod->table('t_users')->up_data(array('gems' => $add), array('userid' => $dest_id));
        if ($ssret) {
            $flag = 1;
        }
        if ($ddret) {
            $dflag = 1;
        }

        $osn = $this->getSn('order_card');
        $o_data = array(
            'order_sn' => $osn,
            'order_type' => 1,
            'agent_id' => self::$session['uid'],
            'op_player_id' => $dest_id,
            'game_card' => 0 - $charge_card,
            'befor_card' => $sret['card'],
            'after_card' => $rest,
            'order_status' => ($flag && $dflag),
            'tread_time' => NOW,
            'order_desc' => '给玩家充值: ' . $charge_desc . ' OPT: [' . self::$session['uid'] . ']',
        );
        $odret_add = $mod->table('order_card')->add_data($o_data);
        // 扣款成功
        if ($flag && $dflag) {
            // 记账成功
            if ($odret_add) {
                ADLogController::AgLog('玩家充值【扣除】', $o_data, self::$session['uid']);
                $mod->commit();
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
