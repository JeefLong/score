<?php

/**
 *  版权所有禁止转载,违者必究
 *     Citybay@163.com
 *    软著持有人:Citybay
 * */
use \Logic\BaseController;
use \Yaf\Session;

/**
 * Index controller
 */
Final class MainController extends BaseController {

    // 公共输出
    use \OutSend\Out;

    private $req;          // 请求信息
    private $view;         // 渲染器
    private static $session;

    /**
     * 非法登录信息的拦截
     * */
    public function init() {

        $sess = Session::getInstance();
        if (!$sess->__isset('_agent_user')) {
            self::redirect('/Agent/Login/Index');
        }
        self::$session = $sess->__get('_agent_user');
        $this->req = $this->getRequest()->getRequest();

        // 获得View渲染对象
        $this->view = $this->getView();
        $this->view->assign('Ctrl', $this->getRequest()->controller);
        $this->view->assign('Act', $this->getRequest()->action);
        return TRUE;
    }

    /**
     * 首页
     * */
    public function IndexAction() {
        $mod = DbModel::Init();
        $off_ids = $this->get_next(self::$session['uid']);
        // 代理人数
        $o_count = $mod->table('angent_info')->get_count('`ref_id` = ' . self::$session['uid']);
        $this->view->assign('agt_num', $o_count);

        // 代理卖给玩家房卡
        $wh = array(
            'order_status' => 1,
            'order_type' => 1,
        );

        // 下线购卡
        if (!empty($off_ids)) {
            $wh['agent_id'] = $off_ids;
            $off_cards = $mod->table('order_card')->get_count($wh);
        } else {
            $off_cards = 0;
        }
        $this->view->assign('off_cards', $off_cards);

        // 订单数量
        $o_count = $mod->table('order_card')->get_count(array('order_status' => 1, 'agent_id' => self::$session['uid']));
        $this->view->assign('order_num', $o_count);

        // 卖给代理房卡
        $wh = array(
            'order_status' => 1,
            'order_type' => 2,
            'agent_id' => self::$session['uid'],
        );

        $s_ret = $mod->table('order_card')->get_one(' sum(game_card) as a_sell ', $wh);
        $this->view->assign('a_sell', abs($s_ret['a_sell']));

        // 代理卖给玩家房卡
        $wh = array(
            'order_status' => 1,
            'order_type' => 1,
            'agent_id' => self::$session['uid'],
        );

        $s_ret = $mod->table('order_card')->get_one(' sum(game_card) as p_sell ', $wh);
        $this->view->assign('p_sell', abs($s_ret['p_sell']));

        ////////////////// 今日 //////////////////////////
        $nowday = date('Y-m-d', NOW);
        $s_start = NOWS;
        $s_end = NOWE;

        // 订单数量
        $wh = array(
            'tread_time[>]' => $s_start,
            'tread_time[<]' => $s_end,
            'order_status' => 1,
            'agent_id' => self::$session['uid'],
        );

        $o_count = $mod->table('order_card')->get_count($wh);
        $this->view->assign('na_count', $o_count);

        // 下线购卡
        $wh = array(
            'order_status' => 1,
            'order_type' => 2,
            'tread_time[>]' => $s_start,
            'tread_time[<]' => $s_end,
        );
        if (!empty($off_ids)) {
            $wh['agent_id'] = $off_ids;
            $ret = $mod->table('order_card')->get_one(' sum(game_card) as a_sell ', $wh);
            $a_sell = abs($ret['a_sell']);
        } else {
            $a_sell = 0;
        }
        $this->view->assign('na_sell', $a_sell);

        // 玩家充值
        $wh = array(
            'order_status' => 1,
            'order_type' => 1,
            'tread_time[>]' => $s_start,
            'tread_time[<]' => $s_end,
            'agent_id' => self::$session['uid'],
        );
        $ret = $mod->table('order_card')->get_one(' sum(game_card) as p_sell ', $wh);
        $this->view->assign('np_sell', abs($ret['p_sell']));

        // 代理人数
        $wh = array(
            'regist_time[>]' => $s_start,
            'regist_time[<]' => $s_end,
            'ref_id' => self::$session['uid'],
        );

        $o_count = $mod->table('angent_info')->get_count($wh);
        $this->view->assign('nf_count', $o_count);

        ////////////////////// 昨日 ///////////////////////
        $yestd = date('Y-m-d', strtotime('-1 day'));
        $s_start = strtotime($yestd . ' 00:00:00');
        $s_end = strtotime($yestd . ' 23:59:59');

        // 订单数量
        $wh = array(
            'tread_time[>]' => $s_start,
            'tread_time[<]' => $s_end,
            'order_status' => 1,
            'agent_id' => self::$session['uid'],
        );
        $o_count = $mod->table('order_card')->get_count($wh);
        $this->view->assign('da_count', $o_count);

        //下线购卡
        $wh = array(
            'order_status' => 1,
            'order_type' => 2,
            'tread_time[>]' => $s_start,
            'tread_time[<]' => $s_end,
        );

        if (!empty($off_ids)) {
            $wh['agent_id'] = $off_ids;
            $ret = $mod->table('order_card')->get_one(' sum(game_card) as a_sell ', $wh);
            $a_sell = abs($ret['a_sell']);
        } else {
            $a_sell = 0;
        }
        $this->view->assign('da_sell', $a_sell);

        // 玩家充值
        $wh = array(
            'order_status' => 1,
            'order_type' => 1,
            'tread_time[>]' => $s_start,
            'tread_time[<]' => $s_end,
            'agent_id' => self::$session['uid'],
        );
        $ret = $mod->table('order_card')->get_one(' sum(game_card) as p_sell ', $wh);
        $this->view->assign('dp_sell', abs($ret['p_sell']));

        // 代理人数
        $wh = array(
            'regist_time[>]' => $s_start,
            'regist_time[<]' => $s_end,
            'ref_id' => self::$session['uid'],
        );

        $o_count = $mod->table('angent_info')->get_count($wh);
        $this->view->assign('df_count', $o_count);


        ////////////////////////////上周//////////////////////////////
        $s_start = mktime(0, 0, 0, date('m'), date('d') - date('w') + 1 - 7, date('Y'));
        $s_end = mktime(23, 59, 59, date('m'), date('d') - date('w') + 7 - 7, date('Y'));

        // 订单数量
        $wh = array(
            'tread_time[>]' => $s_start,
            'tread_time[<]' => $s_end,
            'agent_id' => self::$session['uid'],
        );

        $o_count = $mod->table('order_card')->get_count($wh);
        $this->view->assign('wo_count', $o_count);

        // 代理购卡
        $wh = array(
            'order_status' => 1,
            'order_type' => 2,
            'tread_time[>]' => $s_start,
            'tread_time[<]' => $s_end,
        );
        if (!empty($off_ids)) {
            $wh['agent_id'] = $off_ids;
            $ret = $mod->table('order_card')->get_one(' sum(game_card) as a_sell ', $wh);
            $a_sell = abs($ret['a_sell']);
        } else {
            $a_sell = 0;
        }
        $this->view->assign('wa_sell', $a_sell);

        // 玩家充值
        $wh = array(
            'order_status' => 1,
            'order_type' => 1,
            'tread_time[>]' => $s_start,
            'tread_time[<]' => $s_end,
            'agent_id' => self::$session['uid'],
        );
        $ret = $mod->table('order_card')->get_one(' sum(game_card) as p_sell ', $wh);
        $this->view->assign('wp_sell', abs($ret['p_sell']));

        // 代理人数
        $wh = array(
            'regist_time[>]' => $s_start,
            'regist_time[<]' => $s_end,
            'ref_id' => self::$session['uid'],
        );

        $o_count = $mod->table('angent_info')->get_count($wh);
        $this->view->assign('wf_count', $o_count);

        //////////////// 上月 /////////////
        $s_start = mktime(0, 0, 0, date('m') - 1, 1, date('Y'));
        $s_end = mktime(23, 59, 59, date('m'), 0, date('Y'));

        // 订单数量
        $wh = array(
            'tread_time[>]' => $s_start,
            'tread_time[<]' => $s_end,
            'agent_id' => self::$session['uid'],
        );

        $o_count = $mod->table('order_card')->get_count($wh);
        $this->view->assign('mo_count', $o_count);

        // 代理购卡
        $wh = array(
            'order_status' => 1,
            'order_type' => 2,
            'tread_time[>]' => $s_start,
            'tread_time[<]' => $s_end,
        );
        if (!empty($off_ids)) {
            $wh['agent_id'] = $off_ids;
            $ret = $mod->table('order_card')->get_one(' sum(game_card) as a_sell ', $wh);
            $a_sell = abs($ret['a_sell']);
        } else {
            $a_sell = 0;
        }
        $this->view->assign('ma_sell', $a_sell);

        // 玩家充值
        $wh = array(
            'order_status' => 1,
            'order_type' => 1,
            'tread_time[>]' => $s_start,
            'tread_time[<]' => $s_end,
            'agent_id' => self::$session['uid'],
        );
        $ret = $mod->table('order_card')->get_one(' sum(game_card) as p_sell ', $wh);
        $this->view->assign('mp_sell', abs($ret['p_sell']));

        // 下线人数
        $wh = array(
            'regist_time[>]' => $s_start,
            'regist_time[<]' => $s_end,
            'ref_id' => self::$session['uid'],
        );

        $o_count = $mod->table('angent_info')->get_count($wh);
        $this->view->assign('mf_count', $o_count);

        ///////////////////////////////////////////////////      

        $this->view->assign('msg', self::$session['umessage']);
        $this->view->assign('uname', self::$session['uname']);
        $this->view->display('Agent/Main/index.html');
        return TRUE;
    }

    // 通知
    public function getNoteAction() {
        $mod = DbModel::Init();
        $ret = $mod->table('angent_read')->get_list('note_id', array('read_id' => self::$session['uid']));
        $note_arr = array();
        foreach ($ret as $val) {
            $note_arr[] = $val['note_id'];
        }
        unset($val);
        $ret2 = $mod->table('angent_note')->get_list('*', array('is_show' => 1, 'end_date[>]' => NOW), -1, -1, array('note_date' => 'DESC'));
        foreach ($ret2 as $k => $v) {
            if (in_array($v['id'], $note_arr)) {
                continue;
            }
            self::OutMsg(array(
                'ecode' => 200,
                'emsg' => $v['note_content'],
                'edate' => date('Y-m-d H:i:s', $v['note_date']),
                'enid' => $v['id'],
            ));
        }
        unset($k, $v);
        self::OutMsg(array('ecode' => 400, 'emsg' => 'No Data!'));
    }

    // 已读消息
    public function AjaxReadAction() {
        $nid = empty($this->req['n_id']) ? NULL : intval($this->req['n_id']);
        if (!empty($nid)) {
            $mod = DbModel::Init();

            $rret = $mod->table('angent_read')->get_count(array('note_id' => $nid, 'read_id' => self::$session['uid']));
            if ($rret > 0) {
                return TRUE;
            }

            $ret = $mod->table('angent_read')->add_data(array('note_id' => $nid, 'read_id' => self::$session['uid'], 'read_time' => NOW));
            if ($ret) {
                self::OutMsg(array('ecode' => 200, 'emsg' => '设置成功'));
            }
        }
    }

    public function HelpAction() {
        $this->view->display('Agent/Main/help.html');
    }

    //获取当前代理的下线ID们
    private function get_next($pid) {
        $ret = array();
        $mod = DbModel::Init();
        $rso = $mod->table('angent_info')->get_list('id', '`ref_id` = ' . $pid, -1, -1);
        if (!empty($rso)) {
            foreach ($rso as $k => $v) {
                $ret[] = $v['id'];
            }
        }
        return $ret;
    }

}
