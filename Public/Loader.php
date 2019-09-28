<?php
//error_reporting(E_ALL);
ini_set('session.name', 'CityBaby');
use \Yaf\Application;
use \Yaf\Session;
header('Content-type: text/html; charset=utf-8');
date_default_timezone_set('PRC');
defined('VER') or define('VER', '0.29');
defined('DIS') or define('DIS', DIRECTORY_SEPARATOR);
defined('ROOT') or define('ROOT', realpath(dirname(dirname(__FILE__))) . DIS);
defined('APP_PATH') or define('APP_PATH', ROOT . 'Application' . DIS);
defined('LIB_DIR') or define('LIB_DIR', APP_PATH . 'library' . DIS);
defined('SMARTY_DIC') or define('SMARTY_DIC', LIB_DIR . 'Smarty' . DIS);
defined('WEBNAME') or define('WEBNAME', 'Redua');
defined('DOM') or define('DOM', 'http://' . $_SERVER['SERVER_NAME']);
defined('NOW') or define('NOW', time());
defined('NOWS') or define('NOWS', strtotime(date('Y-m-d', NOW) . ' 00:00:00'));
defined('NOWE') or define('NOWE', strtotime(date('Y-m-d', NOW) . ' 23:59:59'));
defined('BAN') or define('BAN', TRUE);
defined('CONT') or define('CONT', 10);
defined('CODE') or define('CODE', FALSE);
defined('DEBUG') or define('DEBUG', TRUE);

try {
    @Session::getInstance()->start();
    $_APP = new Application(ROOT . 'Conf' . DIS . 'Application.ini');
    $_APP->BabyBoot()->Run();
} catch (\Exception $ex) {
    if (!empty($_GET['debug']) || DEBUG) {
        print_r($ex);
        exit(0);
    } else {
        \OutSend\Out::OutMsg(array('ecode' => 400, 'emsg' => 'Access Error: No Access Rights !'));
    }
}

