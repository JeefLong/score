<?php

namespace Alipay\Util;

use Alipay\Util\AlException;
use Alipay\Pay\Conf;

class Sign {

    public static function create($params) {
        if (!$params || count($params) < 1) {
            throw new ApException('参与签名的参数不能为空');
        }
        $param_str = self::buildParams($params);
        $priKey = file_get_contents(Conf::$PRIVATE_PEM, 'r');
        $res = openssl_pkey_get_private($priKey);
        $sign = '';
        openssl_sign($param_str, $sign, $res);
        openssl_free_key($res);
        //base64编码
        return base64_encode($sign);
    }

    public static function verify($data, $sign) {
        if (!isset($sign) || !$sign) {
            throw new AlException('支付宝签名参数缺失');
        }
        $pubKey = file_get_contents(Conf::$OPENAPI_PEM, 'r');
        $res = openssl_get_publickey($pubKey);
        $result = (bool) openssl_verify($data, base64_decode($sign), $res);
        openssl_free_key($res);
        return $result;
    }

    public static function buildParams($params, $urlencode = false) {
        $param_str = '';
        ksort($params);
        foreach ($params as $k => $v) {
            if ($k == 'sign' || $v === '') {
                continue;
            }
            $param_str .= $k . '=';
            $param_str .= $urlencode ? urlencode($v) : $v;
            $param_str .= '&';
        }
        unset($k,$v);
        return rtrim($param_str, '&');
    }

}
