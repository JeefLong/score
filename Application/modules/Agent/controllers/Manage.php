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
Final class ManageController extends BaseController {

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
     * 首页
     */
    public function IndexAction() {
        return TRUE;
    }

    /**
     * 标题处修改
     */
    public function ModAgentAction() {
        //$uid = empty($this->req['uid']) ? NULL : trim($this->req['uid']);
        $uid = self::$session['uid'];
        $mod = DbModel::Init();
        $ret = $mod->table('angent_info')->get_one('*', array('id' => $uid));
        $this->view->assign('list', $ret);
        $this->view->display('Agent/Angent/Mod_Agent.html');
        return TRUE;
    }

    // 修改与添加
    public function AjaxSubAgentAction() {
        $agt_id = isset($this->req['agt_id']) ? trim($this->req['agt_id']) : NULL;
        $agt_name = isset($this->req['agt_name']) ? trim($this->req['agt_name']) : NULL;
        $agt_pass = isset($this->req['agt_pass']) ? trim($this->req['agt_pass']) : NULL;
        $agt_rname = isset($this->req['agt_rname']) ? trim($this->req['agt_rname']) : NULL;

        if (empty($agt_pass)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '没有信息被修改'));
        }

        $mod = DbModel::Init();

        $ret = $mod->table('angent_info')->get_one('`id`', array('agent_name' => $agt_name, 'ref_id' => self::$session['uid']));
        if (empty($ret['id']) && $agt_id != self::$session['uid']) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '修改失败'));
        }

        $up_arr = array(
            'agent_pass' => md5(md5($agt_pass)),
        );
        $ret = $mod->table('angent_info')->up_data($up_arr, array('id' => $agt_id));
        if ($ret) {
            self::OutMsg(array('ecode' => 200, 'emsg' => '修改成功'));
        } else {
            self::OutMsg(array('ecode' => 400, 'emsg' => '修改失败'));
        }
    }

}
