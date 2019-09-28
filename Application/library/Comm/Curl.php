<?php

namespace Comm;

set_time_limit(0);

use \Exception;

/**
 *              通信核心类
 *             @version 1.0
 *             @date 2015-10-24
 *             citybay@163.com
 *  @copyright 软著持有者 Citybay 禁止转载
 * 发送动作,POST全部采用多行表单,可以附带文件上传
 */
class Curl {

    // 公共输出
    use \OutSend\Out;

    // 秘钥文件
    private static $key;
    // 公共证书
    private static $crt;
    //单向证书
    private static $car;

    // 万能方法
    public static function send($url, $method = 'GET', $data_arr = NULL, $file_arr = NULL, $ctime = 20, $xtime = 10, $header_arr = NULL) {
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);   // http请求的基础版本
            curl_setopt($ch, CURLOPT_FAILONERROR, false);      // 是否显示HTTP状态码,默认是忽略编号小于等于400的HTTP信息
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    // 是否将结果作为curl调用结束的返回值,否则是打印返回的是true or false
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);    // 是否跟踪重定向到 Location指示的地址
            curl_setopt($ch, CURLOPT_HEADER, true);            // 返回的数据中是否包含头信息
            //curl_setopt($ch, CURLOPT_NOBODY, true);          // 开启后只返回头部,不接受内容
            // 链接超时时间
            if ($ctime) {
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $ctime);
            }

            // 最大执行时间
            if ($xtime) {
                curl_setopt($ch, CURLOPT_TIMEOUT, $xtime);
            }

            // 附加http头信息
            if (!empty($header_arr) && is_array($header_arr)) {
                curl_setopt($ch, CURLOPT_HTTPHEADER, $header_arr);
            }

            // 设置代理如果有的话
            //curl_setopt($ch,CURLOPT_PROXY, '10.206.30.98');
            //curl_setopt($ch,CURLOPT_PROXYPORT, 8080);

            if (strtolower(substr($url, 0, 5)) == 'https') {
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);


                if (!empty(self::$crt)) {
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

                    curl_setopt($ch, CURLOPT_SSLCERTTYPE, 'PEM');
                    curl_setopt($ch, CURLOPT_SSLCERT, self::$crt);
                    //curl_setopt($ch, CURLOPT_SSLCERTPASSWD,'159263');
                }

                if (!empty(self::$key)) {
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

                    curl_setopt($ch, CURLOPT_SSLKEYTYPE, 'PEM');
                    curl_setopt($ch, CURLOPT_SSLKEY, self::$key);
                    //curl_setopt($ch, CURLOPT_SSLKEYPASSWD,'159263');
                }

                // 根证书认证
                if (!empty(self::$car)) {

                    // 要求服务端验证客户端使用的证书的有效性
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

                    // 1 验证证书里面的主机名, 2 主机名必须与当前一致
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

                    // CURLOPT_CAINFO 一个保存着1个或多个用来让服务端验证的证书的文件名
                    // 这个参数仅仅在和 CURLOPT_SSL_VERIFYPEER 一起使用时才有意义
                    curl_setopt($ch, CURLOPT_CAINFO, self::$car);
                }
            }
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

            // 上传设置
            $fi = new \finfo(FILEINFO_MIME_TYPE);
            if (is_array($file_arr)) {
                foreach ($file_arr as $file_k => $file_v) {
                    //$file_v = iconv('UTF-8', 'GB2312', $file_v);
                    if (file_exists($file_v)) {
                        $mime_type = $fi->file($file_v);
                        $cfile = new \CURLFile($file_v, $mime_type, basename($file_v));
                        $data_arr[$file_k] = $cfile;
                    }
                }
                unset($file_k, $file_v);
            }
            //如果是GET将数据追加到GET的URL
            if (strtolower($method) == 'get') {
                if (!empty($data_arr) && is_array($data_arr)) {
                    $url .= (strpos($url, '?') === false ? '?' : '&') . http_build_query($data_arr);
                }
            } else {
                // 提交数据POST或者PUT或DELETE等
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data_arr);
            }

            // 请求的地址
            curl_setopt($ch, CURLOPT_URL, $url);

            // 执行并获取响应信息
            $response = curl_exec($ch);

            // 获得响应结果里的头大小
            $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);

            $head = substr($response, 0, $headerSize);
            $content = substr($response, $headerSize);

            $hr_ret = explode("\n", $head);
            $head_arr = array();
            foreach ($hr_ret as $val) {
                if (!empty(trim($val))) {
                    if (strpos($val, ':')) {
                        $h_key = substr($val, 0, strpos($val, ':'));
                        $h_val = substr($val, strpos($val, ':') + 1);
                        $head_arr[$h_key] = trim($h_val);
                        continue;
                    } else {
                        list($head_arr['Version'], $head_arr['Status'], $head_arr['Code']) = explode(' ', $val, 3);
                    }
                }
            }
            unset($val);
        } catch (Exception $e) {
            //print_r($e);
            $response = NULL;
        }
        return array('header' => $head_arr, 'content' => $content);
    }

    public static function set_key($key_file) {
        //$key_file = iconv('UTF-8', 'GB2312', $key_file);
        if (file_exists($key_file)) {
            self::$key = $key_file;
        } else {
            self::OutMsg(array('ecode' => 400, 'emsg' => 'Key File Missing'));
        }
    }

    public static function set_crt($crt_file) {
        //$crt_file = iconv('UTF-8', 'GB2312', $crt_file);
        if (file_exists($crt_file)) {
            self::$crt = $crt_file;
        } else {
            self::OutMsg(array('ecode' => 400, 'emsg' => 'Crt File Missing'));
        }
    }

    public static function set_car($car_file) {
        //$car_file = iconv('UTF-8', 'GB2312', $car_file);
        if (file_exists($car_file)) {
            self::$car = $car_file;
        } else {
            self::OutMsg(array('ecode' => 400, 'emsg' => 'Pem Crt Missing'));
        }
    }

}

/***
 * 
$header_arr = array();    需要附加的头信息
$_FILES["file"]["name"] - 被上传文件的名称
$_FILES["file"]["type"] - 被上传文件的类型
$_FILES["file"]["size"] - 被上传文件的大小，以字节计
$_FILES["file"]["tmp_name"] - 存储在服务器的文件的临时副本的名称
$_FILES["file"]["error"] - 由文件上传导致的错误代码
以下为不同代码代表的意思：
0; 文件上传成功。
1; 超过了文件大小php.ini中即系统设定的大小。
2; 超过了文件大小MAX_FILE_SIZE 选项指定的值。
3; 文件只有部分被上传。
4; 没有文件被上传。
5; 上传文件大小为0
 ***/

