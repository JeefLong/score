<?php

namespace Alipay\Pay;

use Alipay\Pay\Conf;
use Alipay\Util\Sign;
use Alipay\Util\AlException;
use Comm\Curl;
use Alipay\Util\Params;

class Code extends Params {

//生成二维码短链接
    public function interim() {
        if (!array_key_exists('out_trade_no', $this->bizParams) || empty($this->bizParams['out_trade_no'])) {
            throw new AlException('商户订单号不能为空');
        } else if (!array_key_exists('total_amount', $this->bizParams) || empty($this->bizParams['total_amount'])) {
            throw new AlException('支付总额不能为空');
        } else if (!array_key_exists('subject', $this->bizParams) || empty($this->bizParams['subject'])) {
            throw new AlException('订单标题不能为空');
        }

        $params = Conf::baseParams();

        $params['biz_content'] = json_encode($this->bizParams);
        $params['payment_type'] = 1;
        $params['sign'] = Sign::create($params);
        $rsp = json_decode(Curl::send(Conf::$GATEWAY, 'POST', $params), true);
        $response = $rsp['alipay_trade_precreate_response'];
        if ($response['code'] != 10000) {
            throw new AlException($response['msg']);
        }

        if (!Sign::verify(json_encode($response), $rsp['sign'])) {
            throw new AlException('支付宝签名验证失败');
        }
        return $response['qr_code'];
    }

    //支付宝账号支付
    public function payaddr() {
        if (!array_key_exists('out_trade_no', $this->bizParams) || empty($this->bizParams['out_trade_no'])) {
            throw new AlException('商户订单号不能为空');
        } else if (!array_key_exists('total_amount', $this->bizParams) || empty($this->bizParams['total_amount'])) {
            throw new AlException('支付总额不能为空');
        } else if (!array_key_exists('subject', $this->bizParams) || empty($this->bizParams['subject'])) {
            throw new AlException('订单标题不能为空');
        }

        $params = Conf::baseParams();
        $params['biz_content'] = json_encode($this->bizParams);

        //服务类型调用
        //$params['service']    = 'mobile.securitypay.pay';
        $params['service'] = 'create_direct_pay_by_user';

        $params['payment_type'] = 1;
        $sign = Sign::create($params);

        // print_r($params);
        // die();
        $url = Conf::$GATEWAY . '?' . Sign::buildParams($params) . "&sign=" . urlencode($sign) . "&sign_type=" . Conf::$SIGN_TYPE;
        return $url;
    }

}
