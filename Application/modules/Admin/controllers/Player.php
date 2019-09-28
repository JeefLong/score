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
Final class PlayerController extends BaseController {

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
        return TRUE;
    }

    /**
     * 用戶列表
     * */
    public function ListUserAction() {
        $msg = empty(self::$session['login_message']) ? null : trim(self::$session['login_message']);
        $this->view->assign('admsg', $msg);
        $this->view->display('Admin/Player/index.html');
        return TRUE;
    }

    // 玩家留言
    public function ListCommitAction() {
        $mod = DbModel::Init();
        $per_page = 10;
        $p = isset($this->req['p']) ? (intval($this->req['p']) < 1) ? 1 : intval($this->req['p']) : 1;

        $search_data = isset($this->req['search_angent']) ? trim($this->req['search_angent']) : null;
        if (!empty($search_data) && $search_data > 0) {
            $cont = $mod->table('player_submit')->get_count(array('player_id' => $search_data));
            $ret = $mod->table('player_submit')->get_list('*', array('player_id' => $search_data), ($p - 1) * $per_page, $per_page);
        } else {
            $cont = $mod->table('player_submit')->get_count('1 = 1');
            $ret = $mod->table('player_submit')->get_list('*', '1 = 1', ($p - 1) * $per_page, $per_page);
        }
        $page = new Page($cont, $per_page);
        $pages = $page->show();
        $this->view->assign('page', $pages);
        $this->view->assign('list', $ret);
        $this->view->display('Admin/Player/list_commit.html');
        return TRUE;
    }

    // 删除留言
    public function AjaxDelCommitAction() {
        $ids = empty($this->req['ids']) ? null : trim($this->req['ids']);
        $mod = DbModel::Init();
        $ret = $mod->table('player_submit')->del_data('`id` in (' . $ids . ')');
        if ($ret) {
            self::OutMsg(array('ecode' => 200, 'emsg' => '删除成功'));
        } else {
            self::OutMsg(array('ecode' => 400, 'emsg' => '删除失败'));
        }
    }

    //查看留言
    public function ShowCommitAction() {
        $cid = empty($this->req['cid']) ? null : trim($this->req['cid']);
        $mod = DbModel::Init();
        $ret = $mod->table('player_submit')->get_one('*', array('id' => $cid));
        $this->view->assign('list', $ret);
        $this->view->display('Admin/Player/show_commit.html');
        return TRUE;
    }

}
