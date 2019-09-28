<?php
namespace Comm;
/*
 *  第三方公开二维码算法
 */
class CodePic {

    /*
     * 生成二维码
     */
    public static function image($data)
    {
       require_once APP_PATH.'Library'.DIS.'Phpqrcode'.DIS.'phpqrcode.php';
       @ob_clean();
       @header('Content-type: image/png');
       \QRcode::png($data,false,'H',10);
    }

}
