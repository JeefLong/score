<?php

/**
 *  版权所有禁止转载,违者必究
 *     Citybay@163.com
 *    软著持有人:Citybay
 * */
use \Logic\BaseController;
use Comm\File;
use \Yaf\Session;

/**
 * Index controller
 */
Final class MenuController extends BaseController {

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

    /**
     * 首页
     * */
    public function IndexAction() {
        return TRUE;
    }

    // 菜单列表
    public function ListMenuAction() {
        $mod = DbModel::Init();
        $search_data = isset($this->req['search_data']) ? trim($this->req['search_data']) : NULL;
        if (!empty($search_data) && strlen($search_data) > 1) {
            $retd = $mod->table('angent_menu')->get_one('*', array('name' => $search_data), array('order' => 'ASC', 'id' => 'ASC'));
            if ($retd['pid'] == 0) {
                $ret = $mod->table('angent_menu')->get_list('*', '`name` = \'' . $search_data . '\' or `pid` = ' . $retd['id'], -1, -1, array('order' => 'ASC', 'id' => 'ASC'));
            } else {
                $ret = $mod->table('angent_menu')->get_list('*', '`id` = \'' . $retd['pid'] . '\' or `pid` = ' . $retd['pid'], -1, -1, array('order' => 'ASC', 'id' => 'ASC'));
            }
        } else {
            $ret = $mod->table('angent_menu')->get_list('*', array('pid' => 0), -1, -1, array('order' => 'ASC', 'id' => 'ASC'));
        }
        $ret = $this->get_node($ret);
        $this->view->assign('list', $ret);
        $this->view->display('Agent/Menu/List_Menu.html');
        return TRUE;
    }

    // 获取菜单子节点
    private function get_node($arr) {
        $mod = DbModel::Init();
        foreach ($arr as &$val) {
            $rst = $mod->table('angent_menu')->get_list('*', array('pid' => $val['id']), -1, -1, array('order' => 'ASC', 'id' => 'ASC'));
            $val['node'] = $rst;
        }
        return $arr;
    }

// 删除菜单动作
    public function AjaxDelMenuAction() {
        $ids = empty($this->req['ids']) ? NULL : trim($this->req['ids']);
        $uid_arr = explode(',', $ids);
        $mod = DbModel::Init();
        $flag = 0;
        $flagc = 0;
        foreach ($uid_arr as $k => $v) {
            if ($this->checkorder($v)) {
                $rss = $mod->table('angent_menu')->del_data(array('id' => $v));
            } else {
                $flagc = 100;
                continue;
            }
        }
        if (!empty($rss)) {
            $flag = 1;
        } else {
            $flag = 0;
        }
        unset($k, $v);
        if ($flag == 1 && $flagc == 0) {
            self::OutMsg(array('ecode' => 200, 'emsg' => '删除成功'));
        } elseif ($flag == 1 && $flagc == 100) {
            self::OutMsg(array('ecode' => 202, 'emsg' => '含有子目录不能删除'));
        } elseif ($flag == 0) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '删除失败'));
        } else {
            self::OutMsg(array('ecode' => 204, 'emsg' => '部分删除失败'));
        }
        return 1;
    }

    // 检查能否删除
    private function checkorder($id) {
        $mod = DbModel::Init();
        $count = $mod->table('angent_menu')->get_count(array('pid' => $id));
        if ($count >= 1) {
            return false;
        }
        return true;
    }

    // 修改菜单
    public function SubMenuAction() {
        $id = isset($this->req['id']) ? trim($this->req['id']) : NULL;

        $mod = DbModel::Init();
        $ret = $mod->table('angent_menu')->get_list(array('id', 'name', 'show'), array('pid' => 0), -1, -1, array('order' => 'ASC', 'id' => 'ASC'));
        $ret2 = $mod->table('angent_menu')->get_one('*', array('id' => $id));
        $ret2['pre'] = $ret;
        self::OutMsg($ret2);
        return TRUE;
    }

    //更新菜单动作
    public function AjaxSubMenuAction() {
        $id = empty($this->req['id']) ? NULL : trim($this->req['id']);
        $m_name = empty($this->req['m_name']) ? NULL : trim($this->req['m_name']);
        $m_act = empty($this->req['m_act']) ? NULL : trim($this->req['m_act']);
        $m_href = empty($this->req['m_href']) ? '#' : trim($this->req['m_href']);
        $m_private = isset($this->req['m_private']) ? trim($this->req['m_private']) : 1;
        $m_pid = empty($this->req['m_pid']) ? 0 : trim($this->req['m_pid']);
        $m_show = empty($this->req['m_show']) ? 0 : trim($this->req['m_show']);
        $m_order = empty($this->req['m_order']) ? 1 : trim($this->req['m_order']);
        if (empty($m_name)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '名称不能为空'));
        }
        if (empty($m_act)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => '动作不能为空'));
        }
        $in_arr = array(
            'name' => $m_name,
            'action' => $m_act,
            'pid' => $m_pid,
            'href' => $m_href,
            'private' => $m_private,
            'show' => $m_show,
            'addtime' => time(),
            'adduser' => self::$session['uname'],
            'order' => $m_order,
        );
        $mod = DbModel::Init();
        if ($id > 0) {
            $ret = $mod->table('angent_menu')->up_data($in_arr, array('id' => $id));
        } else {
            $ret = $mod->table('angent_menu')->add_data($in_arr);
        }

        if ($ret) {
            self::OutMsg(array('ecode' => 200, 'emsg' => '操作成功'));
        } else {
            self::OutMsg(array('ecode' => 400, 'emsg' => '操作失败'));
        }
        return TRUE;
    }

    // 生成菜单
    public function WriteMenuAction() {
        $this->view->display('Agent/Menu/Write_Menu.html');
        return TRUE;
    }

    // 生成菜单动作
    public function AjaxWriteMenuAction() {
        $mod = DbModel::Init();
        $search_data = isset($this->req['search_angent']) ? trim($this->req['search_angent']) : NULL;
        if (!empty($search_data) && $search_data > 0) {
            $ret = $mod->table('angent_menu')->get_list('*', array('pid' => 0, 'name' => $search_data), -1, -1, array('order' => 'ASC', 'id' => 'ASC'));
        } else {
            $ret = $mod->table('angent_menu')->get_list('*', array('pid' => 0), -1, -1, array('order' => 'ASC', 'id' => 'ASC'));
        }
        $ret = $this->get_node($ret);
        $jret = json_encode($ret);
        $conf = '<?php' . "\r\n" . 'return array(' . "\r\n";
        $rets = array();
        foreach ($ret as $k => $v) {
            $conf .= '\'' . ucfirst(strtolower($v['action'])) . '\'=> array(' . "\r\n\t" . '\'Title\'=>\'' . $v['name'] . '\',' . "\r\n\t" . ' \'Prive\'=>\'' . $v['private'] . '\',' . "\r\n\t" . ' \'Show\'=>' . $v['show'] . ',' . "\r\n\t" . ' \'Href\'=>\'' . $v['href'] . '\',' . "\r\n\t" . '\'Actions\'=> array(' . "\r\n";
            $rets[] = array('id' => $v['id'], 'name' => $v['name']);
            foreach ($v['node'] as $nk => $nv) {
                $conf .= "\t\t\t\t" . '\'' . strtolower($nv['action']) . '\'=> array(\'Title\'=>\'' . $nv['name'] . '\', \'Prive\'=>\'' . $nv['private'] . '\', \'Show\'=>' . $nv['show'] . ', \'Href\'=>\'' . $nv['href'] . '\',),' . "\r\n";
            }
            $conf .= "\t\t\t\t" . '),' . "\r\n\t" . '),' . "\r\n\r\n";
        }
        $conf .= ');' . "\r\n";
        File::write(APP_PATH . 'Config' . DIS . 'AgentLeft.php', $conf, 102400, 'w');
        echo $jret;
        exit();
        return TRUE;
    }

}
