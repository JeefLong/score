<?php
namespace Alipay\Pay;

use Comm\Config;

class Conf {

    public static $configArr;
    public static $APP_ID;
    public static $CHARSET;
    public static $SIGN_TYPE;
    public static $PRIVATE_PEM;
    public static $MAPI_PEM;
    public static $OPENAPI_PEM;
    public static $NOTIFY_URL;
    public static $VERSION;
    public static $LOG_PATH;
    public static $DEBUG;
    public static $GATEWAY;
    public static $METHOD;

    public static function setPara() {
        self::$configArr = Config::getConfig('aliconfig');

        self::$APP_ID = self::$configArr['APP_ID'];
        self::$CHARSET = self::$configArr['CHARSET'];
        self::$SIGN_TYPE = self::$configArr['SIGN_TYPE'];
        self::$PRIVATE_PEM = APPLICATION_PATH . '/application/library/Alipay/pem/' . self::$configArr['PRIVATE_PEM'];
        self::$MAPI_PEM = APPLICATION_PATH . '/application/library/Alipay/pem/' . self::$configArr['MAPI_PEM'];
        self::$OPENAPI_PEM = APPLICATION_PATH . '/application/library/Alipay/pem/' . self::$configArr['OPENAPI_PEM'];
        self::$NOTIFY_URL = self::$configArr['NOTIFY_URL'];
        self::$VERSION = self::$configArr['VERSION'];
        self::$LOG_PATH = self::$configArr['LOG_PATH'];
        self::$DEBUG = self::$configArr['DEBUG'];
        self::$GATEWAY = self::$configArr['GATEWAY'];
        self::$METHOD = self::$configArr['METHOD'];
    }

    public static function baseParams() {
        self::setPara();
        return array(
            'app_id' => self::$APP_ID,
            'charset' => self::$CHARSET,
            'sign_type' => self::$SIGN_TYPE,
            'timestamp' => date("Y-m-d H:i:s"),
            'version' => self::$VERSION,
            'notify_url' => self::$NOTIFY_URL,
            'method' => self::$METHOD,
        );
    }

}
