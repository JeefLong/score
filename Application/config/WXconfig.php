<?php

/**
 * 微信 支付参数
 * */
return array(
    'APP_ID' => 'wx9a91d408886861f1',
    'APP_SECRET' => 'ae6b110e6e8346f0230e3f6089269230',
    'MCH_ID' => '1499779602',
    'KEY' => '1238273u938719es739827e97d8dy32l', //也就是商户平台的支付秘钥
    'NOTIFY_URL' => 'http://pay.citybay.net/Api/WeiXin/CallBack',
    'CALL_BACK_URL' => 'http://www.citybay.net/Web/',
    'LOG_PATH' => ROOT . 'Debug' . DIS . 'WX_log',
    'DEBUG' => true,
    //////////////////////////////
    'GATEWAY_AUTHORIZE' => 'https://open.weixin.qq.com/connect/oauth2/authorize',
    'GATEWAY_TOKEN' => 'https://api.weixin.qq.com/sns/oauth2/access_token',
    'GATEWAY_ACCESS' => 'https://api.weixin.qq.com/cgi-bin/token',
    'GATEWAY_TICKET' => 'https://api.weixin.qq.com/cgi-bin/ticket/getticket',
    'GATEWAY_USERINFO' => 'https://api.weixin.qq.com/sns/userinfo',
    'GATEWAY_CLOSEORDER' => 'https://api.mch.weixin.qq.com/pay/closeorder',
    'GATEWAY_UNIFIEDORDER' => 'https://api.mch.weixin.qq.com/pay/unifiedorder',
    'GATEWAY_SHORT_URL' => 'https://api.mch.weixin.qq.com/tools/shorturl',
    'GATEWAY_ORDERQUERY' => 'https://api.mch.weixin.qq.com/pay/orderquery',
    'GATEWAY_REDPACK' => 'https://api.mch.weixin.qq.com/mmpaymkttransfers/sendredpack',
    'GATEWAY_PAYUSER' => 'https://api.mch.weixin.qq.com/mmpaymkttransfers/promotion/transfers',
    'GATEWAY_PUBKEY' => 'https://fraud.mch.weixin.qq.com/risk/getpublickey',
);
