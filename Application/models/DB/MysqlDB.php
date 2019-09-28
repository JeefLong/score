<?php

namespace DB;

/**
 *  版权所有禁止转载,违者必究
 *     Citybay@163.com
 *    软著持有人:Citybay
 * */
use Comm\Config;
use Data\MySql;
use DB\RedisDBModel;

Abstract class MysqlDBModel {

// 公共输出
    use \OutSend\Out;

//在基类中定义默认操作的数据库配置
    const DBConf = 'DBconfig';

//缓存开关
    protected static $_cache;
// 缓存时间
    public static $cache_time;
//缓存配置项目
    protected static $c_conf;
//全局静态配置
    protected static $configArr;
//全局静态库
    public static $Db;
//全局句柄    
    protected static $_instance;

    /**
     * 注意抽象类的构造,父类构造要显示的被调用才能生效
     * */
    // Deny
    private function __clone() {
        
    }

    // Deny
    private function __construct() {
        
    }

    public static abstract function Init();

    // Deny
    public static function DBLoad($link) {
        try {

//读取数据源全局配置
            self::$configArr = Config::getConfig(self::DBConf);

//初始化数据驱动
            self::$Db = MySql::DBinit();

//打开数据库,返回一个全局可用的句柄,自动捕获
            self::$Db::conn(self::$configArr[$link]);

//打开缓存
            self::$_cache = self::$configArr[$link]['iscache'];

            if (self::$_cache) {
                // 配置缓存
                self::$c_conf = self::$configArr[$link]['cache_conf'];
                // 设置时间
                self::$cache_time = self::$configArr[$link]['cache_time'];
                RedisDBModel::start(self::$c_conf);
            }
        } catch (\Exception $ex) {
            //print_r($ex);
            self::OutMsg(array('ecode' => 400, 'emsg' => 'DB Init Error'));
        }
        return 1;
    }

}
