<?php

namespace Data;

use \Redis;

/**
  /*
 * 纯静态的Redis操作CLASS，通过类名调用
 * 保证在while期间不会生成新对象，防止吃空内存
 * ------*** Citybay Copy Right ***------
 *        软著持有人Citybay禁止转载
 */
Class RDS {

    // 公共输出
    use \OutSend\Out;

    private static $redis;
    private $host;
    private $port;
    private $db;
    private $pass;
    private $timeout;
///////  单例区域 ////////////
    public static $_instance;

    private function __clone() {
        
    }

    private function __construct() {
        
    }

    public static function RDinit() {
        if (!self::$_instance instanceof self) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }

////////////////////////////
//////////  正常区域/////////
//    public function __construct() {
//        //self::$_instance = NULL;
//        self::$redis = NULL;
//        $this->host = NULL;
//        $this->port = NULL;
//        $this->db = NULL;
//        $this->timeout = NULL;
//    }
////////////////////////////


    public function conn($config) {
        $this->host = $config['host'];
        $this->port = intval($config['port']);
        $this->db = intval($config['db_num']);
        $this->pass = $config['password'];
        $this->timeout = intval($config['timeout']);
        if (!class_exists('Redis')) {
            self::OutMsg(array('ecode' => 400, 'emsg' => 'Cache Load Failed'));
        }
        try {
            self::$redis = new Redis();
            $res = self::$redis->connect($this->host, $this->port, $this->timeout);
            self::$redis->auth($this->pass);
            self::$redis->select($this->db);
            if (TRUE != $res) {
                self::OutMsg(array('ecode' => 400, 'emsg' => 'Cache Auth Failed'));
            }
        } catch (Exception $e) {
            // print_r($e);
            self::OutMsg(array('ecode' => 400, 'emsg' => 'Cache Connected Failed'));
        }
    }

    public function set($key_name, $value, $second = 0) {
        if (is_null(self::$redis)) {
            return FALSE;
        }
        if ($second) {
            self::$redis->setex($key_name, $second, $value);
            return TRUE;
        }
        self::$redis->set($key_name, $value);
        return TRUE;
    }

    public function exists($key_name) {
        if (is_null(self::$redis)) {
            return FALSE;
        }
        return self::$redis->exists($key_name);
    }

    public function get($key_name) {
        if (is_null(self::$redis)) {
            return FALSE;
        }
        return self::$redis->get($key_name);
    }

    public function incr($key_name) {
        if (is_null(self::$redis)) {
            return FALSE;
        }
        self::$redis->incr($key_name);
        return TRUE;
    }

    public function del($key_name) {
        if (is_null(self::$redis)) {
            return FALSE;
        }
        self::$redis->del($key_name);
        return TRUE;
    }

    public function lpush($key_name, $value, $second = 0) {
        if (is_null(self::$redis)) {
            return FALSE;
        }
        self::$redis->lPush($key_name, $value);
        return TRUE;
    }

    public function rpush($key_name, $value, $second = 0) {
        if (is_null(self::$redis)) {
            return FALSE;
        }
        self::$redis->rPush($key_name, $value);
        return TRUE;
    }

    public function lpop($key_name = NULL) {
        if (is_null(self::$redis)) {
            return FALSE;
        }
        return self::$redis->lPop($key_name);
    }

    public function rpop($key_name = NULL) {
        if (is_null(self::$redis)) {
            return FALSE;
        }
        return self::$redis->rPop($key_name);
    }

    public function flushdb() {
        if (is_null(self::$redis)) {
            return FALSE;
        }
        self::$redis->flushDB();
    }

    public function getkeys($key_name = NULL) {
        if (is_null(self::$redis)) {
            return FALSE;
        }
        return self::$redis->keys($key_name);
    }

    public function getlists($key_name = NULL) {
        $ret = $this->getkeys($key_name);
        if (!is_array($ret) || is_null(self::$redis)) {
            return FALSE;
        }
        $retr = array();
        foreach ($ret as $k => $v) {
            $retr[] = self::$redis->get($v);
        }
        unset($k, $v);
        return $retr;
    }

    public function dellist($key_name) {
        $ret = $this->getkeys($key_name);
        if (!is_array($ret) || is_null(self::$redis)) {
            return FALSE;
        }
        foreach ($ret as $k => $v) {
            $this->del($v);
        }
        unset($k, $v);
    }

    /*
      public function __destruct() {
      self::$redis = NULL;
      $this->host = NULL;
      $this->port = NULL;
      $this->db = NULL;
      $this->timeout = NULL;
      return NULL;
      }
     */
}
