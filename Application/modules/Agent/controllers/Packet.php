<?php

/**
 *  版权所有禁止转载,违者必究
 *     Citybay@163.com
 *    软著持有人:Citybay
 * */
use Logic\BaseController;
use Comm\Page;
use \Yaf\Session;

/**
 * Index controller
 */
class PacketController extends BaseController {
    // 公共输出
    use \OutSend\Out;
    
    private $req;          // 请求信息
    private $view;         // 渲染器
    private $session;

    /**
     * 非法登录信息的拦截
     * */
    public function Init() {

        $sess = Session::getInstance();
        if (!$sess->__isset('_admin_user')) {
            //Tool::redirect('/Admin/Login/Index');
            self::redirect('/Admin/Login/Index');
        }
        $this->session = $sess->__get('_admin_user');
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
        sleep(0);
        return TRUE;
    }

    /**
     * 时间表
     * */
    public function ListTimeAction() {
        $mod = DbModel::Init();
        $per_page = 10;
        $p = isset($this->req['p']) ? (intval($this->req['p']) < 1) ? 1 : intval($this->req['p']) : 1;
        $cont = $mod->table('bag_base')->get_count('`status` = 1');
        $ret = $mod->table('bag_base')->get_list('*', '1 = 1', ($p - 1) * $per_page, $per_page, array('id' => 'DESC'));
        $page = new Page($cont, $per_page);
        $pages = $page->show();
        $this->view->assign('page', $pages);
        $this->view->assign('list', $ret);
        $this->view->display('Admin/Packet/list_time.html');
        return TRUE;
    }

//重复时段未检查
    public Function AjaxSubTimeAction() {
        $id = isset($this->req['id']) ? intval(trim($this->req['id'])) : NULL;

        $start_time = isset($this->req['start_time']) ? trim($this->req['start_time']) : NULL;
        $end_time = isset($this->req['end_time']) ? trim($this->req['end_time']) : NULL;
        $down_m = isset($this->req['down_m']) ? trim($this->req['down_m']) : 0;
        $up_m = isset($this->req['up_m']) ? trim($this->req['up_m']) : 0;
        $rate = isset($this->req['rate']) ? trim($this->req['rate']) : 0.9;
        $status = isset($this->req['status']) ? trim($this->req['status']) : 0;

        if (empty($start_time) || !preg_match('/\d{2}:\d{2}/', $start_time)) {
            self::OutMsg(array('emsg' => '开始时间错误', 'ecode' => 400));
        }
        if (empty($end_time) || !preg_match('/\d{2}:\d{2}/', $end_time)) {
            self::OutMsg(array('emsg' => '结束时间错误', 'ecode' => 400));
        }
        if ($up_m < 0) {
            self::OutMsg(array('emsg' => '上限参数错误', 'ecode' => 400));
        }
        if ($down_m < 0) {
            self::OutMsg(array('emsg' => '下限参数错误', 'ecode' => 400));
        }


        $mod = DbModel::Init();
        $arrlist = array(
            'start_time' => $start_time,
            'end_time' => $end_time,
            'up_level' => $up_m,
            'down_level' => $down_m,
            'rate' => $rate,
            'status' => $status,
        );

        if (empty($id)) {
            if (!$this->GetTimeMx($start_time) || !$this->GetTimeMx($end_time)) {
                self::OutMsg(array('emsg' => '存在重复时段', 'ecode' => 400));
            }
            $ret = $mod->table('bag_base')->add_data($arrlist);
        } else {
            if (!$this->GetTimeMx($start_time, $id) || !$this->GetTimeMx($end_time, $id)) {
                self::OutMsg(array('emsg' => '存在重复时段', 'ecode' => 400));
            }
            $ret = $mod->table('bag_base')->up_data($arrlist, '`id` = ' . $id);
        }

        if ($ret) {
            self::OutMsg(array('emsg' => '操作成功', 'ecode' => 200));
        } else {
            self::OutMsg(array('emsg' => '操作失败', 'ecode' => 400));
        }
        return 1;
    }

// 修改时段
    public function SubTimeAction() {
        $id = empty($this->req['id']) ? NULL : trim($this->req['id']);
        // 添加
        if (empty($id)) {
            self::OutMsg(array('bag_type' => 1));
        }
        // 修改
        $mod = DbModel::Init();
        $ret = $mod->table('bag_base')->get_one('*', array('id' => $id));
        self::OutMsg($ret);
        return 1;
    }

