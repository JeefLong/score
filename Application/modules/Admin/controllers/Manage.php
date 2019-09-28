<?php

/**
 *  版权所有禁止转载,违者必究
 *     Citybay@163.com
 *    软著持有人:Citybay
 * */
use \Logic\BaseController;
use Comm\Page;
use \Yaf\Session;
use Logs\ADLogController;

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
     */
    public function IndexAction() {
        return TRUE;
    }

    /**
     * 标题处修改管理员
     */
    public function ModAdminAction() {
        $uid = empty($this->req['uid']) ? NULL : trim($this->req['uid']);
        if (self::$session['roleid'] > $this->GetRoleID($uid)) {
            echo '<script>alert(\'禁止越权操作！违规行为已写入日志！\');history.go(-1);</script>';
            return FALSE;
        }
        $mod = DbModel::Init();
        $ret = $mod->table('admin_user')->get_one('*', array('id' => $uid));
        $this->view->assign('list', $ret);
        $this->view->display('Admin/Manage/mod_admin.html');
        return TRUE;
    }

    /**
     * 管理员集合
     */
    public function ListManageAction() {
        $mod = DbModel::Init();
        $perpage = 10;
        $p = isset($this->req['p']) ? (intval($this->req['p']) < 1) ? 1 : intval($this->req['p']) : 1;
        $search_data = isset($this->req['search_angent']) ? trim($this->req['search_angent']) : NULL;
        if (!empty($search_data)) {
            $cont = $mod->table('admin_user')->get_count(array('roleid[>=]' => self::$session['roleid'], 'username' => $search_data));
            $ret = $mod->table('admin_user')->get_list('*', array('roleid[>=]' => self::$session['roleid'], 'username' => $search_data), ($p - 1) * $perpage, $perpage);
        } else {
            $cont = $mod->table('admin_user')->get_count(array('roleid[>=]' => self::$session['roleid']));
            $ret = $mod->table('admin_user')->get_list('*', array('roleid[>=]' => self::$session['roleid']), ($p - 1) * $perpage, $perpage);
        }

        $this->set_status($ret);
        $page = new Page($cont, $perpage);
        $pg = $page->show();
        $this->view->assign('page', $pg);
        $this->view->assign('list', $ret);
        $this->view->display('Admin/Manage/list_manage.html');
        return TRUE;
    }

    /**
     * 编辑时获取信息
     */
    public function SubManageAction() {
        $uid = empty($this->req['id']) ? NULL : trim($this->req['id']);
        if ($uid == 'FF') {
            self::OutMsg(array(NULL));
        }

        if (self::$session['roleid'] > $this->GetRoleID($uid)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '禁止越权操作'));
        }
        $mod = DbModel::Init();
        $ret = $mod->table('admin_user')->get_one('*', array('id' => $uid));
        if (empty($ret)) {
            self::OutMsg(array(NULL));
            return FALSE;
        }
        $ret['reg_time'] = date('Y-m-d H:i:s', $ret['reg_time']);
        $ret['lock_date'] = date('Y-m-d H:i:s', $ret['lock_date']);
        self::OutMsg($ret);
        return TRUE;
    }

