<?php /*%%SmartyHeaderCode:4520636805d4700775c5692-81491483%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95d367ea3f0cf707324595203fdb7cd0d83932a1' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Mart\\Fav\\Index.html',
      1 => 1564934092,
      2 => 'file',
    ),
    '626c1b3fba50315a2cef92f3cce22006ab565146' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Mart\\Public\\head.html',
      1 => 1561301286,
      2 => 'file',
    ),
    '7fa8899dc15564f8938d487d5dbd15788313ec36' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Mart\\Public\\left.html',
      1 => 1562431732,
      2 => 'file',
    ),
    'e66134174c4652b90c2af93ec63b0096b9324b4c' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Mart\\Public\\right.html',
      1 => 1564295358,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4520636805d4700775c5692-81491483',
  'variables' => 
  array (
    'max' => 0,
    'val' => 0,
    'list' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5d47007766dd05_35190310',
  'cache_lifetime' => '3600',
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d47007766dd05_35190310')) {function content_5d47007766dd05_35190310($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <meta content='text/html; charset=UTF-8' http-equiv='Content-Type'>
        <meta charset='utf-8'>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no' name='viewport'>
        <title>卡布奇诺</title>
        <link href='/Video/images/apple-touch-icon.png' rel='shortcut icon'>
        <link href='/Video/images/apple-touch-icon.png' rel='apple-touch-icon'>
        <meta name="csrf-param" content="auth_token" />
        <meta name="csrf-token" content="123456789" />
        <link rel="stylesheet" media="all" href='/Video/css/play.css' />
        <link rel="stylesheet" media="all" href='/Video/css/box.css' />
    </head>

<body>
    <div class='page-with-sidebar' id='page-container'>

        <div class='sidebar collapse navbar-collapse' id='sidebar-left'>
    <form class="sidebar-search full-width" action="/search" accept-charset="UTF-8" method="get">
        <div class='form-group'>
            <input type="text" name="q" id="q" value="" class="form-control f-s-12" placeholder="搜索" />
            <button class='btn btn-search' type='submit'>
                <i class='fa fa-search'></i>
            </button>
        </div>
    </form>
    <div class='title'>分类</div>
    <ul class='nav'>
                <li class='list'>
            <a href='/Mart/List/Index?type=1' style='padding-left: 62px;'>
                <i class='fa fa-camera'></i>
                <span>
                    国内
                </span>
            </a>
        </li>
                <li class='list'>
            <a href='/Mart/List/Index?type=2' style='padding-left: 62px;'>
                <i class='fa fa-bath'></i>
                <span>
                    主流
                </span>
            </a>
        </li>
                <li class='list'>
            <a href='/Mart/List/Index?type=3' style='padding-left: 62px;'>
                <i class='fa fa-camera'></i>
                <span>
                    日韩
                </span>
            </a>
        </li>
                <li class='list'>
            <a href='/Mart/List/Index?type=4' style='padding-left: 62px;'>
                <i class='fa fa-bath'></i>
                <span>
                    户外
                </span>
            </a>
        </li>
                <li class='list'>
            <a href='/Mart/List/Index?type=5' style='padding-left: 62px;'>
                <i class='fa fa-camera'></i>
                <span>
                    专辑
                </span>
            </a>
        </li>
            </ul>
    <div class='title'>排行</div>
    <ul class='nav'>
        <li class=''>
            <a href='/Mart/Max/Play'>
                <i class='fa fa-sort-amount-desc'></i>
                <span>播放最多</span>
            </a>
        </li>
        <li class=''>
            <a href='/Mart/Max/Favo'>
                <i class='fa fa-thumb-tack'></i>
                <span>收藏最多</span>
            </a>
        </li>
    </ul>
</div>

        <div class='content'>
            <h1 class='page-header'>
                <i class='fa fa-pagelines'></i>
                收藏夹..
                <!-- div class='page-header-menu'></div -->
            </h1>
            <div class='row' style='position: relative'>

                <!-- div class='alert alert-warning alert-dismissible' role='alert'>
                    <button aria-label='Close' class='close' data-dismiss='alert' type='button'>
                        <span aria-hidden='true'>×</span>
                    </button>
                    <i class='fa fa-bell-o'></i>
                    登录成功.
                </div -->

                <div class='alert alert-success alert-dismissible' role='alert' style='font-size: 14px'>
                    <i class='fa fa-bell-o'></i>
                    请使用HTTPS访问： 正确姿势 https://abc555.xyz;  错误姿势 http://abc555.xyz
                </div>
                <div class='container-fluid'>
                                        <a class='col-md-2 col-xs-4 item-video-container ' href='/Mart/Goods/Index?goods_id=STcvUGUvTExpVHg3SHdIL0FlL3VuVHcvZC9JNHZQZWZ6enBIRlk4VFl5TSthMzRmZlJzdW9sMU45R000S2E5OA=='>
                        <div class='item-video video-sx' style='background-size:cover;background-image: url(/Storage/test.jpg)'>
                            <span>164</span>
                        </div>
                        <h4 class='title video-st'>003</h4>
                    </a>
                                        <a class='col-md-2 col-xs-4 item-video-container ' href='/Mart/Goods/Index?goods_id=TTNQazAwS1hmaTg3aFgzcm5acDl5cnhGMzY1SU5hWHZyVjNLRXhweU56czdCT1AxWWJIOHpFMEI3RHBYaThaNA=='>
                        <div class='item-video video-sx' style='background-size:cover;background-image: url(http://127.0.0.1/Storage/test1.jpg)'>
                            <span>133</span>
                        </div>
                        <h4 class='title video-st'>2222</h4>
                    </a>
                                        <a class='col-md-2 col-xs-4 item-video-container ' href='/Mart/Goods/Index?goods_id=STcvUGUvTExpVHg3SHdIL0FlL3VuY28weXY5d0dPdFZtbEx2SzEwT0pWVkV3ZG80VzdFdGtKeWFFZXllWFNPbg=='>
                        <div class='item-video video-sx' style='background-size:cover;background-image: url(http://127.0.0.1/Storage/test1.jpg)'>
                            <span>128</span>
                        </div>
                        <h4 class='title video-st'>1111</h4>
                    </a>
                                        <a class='col-md-2 col-xs-4 item-video-container ' href='/Mart/Goods/Index?goods_id=bGFmcXhRYmM3eGNsRmNsZ2VWWTd2cW1sYW04ZStkZlNqN1U5Vi9KVVBWYzdWUUxPNThZWS9ZcmY4NWNLdldQRg=='>
                        <div class='item-video video-sx' style='background-size:cover;background-image: url(/Storage/test.jpg)'>
                            <span>128</span>
                        </div>
                        <h4 class='title video-st'>222</h4>
                    </a>
                                        <a class='col-md-2 col-xs-4 item-video-container ' href='/Mart/Goods/Index?goods_id=STcvUGUvTExpVHg3SHdIL0FlL3VuU1B2T2pndS9aN2ZHSFdHMWZTbU8zMS9UZTlFZ1hnU2hzb1NjeHVnVmM5eg=='>
                        <div class='item-video video-sx' style='background-size:cover;background-image: url(/Storage/test.jpg)'>
                            <span>115</span>
                        </div>
                        <h4 class='title video-st'>222</h4>
                    </a>
                                        <a class='col-md-2 col-xs-4 item-video-container ' href='/Mart/Goods/Index?goods_id=OFcwRStEeTdqYlk5MjEvZ3hCSXovS3k1U1VRak90RVNPUkVLbzVEL1Q2QUdIWU5CZ1BFcjJSRHdBaU4zbHJreQ=='>
                        <div class='item-video video-sx' style='background-size:cover;background-image: url(/Storage/test.jpg)'>
                            <span>113</span>
                        </div>
                        <h4 class='title video-st'>nnnn</h4>
                    </a>
                                    </div>
                                <a class='col-md-4 item-video-container'   href='/Mart/Goods/Index?goods_id=STcvUGUvTExpVHg3SHdIL0FlL3VuYmNMQThLa201c2lVdDRCeVdpQThkTDdLVkhyZGhIcFNaUzFCWEI5djF1Tg=='>
                    <div class='item-video video-mx' style='background-size:cover;background-image: url(/Storage/test.jpg)'></div>
                    <div class='title video-mt'>222</div>
                </a>
                                <a class='col-md-4 item-video-container'   href='/Mart/Goods/Index?goods_id=STcvUGUvTExpVHg3SHdIL0FlL3VuYkZaOTNKNW1Rc3BTL1prOXUwOWUxYnJuRkgxYmE3dEdsWjkwemczMmQ3Qg=='>
                    <div class='item-video video-mx' style='background-size:cover;background-image: url(http://127.0.0.1/Storage/test1.jpg)'></div>
                    <div class='title video-mt'>1111</div>
                </a>
                                <a class='col-md-4 item-video-container'   href='/Mart/Goods/Index?goods_id=STcvUGUvTExpVHg3SHdIL0FlL3VuWEZPN2VRQlI5TDhrOUtHMVpKUzcrdkVxMU5oZXFGVVI5S1pOeHhIR0U0eg=='>
                    <div class='item-video video-mx' style='background-size:cover;background-image: url(http://127.0.0.1/Storage/test1.jpg)'></div>
                    <div class='title video-mt'>77777</div>
                </a>
                            </div>
            <div class='row'>
                <div class='pagination-container text-center'>
                    <ul class='pagination'>
                        <div class="col-sm-7">
                      <ul class="pagination">
                       <li><a href="?p=1">首页</a></li>
                       <li><a href="?p=1"><<<</a></li><li class="active"><a href="?p=1">1</a></li><li><a href="?p=1">>>></a></li>
                       <li><a href="?p=1">尾页</a></li>
                      </ul>
                   </div>

                    <div class="space col-sm-5"></div>
                    <div class="clearfix col-sm-5">
                       <DIV class="col-sm center"> <span class="blue"> 共 <b>&nbsp;3&nbsp;</b>条/共<b>&nbsp;1&nbsp;</b>页&nbsp;&nbsp;到第</span>
                         <input type="text" style="width:50px;text-align:center;" id="jp_page" value="1" />
                         <span class = "blue">页</span>
	                 <input type="button" class="btn btn-sm" value="确定" id="do_change" />
                       </DIV>
                    </div> <script src = /Back/js/jquery.min.js></script> <script src = /Back/js/pages.js></script>
                    </ul>
                </div>
            </div>
        </div>
        <div class='navbar navbar-fixed-top'>
    <div class='container-fluid'>
        <div class='navbar-header'>
            <button class='col-xs-2 navbar-toggle collapsed pull-left' data-target='#sidebar-left' data-toggle='collapse' type='button'>
                菜单
            </button>
            <a class='col-xs-8 navbar-brand' href='/Mart/Main/Index'>
                <img class='navbar-logo' src="/Video/images/apple-touch-icon.png">
                卡布奇诺
            </a>
            <button class='col-xs-2 navbar-toggle collapsed' data-target='#sidebar-right' data-toggle='collapse' type='button'>
                用户
            </button>
        </div>
        <div class='collapse navbar-collapse' id='header-navbar'>
            <ul class='nav navbar-nav navbar-right'>
                                <li class='dropdown'>
                    <a data-toggle='dropdown' href='javascript:;' style="text-align: center;">
                        111111
                    </a>
                    <ul class='dropdown-menu'>
                        <li>
                            <a data-method='delete' href='/Mart/Login/AjaxLogout'>
                                <i class='fa fa-sign-out'></i>
                                退出登录
                            </a>
                        </li>
                    </ul>
                </li>
                            </ul>
            <div class='navbar-menu'> </div>
        </div>
    </div>
</div>

<div class='sidebar sidebar-light collapse navbar-collapse' id='sidebar-right'>
    <div class='title'>用户信息</div>
    <ul class='nav'>
        <li>
            <a href='/Mart/Fav/Index'>
                <i class='fa fa-heart'></i>
                我的收藏 &gt;&gt;
            </a>
        </li>
        <li>
            <a>
                <i class='fa fa-id-badge'></i>
                账户权限:
                <span>
                                        普通用户
                                    </span>
            </a>
        </li>
    </ul>
    <div class='title'>无限尽享</div>
    <ul class='nav'>
        <li>
            <a href='/Mart/Pay/Index' target='_blank'>
                <span>
                    39元 一月 VIP &gt;&gt;
                </span>
            </a>
        </li>
        <li>
            <a href='/Mart/Pay/Index' target='_blank'>
                300元 一年 VIP &gt;&gt;
            </a>
        </li>
    </ul>
    <div class='title'>联系方式</div>
    <ul class='nav'>
        <li>
            <a>
                <span>root@citybay.net</span>
            </a>
        </li>
    </ul>
</div>
    </div>
    <script src="/Video/js/play.js"></script>
</body>
</html><?php }} ?>
