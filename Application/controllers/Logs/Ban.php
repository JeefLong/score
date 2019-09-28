<?php

namespace Logs;

/**
 *  版权所有禁止转载,违者必究
 *     Citybay@163.com
 *    软著持有人:Citybay
 * */
use Comm\Tool;
use DbModel;

Final class BanController {

    // fail2ban
    public static function Check($type, $count, $status) {
        $guest_ip = Tool::getip();
        $mod = DbModel::Init();
        $cnt = $mod->table($type . '_log')
                ->where(array(
                    'login_ip' => $guest_ip,
                    'login_time[>]' => NOWS,
                    'login_status[>]' => $status
                        )
                )
                ->count();
        if ($cnt > $count) {
            return FALSE;
        }
        return TRUE;
    }

}
