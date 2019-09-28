<?php

/**
 *  版权所有禁止转载,违者必究
 *     Citybay@163.com
 *    软著持有人:Citybay
 * */
use Comm\Config;

// 输出侧栏菜单,被Ctrl自动捕获
class LeftMenuModel {

    // 静态输出侧栏哈希结构
    public static function left() {
        $left = Config::getConfig('AdminLeft');
        return $left;
    }

    // 静态输出侧栏哈希结构
    public static function aleft() {
        $left = Config::getConfig('AgentLeft');
        return $left;
    }

    // 前端侧栏
    public static function vleft() {
        $mod = DbModel::Init();
        $ret = $mod->table('t_type')
                ->where('`t_status` = 1')
                ->get();
        return $ret;
    }

}
