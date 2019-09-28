<?php

namespace Comm;

/**
 *              加密核心类
 *             @version 1.0
 *             @date 2015-10-24
 *             citybay@163.com
 * @copyright 软著持有者 Citybay 禁止转载
 * ！！！注意浏览器可能会把+-等给去掉,导致对端无法解密！！！
 */
class AES {

    private static $key;
    private static $vi;

    private static function set_key() {
        self::$key = 'oScGU3fj8m/tDCyvsbEhwI91M1FcwvQqWuFpPoDHlSs=';
        //echo base64_encode(openssl_random_pseudo_bytes(32));
        self::$vi = 'w2wJCnctEG09danPPI7SxP==';
        //echo base64_encode(openssl_random_pseudo_bytes(16)); 
    }

    // Encrypt
    public static function enCode($data) {
        self::set_key();
        $encrypted = openssl_encrypt($data, 'aes-256-cbc', base64_decode(self::$key), OPENSSL_RAW_DATA, base64_decode(self::$vi));
        return base64_encode($encrypted);
    }

    // Decrypt
    public static function deCode($data) {
        self::set_key();
        $bdata = base64_decode($data);
        $decrypted = openssl_decrypt($bdata, 'aes-256-cbc', base64_decode(self::$key), OPENSSL_RAW_DATA, base64_decode(self::$vi));
        return $decrypted;
    }

}
