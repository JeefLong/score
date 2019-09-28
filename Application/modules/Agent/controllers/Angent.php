<?php

/**
 *  版权所有禁止转载,违者必究
 *     Citybay@163.com
 *    软著持有人:Citybay
 * */
use \Logic\BaseController;
use Comm\Page;
use \Yaf\Session;
use Comm\CodePic;
use Logs\ADLogController;

/**
 * Index controller
 */
Final class AngentController extends BaseController {

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
     * 代理列表
     * */
    public function ListAngentAction() {
        $mod = DbModel::Init();
        $p = isset($this->req['p']) ? (intval($this->req['p']) < 1) ? 1 : intval($this->req['p']) : 1;
        $status = isset($this->req['status']) ? trim($this->req['status']) : NULL;
        $search_data = isset($this->req['search_data']) ? trim($this->req['search_data']) : NULL;
        $per_page = 10;

        $sort = isset($this->req['card']) ? $this->req['card'] : NULL;
        // 默认顺序
        $xchg = 'ASC';
        // 反转
        if ($sort == 'ASC') {
            $xchg = 'DESC';
        }
        if ($sort == 'DESC') {
            $xchg = 'ASC';
        }
        //  确认排序
        if (!empty($sort)) {
            $order['card'] = $sort;
        }

        // 默认排序,优先级最低
        $order['id'] = 'DESC';

        $s_arr = array('ref_id' => self::$session['uid']);

        if ('' != $search_data) {
            if ($this->req['search_id'] == 2) {
                $s_arr['agent_name'] = $search_data;
            } else {
                $s_arr['id'] = $search_data;
            }
        } else {
            if (!is_null($status)) {
                $s_arr['agent_status'] = intval($status);
            }
        }
        $cont = $mod->table('angent_info')->get_count($s_arr);
        $ret = $mod->table('angent_info')->get_list('*', $s_arr, ($p - 1) * $per_page, $per_page, $order);
        $page = new Page($cont, $per_page);
        $pages = $page->show();
        $this->view->assign('sort', $xchg);
        $this->view->assign('status', $status);
        $this->view->assign('page', $pages);
        $this->view->assign('list', $ret);
        $this->view->display('Agent/Angent/list_angent.html');
        return TRUE;
    }

    /**
     * 获取一条数据 根据ID
     * */
    public function SubAngentAction() {
        $uid = isset($this->req['uid']) ? trim($this->req['uid']) : NULL;
        if (empty($uid)) {
            self::OutMsg(array());
        }
        $mod = DbModel::Init();
        $s_arr = array(
            'id' => $uid,
            'ref_id' => self::$session['uid'],
        );
        $ret = $mod->table('angent_info')->get_one('*', $s_arr);
        if ($ret['agent_status'] == '3') {
            self::OutMsg(array('ecode' => 400, 'emsg' => '该用户已被查封,请联系管理员!'));
            return FALSE;
        }
        if (empty($ret)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '没找到数据!'));
            return FALSE;
        }
        self::OutMsg($ret);
        return TRUE;
    }

    /**
     * 获取一条数据 根据名字
     * */
    public function SubAgtAction() {
        $agt_name = isset($this->req['agtname']) ? trim($this->req['agtname']) : NULL;
        if (empty($agt_name)) {
            self::OutMsg(array());
        }
        $mod = DbModel::Init();
        $s_arr = array(
            'agent_name' => $agt_name,
            'ref_id' => self::$session['uid'],
        );
        $ret = $mod->table('angent_info')->get_one('*', $s_arr);
        if ($ret['agent_status'] == '3') {
            self::OutMsg(array('ecode' => 400, 'emsg' => '该用户已被查封,请联系管理员!'));
            return FALSE;
        }
        if (empty($ret)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '没找到数据!'));
            return FALSE;
        }
        self::OutMsg($ret);
        return TRUE;
    }

    /**
     * 修改代理动作
     * */
    public function AjaxSubAngentAction() {
        $agt_id = isset($this->req['agt_id']) ? trim($this->req['agt_id']) : NULL;
        $agt_name = isset($this->req['agt_mobile']) ? trim($this->req['agt_name']) : NULL;
        $agt_pass = isset($this->req['agt_pass']) ? $this->req['agt_pass'] : NULL;
        $real_name = isset($this->req['real_name']) ? trim($this->req['real_name']) : NULL;
        $agt_mobile = isset($this->req['agt_mobile']) ? trim($this->req['agt_mobile']) : NULL;
        $ref_id = self::$session['uid'];
        $agt_gold = isset($this->req['agt_gold']) ? trim($this->req['agt_gold']) : 0;
        $off_rate = 0.00;
        $buy_rate = 1.00;
        $agt_status = isset($this->req['agt_status']) ? trim($this->req['agt_status']) : 0;

        $mod = DbModel::Init();

        $mod->start();

        if (empty($agt_id)) {

            if (empty($agt_name)) {
                self::OutMsg(array('ecode' => 400, 'emsg' => '登录名不能为空'));
            }

            if ($this->CheckAnget($agt_name)) {
                self::OutMsg(array('ecode' => 400, 'emsg' => '登录名已存在'));
            }

            if (empty($real_name)) {
                self::OutMsg(array('ecode' => 400, 'emsg' => '真实姓名不能为空'));
            }

            if (empty($agt_pass)) {
                self::OutMsg(array('ecode' => 400, 'emsg' => '密码不能为空'));
            }

            if (strlen($agt_pass) < 5) {
                self::OutMsg(array('ecode' => 400, 'emsg' => '密码不能少于6位'));
            }

            if (!empty($ref_id)) {
                $refer = $this->get_agt($ref_id);
                if (empty($refer['id'])) {
                    self::OutMsg(array('ecode' => 400, 'emsg' => '不存在的推荐人'));
                }
            }
            $in_arr = array(
                'agent_name' => $agt_name,
                'agent_pass' => md5(md5(trim($agt_pass))),
                'agent_mobile' => $agt_mobile,
                'real_name' => $real_name,
                'ref_id' => self::$session['uid'],
                'off_rate' => $off_rate,
                'buy_rate' => $buy_rate,
                'agent_status' => $agt_status,
                'regist_time' => NOW,
                'mod_time' => NOW,
            );
            $ret = $mod->table('angent_info')->add_data($in_arr);
            ADLogController::AgLog('添加代理数据', $in_arr, self::$session['uid']);
        } else {
            $retr = $mod->get_one('*', array('id' => $agt_id));

            if (empty($real_name)) {
                self::OutMsg(array('ecode' => 400, 'emsg' => '真实姓名不能为空'));
            }

            if (!empty($ref_id)) {
                $refer = $this->get_agt($ref_id);
                if (empty($refer['id'])) {
                    self::OutMsg(array('ecode' => 400, 'emsg' => '不存在的推荐人'));
                }
            }

            $in_arr = array(
                'agent_mobile' => $agt_mobile,
                'real_name' => $real_name,
                'agent_status' => $agt_status,
                'mod_time' => NOW,
            );

            if (!empty($agt_pass)) {
                if (strlen($agt_pass) < 5) {
                    self::OutMsg(array('ecode' => 400, 'emsg' => '密码至少6位'));
                }
                $in_arr['agent_pass'] = md5(md5(trim($agt_pass)));
            }
            $ret = $mod->table('angent_info')->up_data($in_arr, array('id' => $agt_id, 'ref_id' => self::$session['uid']));
            ADLogController::AgLog('更新前代理数据', $in_arr, self::$session['uid']);
        }
        if ($ret) {
            $mod->commit();
            self::OutMsg(array('ecode' => 200, 'emsg' => '更新成功'));
        } else {
            $mod->rollback();
            self::OutMsg(array('ecode' => 400, 'emsg' => '更新失败'));
        }
        return TRUE;
    }

    // 删除代理
    public function AjaxDelAngentAction() {
        $uids = empty($this->req['uids']) ? NULL : trim($this->req['uids']);
        $mod = DbModel::Init();
        $uid_arr = explode(',', $uids);
        $flag = 0;
        $mod->start();
        foreach ($uid_arr as $k => $v) {
            if ($this->get_nex($v)) {
                $mod->rollback();
                self::OutMsg(array('ecode' => 400, 'emsg' => 'ID: ' . $v . ' 存在下线,请联系管理员删除'));
            }

            $ret = $mod->table('angent_info')->get_one('*', array('id' => $v, 'ref_id' => self::$session['uid']));
            if (isset($ret['id'])) {
                unset($ret['id']);
            }

            $rst = $mod->table('angent_info_t')->add_data($ret);
            $rs = $mod->table('angent_info')->del_data(array('id' => $v, 'ref_id' => self::$session['uid']));
            if ($rst && $rs) {
                $flag = 1;
                ADLogController::AgLog('删除代理数据', $ret, self::$session['uid']);
            } else {
                $flag = 0;
                break;
            }
        }
        unset($k, $v);
        if ($flag && $rls) {
            $mod->commit();
            self::OutMsg(array('ecode' => 200, 'emsg' => '删除成功'));
        } else {
            $mod->rollback();
            self::OutMsg(array('ecode' => 400, 'emsg' => '删除失败'));
        }
        return 1;
    }

    // 添加代理
    public function AddAgentAction() {
        $url = DOM . '/Agent/Regist/Index?trf_id=' . self::$session['uid'];
        $this->view->assign('url', $url);
        $this->view->display('Agent/Angent/Add_Agent.html');
    }

    // 推广二维码
    public function GetImgAction() {
        $url = DOM . '/Agent/Regist/Index?trf_id=' . self::$session['uid'];
        CodePic::image($url);
    }

    // 检查代理名是否已存在
    private function CheckAnget($name) {
        $name = trim($name);
        $mod = DbModel::Init();
        $cont = $mod->table('angent_info')->get_count(array('agent_name' => $name));
        if ($cont > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    // 根据id获取代理信息
    private function get_agt($uid) {
        $mod = DbModel::load();
        $ret = $mod->table('angent_info')->get_one('id', array('id' => $uid));
        if (isset($ret['id'])) {
            return $ret;
        }
        return NULL;
    }

    // 查看该ID有么有下线
    private function get_nex($uid) {
        $mod = DbModel::Init();
        $ret = $mod->table('angent_info')->get_count(array('ref_id' => $uid));
        if ($ret > 0) {
            return TRUE;
        }
        return FALSE;
    }

}
