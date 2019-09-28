<?php
namespace Comm;
/*
 * 数据库为mysql，
 * 数据库名为session，表名为session，
 * 表中字段包括PHPSESSID,update_time,client_ip,data
 */

Class Session {

    private static $handler = NULL;
    private static $ip = NULL;
    private static $lifetime = NULL;
    private static $time = NULL;

    //配置静态变量
    private static function init($handler) {
        self::$handler = $handler;    //获取数据库资源
        self::$ip = !empty($_SERVER["REMOTE_ADDR"]) ? $_SERVER["REMOTE_ADDR"] : 'unkonw';    //获取客户端ip
        self::$lifetime = ini_get('session.gc_maxlifetime');    //获取session生命周期
        self::$time = time();    //获取当前时间
    }

    //调用session_set_save_handler()函数并开启session
    static function start($pdo) {
        self::init($pdo);
        session_set_save_handler(
                array(__CLASS__, 'open'),
                array(__CLASS__, 'close'), 
                array(__CLASS__, 'read'), 
                array(__CLASS__, 'write'), 
                array(__CLASS__, 'destroy'),
                array(__CLASS__, 'gc')
        );
        //session_start();
    }

    public static function open($path, $name) {
        return true;
    }

    public static function close() {
        return true;
    }

    //查询数据库中的数据
    public static function read($PHPSESSID) {
        $sql = "select PHPSESSID,update_time,client_ip,data from `sys_session` where PHPSESSID=?";
        $stmt = self::$handler->prepare($sql);
        $stmt->execute(array($PHPSESSID));
        if (!$result = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            return '';
        }
        if (self::$ip == $result['client_ip']) {
            self::destroy($PHPSESSID);
            return '';
        }
        if (($result['update_time'] + self::$lifetime) < self::$time) {
            self::destroy($PHPSESSID);
            return '';
        }
        return $result['data'];
    }

    /*
     * 首先查询该session是否存在数据，如果存在，则更新数据，如果不存在，则插入数据
     */

    //将session写入数据库中，$data传入session中的keys和values数组
    public static function write($PHPSESSID, $data) {
        $sql = "SELECT `PHPSESSID`,`update_time`,`client_ip`,`data` FROM `sys_session` WHERE `PHPSESSID` = ?";
        $stmt = self::$handler->prepare($sql);
        $stmt->execute(array($PHPSESSID));

        if ($result = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            if ($result['data'] != $data || self::$time > ($result['update_time'] + 30)) {
                $sql = "UPDATE `sys_session` SET `update_time` = ?, `data`=? where `PHPSESSID` = ?";
                $stmt = self::$handler->prepare($sql);
                $stmt->execute(array($self::$time, $data, $PHPSESSID));
            }
        } else {
            if (!empty($data)) {
                try {
                    $sql = "INSERT INTO `sys_session` (`PHPSESSID`,`update_time`,`client_ip`,`data`) VALUES (?,?,?,?)";
                } catch (\PDOException $e) {
                    echo $e->getMessage();
                }
                $sth = self::$handler->prepare($sql);
                $sth->execute(array($PHPSESSID, self::$time, self::$ip, $data));
            }
        }
        return true;
    }

    public static function destroy($PHPSESSID) {
        $sql = "DELETE FROM `sys_session` WHERE `PHPSESSID` = ?";
        $stmt = self::$handler->prepare($sql);
        $stmt->execute(array($PHPSESSID));
        return true;
    }

    public static function gc($lifetime) {
        $sql = "DELETE FROM `sys_session` WHERE `update_time`<?";
        $stmt = self::$handler->prepare($sql);
        $stmt->execute(array(self::$time - $lifetime));
        return true;
    }

}


