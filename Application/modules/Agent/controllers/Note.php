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
Final class NoteController extends BaseController {

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

    //公告列表
    public function ListNoteAction() {
        $mod = DbModel::Init();
        $p = isset($this->req['p']) ? (intval($this->req['p']) < 1) ? 1 : intval($this->req['p']) : 1;
        $search_data = isset($this->req['search_data']) ? trim($this->req['search_data']) : NULL;
        $per_page = 10;
        if (!empty($search_data) && strlen($search_data) < 8) {
            $cont = $mod->table('t_message')->get_count(array('title' => $search_data));
            $ret = $mod->table('t_message')->get_list('*', array('title' => $search_data), ($p - 1) * $per_page, $per_page, array('id' => 'DESC'));
        } else {
            $cont = $mod->table('t_message')->get_count('1 = 1');
            $ret = $mod->table('t_message')->get_list('*', '1 = 1', ($p - 1) * $per_page, $per_page, array('id' => 'DESC'));
        }

        $page = new Page($cont, $per_page);
        $pages = $page->show();
        $this->view->assign('page', $pages);
        $this->view->assign('list', $ret);
        $this->view->display('Admin/Note/List_Note.html');
        return TRUE;
    }

    //玩家公告
    public function SubNoteAction() {
        $nid = isset($this->req['id']) ? trim($this->req['id']) : NULL;
        $mod = DbModel::Init();
        $ret = $mod->table('t_message')->get_one('*', array('id' => $nid), array('id' => 'DESC'));
        if (empty($ret)) {
            self::OutMsg(array());
        }
        $out_arr = array(
            'note_type' => $ret['type'],
            'note_title' => $ret['title'],
            'note_content' => $ret['msg'],
        );
        self::OutMsg($out_arr);
    }

    //修改动作
    public function AjaxSubNoteAction() {
        $nid = isset($this->req['id']) ? trim($this->req['id']) : NULL;
        $content = empty($this->req['note_content']) ? NULL : trim($this->req['note_content']);
        $type = empty($this->req['note_type']) ? NULL : trim($this->req['note_type']);
        $title = empty($this->req['note_title']) ? NULL : trim($this->req['note_title']);
        $mod = DbModel::Init();

        if (empty($nid)) {
            $arr = array(
                'type' => $type,
                'title' => $title,
                'msg' => $content,
                'version' => NOW
            );
            $ret = $mod->table('t_message')->add_data($arr);
        } else {
            $arr = array(
                'type' => $type,
                'title' => $title,
                'msg' => $content,
                'version' => NOW
            );
            $ret = $mod->table('t_message')->up_data($arr, array('id' => $nid));
        }
        if ($ret) {
            self::OutMsg(array('ecode' => 200, 'emsg' => '操作成功'));
        } else {
            self::OutMsg(array('ecode' => 400, 'emsg' => '操作失败'));
        }
    }

    //删除
    public function AjaxDelNoteAction() {
        $ids = empty($this->req['ids']) ? NULL : trim($this->req['ids']);
        $mod = DbModel::Init();
        $ret = $mod->table('t_message')->del_data('`id` in (' . $ids . ')');
        if ($ret) {
            self::OutMsg(array('ecode' => 200, 'emsg' => '删除成功'));
        } else {
            self::OutMsg(array('ecode' => 400, 'emsg' => '删除失败'));
        }
    }

    /////////////////////////////////////////
    //公告列表
    public function ListBullAction() {
        $mod = DbModel::Init();
        $p = isset($this->req['p']) ? (intval($this->req['p']) < 1) ? 1 : intval($this->req['p']) : 1;
        $search_data = isset($this->req['search_angent']) ? trim($this->req['search_angent']) : NULL;
        $per_page = 10;
        if (!empty($search_data) && strlen($search_data) < 8) {
            $cont = $mod->table('t_bull')->get_count(array('title' => $search_data));
            $ret = $mod->get_list('*', array('title' => $search_data), ($p - 1) * $per_page, $per_page, array('id' => 'DESC'));
        } else {
            $cont = $mod->table('t_bull')->get_count('1 = 1');
            $ret = $mod->table('t_bull')->get_list('*', '1 = 1', ($p - 1) * $per_page, $per_page, array('id' => 'DESC'));
        }

        $ret = $this->set_status($ret);
        $page = new Page($cont, $per_page);
        $pages = $page->show();
        $this->view->assign('page', $pages);
        $this->view->assign('list', $ret);
        $this->view->display('Admin/Note/List_Bull.html');
        return TRUE;
    }

    //玩家公告
    public function SubBullAction() {
        $id = isset($this->req['id']) ? trim($this->req['id']) : NULL;
        $mod = DbModel::Init();
        $ret = $mod->table('t_bull')->get_one('*', array('id' => $id), array('id' => 'DESC'));
        if (empty($ret)) {
            self::OutMsg(array());
        }
        $out_arr = array(
            'id' => $ret['id'],
            'title' => $ret['title'],
            'content' => $ret['content'],
            'start_time' => date('Y-m-d H:i:s', $ret['start_time']),
            'duration' => $ret['duration'],
            'status' => $ret['status'],
        );
        self::OutMsg($out_arr);
    }

    //修改动作
    public function AjaxSubBullAction() {
        $id = empty($this->req['id']) ? NULL : trim($this->req['id']);
        $title = empty($this->req['title']) ? NULL : trim($this->req['title']);
        $content = empty($this->req['content']) ? NULL : trim($this->req['content']);
        $start_time = empty($this->req['start_time']) ? NOW : strtotime($this->req['start_time']);
        $duration = empty($this->req['duration']) ? 0 : trim($this->req['duration']);
        $status = empty($this->req['status']) ? NULL : trim($this->req['status']);

        if (empty($title)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '标题不能为空'));
        }

        if (empty($content)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '内容不能为空'));
        }
        $mod = DbModel::Init();
        $arr = array(
            'op_id' => self::$session['uid'],
            'title' => $title,
            'content' => $content,
            'add_time' => NOW,
            'start_time' => $start_time,
            'duration' => $duration,
            'status' => $status,
        );
        if (empty($id)) {
            $ret = $mod->table('t_bull')->add_data($arr);
        } else {
            $ret = $mod->table('t_bull')->up_data($arr, array('id' => $id));
        }
