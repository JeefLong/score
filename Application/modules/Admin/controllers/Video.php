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
Final class VideoController extends BaseController {

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
     * 视频列表
     * */
    public function ListVideoAction() {
        $mod = DbModel::Init();
        $per = 10;
        $p = isset($this->req['p']) ? (intval($this->req['p']) < 1) ? 1 : intval($this->req['p']) : 1;
        $search_data = isset($this->req['search_data']) ? trim($this->req['search_data']) : null;
        $query = $mod->table('t_video')
                ->where(' 1 = 1 ');
        if (!empty($search_data) && $search_data > 0) {
            $wh = array('v_name[like]' => '%' . $search_data . '%');
            $query->where($wh);
        }
        $ret = $query->order('id desc')
                ->page($p, $per);
        $page = new Page($ret['totle'], $per);
        $pages = $page->show();
        $this->view->assign('page', $pages);
        $this->view->assign('list', $ret['data']);
        $this->view->display('Admin/Video/List_Video.html');
        return TRUE;
    }

    // 获取一个
    public function SubVideoAction() {
        $vid = empty($this->req['v_id']) ? 0 : intval($this->req['v_id']);
        $mod = DbModel::Init();
        $ret = $mod->table('t_video')
                ->where('id = ' . $vid)
                ->first();
        self::OutMsg($ret);
    }

    // 添加或者编辑
    public function AjaxSubVideoAction() {
        $v_id = isset($this->req['v_id']) ? intval($this->req['v_id']) : null;
        $v_type = empty($this->req['v_type']) ? null : trim($this->req['v_type']);
        $v_name = empty($this->req['v_name']) ? null : trim($this->req['v_name']);
        $v_img = empty($this->req['v_img']) ? null : trim($this->req['v_img']);
        $v_text = empty($this->req['v_text']) ? null : trim($this->req['v_text']);
        $v_url = empty($this->req['v_url']) ? null : trim($this->req['v_url']);
        if (empty($v_url) || empty($v_img)) {
            self::OutMsg(array('emsg' => '视频信息不全', 'ecode' => 'Error 410'));
        }
        $mod = DbModel::Init();
        if (empty($v_id)) {
            $arr = array(
                'v_type' => $v_type,
                'v_name' => $v_name,
                'v_img' => $v_img,
                'v_text' => $v_text,
                'v_url' => $v_url,
                'v_add_time' => NOW,
            );
            $ret = $mod->table('t_video')
                    ->insert($arr);
        } else {
            $arr = array(
                'v_type' => $v_type,
                'v_name' => $v_name,
                'v_img' => $v_img,
                'v_text' => $v_text,
                'v_url' => $v_url,
                'v_add_time' => NOW,
            );
            $ret = $mod->trace()
                    ->table('t_video')
                    ->where('id = ' . $v_id)
                    ->update($arr);
        }
        if ($ret) {
            self::OutMsg(array('ecode' => 200, 'emsg' => '操作成功'));
        } else {
            self::OutMsg(array('ecode' => 400, 'emsg' => '操作失败'));
        }
    }

    // 删除一个或一些
    public function AjaxDelVideoAction() {
        $ids = empty($this->req['ids']) ? null : trim($this->req['ids']);
        $mod = DbModel::Init();
        $ret = $mod->table('t_video')
                ->where('`id` in (' . $ids . ')')
                ->delete();
        if ($ret) {
            self::OutMsg(array('ecode' => 200, 'emsg' => '删除成功'));
        } else {
            self::OutMsg(array('ecode' => 400, 'emsg' => '删除失败'));
        }
    }

}
