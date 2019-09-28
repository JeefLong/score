<?php

/**
 *  版权所有禁止转载,违者必究
 *     Citybay@163.com
 *    软著持有人:Citybay
 * */
use \Yaf\Session;
use \Logic\BaseController;
use Comm\VeryfiyCode;
use Comm\Tool;
use Sms\CodeController;

Final class RegistController extends BaseController {

    // 公共输出
    use \OutSend\Out;

    public $req;
    private static $sess;
    private static $sess_id;

    //Init
    public function init() {
        self::$sess = Session::getInstance();
        self::$sess_id = session_id();
        $this->req = $this->getRequest()->getRequest();
        return 1;
    }

    //Main
    public function IndexAction() {
        $trf_id = isset($this->req['trf_id']) ? trim($this->req['trf_id']) : NULL;
        $view = $this->getView();
        $view->assign('trf_id', $trf_id);
        $view->display('Agent/Regist/Registx.html');
        return 1;
    }

    // 发送验证码
    public function SendAction() {
        $utel = isset($this->req['usertel']) ? trim($this->req['usertel']) : NULL;
        $code = rand(1000, 9999);
        CodeController::Send($utel, $code);
    }

    //生成验证码
    public function CodeAction() {
        $vcode = new VeryfiyCode();
        echo $vcode->Create();
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
    public function AjaxRegAction() {

        $user = isset($this->req['username']) ? trim($this->req['username']) : NULL;
        $mobile = isset($this->req['usertel']) ? trim($this->req['usertel']) : NULL;
        $trf_id = isset($this->req['trf_id']) ? trim($this->req['trf_id']) : 0;
        $password = isset($this->req['password']) ? trim($this->req['password']) : NULL;
        $re_password = isset($this->req['re_password']) ? trim($this->req['re_password']) : NULL;
        $nickname = isset($this->req['nickname']) ? trim($this->req['nickname']) : NULL;
        $telcode = isset($this->req['telcode']) ? trim($this->req['telcode']) : NULL;

        $guest_ip = Tool::getip();
        if (BAN && !$this->CheckIP()) {
            // IP次数限制
            self::OutMsg(array('ecode' => 440, 'emsg' => 'IP被查封'));
        }

        $mod = DbModel::Init();
        $r_count = $mod->table('angent_info')->get_count(array('agent_name' => $user));
        if ($r_count > 0) {
            self::OutMsg(array('ecode' => 404, 'emsg' => '代理已经存在'));
        }

        if (intval($trf_id) > 0) {
            $r_count = $mod->table('angent_info')->get_count(array('id' => $trf_id));
            if ($r_count < 1) {
                self::OutMsg(array('ecode' => 404, 'emsg' => '推荐人不存在'));
            }
        }

        if (strlen($password) < 5) {
            self::OutMsg(array('ecode' => 404, 'emsg' => '密码须大于6位'));
        }

//        if ($password != $re_password) {
//            self::OutMsg(array('ecode' => 404, 'emsg' => '两次密码不一致'));
//        }
        // 检查验证码
        if (!$this->CheckCode()) {
            //输入验证码错误
            self::OutMsg(array('ecode' => 400, 'msg' => '验证码错误'));
        }
        // 验证后要记得清除SESS
        $this->CleanCode();

        CodeController::CheckSMS($mobile, $telcode);

        $in_arr = array(
            'agent_name' => $user,
            'agent_pass' => md5(md5(trim($password))),
            'agent_mobile' => $mobile,
            'real_name' => $nickname,
            'ref_id' => $trf_id,
            'card' => 0,
            'gold' => 0,
            'off_rate' => 0.00,
            'buy_rate' => 1.00,
            'agent_status' => 0,
            'regist_time' => NOW,
        );

        $ret = $mod->table('angent_info')->add_data($in_arr);
        $lret = $mod->table('angent_log')->add_data(array('login_name' => trim($user), 'login_time' => NOW, 'login_ip' => $guest_ip, 'login_msg' => '注册成功', 'login_ok' => 2));

        if ($ret && $lret) {
            self::OutMsg(array('ecode' => 200, 'url' => '/Agent/Login/Index'));
        }
        return 1;
    }

    // 验证验证码
    private function CheckCode() {
        if (!CODE) {
            return TRUE;
        }
        $code = isset($this->req['yzm']) ? $this->req['yzm'] : NULL;
        $vcode = new VeryfiyCode();
        if ($vcode->Check($code)) {
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

    // IP防黑检查
    private function CheckIP() {
        $guest_ip = Tool::getip();
        $mod = DbModel::Init();
        $cont = $mod->table('angent_log')->get_count(array('login_ip' => $guest_ip, 'login_time[>]' => strtotime(date('Y-M-d') . ' 00:00:00'), 'login_ok' => 2));
        if ($cont > CONT) {
            return FALSE;
        }
        return TRUE;
    }

}
