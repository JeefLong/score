<?php

namespace Alipay\Util;

use Alipay\Pay\Conf;

class Log {

    const LOG_LEVEL_DEBUG = 'DEBUG';
    const LOG_LEVEL_ERROR = 'ERROR';
    const LOG_LEVEL_INFO = 'INFO';

    public static function record($message, $level = self::LOG_LEVEL_ERROR) {
        if ($level === self::LOG_LEVEL_ERROR || Conf::$DEBUG === true) {
            self::mkpath(Conf::$LOG_PATH);
            $log_file = Conf::$LOG_PATH . 'ALI_log-' . date('Ymd') . '.log';
            $_message = '【' . $level . '】' . date('Y-m-d H:i:s') . "\r\n";
            $_message .= $message . "\r\n\r\n";
            file_put_contents($log_file, $_message, FILE_APPEND);
        }
    }

    private static function mkpath($dir) {
        return is_dir($dir) or (self::mkpath(dirname($dir)) and (mkdir($dir, 0777) and chmod($dir, 0777)));
    }

}
