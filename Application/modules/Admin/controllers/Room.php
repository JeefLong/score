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
Final class RoomController extends BaseController {

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

    // 玩家留言
    public function ListRoomAction() {
        $mod = DbModel::Init();
        $per_page = 10;
        $p = isset($this->req['p']) ? (intval($this->req['p']) < 1) ? 1 : intval($this->req['p']) : 1;

        $search_data = isset($this->req['search_data']) ? trim($this->req['search_data']) : null;
        if (!empty($search_data) && $search_data > 0) {
            $cont = $mod->table('t_rooms')->get_count(array('id' => $search_data));
            $ret = $mod->table('t_rooms')->get_list('*', array('id' => $search_data), ($p - 1) * $per_page, $per_page, array('create_time' => 'DESC'));
        } else {
            $cont = $mod->table('t_rooms')->get_count('1 = 1');
            $ret = $mod->table('t_rooms')->get_list('*', '1 = 1', ($p - 1) * $per_page, $per_page, array('create_time' => 'DESC'));
        }

        $ret = $this->setType($ret);

        $page = new Page($cont, $per_page);
        $pages = $page->show();
        $this->view->assign('page', $pages);
        $this->view->assign('list', $ret);
        $this->view->display('Admin/Room/list_room.html');
        return TRUE;
    }

    // 删除
    public function AjaxDelRoomAction() {
        $ids = empty($this->req['ids']) ? null : trim($this->req['ids']);
        $mod = DbModel::Init();

        $mod->table('t_users')->up_data('`roomid` = null', '`roomid` in (' . $ids . ') ');
        $ret = $mod->table('t_rooms')->del_data('`id` in (' . $ids . ')');
        if ($ret) {
            self::OutMsg(array('ecode' => 200, 'emsg' => '删除成功'));
        } else {
            self::OutMsg(array('ecode' => 400, 'emsg' => '删除失败'));
        }
    }

    //设置房间类型
    private function setType($ret) {
        foreach ($ret as $k => $v) {
            if (!isset($v['base_info'])) {
                continue;
            }
            $vr = json_decode($v['base_info'], TRUE);
            $ret[$k]['type'] = $vr['type'];
        }
        unset($k, $v);
        return $ret;
    }

}
