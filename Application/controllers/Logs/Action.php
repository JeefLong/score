<?php

namespace Logs;

/**
 *  版权所有禁止转载,违者必究
 *     Citybay@163.com
 *    软著持有人:Citybay
 * */
use Comm\Tool;
use DbModel;
use \Yaf\Session;

Final class ActionController {

    // LOG4
    public static function AddLog($type, $desc, $data, $uid = NULL) {
        $mod = DbModel::init();
        $sess = Session::getInstance();
        $session = $sess->__get('_' . $type . '_user');
        if (is_array($data)) {
            $in_data = serialize($data);
        } else {
            $in_data = $data;
        }
        $rls = $mod->table($type . '_action')->add_data(
                array(
                    'uid' => empty($uid) ? $session['uid'] : $uid,
                    'action' => $desc . ' : ' . $in_data,
                    'addr' => Tool::getip(),
                    'act_time' => NOW
                )
        );
        if ($rls) {
            return TRUE;
        }
        return FALSE;
    }

}
