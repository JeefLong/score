<?php

use \Yaf\Bootstrap_Abstract;
use \Yaf\Application;
use \Yaf\Dispatcher;
use \Yaf\Registry;
use Smarty\Adapter;

final class BabyBoot extends Bootstrap_Abstract {

    use \OutSend\Out;

    protected $config;

    public function _initRoute(Dispatcher $dispatcher) {
        $_Route = $dispatcher->getRouter();
        $iRoute = new \Yaf\Route\Rewrite('R00T/', array('module' => 'Admin', 'controller' => 'Login', 'action' => 'Index',), array());
        $_Route->addRoute('Admin_Route', $iRoute);

        $iRoute = new \Yaf\Route\Rewrite('User/', array('module' => 'Agent', 'controller' => 'Login', 'action' => 'Index',), array());
        $_Route->addRoute('Agent_Route', $iRoute);
    }

    public function _initLoader(Dispatcher $dispatcher) {
        header('Content-type: text/html; charset=utf-8');
        ob_start();
        $dispatcher->autoRender(FALSE);
        $dispatcher->disableView();

        $plugin_router = new RouterPlugin();
        $dispatcher->registerPlugin($plugin_router);
        $dispatcher->setErrorHandler(array($this, 'ErrHandle'));
        return 1;
    }

    public function _initConfig(Dispatcher $dispatcher) {
        $this->config = Application::app()->getConfig();
        Registry::set('config', $this->config);
        return 1;
    }

    public function _initSmarty(Dispatcher $dispatcher) {
        if (!$dispatcher->getRequest()->isXmlHttpRequest() && !$dispatcher->getRequest()->isCli()) {
            $smarty = new Adapter(NULL, Registry::get('config')->get('smarty'));
            $dispatcher->setView($smarty);
        }
        return 1;
    }

    public function ErrHandle($errno, $errstr, $errfile, $errline) {
        if (!empty($_GET['debug']) || DEBUG) {
            // $this->Err($errno);
            echo "\r\n <br />" . ' Error_No:  ' . $errno . "\r\n <br />" . ' Error_Srt:  ' . $errstr . "\r\n <br />" . ' Error_File:  ' . $errfile . "\r\n <br />" . ' Error_Line:  ' . $errline . "\r\n <br />";
            exit(0);
        } else {
            self::OutMsg(array('ecode' => 401, 'emsg' => 'Access Deny: token grant fail !'));
        }
        return 1;
    }

    private function Err($errno) {

        $url = '/';
        switch ($errno) {
            case YAF\ERR\NOTFOUND\CONTROLLER:
                $this->redirect($url);
                break;
            case YAF\ERR\NOTFOUND\MODULE:
                $this->redirect($url);
                break;
            case YAF\ERR\NOTFOUND\ACTION:
                $this->redirect($url);
                break;
            case 4096:
                $this->redirect($url);
                break;
            default:
                $this->redirect($url);
                break;
        }
    }

}
