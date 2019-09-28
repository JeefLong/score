<?php

/**
 *  版权所有禁止转载,违者必究
 *     Citybay@163.com
 *    软著持有人:Citybay
 * 注意这个就是默认的 Index Module
 * */

namespace Comm;

class GetMac {

    public static function Get() {
        switch (strtolower(PHP_OS)) {
            case 'linux':
                $ret_arr = self::forLinux();
                break;
            case 'solaris':
                $ret_arr = self::forLinux();
                break;
            case 'unix':
                $ret_arr = self::forLinux();
                break;
            case 'aix':
                $ret_arr = self::forLinux();
                break;
            default:
                $ret_arr = self::forWindows();
                break;
        }

        $temp_array = array();

        foreach ($ret_arr as $value) {
            if (
                preg_match('/[0-9a-f][0-9a-f][:-]' . '[0-9a-f][0-9a-f][:-]' . '[0-9a-f][0-9a-f][:-]' . '[0-9a-f][0-9a-f][:-]' . '[0-9a-f][0-9a-f][:-]' . '[0-9a-f][0-9a-f]/i', $value, $temp_array)) {
                $mac_addr = $temp_array[0];
                break;
            }
        }
        unset($temp_array, $valu);
        return $mac_addr;
    }

    // Windows 系统
    public static function forWindows() {
        @exec('ipconfig /all', $r_arr);
        if ($r_arr) {
            return $r_arr;
        } else {
            $ipconfig = $_SERVER['WINDIR'] . '\system32\ipconfig.exe';
            if (is_file($ipconfig)) {
                @exec($ipconfig . ' /all', $r_arr);
            } else {
                @exec($_SERVER['WINDIR'] . '\system\ipconfig.exe /all', $r_arr);
            }
            return $r_arr;
        }
    }

    // Linux 系统
    public static function forLinux() {
        @exec('ifconfig -a', $r_arr);
        return $r_arr;
    }

}
