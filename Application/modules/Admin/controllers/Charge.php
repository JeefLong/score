<?php

/**
 *  版权所有禁止转载,违者必究
 *     Citybay@163.com
 *    软著持有人:Citybay
 * */
use \Logic\BaseController;
use Comm\Tool;
use \Yaf\Session;
use Logs\ADLogController;

// Index controller
Final class ChargeController extends BaseController {

    // 公共输出
    use \OutSend\Out;

    private $req;          // 请求信息
    private $view;         // 渲染器
    private static $session;

    // 非法登录信息的拦截
    public function init() {

        $sess = Session::getInstance();
        if (!$sess->__isset('_admin_user')) {
            //Tool::redirect('/Admin/Login/Index');
            self::redirect('/Admin/Login/Index');
        }
        self::$session = $sess->__get('_admin_user');
        $this->req = $this->getRequest()->getRequest();

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
        $agt_id = isset($this->req['aid']) ? $this->req['aid'] : NULL;
        if (!empty($agt_id)) {
            $this->view->assign('aid', $agt_id);
        }
        $this->view->display('Admin/Charge/Add_Charge.html');
        return TRUE;
    }

    // 充值动作
    public function AjaxAddChargeAction() {
        $agt_id = isset($this->req['agent_id']) ? $this->req['agent_id'] : NULL;
        $charge_card = isset($this->req['charge_card']) ? $this->req['charge_card'] : NULL;
        $charge_desc = isset($this->req['charge_desc']) ? $this->req['charge_desc'] : NULL;

        if (empty($agt_id) || !is_numeric($agt_id)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => 'ID不正确'));
        }
        if (empty($charge_card) || !is_numeric($charge_card)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '数量不正确'));
        }

        $mod = DbModel::Init();
        $ret = $mod->table('angent_info')->get_one('*', array('id' => $agt_id));
        if (empty($ret)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '代理ID不存在'));
        }
        $flag = 0;
        if ($charge_card > 0) {
            $up_arr = array(
                'card' => $ret['card'] + $charge_card,
            );
            $ret_up = $mod->table('angent_info')->up_data($up_arr, array('id' => $agt_id));
            if ($ret_up) {
                $flag = 1;
            }
            $in_data = array(
                'order_sn' => $this->getSn('order_card'),
                'order_type' => 2,
                'agent_id' => $agt_id,
                'game_card' => $charge_card,
                'befor_card' => $ret['card'],
                'after_card' => $ret['card'] + $charge_card,
                'order_status' => $flag,
                'tread_time' => NOW,
                'order_desc' => '代理购买房卡: ' . $charge_desc . ' OPT: [' . self::$session['uid'] . ']',
            );
            $ret_add = $mod->table('order_card')->add_data($in_data);
            ADLogController::AdLog('后台充值', $in_data, self::$session['uid']);
            if ($ret_add) {
                self::OutMsg(array('ecode' => 200, 'emsg' => '操作成功'));
            } else {
                self::OutMsg(array('ecode' => 400, 'emsg' => '操作失败'));
            }
        } elseif ($charge_card < 0) {
            $charge_card = abs($charge_card);
            $rest = $ret['card'] - $charge_card;
            $rest = ($rest <= 0) ? 0 : $rest;
            $ret_up = $mod->table('angent_info')->up_data(array('card' => $rest), array('id' => $agt_id));
            if ($ret_up) {
                $flag = 1;
            }
            $in_data = array(
                'order_sn' => $this->getSn('order_card'),
                'order_type' => 6,
                'agent_id' => $agt_id,
                'game_card' => 0 - $charge_card,
                'befor_card' => $ret['card'],
                'after_card' => $rest,
                'order_status' => $flag,
                'tread_time' => NOW,
                'order_desc' => '代理提现扣房卡: ' . $charge_desc . ' OPT: [' . self::$session['uid'] . ']',
            );
            $ret_add = $mod->table('order_card')->add_data($in_data);
            ADLogController::AdLog('后台提现', $in_data, self::$session['uid']);
            if ($ret_add) {
                self::OutMsg(array('ecode' => 200, 'emsg' => '操作成功'));
            } else {
                self::OutMsg(array('ecode' => 400, 'emsg' => '操作失败'));
            }
        } else {
            self::OutMsg(array('ecode' => 400, 'emsg' => '未知错误'));
        }
        return TRUE;
    }

    // 转让
    public function ExgChargeAction() {
        $this->view->display('Admin/Charge/Exg_Charge.html');
        return TRUE;
    }

    // 转让动作
    public function AjaxExgChargeAction() {
        $source_id = isset($this->req['source_id']) ? $this->req['source_id'] : NULL;
        $dest_id = isset($this->req['dest_id']) ? $this->req['dest_id'] : NULL;
        $charge_card = isset($this->req['charge_card']) ? $this->req['charge_card'] : NULL;
        $charge_desc = isset($this->req['charge_desc']) ? $this->req['charge_desc'] : NULL;

        if (empty($source_id) || !is_numeric($source_id)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '源ID不正确'));
        }

        if (empty($dest_id) || !is_numeric($dest_id)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '目标ID不正确'));
        }

        if (empty($charge_card) || !is_numeric($charge_card) || $charge_card <= 0) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '数量不正确'));
        }

        $mod = DbModel::Init();

        $sret = $mod->table('angent_info')->get_one('*', array('id' => $source_id));
        $dret = $mod->table('angent_info')->get_one('*', array('id' => $dest_id));

        if (empty($sret)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '源代理ID不存在'));
        }

        if ($sret['agent_status'] != 1) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '源代理不可用或者被禁用'));
        }

        if ($dret['agent_status'] != 1) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '目标理不可用或者被禁用'));
        }

        if (empty($dret)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '目标代理ID不存在'));
        }

        $rest = $sret['card'] - $charge_card;
        $add = $dret['card'] + $charge_card;
        if ($rest < 0) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '源代理房卡数量不足'));
        }
        $flag = 0;
        $mod->start();
        $ssret = $mod->table('angent_info')->up_data('`card` =  `card` - ' . $charge_card, array('id' => $source_id));
        $ddret = $mod->table('angent_info')->up_data('`card` =  `card` + ' . $charge_card, array('id' => $dest_id));
        if ($ssret && $ddret) {
            $flag = 1;
            $mod->commit();
        }
        $mod->rollback();

        $osn = $this->getSn('order_card');
        $s_data = array(
            'order_sn' => $osn,
            'order_type' => 7,
            'agent_id' => $source_id,
            'game_card' => 0 - $charge_card,
            'befor_card' => $sret['card'],
            'after_card' => $rest,
            'order_status' => $flag,
            'tread_time' => NOW,
            'order_desc' => '房卡转出: ' . $charge_desc . ' OPT: [' . self::$session['uid'] . ']',
        );

        $d_data = array(
            'order_sn' => $osn,
            'order_type' => 7,
            'agent_id' => $dest_id,
            'game_card' => $charge_card,
            'befor_card' => $dret['card'],
            'after_card' => $add,
            'order_status' => $flag,
            'tread_time' => NOW,
            'order_desc' => '房卡转入: ' . $charge_desc . ' OPT: [' . self::$session['uid'] . ']',
        );
        $osret_add = $mod->table('order_card')->add_data($s_data);
        ADLogController::AdLog('房卡转让【扣除】', $s_data, self::$session['uid']);

        $odret_add = $mod->table('order_card')->add_data($d_data);
        ADLogController::AdLog('房卡转让【增加】', $d_data, self::$session['uid']);
        //记账成功
        if ($osret_add && $odret_add) {
            self::OutMsg(array('ecode' => 200, 'emsg' => '操作成功'));
        } else {
            self::OutMsg(array('ecode' => 400, 'emsg' => '操作失败'));
        }
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
