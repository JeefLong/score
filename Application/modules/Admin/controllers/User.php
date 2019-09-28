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
Final class UserController extends BaseController {

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

    /**
     * 列表
     * */
    public function ListUserAction() {
        $type = isset($this->req['type']) ? trim($this->req['type']) : null;
        $sort = isset($this->req['sort']) ? $this->req['sort'] : null;
        $p = isset($this->req['p']) ? (intval($this->req['p']) < 1) ? 1 : intval($this->req['p']) : 1;

        $search_id = isset($this->req['search_id']) ? trim($this->req['search_id']) : '';
        $search_data = isset($this->req['search_data']) ? trim($this->req['search_data']) : null;
        $start = empty($this->req['start_time']) ? null : trim($this->req['start_time']);
        $end = empty($this->req['end']) ? null : trim($this->req['end']);

        $per = 10;

        // 默认顺序
        $xchg = 'ASC';
        if ($sort == 'ASC') {
            $xchg = 'DESC';
        }
        if ($sort == 'DESC') {
            $xchg = 'ASC';
        }

        if (!empty($sort)) {
            if ($type == 'reg') {
                $order['reg_time'] = $sort;
            }
            if ($type == 'exp') {
                $order['exp_time'] = $sort;
            }
            if ($type == 'card') {
                $order['card'] = $sort;
            }
            if ($type == 'gold') {
                $order['gold'] = $sort;
            }
        }
        // 默认排序,优先级最低
        $order['id'] = 'DESC';

        $s_arr = array();
        // 检索内容
        if (!empty($search_data)) {
            if ($search_id == 1) {
                $s_arr['id'] = $search_data;
            }
            if ($search_id == 2) {
                $s_arr['email[like]'] = '%' . $search_data . '%';
            }
        }

        //时间
        if (!empty($start)) {
            $s_arr['exp_time[>]'] = strtotime($start);
        }
        if (!empty($end)) {
            $s_arr['exp_time[<]'] = strtotime($end);
        }

        // 无条件
        if (empty($s_arr)) {
            $s_arr = '1=1';
        }

        $mod = DbModel::Init();
        $ret_arr = $mod->table('t_user')
                ->where($s_arr)
                ->order($order)
                ->page($p, $per);

        $ret = $ret_arr['data'];
        $totle = $ret_arr['totle'];

        $ret = $this->SetUname($ret);
        $ret = $this->Get_cardCharge($ret);
        $ret = $this->Get_goldCharge($ret);
        $page = new Page($totle, $per);
        $pages = $page->show();
        $this->view->assign('sort', $xchg);
        $this->view->assign('page', $pages);
        $this->view->assign('list', $ret);
        $this->view->display('Admin/User/list_user.html');
        return TRUE;
    }

    //获取一个
    public function SubUserAction() {
        $uid = empty($this->req['id']) ? null : intval(trim($this->req['id']));
        $mod = DbModel::Init();
        $ret = $mod->table('t_user')
                ->select('id, account, name, sex, gems, lv, headimg, coins, club_id')
                ->where('id = ' . $uid)
                ->order('id desc')
                ->first();
        self::OutMsg($ret);
        return TRUE;
    }

    //获取一个
    public function GetRecordAction() {
        $uid = empty($this->req['id']) ? null : trim($this->req['id']);
        $mod = DbModel::Init();
        $ret = $mod->table('t_user')
                ->select('history')
                ->where('id = ' . $uid)
                ->order('id desc')
                ->first();
        $ret = json_decode($ret['history'], TRUE);
        $this->view->assign('list', $ret);
        $this->view->display('Admin/User/list_record.html');
        return TRUE;
    }

    /**
     * 修改动作
     * */
    public function AjaxSubUserAction() {
        $pl_id = empty($this->req['pl_id']) ? 0 : trim($this->req['pl_id']);
        $pl_account = empty($this->req['pl_account']) ? null : trim($this->req['pl_account']);
        $pl_name = empty($this->req['pl_name']) ? null : trim($this->req['pl_name']);
        $pl_sex = empty($this->req['pl_sex']) ? 0 : trim($this->req['pl_sex']);
        $pl_gold = isset($this->req['pl_gold']) ? trim($this->req['pl_gold']) : 0;
        $pl_lv = isset($this->req['pl_chg']) ? trim($this->req['pl_chg']) : 1;
        $coins = isset($this->req['pl_coins']) ? trim($this->req['pl_coins']) : 0;
        $club_id = isset($this->req['pl_club']) ? trim($this->req['pl_club']) : 0;
        $perm = isset($this->req['perm']) ? trim($this->req['perm']) : 0;
        $mod = DbModel::Init();
        if ($pl_id == 0) {

            ////拦截添加
            self::OutMsg(array('ecode' => 400, 'emsg' => '系统暂时不允许添加账户'));
            //////

            if (empty($pl_account)) {
                self::OutMsg(array('ecode' => 400, 'emsg' => '登录名不能为空'));
            }

            if (empty($pl_name)) {
                self::OutMsg(array('ecode' => 400, 'emsg' => '昵称不能为空'));
            }

            $in_arr = array(
                'account' => $pl_account,
                'name' => base64_encode($pl_name),
                'sex' => $pl_sex,
                'gems' => $pl_gold,
                'club_id' => $club_id,
                    // 'coins' => $coins,
                    // 'lv' => $pl_lv,
            );
            $ret = $mod->table('t_user')->insert($in_arr);
            if ($ret) {
                ADLogController::AdLog('添加玩家数据', $in_arr, self::$session['uid']);
            }
        } elseif ($pl_id > 0) {
            if (empty($pl_name)) {
                self::OutMsg(array('ecode' => 400, 'emsg' => '昵称不能为空'));
            }

            $per = 0;
            if (!empty($perm)) {
                $perms = explode(',', $perm);
                foreach ($perms as $k => $v) {
                    $per += $v;
                }
                unset($k, $v);
            }

            $aret = $mod->table('t_user')
                    ->select('id, account, name, sex, gems, headimg, coins')
                    ->where('id = ' . $pl_id)
                    ->order(' id DESC ')
                    ->first();
            $in_arr = array(
                'account' => $pl_account,
                //'name' => base64_encode($pl_name),
                //'sex' => $pl_sex,
                //'gems' => $pl_gold,
                //'coins' => $coins,
                'club_id' => $club_id,
                'lv' => $pl_lv,
                'permit' => $per,
            );
            $ret = $mod->table('t_user')
                    ->where(array('id' => $pl_id))
                    ->update($in_arr);
            if ($ret) {
                ADLogController::AdLog('更改前玩家数据', $aret, self::$session['uid']);
            }
        } else {
            self::OutMsg(array('ecode' => 400, 'emsg' => '非法数据'));
        }

        if ($ret > 0) {
            self::OutMsg(array('ecode' => 200, 'emsg' => '提交成功'));
        } else {
            self::OutMsg(array('ecode' => 400, 'emsg' => '提交失败'));
        }
        return TRUE;
    }

    // 删除
    public function AjaxDelUserAction() {
        $uids = empty($this->req['pl_ids']) ? null : trim($this->req['pl_ids']);
        $mod = DbModel::Init();
        $uid_arr = explode(',', $uids);
        $flag = FALSE;
        $mod->start();

        foreach ($uid_arr as $val) {
            $ret = $mod->table('t_user')
                    ->where('id = ' . $val)
                    ->first();
            $rst = ADLogController::AdLog('删除用户数据', $ret, self::$session['uid']);
            $rs = $mod->table('t_user')
                    ->where('id = ' . $val)
                    ->delete();
            if ($rst && $rs) {
                $flag = TRUE;
            } else {
                $flag = FALSE;
                break;
            }
        }
        unset($val);
        if ($flag) {
            $mod->commit();
            self::OutMsg(array('ecode' => 200, 'emsg' => '删除成功'));
        } else {
            $mod->rollback();
            self::OutMsg(array('ecode' => 400, 'emsg' => '删除失败'));
        }
        return 1;
    }

    // 检查手机是否已存在
    private function SetUname($ret) {
        foreach ($ret as &$val) {
            if (isset($val['id'])) {
                $val['uname'] = empty($val['name']) ? null : trim(base64_decode($val['name']));
                $val['p_count'] = empty($val['history']) ? null : count(json_decode($val['history']));
            }
        }
        unset($val);
        return $ret;
    }

    //读取充值数量
    private function Get_cardCharge($ret) {
        $mod = DbModel::Init();
        foreach ($ret as $k => $v) {
            $c_sql = 'select sum(`card_no`) as `c_sum`  from `order_card` where `card_no` < 0 and `order_type` = 3 and `main_id` = ' . $v['id'];
            $c_count = $mod->table('order_card')->query_data($c_sql);
            $ret[$k]['c_count'] = isset($c_count[0]['c_sum']) ? abs($c_count[0]['c_sum']) : 0;
        }
        return $ret;
    }

    //读取充值数量
    private function Get_goldCharge($ret) {
        $mod = DbModel::Init();
        foreach ($ret as $k => $v) {
            $c_sql = 'select sum(`gold_no`) as `g_sum`  from `order_gold` where `gold_no` < 0 and `order_type` = 3 and `main_id` = ' . $v['id'];
            $c_count = $mod->table('order_gold')->query_data($c_sql);
            $ret[$k]['g_count'] = isset($c_count[0]['g_sum']) ? abs($c_count[0]['g_sum']) : 0;
        }
        return $ret;
    }

}
