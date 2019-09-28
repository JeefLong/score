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
            //   self::redirect('/Agent/Login/Index');
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
    public function IndexsAction() {
        $mod = DbModel::Init();
        echo '11111';
        die();
        ///////////////////////////////////////////////////      

        $this->view->assign('msg', self::$session['umessage']);
        $this->view->assign('uname', self::$session['uname']);
        // $this->view->display('Agent/Main/index.html');
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

}
