<?php

namespace Logic;

/**
 *  版权所有禁止转载,违者必究
 *     Citybay@163.com
 *     软著持有人:Citybay
 * 逻辑层基类,用于初始化控制器
 *  Citybay@163.com
 */
use \Yaf\Controller_Abstract;

Abstract class BaseController extends Controller_Abstract {

    // 会被继承后的init方法覆盖,此处也是复写的\Yaf\Controller_Abstract的init;
    public Abstract function init();
}

?>
