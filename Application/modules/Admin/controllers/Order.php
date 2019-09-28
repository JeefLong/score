<?php

/**
 *  版权所有禁止转载,违者必究
 * */
use \Logic\BaseController;
use Comm\Page;
use \Yaf\Session;

/**
 * Index controller
 */
Final class OrderController extends BaseController {

    // 公共输出
    use \OutSend\Out;

    private $req;          // 请求信息
    private $view;         // 渲染器
    private static $session;

// 非法登录信息的拦截
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
     */
    public function IndexAction() {
        return TRUE;
    }

    /**
     * 订单集合
     */
    public function ListOrderAction() {
        $mod = DbModel::Init();
        $perpage = 10;
        $p = isset($this->req['p']) ? (intval($this->req['p']) < 1) ? 1 : intval($this->req['p']) : 1;
        $search_data = isset($this->req['search_data']) ? trim($this->req['search_data']) : NULL;
        $status = isset($this->req['status']) ? trim($this->req['status']) : '';
        $search_id = isset($this->req['search_id']) ? trim($this->req['search_id']) : '';
        $search_status = isset($this->req['search_status']) ? trim($this->req['search_status']) : NULL;
        $start = empty($this->req['start_time']) ? NULL : trim($this->req['start_time']);
        $end = empty($this->req['end']) ? NULL : trim($this->req['end']);

        $s_arr = array();
        // 类型
        if ($status == '1') {
            $s_arr['order_type'] = 1;
        }
        if ($status == '2') {
            $s_arr['order_type'] = 2;
        }
        if ($status == '3') {
            $s_arr['order_type'] = 3;
        }
        if ($status == '4') {
            $s_arr['order_type'] = 4;
        }
        if ($status == '5') {
            $s_arr['order_type'] = 5;
        }
        if ($status == '6') {
            $s_arr['order_type'] = 6;
        }
        if ($status == '7') {
            $s_arr['order_type'] = 7;
        }
        if ($status == '8') {
            $s_arr['order_type'] = 8;
        }
        if ($status == '9') {
            $s_arr['order_type'] = 9;
        }
        if ($status == 'x') {
            $s_arr['order_type'] = 0;
        }
        // 检索内容
        if (!empty($search_data)) {
            if ($search_id == 1) {
                $s_arr['order_sn'] = $search_data;
            }
            if ($search_id == 2) {
                $s_arr['agent_id'] = $search_data;
            }
            if ($search_id == 3) {
                $s_arr['op_agent_id'] = $search_data;
            }
            if ($search_id == 4) {
                $s_arr['op_player_id'] = $search_data;
            }
        }
        // 状态

        if ($search_status == '0') {
            $s_arr['order_status'] = 0;
        }
        if ($search_status == '1') {
            $s_arr['order_status'] = 1;
        }

        //时间
        if (!empty($start)) {
            $s_arr['tread_time[>]'] = strtotime($start);
        }
        if (!empty($end)) {
            $s_arr['tread_time[<]'] = strtotime($end);
        }

        // 无条件
        if (empty($s_arr)) {
            $s_arr = '1=1';
        }

        $cont = $mod->table('order_card')->get_count($s_arr);
        $ret = $mod->table('order_card')->get_list('*', $s_arr, ($p - 1) * $perpage, $perpage);
        $ret = $this->GetAgtname($ret);
        $ret = $this->GetOpname($ret);

        //print_r($ret);
        $page = new Page($cont, $perpage);
        $pg = $page->show();
        $this->view->assign('status', $status);
        $this->view->assign('page', $pg);
        $this->view->assign('list', $ret);
        $this->view->display('Admin/Card/list_order.html');
        return TRUE;
    }

    // 数量统计
    public function SumOrderAction() {
        $perpage = 10;
        $p = isset($this->req['p']) ? (intval($this->req['p']) < 1) ? 1 : intval($this->req['p']) : 1;
        $status = isset($this->req['status']) ? trim($this->req['status']) : '';

        $start = empty($this->req['start_time']) ? NULL : trim($this->req['start_time']);
        $end = empty($this->req['end_time']) ? NULL : trim($this->req['end_time']);

        $wh = ' WHERE `order_status` = 1 ';
        // 类型
        // 1,给玩家充值,
        if ($status == '1') {
            $wh .= ' AND `order_type` = 1 ';
        }
        // 2,代理自己充值,
        if ($status == '2') {
            $wh .= ' AND `order_type` = 2 ';
        }
        // 3,代理给下级代理充值,
        if ($status == '3') {
            $wh .= ' AND `order_type` = 3  AND `op_agent_id` > 0 ';
        }
        // 4,获得上级代理充值,
        if ($status == '4') {
            $wh .= ' AND `order_type` = 4  AND `op_agent_id` > 0 ';
        }
        // 5,下级代理充值提成,
        if ($status == '5') {
            $wh .= ' AND `order_type` = 5';
        }
        // 6,提现操作
        if ($status == '6') {
            $wh .= ' AND `order_type` = 6';
        }
        // 7,代理转让
        if ($status == '7') {
            $wh .= ' AND `order_type` = 7';
        }
        // 8,玩家转让
        if ($status == '8') {
            $wh .= ' AND `order_type` = 8';
        }
        // 9,系统赠送
        if ($status == '9') {
            $wh .= ' AND `order_type` = 9';
        }
        // 0,非法数据
        if ($status == 'x') {
            $wh .= ' AND `order_type` = 0';
        }

        $sql = 'SELECT `id`, `agent_id`, SUM(IF(game_card < 0,game_card,0)) AS `put`, sum(IF(game_card > 0,game_card,0)) AS `get` FROM `order_card` ';
        $sql .= $wh;

        //时间
        if (!empty($start)) {
            $sql .= ' AND `tread_time` > ' . strtotime($start);
        }
        if (!empty($end)) {
            $sql .= ' AND `tread_time` < ' . strtotime($end);
        }

        $sql .= ' GROUP BY `agent_id` ';

        $count = 'SELECT count(*) as `COUNT` FROM (' . $sql . ') AS  `AT`';

        $sql .= ' ORDER BY `put` ASC LIMIT  ' . ($p - 1) * $perpage . ',' . $perpage;

        $mod = DbModel::Init();
        $cd = $mod->table('order_card')->query_data($count);
        $cout = $cd[0]['COUNT'];

        $ret = $mod->table('order_card')->query_data($sql);
        $ret = $this->GetAgtname($ret);

        $page = new Page($cout, $perpage);
        $pg = $page->show();
        $this->view->assign('page', $pg);
        $this->view->assign('list', $ret);
        $this->view->assign('status', $status);

        $this->view->display('Admin/Card/list_sum.html');
    }

    // 删除
    public function AjaxDelOrderAction() {
        $ids = empty($this->req['ids']) ? NULL : trim($this->req['ids']);
        $mod = DbModel::Init();
        $uid_arr = explode(',', $ids);
        $flag = 0;
        $mod->start();

        foreach ($uid_arr as $k => $v) {
            $ret = $mod->table('order_card')->get_one('*', array('id' => $v));
            if (isset($ret['id'])) {
                unset($ret['id']);
            }
            $rst = $mod->table('order_card_t')->add_data($ret);
            $rs = $mod->table('order_card')->del_data(array('id' => $v));
            if ($rst && $rs) {
                $flag = 1;
                ADLogController::AdLog('删除订单数据', $ret, self::$session['uid']);
            } else {
                $flag = 0;
                break;
            }
        }
        unset($k, $v);

        if ($flag) {
            $mod->commit();
            self::OutMsg(array('ecode' => 200, 'emsg' => '删除成功'));
        } else {
            $mod->rollback();
            self::OutMsg(array('ecode' => 400, 'emsg' => '删除失败'));
        }
        return 1;
    }

    // 获取代理信息
    private function GetAgtname($ret) {
        $mod = DbModel::Init();
        if (isset($ret['id']) && $ret['id'] > 0) {
            if (is_null($ret['agent_id'])) {
                $ret['agt_name'] = '系统赠送';
            } else {
                $res = $mod->table('angent_info')->get_one('agent_name,card', array('id' => $ret['agent_id']));
                $ret['agt_name'] = empty($res['agent_name']) ? '(已删除)ID:' . $res['agent_id'] : $res['agent_name'];
            }
            //$ret['agt_gold'] = $res['card'];
            return $ret;
        }
        foreach ($ret as $k => $v) {
            if (is_null($v['agent_id'])) {
                $ret[$k]['agt_name'] = '系统赠送';
            } else {
                $res = $mod->table('angent_info')->get_one('agent_name,card', array('id' => $v['agent_id']));
                $ret[$k]['agt_name'] = empty($res['agent_name']) ? '(已删除)ID:' . $v['agent_id'] : $res['agent_name'];
                //$ret[$k]['agt_gold'] = $res['card'];
            }
        }
        unset($k, $v);
        return $ret;
    }

    // 获取代理信息2
    private function GetOpname($ret) {
        $mod = DbModel::Init();
        if (isset($ret['id']) && $ret['id'] > 0) {
            if (is_null($ret['op_agent_id'])) {
                $ret['op_name'] = '系统赠送';
            } else {
                $res = $mod->table('angent_info')->get_one('agent_name,card', array('id' => $ret['op_agent_id']));
                $ret['op_name'] = empty($res['agent_name']) ? '(已删除)ID:' . $res['op_agent_id'] : $res['agent_name'];
            }
            //$ret['agt_gold'] = $res['card'];
            return $ret;
        }
        foreach ($ret as $k => $v) {
            if (is_null($v['agent_id'])) {
                $ret[$k]['op_name'] = '系统赠送';
            } else {
                $res = $mod->table('angent_info')->get_one('agent_name,card', array('id' => $v['agent_id']));
                $ret[$k]['op_name'] = empty($res['agent_name']) ? '(已删除)ID:' . $v['agent_id'] : $res['agent_name'];
                //$ret[$k]['agt_gold'] = $res['card'];
            }
        }
        unset($k, $v);
        return $ret;
    }

}
