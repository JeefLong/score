<?php

namespace Comm;

use \Exception;

/**
 *              通信核心类
 *             @version 1.0
 *             @date 2015-10-24
 *             citybay@163.com
 * @copyright 软著持有者 Citybay 禁止转载
 */
class SSLAuth {

    //转换公钥 如果是pem格式则省略
    public static function redPukey() {
        $encryptionKeyPath = APP_PATH . 'library' . DIS . 'Comm' . DIS . 'key' . DIS . 'ssl_public.cer';
        $encryptionKey4Server = file_get_contents($encryptionKeyPath);
        $pem = chunk_split(base64_encode($encryptionKey4Server), 64, "\n"); //转换为pem格式的公钥
        $pem = "-----BEGIN CERTIFICATE-----\n" . $pem . "-----END CERTIFICATE-----\n";
        $publicKey = openssl_pkey_get_public($pem);
        return $publicKey;
    }

    //转换私钥 如果是pem格式则省略
    public static function redPikey() {
        $encryptionKeyPath = APP_PATH . 'library' . DIS . 'Comm' . DIS . 'key' . DIS . 'ssl_private.key';
        $decryptKey4Server = file_get_contents($decryptKeyPath);
        $pem = chunk_split($decryptKey4Server, 64, "\n"); //转换为pem格式的私钥
        $pem = "-----BEGIN PRIVATE KEY-----\n" . $pem . "-----END PRIVATE KEY-----\n";
        $privateKey = openssl_pkey_get_private($pem);
        return $privateKey;
    }

    //公钥加密
    public static function pub_encrypt($data, $rsaPub = 'rsa_public.pem') {
        $pub = APP_PATH . 'library' . DIS . 'Comm' . DIS . 'key' . DIS . $rsaPub;
        $pubKey = file_get_contents($pub, 'r');
        $crypto = NULL;
        //1024bit && OPENSSL_PKCS1_PADDING <= 117bite
        foreach (str_split($data, 117) as $chunk) {
            openssl_public_encrypt($chunk, $encryptData, $pubKey, OPENSSL_PKCS1_PADDING);
            $crypto .= $encryptData;
        }
        unset($chunk);
        return base64_encode($crypto);
    }

    //私钥解密
    public static function prv_decrypt($data, $rsaPrv = 'rsa_private.pem') {
        $prv = APP_PATH . 'library' . DIS . 'Comm' . DIS . 'key' . DIS . $rsaPrv;
        $prvKey = file_get_contents($prv, 'r');
        $crypto = NULL;
        // 1024bit == 128byte
        foreach (str_split(base64_decode($data), 128) as $chunk) {
            openssl_private_decrypt($chunk, $decryptData, $prvKey, OPENSSL_PKCS1_PADDING);
            $crypto .= $decryptData;
        }
        unset($chunk);
        return $crypto;
    }

    //私钥加密
    public static function prv_encrypt($data, $rsaPrv = 'rsa_private.pem') {
        $prv = APP_PATH . 'library' . DIS . 'Comm' . DIS . 'key' . DIS . $rsaPrv;
        $prvKey = file_get_contents($prv, 'r');
        $crypto = NULL;
        foreach (str_split($data, 117) as $chunk) {
            openssl_private_encrypt($chunk, $encryptData, $prvKey, OPENSSL_PKCS1_PADDING);
            $crypto .= $encryptData;
        }
        unset($chunk);
        return base64_encode($crypto);
    }

    //公钥解密
    public static function pub_decrypt($data, $rsaPub = 'rsa_public.pem') {
        $pub = APP_PATH . 'library' . DIS . 'Comm' . DIS . 'key' . DIS . $rsaPub;
        $pubKey = file_get_contents($pub, 'r');
        $crypto = NULL;
        foreach (str_split(base64_decode($data), 128) as $chunk) {
            openssl_public_decrypt($chunk, $decryptData, $pubKey, OPENSSL_PKCS1_PADDING);
            $crypto .= $decryptData;
        }
        unset($chunk);
        return $crypto;
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////
    //私钥求签
    public static function private_sign($data, $rsaPrv = 'rsa_private.pem') {
        if (!$data || count($data) < 1) {
            throw new Exception('签名参数缺失');
        }
        $param_str = self::buildParams($data);
        $prv = APP_PATH . 'library' . DIS . 'Comm' . DIS . 'key' . DIS . $rsaPrv;
        $prvKey = file_get_contents($prv, 'r');
        $res = openssl_pkey_get_private($prvKey);
        $sign = NULL;
        openssl_sign($param_str, $sign, $res);
        openssl_free_key($res);
        return base64_encode($sign);
    }

    //公钥验签
    public static function public_verify($data, $sign, $rsaPub = 'rsa_public.pem') {
        if (!isset($sign) || !$sign) {
            throw new Exception('验签参数缺失');
        }
        $param_str = self::buildParams($data);
        $pub = APP_PATH . 'library' . DIS . 'Comm' . DIS . 'key' . DIS . $rsaPub;
        $pubKey = file_get_contents($pub, 'r');
        $res = openssl_get_publickey($pubKey);
        $result = (bool) openssl_verify($param_str, base64_decode($sign), $res);
        openssl_free_key($res);
        return $result;
    }

    //公钥求签
    public static function public_sign($data, $rsaPub = 'rsa_public.pem') {
        if (!$data || count($data) < 1) {
            throw new Exception('签名参数缺失');
        }
        $param_str = self::buildParams($data);
        $pub = APP_PATH . 'library' . DIS . 'Comm' . DIS . 'key' . DIS . $rsaPub;
        $pubKey = file_get_contents($pub, 'r');
        $res = openssl_get_publickey($pubKey);
        $sign = NULL;
        openssl_sign($param_str, $sign, $res);
        openssl_free_key($res);
        return base64_encode($sign);
    }

    //私钥验签
    public static function private_verify($data, $sign, $rsaPrv = 'rsa_private.pem') {
        if (!isset($sign) || !$sign) {
            throw new Exception('验签参数缺失');
        }
        $param_str = self::buildParams($data);
        $prv = APP_PATH . 'library' . DIS . 'Comm' . DIS . 'key' . DIS . $rsaPrv;
        $prvKey = file_get_contents($prv, 'r');
        $res = openssl_get_privatekey($prvKey);
        $result = (bool) openssl_verify($param_str, base64_decode($sign), $res);
        openssl_free_key($res);
        return $result;
    }

    //建立排序
    public static function buildParams($params) {
        $param_str = NULL;
        ksort($params);
        foreach ($params as $k => $v) {
            if ('sign' != strtolower($k) && '' != $v) {
                $param_str .= $k . '=' . $v . '&';
            }
        }
        unset($k, $v);
        return rtrim($param_str, '&');
    }

}
