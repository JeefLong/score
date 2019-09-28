<?php

namespace Data;

use \PDO;
use \Exception;

/**
 * PHP与Mysql Server通信专用DAO层驱动
 *        单例模式运行,禁止继承
 * ------*** Citybay Copy Right ***------
 *        软著持有人Citybay禁止转载
 */
FINAL CLASS MySql {

    // 公共输出
    use \OutSend\Out;

    // 如果给成员默认值,那么必须是确定的数值,不能是变量或函数,这是编译阶段给出的确定值
    private static $_instance = NULL;
    private static $iPDO = NULL;
    private $_outsql = FALSE;
    public $_sql = NULL;
    private $_table = NULL;
    private $_field = '*';
    private $_union = NULL;
    private $_where = NULL;
    private $_join = NULL;
    private $_group = NULL;
    private $_order = NULL;
    private $_have = NULL;
    private $_limit = NULL;
    private $_forupdate = NULL;
    private $_debug = FALSE;
    private $_trace = FALSE;
    private $_log = FALSE;

    // Deny
    private function __clone() {
        
    }

    // Deny
    private function __construct() {
        
    }

    public static function DBinit() {
        if (!self::$_instance instanceof self) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    static public function conn($connArr) {
        try {
            if (!self::$iPDO instanceof PDO) {
                self::$iPDO = new PDO('mysql:host=' . $connArr['host'] . ';port=' . $connArr['port'] . ';dbname=' . $connArr['dbname'], $connArr['user'], $connArr['password']);
            }
        } catch (Exception $e) {
            self::OutMsg(array('ecode' => 100, 'emsg' => 'Data Connection Pool Down !'));
        }
        return 1;
    }

    public function table($table, $init = TRUE) {
        // Init here !!!!!
        $this->_Init(FALSE);
        $this->_table = $table;
        return self::$_instance;
    }

    private static function chkperm($w) {
        $patten = array(
            0 => ' or ',
            1 => ' and ',
            2 => ' drop ',
            3 => ' truncate ',
            4 => ' exec ',
            5 => ' execute ',
            6 => ' union ',
            7 => ' delete ',
            8 => ' || ',
            9 => ' -- ',
            10 => ' ++ ',
        );
        foreach ($patten as $k => $v) {
            if (strpos(strtolower($w), $v)) {
                self::OutMsg(array('ecode' => 404, 'emsg' => 'DAO Access Deny !'));
            }
        }
        unset($k, $v);
        return TRUE;
    }

    private static function deal($keys, $vals) {
        $deal = NULL;
        // 组装OR
        if (is_array($vals)) {
            $i = 0;
            foreach ($vals as $vkey => $vval) {
                $i++;
                if ($i > 1) {
                    $deal .= ' OR  ';
                }
                self::chkperm($vval);
                if (preg_match('/\[(.+)\]/', $vkey, $sig)) {
                    $deal .= ' ' . $keys . ' ' . $sig[1] . ' ' . self::$iPDO->quote($vval) . ' ';
                } else {
                    $deal .= ' ' . $keys . ' = ' . self::$iPDO->quote($vval) . ' ';
                }
            }
            unset($vkey, $vval, $i);
        }
        // 组装and的不等式
        elseif (!is_array($vals) && preg_match('/(.+)\[(.+)\]/', $keys, $act)) {
            self::chkperm($vals);
            if (strtolower($act[2]) == 'in' || strtolower($act[2]) == 'not in') {
                $deal .= ' ' . $act[1] . ' ' . $act[2] . ' (' . self::$iPDO->quote($vals) . ') ';
            } else {
                $deal .= ' ' . $act[1] . ' ' . $act[2] . ' ' . self::$iPDO->quote($vals) . ' ';
            }
        }
        // 组装等式
        else {
            self::chkperm($vals);
            $deal .= ' ' . $keys . ' = ' . self::$iPDO->quote($vals) . ' ';
        }
        return $deal;
    }

    public function count($action = TRUE) {
        $this->_sql = 'SELECT count(*) as _scount FROM ' . $this->_table . $this->_union . $this->_join . $this->_where . $this->_group;
        if (!$action || $this->_outsql) {
            return $this->_sql;
        }
        $ret = $this->query();
        if (empty($ret)) {
            return 0;
        }
        $countd = $ret->rowCount();
        $rss = empty($countd) ? array(array('_scount' => 0)) : $ret->fetchAll(PDO::FETCH_ASSOC);
        return $rss[0]['_scount'];
    }

    public function get($action = TRUE) {
        $this->_sql = ' ( SELECT ' . $this->_field . ' FROM ' . $this->_table . $this->_union . $this->_join . $this->_where . $this->_group . $this->_have . $this->_order . $this->_limit . $this->_forupdate . ' ) ';
        if ((!$action) || $this->_outsql) {
            return $this->_sql;
        }
        $ret = $this->query();
        if (empty($ret)) {
            return array();
        }
        $count = $ret->rowCount();
        $rss = empty($count) ? array() : $ret->fetchAll(PDO::FETCH_ASSOC);
        return $rss;
    }

    public function first($action = TRUE) {
        $this->_sql = ' ( SELECT ' . $this->_field . ' FROM ' . $this->_table . $this->_union . $this->_join . $this->_where . $this->_group . $this->_have . $this->_order . ' LIMIT 0, 1 ' . $this->_forupdate . ' ) ';
        if ((!$action) || $this->_outsql) {
            return $this->_sql;
        }
        $ret = $this->query();
        if (empty($ret)) {
            return NULL;
        }
        $count = $ret->rowCount();
        $rss = empty($count) ? array() : $ret->fetchAll(PDO::FETCH_ASSOC);
        return empty($rss[0]) ? NULL : $rss[0];
    }

    public function page($p = 1, $per = 10, $action = TRUE) {
        $sig = ($p - 1) * $per;
        $this->_limit = ' LIMIT ' . intval($sig) . ', ' . intval($per) . ' ';
        $this->_sql = ' ( SELECT ' . $this->_field . ' FROM ' . $this->_table . $this->_union . $this->_join . $this->_where . $this->_group . $this->_have . $this->_order . $this->_limit . $this->_forupdate . ' ) ';
        if ((!$action) || $this->_outsql) {
            return $this->_sql;
        }
        $ret = $this->query();
        $pret = array('data' => array(), 'totle' => 0);
        if (empty($ret)) {
            return $pret;
        }
        $count = $ret->rowCount();
        $data = empty($count) ? array() : $ret->fetchAll(PDO::FETCH_ASSOC);
        $totle = $this->count(TRUE);
        $pret['data'] = $data;
        $pret['totle'] = $totle;
        $pret['per'] = $per;
        $pret['page'] = $p;
        return $pret;
    }

    public function select($data) {
        if (empty($data)) {
            $this->_field = '*';
        } elseif ((!is_array($data)) || is_string($data)) {
            self::chkperm($data);
            $this->_field = $data;
        } else {
            $cond = NULL;
            foreach ($data as $k => $v) {
                self::chkperm($v);
                $cond .= ' `' . $v . '`,';
            }
            unset($k, $v);
            $this->_field = rtrim($cond, ',');
        }
        return self::$_instance;
    }

    public function where($wh, $or = false) {
        $this->_where .= empty($this->_where) ? ' WHERE ' : ' AND ';
        if (!is_array($wh) || is_string($wh)) {
            $this->_where .= ' ' . $wh . ' ';
            return self::$_instance;
        }
        $i = 0;
        foreach ($wh as $f => $w) {
            $i++;
            if ($i == 1) {
                $this->_where .= ' ( ';
            }
            // AND
            if ($i > 1) {
                $this->_where .= ($or) ? ' OR ' : ' AND ';
            }
            if (!is_array($w)) {
                $this->_where .= self::deal($f, $w);
            }
            //OR
            if (is_array($w)) {
                $this->_where .= ' ( ';
                $this->_where .= self::deal($f, $w);
                $this->_where .= ' ) ';
            }
        }
        $this->_where .= ' ) ';
        unset($f, $w, $i);
        return self::$_instance;
    }

    public function orwhere($wh, $or = false) {
        $this->_where .= empty($this->_where) ? ' WHERE ' : ' OR ';
        if (!is_array($wh) || is_string($wh)) {
            $this->_where .= ' ' . $wh . ' ';
            return self::$_instance;
        }
        $i = 0;
        foreach ($wh as $f => $w) {
            $i++;
            if ($i == 1) {
                $this->_where .= ' ( ';
            }
            // AND
            if ($i > 1) {
                $this->_where .= ($or) ? ' OR ' : ' AND ';
            }
            if (!is_array($w)) {
                $this->_where .= self::deal($f, $w);
            }
            //OR
            if (is_array($w)) {
                $this->_where .= ' ( ';
                $this->_where .= self::deal($f, $w);
                $this->_where .= ' ) ';
            }
        }
        $this->_where .= ' ) ';
        unset($f, $w, $i);
        return self::$_instance;
    }

    public function union($sql) {
        $this->_union .= ' UNION ' . $sql . ' ';
        return self::$_instance;
    }

    public function unionall($sql) {
        $this->_union .= ' UNION ALL' . $sql . ' ';
        return self::$_instance;
    }

    public function join($tabe_alias, $on, $method = 'INNER') {
        $this->_join .= ' ' . $method . ' JOIN ' . $tabe_alias . ' ON ' . $on . ' ';
        return self::$_instance;
    }

    public function group($gr) {
        $this->_group .= empty($this->_group) ? ' GROUP BY ' : ' , ';
        if (!is_array($gr) || is_string($gr)) {
            $this->_group .= ' ' . $gr . ' ';
            return self::$_instance;
        }
        $grs = NULL;
        foreach ($gr as $f => $w) {
            $grs .= $w . ' , ';
        }
        unset($f, $w);
        $grs = rtrim($grs, ' , ');
        $this->_group .= $grs;
        return self::$_instance;
    }

    public function having($have, $or = false) {
        $this->_have .= empty($this->_have) ? ' HAVING ' : ' AND ';
        if (!is_array($have) || is_string($have)) {
            $this->_have .= ' ' . $have . ' ';
            return self::$_instance;
        }
        $i = 0;
        foreach ($have as $f => $w) {
            $i++;
            if ($i == 1) {
                $this->_have .= ' ( ';
            }
            // AND
            if ($i > 1) {
                $this->_have .= ($or) ? ' OR ' : ' AND ';
            }
            if (!is_array($w)) {
                $this->_have .= self::deal($f, $w);
            }
            //OR
            if (is_array($w)) {
                $this->_have .= ' ( ';
                $this->_have .= self::deal($f, $w);
                $this->_have .= ' ) ';
            }
        }
        $this->_have .= ' ) ';
        unset($f, $w, $i);
        return self::$_instance;
    }

    public function order($ord) {
        $this->_order .= empty($this->_order) ? ' ORDER BY ' : ' , ';
        if ((!is_array($ord)) || is_string($ord)) {
            $this->_order .= ' ' . $ord . ' ';
            return self::$_instance;
        }
        $ods = NULL;
        foreach ($ord as $k => $v) {
            $ods .= ' `' . $k . '` ' . $v . ' ,';
        }
        unset($k, $v);
        $this->_order .= rtrim($ods, ',');
        return self::$_instance;
    }

    public function limit($start = 0, $limit = 0) {
        if (($start < 1) && ($limit < 1)) {
            $this->_limit = ' LIMIT 1 ';
        } elseif ($start == -1 && $limit = -1) {
            $this->_limit = NULL;
        } else if (($start > 0) && ($limit == 0)) {
            $this->_limit = ' LIMIT 0 , ' . intval($start) . ' ';
        } else {
            $this->_limit = ' LIMIT ' . intval($start) . ', ' . intval($limit) . ' ';
        }
        return self::$_instance;
    }

    public function update($data, $action = TRUE) {
        if (empty($this->_where) || strlen($this->_where) < 2) {
            return 0;
        }
        $cond = NULL;
        if (!is_array($data) || is_string($data)) {
            $cond = $data;
        } else {
            foreach ($data as $k => $v) {
                if (is_null($v)) {
                    $vl = 'NULL';
                } else {
                    $vl = '\'' . $v . '\'';
                }
                $cond .= '`' . $k . '`= ' . $vl . ',';
            }
            unset($k, $v);
            $cond = rtrim($cond, ',');
        }
        $this->_sql = 'UPDATE `' . $this->_table . '` SET ' . $cond . $this->_where;
        if (!$action || $this->_outsql) {
            return $this->_sql;
        }
        return $this->exec();
    }

    public function insert($data, $action = TRUE) {
        if (!is_array($data) || is_string($data)) {
            return 0;
        }
        $key = NULL;
        $val = NULL;
        foreach ($data as $k => $v) {
            if (isset($k)) {
                $key .= '`' . $k . '`,';
                $val .= '\'' . $v . '\',';
            }
        }
        unset($k, $v);
        $key = rtrim($key, ',');
        $val = rtrim($val, ',');
        $this->_sql = 'INSERT INTO `' . $this->_table . '` (' . $key . ') VALUES (' . $val . ')';
        if (!$action || $this->_outsql) {
            return $this->_sql;
        }
        $this->exec();
        return self::$iPDO->lastInsertId();
    }

    public function delete($action = TRUE) {
        if (empty($this->_where) || strlen($this->_where) < 3) {
            return 0;
        }
        $this->_sql = 'DELETE FROM `' . $this->_table . '`' . $this->_where;
        if (!$action || $this->_outsql) {
            return $this->_sql;
        }
        return $this->exec();
    }

    public function forupdate($type = 1) {
        if (1 == $type) {
            $this->_forupdate = ' FOR UPDATE ';
        } else {
            $this->_forupdate = ' LOCK IN SHARE MODE ';
        }
        return self::$_instance;
    }

    private function query() {
        try {
            if ($this->_log) {
                $this->write($this->_sql);
            }
            if ($this->_debug) {
                echo "\r\n" . $this->_sql . "\r\n\r\n";
                exit(0);
            }
            self::$iPDO->query('SET NAMES \'UTF8MB4\'');
            self::$iPDO->query('SET TIME_ZONE = \'+8:00\'');
            $ret = self::$iPDO->query($this->_sql);
            if (self::$iPDO->errorCode() != '00000') {
                if ($this->_trace) {
                    echo "\r\n";
                    print_r(self::$iPDO->errorInfo());
                    echo "\r\n" . $this->_sql . "\r\n";
                }
                echo $this->_sql;
                die();
                self::OutMsg(array('ecode' => 720, 'emsg' => 'DAO QUERY ACTION ERROR'));
            }
        } catch (Exception $e) {
            if ($this->_trace) {
                echo "\r\n";
                print_r($e);
                echo "\r\n" . $this->_sql . "\r\n";
            }
            self::OutMsg(array('ecode' => 721, 'emsg' => 'DAO QUERY ACTION DENY'));
        }
        return $ret;
    }

    private function exec() {
        try {
            if ($this->_log) {
                $this->write($this->_sql);
            }
            if ($this->_debug) {
                echo "\r\n" . $this->_sql . "\r\n\r\n";
                exit(0);
            }
            self::$iPDO->exec('SET NAMES \'UTF8MB4\'');
            self::$iPDO->query('SET TIME_ZONE = \'+8:00\'');
            $ret = self::$iPDO->exec($this->_sql);
            if (self::$iPDO->errorCode() != '00000') {
                if ($this->_trace) {
                    echo "\r\n";
                    print_r(self::$iPDO->errorInfo());
                    echo "\r\n" . $this->_sql . "\r\n";
                }
                self::OutMsg(array('ecode' => 820, 'emsg' => 'DAO EXEC ACTION ERROR'));
            }
        } catch (Exception $e) {
            if ($this->_trace) {
                echo "\r\n";
                print_r($e);
                echo "\r\n" . $this->_sql . "\r\n";
            }
            self::OutMsg(array('ecode' => 821, 'emsg' => 'DAO EXEC ACTION DENY'));
        }
        return $ret;
    }

    public function exec_sql($sql) {
        $this->_sql = $sql;
        $ret = $this->exec();
        return $ret;
    }

    public function query_sql($sql) {
        $this->_sql = $sql;
        $ret = $this->query();
        if (empty($ret)) {
            return array();
        }
        $count = $ret->rowCount();
        $rss = empty($count) ? array() : $ret->fetchAll(\PDO::FETCH_ASSOC);
        return $rss;
    }

    public function getsql() {
        $this->_outsql = TRUE;
        return self::$_instance;
    }

    public function start() {
        try {
            self::$iPDO->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
            self::$iPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$iPDO->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
            self::$iPDO->beginTransaction();
        } catch (Exception $e) {
            if ($this->_trace) {
                print_r($e);
            }
            self::OutMsg(array('ecode' => 701, 'emsg' => 'DAO TRANS START ERROR'));
        }
        return 1;
    }

    public function commit() {
        try {
            self::$iPDO->commit();
            self::$iPDO->setAttribute(PDO::ATTR_AUTOCOMMIT, 1);
        } catch (Exception $e) {
            if ($this->_trace) {
                print_r($e);
            }
            self::OutMsg(array('ecode' => 702, 'emsg' => 'DAO TRANS COMMIT ERROR'));
        }
        return 1;
    }

    public function rollback() {
        try {
            self::$iPDO->rollback();
            self::$iPDO->setAttribute(PDO::ATTR_AUTOCOMMIT, 1);
        } catch (Exception $e) {
            if ($this->_trace) {
                print_r($e);
            }
            self::OutMsg(array('ecode' => 703, 'emsg' => 'DAO TRANS ROLL ERROR'));
        }
        return 1;
    }

    public function debug() {
        $this->_debug = TRUE;
        return self::$_instance;
    }

    public function trace() {
        $this->_trace = TRUE;
        return self::$_instance;
    }

    public function withlog() {
        $this->_log = TRUE;
        return self::$_instance;
    }

    private function write($data) {
        try {
            $fp = fopen('./DBLog_' . date('Y-m-d') . '.log', 'a') or die(json_encode(array('ecode' => 901, 'emsg' => 'Log File Error')));
            fwrite($fp, '[' . date('H:i:s') . '] : ' . $data . "\r\n\r\n") or die(json_encode(array('ecode' => 902, 'emsg' => 'Log Module Fail')));
            fclose($fp);
        } catch (Exception $e) {
            if ($this->_trace) {
                print_r($e);
            }
            self::OutMsg(array('ecode' => 903, 'emsg' => 'Log Module Error'));
        }
    }

    public function _Init($sig = FALSE) {
        if ($sig) {
            self::$iPDO = NULL;
        }
        $this->_outsql = FALSE;
        $this->_sql = NULL;
        $this->_table = NULL;
        $this->_field = '*';
        $this->_union = NULL;
        $this->_where = NULL;
        $this->_join = NULL;
        $this->_group = NULL;
        $this->_order = NULL;
        $this->_have = NULL;
        $this->_limit = NULL;
        $this->_forupdate = NULL;
        $this->_debug = FALSE;
        $this->_trace = FALSE;
        $this->_log = FALSE;
    }

    public function __destruct() {
        $this->_outsql = NULL;
        $this->_sql = NULL;
        $this->_table = NULL;
        $this->_field = NULL;
        $this->_union = NULL;
        $this->_where = NULL;
        $this->_join = NULL;
        $this->_group = NULL;
        $this->_order = NULL;
        $this->_have = NULL;
        $this->_limit = NULL;
        $this->_forupdate = NULL;
        $this->_debug = NULL;
        $this->_trace = NULL;
        $this->_log = NULL;
    }

}

//End Class
