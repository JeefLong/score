<?php

/**
 *  版权所有禁止转载,违者必究
 *     Citybay@163.com
 *    软著持有人:Citybay
 * */
use Logic\BaseController;
use Logs\LoginLogController;
use Logs\BanController;
use Comm\VeryfiyCode;
use \Yaf\Session;
use Comm\SSLAuth;

Final class LoginController extends BaseController {

// 公共输出
    use \OutSend\Out;

    private $req;
    private $param;
    private static $sess;

//Init
    public function init() {
        self::$sess = Session::getInstance();
        $this->req = $this->getRequest()->getRequest();
        $this->param = $this->getRequest()->getParams();
        return 1;
    }

//Main
    public function IndexAction() {
        if (self::$sess->__isset('_admin_user')) {
// Tool::redirect('/Admin/Main/Index');
            self::redirect('/Admin/Main/Index');
//也可以发送带数据的跳转
//$this->forward('Module','Ctroller','Action',array('k'=>$v)); 
//在那边用 $this->getRequest()->getParam(); 来获取
        }
        $view = $this->getView();
        $uname = isset($_COOKIE['Uname']) ? $_COOKIE['Uname'] : NULL;
        $view->assign('Uname', $uname);
        $view->display('Admin/Login/Login.html');
        return 1;
    }

//生成验证码
    public function CodeAction() {
        $vcode = new VeryfiyCode();
        echo $vcode->create();
        return 1;
    }

//验证码动态验证
    public function AjaxcheckAction() {
        if ($this->CheckCode()) {
            self::OutMsg(array('code' => 200, 'msg' => 'OK'));
        } else {
            self::OutMsg(array('code' => 400, 'msg' => 'NO'));
        }
        return 1;
    }

// 登录验证
    public function AjaxLoginAction() {
// 检查验证码
        if (!$this->CheckCode()) {
//输入验证码错误
            self::OutMsg(array('code' => 400, 'msg' => 'N2B'));
        }
// 验证成功后要记得清除
        $this->CleanCode();
        $user = isset($this->req['username']) ? $this->req['username'] : NULL;
        $pass = isset($this->req['password']) ? $this->req['password'] : NULL;

// 检查用户名和密码
        $mod = DbModel::Init();
        $ret = $mod->table('admin_user')
                ->where(array('username' => trim($user), 'password' => md5(md5(trim($pass)))))
                ->first();

        if (BAN && !BanController::Check('admin', CONT, -1)) {
// IP次数限制
            LoginLogController::AddLog('admin', 0, 'IP被查封', -2);
            self::OutMsg(array('ecode' => 440, 'emsg' => 'IP被查封'));
        }

        if (empty($ret)) {
// 用户名或密码错误
            LoginLogController::AddLog('admin', 0, '用户名或密码错误', -1);
            self::OutMsg(array('code' => -2, 'msg' => 'NSB'));
        } elseif ($ret['lock_date'] > NOW) {
// 锁定时间

            LoginLogController::AddLog('admin', $ret['id'], '账号已锁定', 2);
            self::OutMsg(array('code' => -3, 'msg' => 'SBM'));
        } elseif ($ret['status'] != 1) {
// 被禁用
            LoginLogController::AddLog('admin', $ret['id'], '帐号已禁用', 3);
            self::OutMsg(array('code' => -1, 'msg' => 'DSB'));
        } else {
// Token Encode
            setcookie('Uname', $ret['username'], time() + 7 * 24 * 3600);
            $usr_arr = array(
                'uid' => $ret['id'],
                'uname' => $ret['username'],
                'roleid' => $ret['roleid'],
                'umessage' => $ret['login_message'],
                'upass' => $pass
            );
            self::$sess->__set('_admin_user', $usr_arr);
            $token = SSLAuth::pub_encrypt(json_encode($usr_arr));
            header('Authorization: ' . $token);
            LoginLogController::AddLog('admin', $ret['id'], '登录成功', 1);
            self::OutMsg(array('code' => 200, 'url' => '/Admin/Main/Index'));
        }
        return 1;
    }

//Logout
    public function LogOutAction() {
        if (self::$sess->__isset('_admin_user')) {
            self::$sess->del('_admin_user');
        }
        self::redirect('/Admin/Login/Index');
        return 1;
    }

//Checklogin
    public function CheckLoginAction() {
        if (self::$sess->__isset('_admin_user')) {
            $usess = self::$sess->__get('_admin_user');
            if ($usess['uid'] > 0) {
                self::OutMsg(array('ecode' => 200, 'emsg' => '登录正确'));
            }
        }
        self::OutMsg(array('ecode' => 400, 'emsg' => '登录失败'));
    }

// 验证验证码
    private function CheckCode() {
        if (!CODE) {
            return TRUE;
        }
        $code = isset($this->req['yzm']) ? $this->req['yzm'] : NULL;
        $vcode = new VeryfiyCode();
        if ($vcode->check($code)) {
            return TRUE;
        }
        return FALSE;
    }

// 清空验证码
    private function CleanCode() {
        $vcode = new VeryfiyCode();
        $vcode->clear();
        return 1;
    }

}
