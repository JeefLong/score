<?php

namespace Comm;

use \Exception;

/**
 *              通信核心类
 *             @version 1.0
 *             @date 2015-10-24
 *             citybay@163.com
 *  @copyright 软著持有者 Citybay 禁止转载
 * 发送动作,POST全部采用多行表单,可以附带文件上传
 */
class File {

    // 读取文件
    Public Static function read($file, $len = 0) {
        try {
            $file = iconv('UTF-8', 'GB2312', $file);
            $fp = fopen($file, 'r');
            if (!empty($len)) {
                $ret = fread($fp, $len);
            } else {
                $ret = fgets($fp);
            }
            fclose($fp);
        } catch (Exception $e) {
            print_r($e);
        }
        return $ret;
    }

    // 写文件
    Public Static function write($file, $data, $len, $mode = 'a+') {
        try {
            $ret = 0;
            $fp = fopen($file, $mode);
            if (!empty($data)) {
                $ret = fwrite($fp, $data, $len);
                fclose($fp);
            }
        } catch (Exception $e) {
            print_r($e);
        }
        return $ret;
    }
}
