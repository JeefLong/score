<?php

namespace Logs;

/**
 *  版权所有禁止转载,违者必究
 *     Citybay@163.com
 *    软著持有人:Citybay
 * */
use Comm\Tool;
use DbModel;

Final class LoginLogController {

    // LOG4
    public static function AddLog($tab, $uid, $desc, $status) {
        $mod = DbModel::init();
        $rls = $mod->table($tab . '_log')->insert(
                array(
                    'login_id' => $uid,
                    'login_msg' => $desc,
                    'login_status' => $status,
                    'login_ip' => Tool::getip(),
                    'login_time' => NOW
                )
        );
        if ($rls > 0) {
            return TRUE;
        }
        return FALSE;
    }

}
