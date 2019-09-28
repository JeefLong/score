<?php

namespace Comm;

/**
 *              加密核心类
 *             @version 1.0
 *             @date 2015-10-24
 *             citybay@163.com
 * @copyright 软著持有者 Citybay 禁止转载
 */
class SHA {

    public function sha256($data, $key) {
        return base64_encode(hash_hmac('sha256', $data, $key, true));
    }

}