//        $flag = true;
//        if ($start_time + $duration > NOW) {
//            $proc = ($start_time - NOW) + $duration;
//            RedisDBModel::start();
//            $rret = RedisDBModel::$_RDS->set('bull_' . $id, $content, $proc);
//            if ($rret) {
//                $flag = false;
//            }
//        }
        if ($ret) {
            self::OutMsg(array('ecode' => 200, 'emsg' => '操作成功'));
        } else {
            self::OutMsg(array('ecode' => 400, 'emsg' => '操作失败'));
        }
    }

    //删除
    public function AjaxDelBullAction() {
        $ids = empty($this->req['ids']) ? NULL : trim($this->req['ids']);
        $mod = DbModel::Init();
        $ret = $mod->table('t_bull')->del_data('`id` in (' . $ids . ')');
        if ($ret) {
            self::OutMsg(array('ecode' => 200, 'emsg' => '删除成功'));
        } else {
            self::OutMsg(array('ecode' => 400, 'emsg' => '删除失败'));
        }
    }

    // 设置时间进度
    private function set_status($ret) {
        foreach ($ret as $k => $v) {
            if (isset($v['id'])) {
                if ($v['start_time'] + $v['duration'] < NOW) {
                    $ret[$k]['proc'] = '0';
                    // 已完成
                } elseif (($v['start_time'] < NOW) && ($v['start_time'] + $v['duration'] > NOW)) {
                    $ret[$k]['proc'] = '1';
                    // 进行中
                } else {
                    $ret[$k]['proc'] = '2';
                    // 未开始
                }
            }
        }
        unset($k, $v);
        return $ret;
    }

}
