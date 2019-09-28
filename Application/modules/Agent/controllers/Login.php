<?php

/**
 *  版权所有禁止转载,违者必究
 *     Citybay@163.com
 *    软著持有人:Citybay
 * */
use \Yaf\Session;
use Logic\BaseController;
use Comm\VeryfiyCode;
use Comm\Tool;
use DB\RedisDBModel;
use Logs\LoginLogController;
use Logs\BanController;

Final class LoginController extends BaseController {

    // 公共输出
    use \OutSend\Out;

    public $req;
    private static $sess;
    private static $sess_id;
    private static $se_flag;

    //Init
    public function init() {
        self::$sess = Session::getInstance();
        self::$sess_id = session_id();
        $this->req = $this->getRequest()->getRequest();
        self::$se_flag = FALSE;
        if (ini_get('session.save_handler') == 'redis') {
            RedisDBModel::start();
            self::$se_flag = TRUE;
        }
        return TRUE;
    }

    //Main
    public function IndexAction() {
        if (self::$sess->__isset('_agent_user')) {
            self::redirect('/Agent/Main/Index');
        }
        $view = $this->getView();
        $uname = isset($_COOKIE['Uname']) ? $_COOKIE['Uname'] : NULL;
        $view->assign('Uname', $uname);
        $view->display('Agent/Login/Login.html');
        return 1;
    }

    //Mobile Login
    public function MainAction() {
        if (self::$sess->__isset('_agent_user')) {
            self::redirect('/Agent/Main/Index');
        }
        $view = $this->getView();
        $uname = isset($_COOKIE['Uname']) ? $_COOKIE['Uname'] : NULL;
        $view->assign('Uname', $uname);
        $view->display('Agent/Login/Loginm.html');
        return 1;
    }

    //生成验证码
    public function CodeAction() {
        $vcode = new VeryfiyCode();
        echo $vcode->create();
        return 1;
    }

    //验证码动态验证
    public function AjaxCheckAction() {
        if ($this->CheckCode()) {
            self::OutMsg(array('ecode' => 200, 'msg' => 'OK'));
        } else {
            self::OutMsg(array('ecode' => 400, 'msg' => 'NO'));
        }
        return 1;
    }

    // 登录验证
    public function AjaxLoginAction() {
        // 检查验证码
        if (!$this->CheckCode()) {
            //输入验证码错误
            self::OutMsg(array('ecode' => 400, 'msg' => '验证码错误'));
        }
        // 验证后要记得清除SESS
        $this->CleanCode();
        $user = isset($this->req['username']) ? trim($this->req['username']) : NULL;
        $pass = isset($this->req['password']) ? trim($this->req['password']) : NULL;
        $guest_ip = Tool::getip();
        // 检查用户名和密码
        $mod = DbModel::Init();
        $ret = $mod->table('students')
                ->where(array('mobile' => $user))
                ->where(array('password' => base64_encode($pass)))
                ->first();
        if (BAN && !BanController::Check('students', CONT)) {
            // IP次数限制
            self::OutMsg(array('ecode' => 440, 'emsg' => 'IP被查封'));
            LoginLogController::AddLog('students', 0, 'IP被查封', -2);
        }
        if (empty($ret['id'])) {
            LoginLogController::AddLog('students', 0, '用户名或密码错误', -1);
            self::OutMsg(array('ecode' => 404, 'emsg' => '用户名或密码错误'));
        } elseif ($ret['status'] == 0) {
            // 没审核的账号
            LoginLogController::AddLog('students', $ret['id'], '账号未审核', 0);
            self::OutMsg(array('ecode' => 401, 'emsg' => '账号未审核'));
        } elseif ($ret['status'] == 2) {
            // 普通锁定
            LoginLogController::AddLog('students', $ret['id'], '账号已锁定', 2);
            self::OutMsg(array('ecode' => 402, 'emsg' => '账号已被暂停,请联系客服'));
        } elseif ($ret['status'] == 3) {
            // 管理员锁定
            LoginLogController::AddLog('students', $ret['id'], '帐号已禁用', 3);
            self::OutMsg(array('ecode' => 403, 'emsg' => '已查封的账号,请联系管理员'));
        } elseif ($ret['status'] == 1) {
            self::$sess->__set('_agent_user', array(
                'uid' => $ret['id'],
                'uname' => $ret['real_name'],
                'passcount' => 0,
                'umessage' => $ret['login_msg'],
                'roleid' => $ret['role_id']
                    )
            );
            if (self::$se_flag) {
                RedisDBModel::$_RDS->del('PHPREDIS_SESSION:' . $ret['login_session']);
            }
            $mod->table('students_info')->where('id = ' . $ret['id'])
                    ->update(array('login_session' => self::$sess_id, 'last_ip' => Tool::getip()));
            setcookie('Uname', $user, time() + 2 * 7 * 24 * 3600);
            LoginLogController::AddLog('students', $ret['id'], '登录成功', 1);
            self::OutMsg(array('ecode' => 200, 'url' => '/Agent/Main/Index'));
        } else {
            // 未知错误
            LoginLogController::AddLog('students', $ret['id'], '未知的错误', -1);
            self::OutMsg(array('ecode' => 403, 'emsg' => '未知错误,请联系管理员'));
        }
        return 1;
    }

    //Logout
    public function LogOutAction() {
        if (self::$sess->__isset('_agent_user')) {
            self::$sess->del('_agent_user');
        }
        self::redirect('/Agent/Login/Index');
        return 1;
    }

    //Checklogin
    public function CheckLoginAction() {
        if (self::$sess->__isset('_agent_user')) {
            $usess = self::$sess->__get('_agent_user');
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