    ///////////////////////////////////////////
// 删除时段
    public function AjaxDelTimeAction() {
        $ids = empty($this->req['ids']) ? NULL : trim($this->req['ids']);
        $mod = DbModel::Init();
        $ret = $mod->table('bag_base')->del_data('`id` in (' . $ids . ')');
        if ($ret) {
            self::OutMsg(array('ecode' => 200, 'emsg' => '删除成功'));
        } else {
            self::OutMsg(array('ecode' => 400, 'emsg' => '删除失败'));
        }
        return 1;
    }

///////////////////////////////////
// 用户信息
    public function SetUserAction() {
        $mod = DbModel::Init();
        $per_page = 10;
        $p = isset($this->req['p']) ? (intval($this->req['p']) < 1) ? 1 : intval($this->req['p']) : 1;
        $search_data = isset($this->req['search_data']) ? trim($this->req['search_data']) : NULL;
        if (!empty($search_data)) {
            $cont = $mod->table('bag_user')->get_count(array('user_name' => $search_data));
            $ret = $mod->get_list('*', array('user_name' => $search_data), ($p - 1) * $per_page, $per_page);
        } else {
            $cont = $mod->table('bag_user')->get_count('1 = 1');
            $ret = $mod->table('bag_user')->get_list('*', '1 = 1', ($p - 1) * $per_page, $per_page);
        }
        $page = new Page($cont, $per_page);
        $pages = $page->show();
        $this->view->assign('page', $pages);
        $this->view->assign('list', $ret);
        $this->view->display('Admin/Packet/set_user.html');
        return TRUE;
    }

// 添加用户动作
    public Function AjaxAddUserAction() {
        $user_id = isset($this->req['user_id']) ? trim($this->req['user_id']) : NULL;
        $bag_level = isset($this->req['bag_level']) ? trim($this->req['bag_level']) : NULL;
        $bag_count = isset($this->req['bag_count']) ? trim($this->req['bag_count']) : NULL;
        $bag_rept = isset($this->req['bag_rept']) ? trim($this->req['bag_rept']) : NULL;

        if (empty($username)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '用户名不能为空'));
        }
        $mod = DbModel::Init();
        $ret = $mod->table('bag_user')->add_data(array('user_id' => $user_id, 'bag_level' => $bag_level, 'add_time' => NOW, 'is_get' => $is_get));
        if ($ret) {
            self::OutMsg(array('emsg' => '添加成功', 'ecode' => 200));
        } else {
            self::OutMsg(array('emsg' => '添加失败', 'ecode' => 400));
        }
        return 1;
    }

//修改用户动作
    public function AjaxModUserAction() {
        $uid = isset($this->req['uid']) ? trim($this->req['uid']) : NULL;
        $username = isset($this->req['user_name']) ? trim($this->req['user_name']) : NULL;
        $usermoney = empty($this->req['user_money']) ? NULL : trim($this->req['user_money']);
        $bag_count = isset($this->req['bag_count']) ? trim($this->req['bag_count']) : 0;
        $bag_rept = isset($this->req['bag_rept']) ? trim($this->req['bag_rept']) : 0;
        $now_cont = isset($this->req['now_cont']) ? trim($this->req['now_cont']) : 0;
        if (empty($username) || empty($uid)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '用户名不能为空'));
        }
        $mod = DbModel::Init();
        $ret = $mod->table('bag_user')->mod_data(array('user_name' => $username, 'bag_money' => $usermoney, 'bag_cont' => $bag_count, 'now_cont' => $now_cont, 'bag_repeat' => $bag_rept), array('id' => $uid));
        if ($ret) {
            self::OutMsg(array('emsg' => '修改成功', 'ecode' => 200));
        } else {
            self::OutMsg(array('emsg' => '修改失败', 'ecode' => 400));
        }
        return 1;
    }

// 删除用户
    public function AjaxDelUserAction() {
        $ids = empty($this->req['ids']) ? NULL : trim($this->req['ids']);
        $mod = DbModel::Init();
        $ret = $mod->table('bag_user')->del_data('`id` in (' . $ids . ')');
        if ($ret) {
            self::OutMsg(array('ecode' => 200, 'emsg' => '删除成功'));
        } else {
            self::OutMsg(array('ecode' => 400, 'emsg' => '删除失败'));
        }
        return 1;
    }

// 红包日志
    public function ListLogAction() {
        $mod = DbModel::Init();
        $per_page = 10;
        $p = isset($this->req['p']) ? (intval($this->req['p']) < 1) ? 1 : intval($this->req['p']) : 1;
        $cont = $mod->table('bag_log')->get_count('1 = 1');
        $ret = $mod->table('bag_log')->get_list('*', '1 = 1', ($p - 1) * $per_page, $per_page);

        $page = new Page($cont, $per_page);
        $pages = $page->show();
        $this->view->assign('page', $pages);
        $this->view->assign('list', $ret);
        $this->view->display('Admin/Packet/list_log.html');
        return TRUE;
    }

// 删除日志
    public function AjaxDelLogAction() {
        $ids = empty($this->req['ids']) ? NULL : trim($this->req['ids']);
        $mod = DbModel::Init();
        $ret = $mod->table('bag_log')->del_data('`id` in (' . $ids . ')');
        if ($ret) {
            self::OutMsg(array('ecode' => 200, 'emsg' => '删除成功'));
        } else {
            self::OutMsg(array('ecode' => 400, 'emsg' => '删除失败'));
        }
        return 1;
    }

// 查重复时段
    private function GetTimeMx($hi, $exp_id = 0) {
        $mod = DbModel::Init();
        $ret = $mod->table('bag_base')->get_list('*', ' `id` != ' . $exp_id, -1, -1, array('start_time' => 'ASC'));
        $tn = date('Y-m-d') . ' ' . $hi . ':00';
        foreach ($ret as $k => $v) {
            $start = date('Y-m-d') . ' ' . $v['start_time'] . ':00';
            $end = date('Y-m-d') . ' ' . $v['end_time'] . ':00';
            $ts = strtotime($start);
            $te = strtotime($end);
            $tw = strtotime($tn);
            if (($ts < $tw) && ($tw < $te)) {
                return false;
            }
        }
        return true;
    }

}
