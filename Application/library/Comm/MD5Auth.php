<?php

namespace Comm;

/**
 *              验证核心类
 *             @version 1.0
 *             @date 2015-10-24
 *             citybay@163.com
 * @copyright 软著持有者 Citybay 禁止转载
 */
class MD5Auth {

    public static function create($params, $key) {
        if (isset($params['sign'])) {
            unset($params['sign']);
        }
        ksort($params);
        $str = self::buildParams($params);
        $str .= '&key=' . $key;
        return strtolower(md5($str));
    }

    public static function buildParams($params) {
        $return = '';
        foreach ($params as $k => $v) {
            if ('sign' != strtolower($k) && $v != '') {
                $return .= $k . '=' . $v . '&';
            }
        }
        unset($k, $v);
        return rtrim($return, '&');
    }

    public static function verify($params, $key) {
        if (isset($params['sign']) && $params['sign'] == self::create($params, $key)) {
            return TRUE;
        }
        return FALSE;
    }

}
