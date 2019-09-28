<?php

/**
 *  版权所有禁止转载,违者必究
 *     Citybay@163.com
 *    软著持有人:Citybay
 * */
use DB\MysqlDBModel;
use DB\RedisDBModel;

final class DbModel extends MysqlDBModel {

// 公共输出
    use \OutSend\Out;

// TABLE    
    protected $_TABLE;

// Default DB    
    const DBLink = 'R00T_DB';

// Deny
    private function __clone() {
        
    }

// Deny
    private function __construct() {
        
    }

// Overwrite
    public static function Init($link = NULL) {
        if (!self::$_instance instanceof self) {
            self::$_instance = new self;
        }

        $dbLink = empty($link) ? self::DBLink : $link;
        self::DBLoad($dbLink);
        return self::$_instance;
    }

// 加载表模型
    public function table($table) {
        $this->_TABLE = trim($table);
        if (empty($this->_TABLE)) {
            self::OutMsg(array('ecode' => 400, 'emsg' => 'Init Model Error !'));
        }
        self::$Db->table($this->_TABLE);
        return $this;
    }

// count
    public function count($action = TRUE) {
        $key = NULL;
        if (self::$_cache) {
            $sqlc = self::$Db->count(false);
            $key = $this->_TABLE . '.' . md5($sqlc);
            if (RedisDBModel::$_RDS->exists($key)) {
                $c_ret = RedisDBModel::$_RDS->get($key, self::$cache_time);
                return json_decode($c_ret);
            }
        }
        $ret = self::$Db->count($action);
        if (self::$_cache && (!empty($key))) {
            RedisDBModel::$_RDS->set($key, json_encode($ret), self::$cache_time);
        }
        return $ret;
    }

    // first
    public function first($action = TRUE) {
        $key = NULL;
        if (self::$_cache) {
            $rsql = self::$Db->first(false);
            $key = $this->_TABLE . '.' . md5($rsql);
            if (RedisDBModel::$_RDS->exists($key)) {
                $c_ret = RedisDBModel::$_RDS->get($key, self::$cache_time);
                return json_decode($c_ret);
            }
        }
        $ret = self::$Db->first($action);
        if (self::$_cache && (!empty($key))) {
            RedisDBModel::$_RDS->set($key, json_encode($ret), self::$cache_time);
        }
        return $ret;
    }

// get
    public function get($action = TRUE) {
        $key = NULL;
        if (self::$_cache) {
            $rsql = self::$Db->get(false);
            $key = $this->_TABLE . '.' . md5($rsql);
            if (RedisDBModel::$_RDS->exists($key)) {
                $c_ret = RedisDBModel::$_RDS->get($key, self::$cache_time);
                return json_decode($c_ret);
            }
        }
        $ret = self::$Db->get($action);
        if (self::$_cache && (!empty($key))) {
            RedisDBModel::$_RDS->set($key, json_encode($ret), self::$cache_time);
        }
        return $ret;
    }

// page
    public function page($p = 1, $per = 10, $action = TRUE) {
        $key = NULL;
        if (self::$_cache) {
            $rsql = self::$Db->page($p, $per, false);
            $key = $this->_TABLE . '.' . md5($rsql);
            if (RedisDBModel::$_RDS->exists($key)) {
                $c_ret = RedisDBModel::$_RDS->get($key, self::$cache_time);
                return json_decode($c_ret);
            }
        }
        $ret = self::$Db->page($p, $per, $action);
        if (self::$_cache && (!empty($key))) {
            RedisDBModel::$_RDS->set($key, json_encode($ret), self::$cache_time);
        }
        return $ret;
    }

// where
    public function where($wh, $or = false) {
        self::$Db->where($wh, $or);
        return $this;
    }

// orwhere
    public function orwhere($wh, $or = false) {
        self::$Db->orwhere($wh, $or);
        return $this;
    }

// field
    public function select($data) {
        self::$Db->select($data);
        return $this;
    }

// union
    public function union($sql) {
        self::$Db->union($sql);
        return $this;
    }

// join
    public function join($tabe_alias, $on, $method = 'LEFT') {
        self::$Db->join($tabe_alias, $on, $method);
        return $this;
    }

// group
    public function group($gr) {
        self::$Db->group($gr);
        return $this;
    }

// having
    public function having($have, $or = false) {
        self::$Db->having($have, $or);
        return $this;
    }

// order
    public function order($ord) {
        self::$Db->order($ord);
        return $this;
    }

// limit
    public function limit($start = 0, $limit = 0) {
        self::$Db->limit($start, $limit);
        return $this;
    }

// update
    public function update($data, $action = TRUE) {
        $ret = self::$Db->update($data, $action);
        if (self::$_cache && $ret) {
            RedisDBModel::$_RDS->dellist($this->_TABLE . '*');
        }
        return $ret;
    }

// insert
    public function insert($data, $action = TRUE) {
        $ret = self::$Db->insert($data, $action);
        if (self::$_cache && $ret) {
            RedisDBModel::$_RDS->dellist($this->_TABLE . '*');
        }
        return $ret;
    }

// delete
    public function delete($action = TRUE) {
        $ret = self::$Db->delete($action);
        if (self::$_cache && $ret) {
            RedisDBModel::$_RDS->dellist($this->_TABLE . '*');
        }
        return $ret;
    }

// DSL SQL处理
    public function query($sql) {
        $key = NULL;
        if (self::$_cache) {
            $key = $this->_TABLE . '.' . md5($sql);
            if (RedisDBModel::$_RDS->exists($key)) {
                $c_ret = RedisDBModel::$_RDS->get($key, self::$cache_time);
                return json_decode($c_ret);
            }
        }
        $ret = self::$Db->query_sql($sql);
        if (self::$_cache && (!empty($key))) {
            RedisDBModel::$_RDS->set($key, json_encode($ret), self::$cache_time);
        }
        return $ret;
    }

// DML SQL处理
    public function exec($sql) {
        $ret = self::$Db->exec_sql($sql);
        if (self::$_cache && $ret) {
            RedisDBModel::$_RDS->dellist($this->_TABLE . '*');
        }
        return $ret;
    }

// 开始事务
    public function forupdate() {
        $ret = self::$Db->forupdate();
        return $ret;
    }

// 最后的SQL
    public function lastsql() {
        return self::$Db->_sql;
    }

// 开始事务
    public function start() {
        $ret = self::$Db->start();
        return $ret;
    }

// 提交事务
    public function commit() {
        $ret = self::$Db->commit();
        return $ret;
    }

// 回滚事务
    public function rollback() {
        $ret = self::$Db->rollback();
        return $ret;
    }

// 调试SQL
    public function debug() {
        self::$Db->debug();
        return $this;
    }

// 跟踪错误SQL
    public function trace() {
        self::$Db->trace();
        return $this;
    }

// 获得SQL 
    public function getsql() {
        self::$Db->getsql();
        return $this;
    }

// 记录SQL
    public function log() {
        self::$Db->withlog();
        return $this;
    }

}
