<?php

namespace Comm;

/**
 * 系统小工具集合
 */
Class Tool {

    /**
     * 页面跳转
     * @param $url
     * @param NULL $headers
     */
    public static function redirect($url, $is_index = false, $headers = NULL) {
        if (!empty($url)) {
            if ($headers) {
                if (!is_array($headers)) {
                    $headers = array($headers);
                }
                foreach ($headers as $header) {
                    header($header);
                }
                unset($header);
            }
            if ($is_index) {
                header('Location: /Inex.php' . $url);
            } else {
                header('Location: ' . $url);
            }
        }
        return TRUE;
    }

    /**
     * 获取IP
     * @param IP
     */
    public static function getip() {
        if (getenv('HTTP_CLIENT_IP')) {
            $ip = getenv('HTTP_CLIENT_IP');
        } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('HTTP_X_FORWARDED')) {
            $ip = getenv('HTTP_X_FORWARDED');
        } elseif (getenv('HTTP_FORWARDED_FOR')) {
            $ip = getenv('HTTP_FORWARDED_FOR');
        } elseif (getenv('HTTP_FORWARDED')) {
            $ip = getenv('HTTP_FORWARDED');
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    // 生成订单号
    public static function makeorder() {
        $str1 = sha1(str_shuffle(time()));
        $str2 = MD5(mt_rand());
        $ext = strtoupper(substr($str1, -6, 6));
        $sxt = strtoupper(substr($str2, 6, 6));
        return 'No' . $ext . $sxt;
    }

    //xml 转 数组
    public static function xmlToArr($xml) {
        //禁止引用外部xml实体 
        libxml_disable_entity_loader(true);
        $xmlstring = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);
        $val = json_decode(json_encode($xmlstring), true);
        return $val;
    }

    //数组 转 XML
    public static function arrToXml($array) {
        if (!is_array($array) || count($array) <= 0) {
            return;
        }
        $xml = '<xml>';
        foreach ($array as $key => $val) {
            if (is_numeric($val)) {
                $xml .= '<' . $key . '>' . $val . '</' . $key . '>';
            } else {
                $xml .= '<' . $key . '><![CDATA[' . $val . ']]></' . $key . '>';
            }
        }
        unset($key, $val);
        $xml .= '</xml>';
        return $xml;
    }

    // IP转长整形
    public static function ip2long($ip) {
        //防止出现负数
        return bindec(decbin(ip2long($ip)));
    }

    // 长整形转IP
    public static function long2ip($long) {
        return long2ip($long);
    }

}