// 修改与添加
    public function AjaxSubManageAction() {
        $u_id = isset($this->req['id']) ? trim($this->req['id']) : NULL;
        $u_name = isset($this->req['ad_name']) ? trim($this->req['ad_name']) : NULL;
        $u_pass = isset($this->req['ad_pass']) ? trim($this->req['ad_pass']) : NULL;
        $u_roleid = isset($this->req['ad_role']) ? trim($this->req['ad_role']) : NULL;
        $u_status = isset($this->req['ad_status']) ? trim($this->req['ad_status']) : NULL;
        $u_lock = isset($this->req['ad_lock']) ? trim($this->req['ad_lock']) : NULL;
        $u_message = isset($this->req['ad_message']) ? trim($this->req['ad_message']) : NULL;

        // 无名,无ID
        if (empty($u_id) && empty($u_name)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '数据内容非法'));
        }

        $mod = DbModel::Init();

        //修改
        if (!empty($u_id)) {
            //预获取
            $pre_data = $mod->table('admin_user')->get_one('*', array('id' => $u_id));

            if (!is_numeric($u_roleid) || $u_roleid < 0) {
                self::OutMsg(array('ecode' => 400, 'emsg' => '角色ID不正确'));
            }
            if (self::$session['roleid'] > $u_roleid) {
                self::OutMsg(array('ecode' => 400, 'emsg' => '角色ID超越当前权限'));
            }
            $data = array(
                'roleid' => $u_roleid,
                'status' => $u_status,
                'lock_date' => strtotime($u_lock),
                'reg_time' => time(),
                'login_message' => $u_message
            );
            // 密码
            if (!empty($u_pass)) {
                if (strlen($u_pass) < 5) {
                    self::OutMsg(array('ecode' => 400, 'emsg' => '密码至少6位'));
                }
                $data['password'] = md5(md5(trim($u_pass)));
            }
            // 修改
            $ret = $mod->table('admin_user')->up_data($data, array('id' => $u_id));

            // 添加日志
            if ($ret) {
                ADLogController::AdLog('提交前管理员信息', $pre_data, self::$session['uid']);
            }
        }
        //添加
        elseif (!empty($u_name) && empty($u_id)) {
            //密码不足
            if (strlen($u_pass) < 5) {
                self::OutMsg(array('ecode' => 400, 'emsg' => '密码至少6位！'));
            }
            // 检查重名
            if ($this->CheckName($u_name) > 0) {
                self::OutMsg(array('ecode' => 400, 'emsg' => '用户名已存在'));
            }
            // ID错误
            if (!is_numeric($u_roleid) || $u_roleid < 0) {
                self::OutMsg(array('ecode' => 400, 'emsg' => '角色ID不正确'));
            }
            // 禁止越权
            if (self::$session['roleid'] > $u_roleid) {
                self::OutMsg(array('ecode' => 400, 'emsg' => '角色ID超越当前权限'));
            }
            $data = array(
                'username' => $u_name,
                'password' => md5(md5(trim($u_pass))),
                'roleid' => $u_roleid,
                'status' => $u_status,
                'lock_date' => strtotime($u_lock),
                'reg_time' => time(),
                'login_message' => $u_message
            );
            $ret = $mod->table('admin_user')->add_data($data);
            if ($ret) {
                ADLogController::AdLog('添加管理员信息', $data, self::$session['uid']);
            }
        }
        if ($ret) {
            self::OutMsg(array('ecode' => 200, 'emsg' => '操作成功'));
        }
        self::OutMsg(array('ecode' => 400, 'emsg' => '操作失败'));
        return TRUE;
    }

// 动态删除
    public function AjaxDelManageAction() {
        $uids = empty($this->req['uids']) ? NULL : trim($this->req['uids']);
        $mod = DbModel::Init();
        $uid_arr = explode(',', $uids);
        $flag = 0;
        $flagc = 0;
        $mod->start();
        foreach ($uid_arr as $k => $v) {
            $rid = $this->GetRoleID($v);
            if ($rid['roleid'] < self::$session['roleid']) {
                $flagc = 100;
                continue;
            } else {
                $ret = $mod->table('admin_user')->get_one('*', array('id' => $v));
                if (isset($ret['id'])) {
                    unset($ret['id']);
                }
                $rs = $mod->table('admin_user_t')->add_data($ret);
                $rss = $mod->table('admin_user')->del_data(array('id' => $v));
                if ($rs && $rss) {
                    ADLogController::AdLog('删除管理员信息', $ret, self::$session['uid']);
                    $flag = 1;
                } else {
                    $flag = 0;
                    break;
                }
            }
        }
        unset($k, $v);
        if ($flag == 1) {
            $mod->commit();
            if ($flagc == 100) {
                self::OutMsg(array('ecode' => 202, 'emsg' => '删除时,已忽略高权限用户'));
            }
            self::OutMsg(array('ecode' => 200, 'emsg' => '删除成功'));
        } else {
            $mod->rollback();
            self::OutMsg(array('ecode' => 400, 'emsg' => '删除失败'));
        }
        return 1;
    }

//登录日志
    public function LoginLogAction() {
        $mod = DbModel::Init();
        $per_page = 10;
        $p = isset($this->req['p']) ? (intval($this->req['p']) < 1) ? 1 : intval($this->req['p']) : 1;
        $search_data = isset($this->req['search_angent']) ? trim($this->req['search_angent']) : NULL;
        if (!empty($search_data)) {
            $cont = $mod->table('admin_log')->get_count(array('login_name' => $search_data));
            $ret = $mod->table('admin_log')->get_list('*', array('login_name' => $search_data), ($p - 1) * $per_page, $per_page);
        } else {
            $cont = $mod->table('admin_log')->get_count('1 = 1');
            $ret = $mod->table('admin_log')->get_list('*', '1 = 1', ($p - 1) * $per_page, $per_page);
        }
        $page = new Page($cont, $per_page);
        $pages = $page->show();
        $this->view->assign('page', $pages);
        $this->view->assign('list', $ret);
        $this->view->display('Admin/Manage/login_log.html');
        return TRUE;
    }

//删除登录日志
    public function AjaxDelLogAction() {
        $uids = empty($this->req['logids']) ? NULL : trim($this->req['logids']);
        $mod = DbModel::Init();
        $ret = $mod->table('admin_log')->del_data('`id` in (' . $uids . ')');
        if ($ret) {
            ADLogController::AdLog('删除登录日志', $uids, self::$session['uid']);
            self::OutMsg(array('ecode' => 200, 'emsg' => '删除成功'));
        } else {
            self::OutMsg(array('ecode' => 400, 'emsg' => '删除失败'));
        }
    }

