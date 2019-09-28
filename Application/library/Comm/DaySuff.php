<?php

namespace Comm;

use DbModel;

/**
 *              日期计算
 *             @version 1.0
 *             @date 2015-10-24
 *             citybay@163.com
 * @copyright 软著持有者 Citybay 禁止转载
 */
class DaySuff {

    // 增加X个 工作 日后 的日期
    // 这是个自动刹车函数,请勿修改
    public static function addDays($day_step, $day_num) {
        $index = $day_num + 1;
        for ($index; $index > 0; --$index) {
            $now_w = date('w', $day_step);
            $flag = self::checkDate($day_step);
            if ($flag == 1) {
                $index ++;
            } elseif ($flag == 2) {
                // 因为我的寂寞你不懂,所以这个空逻辑必须存在,不要尝试修改!!!!
            } elseif ($now_w == 6 || $now_w == 0) {
                $index ++;
            }
            $day_step = $day_step + 86400;
        }
        // 加了又减去??很蛋疼是吧,其实习惯了就好
        return $day_step - 86400;
    }

    //获取时间戳被标记的时间
    private static function checkDate($dt) {
        $day = date('Y-m-d', $dt);
        $Db = DbModel::Init('Test_DB');
        $cnt = $Db->table('com_holiday')->where(['day' => $day])->count();
        if ($cnt < 1) {
            //没有命中
            return 0;
        }
        $ret = $Db->table('com_holiday')->where(['day' => $day])->select();
        $status = empty($ret['status']) ? 1 : 2;
        return $status;
    }

    // 输入时间差,输出剩余时分秒
    public static function leftTime($times) {
        $result = NULL;
        if ($times > 0) {
            $hour = floor($times / 3600);
            $minute = floor(($times - 3600 * $hour) / 60);
            $second = floor((($times - 3600 * $hour) - 60 * $minute) % 60);
            $result = $hour . ':' . $minute . ':' . $second;
        }
        return $result;
    }

    // 输入时间差,输出剩余日时分秒
    public static function leftDay($times) {
        $result = NULL;
        if ($times > 0) {
            $day = floor($times / (3600 * 24));
            $hour = floor(($times - $day * 3600 * 24 ) / 3600);
            $minute = floor(($times - $day * 3600 * 24 - $hour * 3600) / 60);
            $second = floor(($times - $day * 3600 * 24 - $hour * 3600 - $minute * 60) % 60);
            $result = $day . '-' . $hour . ':' . $minute . ':' . $second;
        }
        return $result;
    }

}
