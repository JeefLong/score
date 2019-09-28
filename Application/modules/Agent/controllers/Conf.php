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
Final class ConfController extends BaseController {

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
     * 配置列表
     * */
    public function ListConfAction() {
        $mod = DbModel::Init();
        $p = isset($this->req['p']) ? (intval($this->req['p']) < 1) ? 1 : intval($this->req['p']) : 1;
        $per_page = 10;
        $cont = $mod->table('sys_config')->get_count('1 = 1');
        $ret = $mod->table('sys_config')->get_list('*', '1 = 1', ($p - 1) * $per_page, $per_page, array('id' => 'DESC'));
        $page = new Page($cont, $per_page);
        $pages = $page->show();
        $this->view->assign('page', $pages);
        $this->view->assign('list', $ret);
        $this->view->display('Admin/Conf/List_Conf.html');

        return TRUE;
    }

    //参数
    public function SubConfAction() {
        $c_id = isset($this->req['nid']) ? trim($this->req['nid']) : NULL;
        $mod = DbModel::Init();
        $ret = $mod->table('sys_config')->get_one('*', array('id' => $c_id), array('id' => 'DESC'));
        if (empty($ret)) {
            self::OutMsg(array());
        }
        self::OutMsg($ret);
    }

    //修改动作
    public function AjaxSubConfAction() {

        $c_id = empty($this->req['c_id']) ? NULL : trim($this->req['c_id']);
        $c_key = empty($this->req['c_key']) ? NULL : trim($this->req['c_key']);
        $c_name = empty($this->req['c_name']) ? NULL : trim($this->req['c_name']);
        $c_content = empty($this->req['c_content']) ? NULL : trim($this->req['c_content']);

        $mod = DbModel::Init();
        if (empty($c_id)) {
            $inarr = array(
                'conf_name' => $c_name,
                'conf_key' => $c_key,
                'conf_val' => $c_content,
            );
            $ret = $mod->table('sys_config')->add_data($inarr);
        } else {
            $inarr = array(
                'conf_name' => $c_name,
                'conf_key' => $c_key,
                'conf_val' => $c_content,
            );
            $ret = $mod->table('sys_config')->up_data($inarr, array('id' => $c_id));
        }

        if ($ret) {
            self::OutMsg(array('ecode' => 200, 'emsg' => '操作成功'));
        } else {
            self::OutMsg(array('ecode' => 400, 'emsg' => '操作失败'));
        }
    }

    //删除
    public function AjaxDelConfAction() {
        $ids = empty($this->req['ids']) ? NULL : trim($this->req['ids']);
        $mod = DbModel::Init();
        $ret = $mod->table('sys_config')->del_data('`id` in (' . $ids . ')');
        if ($ret) {
            self::OutMsg(array('ecode' => 200, 'emsg' => '删除成功'));
        } else {
            self::OutMsg(array('ecode' => 400, 'emsg' => '删除失败'));
        }
    }

}
