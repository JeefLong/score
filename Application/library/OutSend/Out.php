<?php

namespace OutSend;

/**
 *  版权所有禁止转载,违者必究
 *     Citybay@163.com
 *     软著持有人:Citybay
 * 逻辑层基类,用于初始化控制器
 *  Citybay@163.com
 */
trait Out {

    
    // 输出并结束
    public static function OutMsg($data) {
        @ob_clean();
        @header('Content-Type: Application/json;charset=UTF-8');
        echo json_encode($data);
        exit(0);
    }

}

?>
