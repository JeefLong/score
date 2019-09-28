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
Final class ClubController extends BaseController {

    // 公共输出
    use \OutSend\Out;

    private $req;          // 请求信息
    private $view;         // 渲染器
    private static $session;

    // 非法登录信息的拦截
    public function init() {
        $sess = Session::getInstance();
        $sess->start();
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
     * 拦截Index
     * */
    public function IndexAction() {
        return TRUE;
    }

    // 俱乐部
    public function ListClubAction() {
        $mod = DbModel::Init();
        $user = $mod->table('angent_info')->get_one('`id`,`club_id`', '`id` = ' . self::$session['uid']);
        $per_page = 10;
        $p = isset($this->req['p']) ? (intval($this->req['p']) < 1) ? 1 : intval($this->req['p']) : 1;

        $get_arr = array('club_id' => $user['club_id']);
        $cont = $mod->table('t_clubs')->get_count($get_arr);
        $ret = $mod->table('t_clubs')->get_list('*', $get_arr, ($p - 1) * $per_page, $per_page, array('create_time' => 'DESC'));

        $page = new Page($cont, $per_page);
        $pages = $page->show();
        $this->view->assign('page', $pages);
        $this->view->assign('list', $ret);
        $this->view->display('Agent/Club/List_Club.html');
        return TRUE;
    }

    // 获取一个
    public function SubClubAction() {
        $cid = isset($this->req['id']) ? trim($this->req['id']) : NULL;
        $mod = DbModel::Init();
        $ret = $mod->table('t_clubs')->get_one('*', array('id' => $cid), array('id' => 'DESC'));
        if (empty($ret)) {
            self::OutMsg(array());
        }
        self::OutMsg($ret);
    }

    //更新与添加动作
    public function AjaxSubClubAction() {
        $id = empty($this->req['id']) ? NULL : trim($this->req['id']);
        $cl_id = empty($this->req['cl_id']) ? NULL : trim($this->req['cl_id']);
        $cl_name = empty($this->req['cl_name']) ? NULL : trim($this->req['cl_name']);
        $cl_status = empty($this->req['cl_status']) ? NULL : trim($this->req['cl_status']);

        if (empty($cl_id)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '俱乐部ID不能为空'));
        }
        if (empty($cl_name)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '俱乐部名称不能为空'));
        }
        $in_arr = array(
            'club_id' => $cl_id,
            'club_name' => $cl_name,
            'create_time' => NOW,
            'status' => 1,
            'club_desc' => 'Agent ID : ' . self::$session['uid'],
        );
        $mod = DbModel::Init();
        $dret = 0;
        $iret = 0;
        if ($id > 0) {
            unset($in_arr['club_id']);
            unset($in_arr['status']);
            $dret = $mod->table('t_clubs')->up_data($in_arr, array('id' => $id));
            $iret = 1;
        } else {
            $this->CheckAgent();
            $mod->start();
            $dret = $mod->table('t_clubs')->add_data($in_arr);
            $iret = $mod->table('angent_info')->up_data(array('club_id' => $cl_id), array('id' => self::$session['uid']));
        }

        if ($dret && $iret) {
            $mod->commit();
            self::OutMsg(array('ecode' => 200, 'emsg' => '操作成功'));
        } else {
            $mod->rollback();
            self::OutMsg(array('ecode' => 400, 'emsg' => '操作失败'));
        }
        return TRUE;
    }

    // 删除
    public function AjaxDelClubAction() {
        $ids = empty($this->req['ids']) ? NULL : trim($this->req['ids']);
        $id_arr = explode(',', $ids);
        $mod = DbModel::Init();
        $mod->start();
        $flag = TRUE;

        foreach ($id_arr as $k => $v) {
            $ret = $mod->table('t_clubs')->get_one('club_id', '`id` = ' . $v);
            $aret = $mod->table('angent_info')->up_data(array('club_id' => 0), array('club_id' => $ret['club_id']));
            $uret = $mod->table('t_users')->up_data(array('club_id' => 0), array('club_id' => $ret['club_id']));
            $cret = $mod->table('t_clubs')->del_data('`id` = ' . $v);
            if (!$aret && !$cret && !$uret) {
                $flag = false;
            }
        }
        unset($k, $v);
        if ($flag) {
            $mod->commit();
        } else {
            $mod->rollback();
        }
        if ($flag) {
            self::OutMsg(array('ecode' => 200, 'emsg' => '删除成功'));
        } else {
            self::OutMsg(array('ecode' => 400, 'emsg' => '删除失败'));
        }
    }

    // 判断
    private function CheckAgent() {
        $mod = DbModel::Init();
        $ret = $mod->table('angent_info')->get_one('*', array('id' => self::$session['uid']));
        if ($ret['club_id'] > 0) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '俱乐部已存在'));
        }
    }

}
