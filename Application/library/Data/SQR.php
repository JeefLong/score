<?php

namespace Data;

use \PDO;
use \Exception;

/**
 * PHP与SQL Server通信专用DAO层驱动
 *        单例模式运行,禁止继承
 * ------*** Citybay Copy Right ***------
 *        软著持有人Citybay禁止转载
 */
final class SQR {

    private static $iPDO = NULL;
    private static $_instance = NULL;
    protected $_where;
    protected $_order;
    protected $_table;

    private function __clone() {
        return TRUE;
    }

    private function __construct() {
        $this->_where = NULL;
        $this->_order = NULL;
        $this->_table = NULL;
        return TRUE;
    }

    public static function DBinit() {
        if (!self::$_instance instanceof self) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    public static function conn($connArr) {
        try {
            // self::$iPDO = new PDO('dblib:host='.$connArr['host'].';dbname='.$connArr['dbname'],$connArr['user'],$connArr['password']);
            self::$iPDO = new PDO('sqlsrv:Server=' . $connArr['host'] . ';Database=' . $connArr['dbname'], $connArr['user'], $connArr['password']);
        } catch (Exception $e) {
            echo date('Y-m-d H:i:s') . ' : DataBase CONNECTED ERROR!!! ' . "\r\n";
            exit(0);
        }
    }

    public function table($tb) {
        $this->_where = NULL;
        $this->_order = NULL;

        $this->_table = trim($tb);
        return $this;
    }

    public function where($wh) {
        if (!is_array($wh) || is_string($wh)) {
            if (!empty($this->_where)) {
                $this->_where .= ' AND ';
            }
            $this->_where .= self::$iPDO->quote(trim($wh));
            return $this;
        }
        foreach ($wh as $f => $w) {
            if (!empty($this->_where)) {
                $this->_where .= ' AND ';
            }
            if (preg_match('/[\s]+(or)[\s]+|[\s]+(and)[\s]+|[\s]+(drop)[\s]+|[\s]+(truncate)[\s]+|[\s]+(exec)[\s]+|[\s]+(execute)[\s]+|[\s]+(union)[\s]+|[\s]+(delete)[\s]+|[\s]+(--)[\s]+/i', $w)) {
                echo 'Condition Error !';
                exit(0);
            }
            preg_match('/(.+)\[(.*)\]/', $f, $act);
            if (!empty($act[0])) {
                $this->_where .= $act[1] . ' ' . $act[2] . ' ' . self::$iPDO->quote(trim($w));
            } else {
                $this->_where .= trim($f) . ' = ' . self::$iPDO->quote(trim($w));
            }
        }
        unset($f, $w);
        return $this;
    }

    public function order($ord) {
        if ((!is_array($ord)) || is_string($ord)) {
            $this->_order = ' ORDER BY ' . trim($ord);
        } elseif (is_array($ord) && count($ord) > 0) {
            $order = ' ORDER BY ';
            foreach ($ord as $k => $v) {
                $order .= ' ' . trim($k) . ' ' . trim($v) . ',';
            }
            unset($k, $v);
            $this->_order = rtrim($order, ',');
        }
        return $this;
    }

    public function update($data, $action = TRUE) {
        //绝对禁止无条件的更新
        if (empty($this->_where) || strlen($this->_where) < 3) {
            return 0;
        }
        if (!is_array($data) || is_string($data)) {
            $cond = trim($data);
        } else {
            $cond = NULL;
            foreach ($data as $k => $v) {
                $cond .= trim($k) . '= \'' . trim($v) . '\',';
            }
            unset($k, $v);
            $cond = rtrim($cond, ',');
        }
        $sql = 'UPDATE ' . $this->_table . ' SET ' . $cond . ' WHERE ' . $this->_where;
        if ($action) {
            return $this->exec($sql);
        }
        echo $sql;
        exit(0);
    }

    public function insert($data, $action = TRUE) {
        if (!is_array($data) || is_string($data) || empty($data)) {
            return 0;
        }

        foreach ($data as $k => $v) {
            if (isset($k)) {
                $key .= '`' . trim($k) . '`,';
                $val .= '\'' . trim($v) . '\',';
            }
        }
        unset($k, $v);
        $key = rtrim($key, ',');
        $val = rtrim($val, ',');
        $sql = 'INSERT INTO ' . $this->_table . ' (' . $key . ') VALUES (' . $val . ')';
        if ($action) {
            $ret = $this->exec($sql);
            return self::$iPDO->lastInsertId();
        }
        echo $sql;
        exit(0);
    }

    public function delete($action = TRUE) {
        //绝对禁止无条件的删除
        if (empty($this->_where)) {
            return 0;
        }
        $sql = 'DELETE FROM ' . $this->_table . ' WHERE ' . $this->_where;
        if ($action) {
            return $this->exec($sql);
        }
        echo $sql;
        exit(0);
    }

    public function select($data, $count = 1, $pg = 1, $action = TRUE) {
        if (empty($data)) {
            $sel = '*';
        } elseif ((!is_array($data)) || is_string($data)) {
            $sel = trim($data);
        } else {
            $cond = NULL;
            foreach ($data as $k => $v) {
                $cond .= trim($v) . ',';
            }
            unset($k, $v);
            $sel = rtrim($cond, ',');
        }
        $count = intval($count);
        $pg = intval($pg);
        if (empty($count) || $count < 1) {
            $count = 1;
        }
        if (empty($pg) || $pg < 1) {
            $pg = 1;
        }
        $order = empty($this->_order) ? 'ORDER BY id ASC' : $this->_order;
        $sql = 'SELECT TOP ' . $count . ' * FROM (SELECT ROW_NUMBER() OVER (' . $order . ') AS _SNo,' . $sel . ' FROM ' . $this->_table . ' WHERE ' . $this->_where . ') as A WHERE _SNo > ' . $count * ($pg - 1);
        if ($action) {
            $ret = $this->query($sql);
            if (empty($ret)) {
                // No Data Debug Here  !!
                if ($count == 1) {
                    return NULL;
                }
                return array();
            }
            $countd = $ret->rowCount();
            $rss = empty($countd) ? array(0) : $ret->fetchAll(PDO::FETCH_ASSOC);
            if ($count == 1) {
                return $rss[0];
            } else {
                return $rss;
            }
        }
        echo $sql;
        exit(0);
    }

    public function count($action = TRUE) {
        $sql = 'SELECT count(*) as _scount FROM ' . $this->_table . ' WHERE ' . $this->_where;
        if ($action) {
            $ret = $this->query($sql);
            if (empty($ret)) {
                // No Data !!
                return 0;
            }
            $countd = $ret->rowCount();
            $rss = empty($countd) ? array(0) : $ret->fetchAll(PDO::FETCH_ASSOC);
            return $rss[0]['_scount'];
        }
        echo $sql;
        exit(0);
    }

    public function query($sql) {
        try {
            self::$iPDO->query("SET NAMES 'GBK'");
            $ret = self::$iPDO->query($sql);
            //执行完毕清空条件
            $this->_where = NULL;
            $this->_order = NULL;
        } catch (Exception $e) {
            echo 'QUERY ERROR!!' . "\r\n";
            exit(0);
        }
        return $ret;
    }

    public function exec($sql) {
        try {
            self::$iPDO->exec("SET NAMES 'GBK'");
            $ret = self::$iPDO->exec($sql);
            //执行完毕清空条件
            $this->_where = NULL;
            $this->_order = NULL;
        } catch (Exception $e) {
            echo 'EXEC ERROR!!' . "\r\n";
            exit(0);
        }
        return $ret;
    }

    public function start() {
        try {
            self::$iPDO->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
            self::$iPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$iPDO->beginTransaction();
        } catch (Exception $e) {
            echo 'Trans Start Error!!' . "\r\n";
            exit(0);
        }
    }

    public function commit() {
        try {
            self::$iPDO->commit();
            self::$iPDO->setAttribute(PDO::ATTR_AUTOCOMMIT, 1);
        } catch (Exception $e) {
            echo 'Trans Commit Error!!' . "\r\n";
            exit(0);
        }
    }

    public function rollback() {
        try {
            self::$iPDO->rollback();
            self::$iPDO->setAttribute(PDO::ATTR_AUTOCOMMIT, 1);
        } catch (Exception $e) {
            echo 'Trans RollBack Error!!' . "\r\n";
            exit(0);
        }
    }

    /*
      public function __destruct() {
      self::$iPDO = NULL;
      self:: $_instance = NULL;
      $this->_where = NULL;
      $this->_order = NULL;
      $this->_table = NULL;
      }
     */
}

//end class
