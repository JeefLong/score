<?php

/**
 *  版权所有禁止转载,违者必究
 *     Citybay@163.com
 *    软著持有人:Citybay
 * */
use \Logic\BaseController;
use Comm\Page;
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

    /**
     * 首页
     * */
    public function IndexAction() {
        $mod = DbModel::Init();


        // 代理人数
        $o_count = $mod->table('angent_info')
                ->where('1 = 1')
                ->count();
        $this->view->assign('agt_num', $o_count);


        // 玩家数量
        $o_count = $mod->table('t_user')
                ->where('1 = 1')
                ->count();
        $this->view->assign('play_num', $o_count);


        // 订单数量
        $o_count = $mod->table('order_card')
                ->where('order_status = 1')
                ->count();
        $this->view->assign('order_num', $o_count);


        // 卖给代理房卡
        $wh = array(
            'order_status' => 1,
            'order_type' => 1,
        );

        $s_ret = $mod->table('order_card')
                ->where($wh)
                ->select(' sum(card_no) as a_sell ')
                ->first();
        $this->view->assign('a_sell', abs($s_ret['a_sell']));

        // 代理卖给玩家房卡
        $wh = array(
            'order_status' => 1,
            'order_type' => 3,
        );
        $s_ret = $mod->table('order_card')
                ->where($wh)
                ->select(' sum(card_no) as p_sell ')
                ->first();
        $this->view->assign('p_sell', abs($s_ret['p_sell']));

        // 代理人数
        $off_count = $mod->table('angent_info')
                ->where('1=1')
                ->count();
        $this->view->assign('n_off_num', $off_count);

        ////////////////// 今日 //////////////////////////

        $s_start = NOWS;
        $s_end = NOWE;

        // 订单数量
        $wh = array(
            'tread_time[>]' => $s_start,
            'tread_time[<]' => $s_end,
            'order_status' => 1,
        );
        $o_count = $mod->table('order_card')
                ->where($wh)
                ->count();
        $this->view->assign('na_count', $o_count);

        //代理购卡
        $wh = array(
            'order_status' => 1,
            'order_type' => 1,
            'tread_time[>]' => $s_start,
            'tread_time[<]' => $s_end,
        );
        $ret = $mod->table('order_card')
                ->where($wh)
                ->select(' sum(card_no) as a_sell ')
                ->first();
        $this->view->assign('na_sell', abs($ret['a_sell']));

        // 玩家充值
        $wh = array(
            'order_status' => 1,
            'order_type' => 3,
            'tread_time[>]' => $s_start,
            'tread_time[<]' => $s_end,
        );
        $ret = $mod->table('order_card')
                ->where($wh)
                ->select(' sum(card_no) as p_sell ')
                ->first();
        $this->view->assign('np_sell', abs($ret['p_sell']));

        // 代理人数
        $wh = array(
            'regist_time[>]' => $s_start,
            'regist_time[<]' => $s_end,
        );

        $o_count = $mod->table('angent_info')->where($wh)->count();
        $this->view->assign('nf_count', $o_count);

        // 玩家数量
        $wh = array(
            'reg_time[>]' => $s_start,
            'reg_time[<]' => $s_end,
        );

        $o_count = $mod->table('t_user')
                ->where($wh)
                ->count();
        $this->view->assign('npl_count', $o_count);


        ////////////////////// 昨日 ///////////////////////
        $yestd = date('Y-m-d', strtotime('-1 day'));
        $s_start = strtotime($yestd . ' 00:00:00');
        $s_end = strtotime($yestd . ' 23:59:59');

        // 订单数量
        $wh = array(
            'tread_time[>]' => $s_start,
            'tread_time[<]' => $s_end,
            'order_status' => 1,
        );
        $o_count = $mod->table('order_card')
                ->where($wh)
                ->count();
        $this->view->assign('da_count', $o_count);

        //代理购卡
        $wh = array(
            'order_status' => 1,
            'order_type' => 1,
            'tread_time[>]' => $s_start,
            'tread_time[<]' => $s_end,
        );
        $ret = $mod->table('order_card')
                ->where($wh)
                ->select(' sum(card_no) as a_sell ')
                ->first();
        $this->view->assign('da_sell', abs($ret['a_sell']));

        // 玩家充值
        $wh = array(
            'order_status' => 1,
            'order_type' => 3,
            'tread_time[>]' => $s_start,
            'tread_time[<]' => $s_end,
        );
        $ret = $mod->table('order_card')
                ->where($wh)
                ->select(' sum(card_no) as p_sell ')
                ->first();
        $this->view->assign('dp_sell', abs($ret['p_sell']));

        // 代理人数
        $wh = array(
            'regist_time[>]' => $s_start,
            'regist_time[<]' => $s_end,
        );

        $o_count = $mod->table('angent_info')
                ->where($wh)
                ->count();
        $this->view->assign('df_count', $o_count);

        // 玩家数量
        $wh = array(
            'reg_time[>]' => $s_start,
            'reg_time[<]' => $s_end,
        );

        $o_count = $mod->table('t_user')
                ->where($wh)
                ->count();
        $this->view->assign('dpl_count', $o_count);


        ////////////////////////////上周//////////////////////////////
        $s_start = mktime(0, 0, 0, date('m'), date('d') - date('w') + 1 - 7, date('Y'));
        $s_end = mktime(23, 59, 59, date('m'), date('d') - date('w') + 7 - 7, date('Y'));

        // 订单数量
        $wh = array(
            'tread_time[>]' => $s_start,
            'tread_time[<]' => $s_end,
        );

        $o_count = $mod->table('order_card')
                ->where($wh)
                ->count();
        $this->view->assign('wo_count', $o_count);

        // 代理购卡
        $wh = array(
            'order_status' => 1,
            'order_type' => 1,
            'tread_time[>]' => $s_start,
            'tread_time[<]' => $s_end,
        );
        $ret = $mod->table('order_card')
                ->where($wh)
                ->select(' sum(card_no) as a_sell ')
                ->first();
        $this->view->assign('wa_sell', abs($ret['a_sell']));

        // 玩家充值
        $wh = array(
            'order_status' => 1,
            'order_type' => 3,
            'tread_time[>]' => $s_start,
            'tread_time[<]' => $s_end,
        );
        $ret = $mod->table('order_card')
                ->where($wh)
                ->select(' sum(card_no) as p_sell ')
                ->first();
        $this->view->assign('wp_sell', abs($ret['p_sell']));

        // 代理人数
        $wh = array(
            'regist_time[>]' => $s_start,
            'regist_time[<]' => $s_end,
        );

        $o_count = $mod->table('angent_info')
                ->where($wh)
                ->count();
        $this->view->assign('wf_count', $o_count);


        // 玩家数量
        $wh = array(
            'reg_time[>]' => $s_start,
            'reg_time[<]' => $s_end,
        );

        $o_count = $mod->table('t_user')
                ->where($wh)
                ->count();
        $this->view->assign('wpl_count', $o_count);

        //////////////// 上月 /////////////
        $s_start = mktime(0, 0, 0, date('m') - 1, 1, date('Y'));
        $s_end = mktime(23, 59, 59, date('m'), 0, date('Y'));

        // 订单数量
        $wh = array(
            'tread_time[>]' => $s_start,
            'tread_time[<]' => $s_end,
        );

        $o_count = $mod->table('order_card')
                ->where($wh)
                ->count();
        $this->view->assign('mo_count', $o_count);

        // 代理购卡
        $wh = array(
            'order_status' => 1,
            'order_type' => 1,
            'tread_time[>]' => $s_start,
            'tread_time[<]' => $s_end,
        );
        $ret = $mod->table('order_card')
                ->where($wh)
                ->select(' sum(card_no) as a_sell ')
                ->first();
        $this->view->assign('ma_sell', abs($ret['a_sell']));

        // 玩家充值
        $wh = array(
            'order_status' => 1,
            'order_type' => 3,
            'tread_time[>]' => $s_start,
            'tread_time[<]' => $s_end,
        );
        $ret = $mod->table('order_card')
                ->where($wh)
                ->select(' sum(card_no) as p_sell ')
                ->first();
        $this->view->assign('mp_sell', abs($ret['p_sell']));

        // 下线人数
        $wh = array(
            'regist_time[>]' => $s_start,
            'regist_time[<]' => $s_end,
        );

        $o_count = $mod->table('angent_info')
                ->where($wh)
                ->count();
        $this->view->assign('mf_count', $o_count);

        // 玩家数量
        $wh = array(
            'reg_time[>]' => $s_start,
            'reg_time[<]' => $s_end,
        );

        $o_count = $mod->table('t_user')
                ->where($wh)
                ->count();
        $this->view->assign('mpl_count', $o_count);

        ///////////////////////////////////////////////////

        $this->view->assign('msg', self::$session['umessage']);
        $this->view->assign('uname', self::$session['uname']);
        $this->view->display('Admin/Main/Index.html');
        return TRUE;
    }

    // Note
    public function ListNoteAction() {

        $p = isset($this->req['p']) ? (intval($this->req['p']) < 1) ? 1 : intval($this->req['p']) : 1;
        $search_data = isset($this->req['search_data']) ? trim($this->req['search_data']) : NULL;
        $per = 10;

        $mod = DbModel::Init();
        $ret_arr = $mod->table('angent_note')
                ->where(' 1 = 1 ')
                ->order(array('id' => 'DESC'))
                ->page($p, $per);

        $ret = $ret_arr['data'];
        $cont = $ret_arr['totle'];
        $page = new Page($cont, $per);
        $pages = $page->show();
        $this->view->assign('page', $pages);
        $this->view->assign('list', $ret);
        $this->view->display('Admin/Main/List_Note.html');
        return TRUE;
    }

    // AjaxShow
    public function SubNoteAction() {
        $nid = empty($this->req['nid']) ? 0 : intval($this->req['nid']);
        $mod = DbModel::Init();
        $ret = $mod->table('angent_note')
                ->where(array('id' => $nid))
                ->first();

        if (!empty($ret)) {
            if (!empty($ret['note_date'])) {
                $ret['note_date'] = date('Y-m-d H:i:s', $ret['note_date']);
            }

            if (!empty($ret['end_date'])) {
                $ret['end_date'] = ($ret['end_date'] - NOW < 0) ? 0 : round(($ret['end_date'] - NOW) / (3600 * 24));
            }
            self::OutMsg($ret);
            return TRUE;
        }
        self::OutMsg(array());
        return FALSE;
    }

    // 动态提交
    public function AjaxSubNoteAction() {
        $nid = empty($this->req['nid']) ? 0 : trim($this->req['nid']);
        $ntitle = empty($this->req['ntitle']) ? NULL : trim($this->req['ntitle']);
        $ncontent = empty($this->req['ncontent']) ? NULL : trim($this->req['ncontent']);
        $ntime = empty($this->req['ntime']) ? NULL : trim($this->req['ntime']);
        $nduration = empty($this->req['nduration']) ? 0 : intval($this->req['nduration']);
        $nstatus = empty($this->req['nstatus']) ? NULL : trim($this->req['nstatus']);

        if (empty($ntitle)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '标题不能为空'));
        }

        if (empty($ncontent)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '内容不能为空'));
        }

        $mod = DbModel::Init();
        $cont = $mod->table('angent_note')
                ->where('1 = 1')
                ->count();
        if ($cont >= 10) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '公告太多请删除'));
        }
        $ntime = empty($ntime) ? NOW : strtotime($ntime);
        //$ntime = NOW;
        if (empty($nid)) {
            $inarr = array(
                'op_id' => self::$session['uid'],
                'note_title' => $ntitle,
                'note_content' => $ncontent,
                'note_date' => $ntime,
                'end_date' => $ntime + $nduration * 3600 * 24,
                'is_show' => $nstatus,
            );

            $ret = $mod->table('angent_note')
                    ->insert($inarr);
        } else {
            $inarr = array(
                'op_id' => self::$session['uid'],
                'note_title' => $ntitle,
                'note_content' => $ncontent,
                'note_date' => $ntime,
                'end_date' => $ntime + $nduration * 3600 * 24,
                'is_show' => $nstatus,
            );
            $ret = $mod->table('angent_note')
                    ->where(array('id' => $nid))
                    ->update($inarr);
            $mod->table('angent_read')
                    ->where(array('note_id' => $nid))
                    ->delete();
        }
        if ($ret) {
            self::OutMsg(array('ecode' => 200, 'emsg' => '操作成功'));
        } else {
            self::OutMsg(array('ecode' => 400, 'emsg' => '未修改'));
        }
    }

    // 删除
    public function AjaxDelNoteAction() {
        $ids = empty($this->req['ids']) ? NULL : trim($this->req['ids']);
        $mod = DbModel::Init();
        $ret = $mod->table('angent_note')
                ->where('`id` in (' . $ids . ')')
                ->delete();
        $ret2 = $mod->table('angent_read')
                ->where('`note_id` in (' . $ids . ')')
                ->delete();
        if ($ret || $ret2) {
            self::OutMsg(array('ecode' => 200, 'emsg' => '删除成功'));
        } else {
            self::OutMsg(array('ecode' => 400, 'emsg' => '删除失败'));
        }
    }

    // ShowNote
    public function ShowNoteAction() {
        $nid = empty($this->req['nid']) ? 0 : intval($this->req['nid']);
        $mod = DbModel::Init();
        $ret = $mod->table('angent_note')
                ->where(array('id' => $nid))
                ->first();
    }

}
