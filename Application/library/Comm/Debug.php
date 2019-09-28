<?php

namespace Comm;

/**
 *              Debug核心类
 *             @version 1.0
 *             @date 2015-10-24
 *             citybay@163.com
 * @copyright 软著持有者 Citybay 禁止转载
 */
class Debug {

    // 文件debug日志
    public static function log($data, $file = NULL) {
        $file = empty($file) ? ROOT . 'Debug' . DIS . 'deblog-' . date('Ymd') . '.log' : ROOT . 'debug/' . $file . '.log';
        //$file = iconv('UTF-8', 'GB2312', $file);
        $fp = fopen($file, 'a+');
        fwrite($fp, '【DEBUG】' . date('Y-m-d H:i:s') . ' :' . $data . "\r\n\r\n");
        fclose($fp);
    }

}
