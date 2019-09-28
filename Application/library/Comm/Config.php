<?php

namespace Comm;

/**
 *  配置文件类
 * citybay@163.com
 */
Class Config {

    // 公共输出
    use \OutSend\Out;

    /**
     * 获取配置文件
     */
    public static function getConfig($filename = '') {
        try {
            static $config = array();
            if (!isset($config[$filename])) {
                $config[$filename] = self::configFile($filename);
            }
        } catch (\Exception $ex) {
            self::OutMsg(array('ecode' => 400, 'emsg' => 'Config Key Error'));
        }
        return $config[$filename];
    }

    /**
     * 检验配置文件是否存在
     */
    private static function configFile($filename) {
        $file = APP_PATH . 'config' . DIS . $filename . '.php';
        if (file_exists($file)) {
            return include $file;
        }
        return array();
    }

}