//行为日志
    public function ListActionAction() {
        $mod = DbModel::Init();
        $per_page = 10;
        $p = isset($this->req['p']) ? (intval($this->req['p']) < 1) ? 1 : intval($this->req['p']) : 1;
        $search_data = isset($this->req['search_angent']) ? trim($this->req['search_angent']) : NULL;
        if (!empty($search_data)) {
            $cont = $mod->table('admin_action')->get_count('`action` like \'%' . $search_data . '%\'');
            $ret = $mod->table('admin_action')->get_list('*', '`action` like \'%' . $search_data . '%\'', ($p - 1) * $per_page, $per_page);
        } else {
            $cont = $mod->table('admin_action')->get_count('1 = 1');
            $ret = $mod->table('admin_action')->get_list('*', '1 = 1', ($p - 1) * $per_page, $per_page);
        }
        $page = new Page($cont, $per_page);
        $pages = $page->show();
        $this->view->assign('page', $pages);
        $this->view->assign('list', $ret);
        $this->view->display('Admin/Manage/list_action.html');
        return TRUE;
    }

//查看行为
    public function SubActionAction() {
        $id = empty($this->req['id']) ? 0 : $this->req['id'];
        $mod = DbModel::Init();
        $ret = $mod->table('admin_action')->get_one('*', array('id' => $id));
        if (empty($ret)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '读取失败'));
        }
        $ret['act_time'] = date('Y-m-d H:i:s', $ret['act_time']);
        self::OutMsg($ret);
        return TRUE;
    }

//删除行为日志
    public function AjaxDelActAction() {
        $ids = empty($this->req['ids']) ? NULL : trim($this->req['ids']);
        $mod = DbModel::Init();
        $ret = $mod->table('admin_action')->del_data('`id` in (' . $ids . ')');
        if ($ret) {
            ADLogController::AdLog('删除行为日志', $ids, self::$session['uid']);
            self::OutMsg(array('ecode' => 200, 'emsg' => '删除成功'));
        } else {
            self::OutMsg(array('ecode' => 400, 'emsg' => '删除失败'));
        }
    }

// 查看验证码日志
    public function ListSmsAction() {
        $mod = DbModel::Init();
        $per_page = 10;
        $p = isset($this->req['p']) ? (intval($this->req['p']) < 1) ? 1 : intval($this->req['p']) : 1;
        $search_data = isset($this->req['search_angent']) ? trim($this->req['search_angent']) : NULL;
        if (!empty($search_data) && preg_match("/^1[34578]{1}\d{9}$/", $search_data)) {
            $cont = $mod->table('admin_code')->get_count(array('user_phone' => $search_data));
            $ret = $mod->table('admin_code')->get_list('*', array('user_phone' => $search_data), ($p - 1) * $per_page, $per_page);
        } else {
            $cont = $mod->table('admin_code')->get_count('1 = 1');
            $ret = $mod->table('admin_code')->get_list('*', '1 = 1', ($p - 1) * $per_page, $per_page);
        }
        $page = new Page($cont, $per_page);
        $pages = $page->show();
        $this->view->assign('page', $pages);
        $this->view->assign('list', $ret);
        $this->view->display('Admin/Manage/list_code.html');
        return TRUE;
    }

// 删除验证码
    public function AjaxDelSmsAction() {
        $ids = empty($this->req['ids']) ? NULL : trim($this->req['ids']);
        $mod = DbModel::Init();
        $ret = $mod->table('admin_code')->del_data('`id` in (' . $ids . ')');
        if ($ret) {
            self::OutMsg(array('ecode' => 200, 'emsg' => '删除成功'));
            ADLogController::AdLog('删除验证码日志', $ids, self::$session['uid']);
        } else {
            self::OutMsg(array('ecode' => 400, 'emsg' => '删除失败'));
        }
    }

//获取用户的roleid
    private function GetRoleID($uid) {
        $mod = DbModel::Init();
        $ret = $mod->table('admin_user')->get_one('roleid', array('id' => $uid));
        return $ret;
    }

//检查用户个数
    private function CheckName($uname) {
        $uname = empty($uname) ? NULL : trim($uname);
        $mod = DbModel::Init();
        $ret = $mod->table('admin_user')->get_count(array('username' => $uname));
        return $ret;
    }

// 设置禁用状态
    public function set_status(&$ret) {
        if (array_key_exists('id', $ret)) {
            if (isset($ret['lock_date']) && ($ret['lock_date'] > strtotime(NOW))) {
                $ret['ban'] = '禁用';
                return;
            }
            $ret['ban'] = '正常';
            return;
        } else {
            foreach ($ret as &$v) {
                if (isset($v['lock_date']) && ($v['lock_date'] > strtotime(NOW))) {
                    $v['ban'] = '禁用';
                } else {
                    $v['ban'] = '正常';
                }
            }
        }
    }

}
