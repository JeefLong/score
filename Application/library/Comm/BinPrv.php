<?php

namespace Comm;

/**
 *              加密核心类
 *             @version 1.0
 *             @date 2015-10-24
 *             citybay@163.com
 * @copyright 软著持有者 Citybay 禁止转载
 */
class BinPrv {

    Public Static Function Check($num) {
        $m = 15;
        $pr = array();
        $t = 0;
        for ($i = 0; TRUE; $i++) {
            $s = pow(2, $i);
            $t += $s;
            if ($t > $num) {
                break;
            }
            $pr[] = $s;
        }
        return $pr;
    }

}
