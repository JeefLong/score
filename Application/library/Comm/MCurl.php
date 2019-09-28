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
class MCurl {

    // 发送
    public static function MSend($data) {
        $chList = array();
        foreach ($data as $k => $v) {
            if ($empty($v['url']) && !empty($v['data'])) {
                if (!empty($v['header'])) {
                    $header = $v['header'];
                }

                $chList[] = self::CurlObject($v['url'], $v['data'], $header);
            }
        }
        unset($k, $v);
    }

    //单个请求数据组装,返回句柄数组
    public static function CurlObject($url, $postData = NULL, $header = NULL) {
        $options = array();
        $url = trim($url);
        $options[CURLOPT_URL] = $url;
        $options[CURLOPT_HTTP_VERSION] = CURL_HTTP_VERSION_1_1;
        $options[CURLOPT_TIMEOUT] = 10;
        $options[CURLOPT_USERAGENT] = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.89 Safari/537.36';
        $options[CURLOPT_RETURNTRANSFER] = true;
        $options[CURLOPT_FOLLOWLOCATION] = true;
        $options[CURLOPT_CONNECTTIMEOUT] = 5;
        $options[CURLOPT_TIMEOUT] = 5;
        //$options[CURLOPT_PROXY]           = '127.0.0.1:8888';
        if (!empty($header)) {
            foreach ($header as $key => $value) {
                $options[$key] = $value;
            }
        }

        if (!empty($postData) && is_array($postData)) {
            $options[CURLOPT_POST] = true;
            $options[CURLOPT_POSTFIELDS] = http_build_query($postData);
        }

        if (!empty($postData) && !is_array($postData)) {
            $options[CURLOPT_POST] = true;
            $options[CURLOPT_POSTFIELDS] = urldecode($postData);
        }

        if (stripos($url, 'https') === 0) {
            $options[CURLOPT_SSL_VERIFYPEER] = false;
        }

        $ch = curl_init();
        curl_setopt_array($ch, $options);
        return $ch;
    }

    // 并行发送
    public static function Send($chList) {
        $sender = curl_multi_init();
        foreach ($chList as $ch) {
            curl_multi_add_handle($sender, $ch);
        }
        unset($ch);

        $ret = array();
        do {
            while (($execrun = curl_multi_exec($sender, $running)) == CURLM_CALL_MULTI_PERFORM);
            if ($execrun != CURLM_OK) {
                break;
            }
            // Limit 1024
            while ($done = curl_multi_info_read($sender)) {
                //$info = curl_getinfo($done['handle']);
                $output = curl_multi_getcontent($done['handle']);
                //$error = curl_error($done['handle']);
                $ret[] = $output;
                curl_multi_remove_handle($sender, $done['handle']);
            }

            // Rescue CPU  idle
            if ($running) {
                $rel = curl_multi_select($sender, 1);
                if ($rel == -1) {
                    usleep(200);
                    echo '数据准备完毕,已通知发送器' . "\r\n";
                }
            }
            if (!$running) {
                break;
            }
        } while (true);
        return $ret;
    }

}


