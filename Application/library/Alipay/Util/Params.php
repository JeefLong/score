<?php

namespace Alipay\Util;

class Params {

    protected $bizParams;

    public function setParams($k, $v = NULL) {
        if (is_array($k) && count($k) > 0) {
            $this->bizParams = array_merge($this->bizParams, $k);
        } else {
            $this->bizParams[$k] = $v;
        }
    }

}
