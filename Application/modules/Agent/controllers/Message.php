<?php

/**
 *  版权所有禁止转载,违者必究
 *     Citybay@163.com
 *    软著持有人:Citybay
 * */
use \Logic\BaseController;
use Comm\Page;
use \Yaf\Session;

/**
 * Index controller
 */
Final class MessageController extends BaseController {

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

    // 头部站内信消息
    public function AjaxGetMessageAction() {
        $wh_arr['recive_id'] = self::$session['uid'];
        $wh_arr['is_read'] = 0;
        $mod = DbModel::Init();
        $count = $mod->table('angent_message')->get_count($wh_arr);
        $ret = $mod->table('angent_message')->get_list('*', $wh_arr, 0, 10, array('add_time' => 'DESC'));
        $ret = $this->setData($ret, $count);
        self::OutMsg($ret);
        return TRUE;
    }

    // 列表
    public function ListMessageAction() {
        $mid = empty($this->req['mid']) ? NULL : intval($this->req['mid']);
        $p = isset($this->req['p']) ? (intval($this->req['p']) < 1) ? 1 : intval($this->req['p']) : 1;

        $wh_arr = ' `id` = `topic_id`  AND (`recive_id` = ' . self::$session['uid'] . ' OR `send_id` = ' . self::$session['uid'] . ')';

        if (!empty($mid)) {
            $wh_arr .= ' AND `id` = ' . $mid;
        }

        $mod = DbModel::Init();
        $csql = 'SELECT count(*) as total FROM `angent_message` WHERE  ' . $wh_arr;

        $cret = $mod->table('angent_message')->query_data($csql);
        $cont = isset($cret[0]['total']) ? $cret[0]['total'] : 0;

        $per_page = 10;
        $sql = 'SELECT * FROM `angent_message` WHERE  ' . $wh_arr . ' ORDER BY `add_time` DESC LIMIT ' . ($p - 1) * $per_page . ' , ' . $per_page;
        $ret = $mod->table('angent_message')->query_data($sql);
        $ret = $this->setData($ret, $cont);
        $ret = $this->setStatus($ret);

        $page = new Page($cont, $per_page);
        $pages = $page->show();
        $this->view->assign('page', $pages);
        $this->view->assign('list', $ret);
        $this->view->display('Agent/Message/List_Message.html');
    }

    // 查看对话
    public function ShowMessageAction() {
        $tid = empty($this->req['tid']) ? 0 : intval($this->req['tid']);

        $mod = DbModel::Init();

        /** 对方发送的更新为已读 * */
        $wh = '`topic_id` = ' . $tid . ' AND `recive_id` = ' . self::$session['uid'];
        $mod->table('angent_message')->up_data(array('is_read' => 1), $wh);
        /** 更新为已读 * */
        $wh_arr = '`topic_id` =' . $tid . '  AND (`recive_id` = ' . self::$session['uid'] . ' OR `send_id` = ' . self::$session['uid'] . ')';

        $cont = $mod->table('angent_message')->get_count($wh_arr);
        $per_page = 10;
        $p = isset($this->req['p']) ? (intval($this->req['p']) < 1) ? 1 : intval($this->req['p']) : 1;
        $ret = $mod->table('angent_message')->get_list('*', $wh_arr, ($p - 1) * $per_page, $per_page, array('add_time' => 'ASC'));

        $ret = $this->setData($ret, $cont);

        $page = new Page($cont, $per_page);
        $pages = $page->show();
        $this->view->assign('page', $pages);
        $this->view->assign('list', $ret);
        $this->view->assign('tid', $tid);
        $this->view->display('Agent/Message/Show_Message.html');
        return TRUE;
    }

    // 回复短信

    public function AjaxSubMessageAction() {
        $tid = empty($this->req['tid']) ? NULL : intval($this->req['tid']);
        $content = empty($this->req['content']) ? NULL : trim($this->req['content']);

        if (empty($tid)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '信息读取错误'));
        }
        if (empty($content)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '信息不能为空'));
        }

        $wh = '`id` = `topic_id` AND topic_id = ' . $tid;
        $mod = DbModel::Init();
        $ret = $mod->table('angent_message')->get_one('*', $wh);
        if (!empty($ret['send_id']) && !empty($ret['recive_id'])) {

            //**********变换规则********//
            $recive_id = '-1';
            $send_id = 0;
            if ($ret['send_id'] > 0) {
                $send_id = $ret['send_id'];
            }
            if ($ret['recive_id'] > 0) {
                $send_id = $ret['recive_id'];
            }
            //***********************//

            $addarr = array(
                'topic_id' => $tid,
                'send_id' => $send_id,
                'recive_id' => $recive_id,
                'content' => $content,
                'add_time' => NOW,
                'is_read' => 0,
                'prive' => $ret['prive'],
            );

            $ret = $mod->table('angent_message')->add_data($addarr);
            if ($ret) {
                self::OutMsg(array('ecode' => 200, 'emsg' => '回复成功'));
            }
        } else {
            self::OutMsg(array('ecode' => 400, 'emsg' => '回复错误'));
        }
    }

    //新建短信
    public function AjaxAddMessageAction() {
        $prive = empty($this->req['prive']) ? 0 : trim($this->req['prive']);
        $content = empty($this->req['content']) ? NULL : trim($this->req['content']);
        if (empty($content)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '信息不能为空'));
        }
        $mod = DbModel::Init();
        /*         * ************ */
        $add_arr = array(
            'send_id' => self::$session['uid'],
            'recive_id' => '-1',
            'content' => $content,
            'add_time' => NOW,
            'is_read' => 0,
            'prive' => $prive,
        );
        /*         * ************ */

        $in_id = $mod->table('angent_message')->add_data($add_arr);
        $ret = $mod->table('angent_message')->up_data(array('topic_id' => $in_id), array('id' => $in_id));
        if ($in_id && $ret) {
            self::OutMsg(array('ecode' => 200, 'emsg' => '发送成功'));
        }
        self::OutMsg(array('ecode' => 200, 'emsg' => '发送失败'));
    }

    // 删除
    public function AjaxDelMessageAction() {
        $ids = empty($this->req['ids']) ? NULL : trim($this->req['ids']);
        $mod = DbModel::Init();
        $ret = $mod->table('angent_message')->del_data('`topic_id` in (' . $ids . ')');
        if ($ret) {
            self::OutMsg(array('ecode' => 200, 'emsg' => '删除成功'));
        } else {
            self::OutMsg(array('ecode' => 400, 'emsg' => '删除失败'));
        }
    }

    // 设置用户信息
    private function setData($ret, $count) {
        $mod = DbModel::Init();
        foreach ($ret as $k => $v) {
            if (empty($v['send_id'])) {
                break;
            }
            // 接收
            if ($v['recive_id'] == -1) {
                $ret[$k]['recive_name'] = '管理员';
                if (($v['prive'] < 1)) {
                    $ret[$k]['recive_name'] = '开发者';
                }
            } else {
                $user2 = $mod->table('angent_info')->get_one('real_name', array('id' => $v['recive_id']));
                $ret[$k]['recive_name'] = empty($user2['real_name']) ? '---' : $user2['real_name'];
            }
            // 发送
            if ($v['send_id'] == -1) {
                $ret[$k]['send_name'] = '管理员';
                if (($v['prive'] < 1)) {
                    $ret[$k]['send_name'] = '开发者';
                }
            } else {
                $user = $mod->table('angent_info')->get_one('real_name', array('id' => $v['send_id']));
                $ret[$k]['send_name'] = empty($user['real_name']) ? '---' : $user['real_name'];
            }
            $ret[$k]['add_time'] = date('Y-m-d H:i:s', $v['add_time']);
            $ret[$k]['contend'] = mb_substr($v['content'], 0, 16) . '......';
            $ret[$k]['count'] = $count;
        }
        return $ret;
    }

    // 设置状态信息
    private function setStatus($ret) {
        $mod = DbModel::Init();
        $flag = 1;
        foreach ($ret as $k => $v) {
            if (empty($v['id'])) {
                break;
            }
            $count = $mod->table('angent_message')->get_count(array('topic_id' => $v['id'], 'is_read' => 0));
            if ($count > 0) {
                $ret[$k]['is_read'] = 0;
            } else {
                $ret[$k]['is_read'] = 1;
            }
        }
        return $ret;
    }

    // 根据id获取代理信息
    private function get_agt($uid) {
        $mod = DbModel::Init();
        $ret = $mod->table('angent_info')->get_one('`id`,`agent_status`', array('id' => $uid));
        if (isset($ret['id'])) {
            return $ret;
        }
        return NULL;
    }

}
