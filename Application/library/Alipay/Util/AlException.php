<?php

namespace Alipay\Util;

use Alipay\Util\Log;
use Comm\Tool;

class AlException extends \Exception {

    public function __construct($message, $code = -999) {
        parent::__construct($message, $code);
        Log::record($message, Log::LOG_LEVEL_ERROR);
    }

    public function __toString() {
        return __CLASS__ . ':[' . $this->code . ']:' . $this->message;
    }

    public function errorMessage() {
        return $this->getMessage();
    }

    public function showError($type = 'json') {
        $data = array(
            'code' => $this->getCode(),
            'msg' => $this->getMessage()
        );
        switch ($type) {
            case 'json':
                $out = json_encode($data, JSON_NUMERIC_CHECK | JSON_UNESCAPED_UNICODE);
                break;
            case 'xml':
                $out = Tool::arrToXml($data);
                break;
            default :
                $out = var_export($data, true);
        }
        echo $out;
        exit(0);
    }

}
