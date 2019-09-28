<?php /*%%SmartyHeaderCode:12406014135d8a38ba336896-47340511%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2556bfb17528a6ab5fa473061f8d205a5a528bf9' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Mart\\Main\\Index.html',
      1 => 1564934186,
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
  'nocache_hash' => '12406014135d8a38ba336896-47340511',
  'variables' => 
  array (
    'max' => 0,
    'val' => 0,
    'list' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5d8a38ba3cbf89_57072799',
  'cache_lifetime' => '3600',
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d8a38ba3cbf89_57072799')) {function content_5d8a38ba3cbf89_57072799($_smarty_tpl) {?><!DOCTYPE html>
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
                全部..
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
                    请使用HTTPS访问：
                    <div class='text-success' style='display: inline-block;'>正确姿势 https://abc555.xyz</div>
                    错误姿势 http://abc555.xyz
                </div>
                <div class='container-fluid'>
                                        <a class='col-md-2 col-xs-4 item-video-container ' href='/Mart/Goods/Index?goods_id=WGJVVWVtdDUwMVNld2VMVGhhOHlCaFpIS2N0TWNUNWllVHZscXlocEJtSFRkd1pVc2ZLS25haU1MYktPVVdoQg=='>
                        <div class='item-video video-sx' style='background-size:cover;background-image: url(/Storage/test.jpg)'>
                            <span>165</span>
                        </div>
                        <h4 class='title video-st'>003</h4>
                    </a>
                                        <a class='col-md-2 col-xs-4 item-video-container ' href='/Mart/Goods/Index?goods_id=c3IzMnNmTDNmdzNtaWJOVlVha0UzZEo5bmVZdWdXUVVIZDROeGRSSnNVTWQ2dytSaDFUSDRCNUU2TEVTNWJPcw=='>
                        <div class='item-video video-sx' style='background-size:cover;background-image: url(/Storage/test.jpg)'>
                            <span>128</span>
                        </div>
                        <h4 class='title video-st'>222</h4>
                    </a>
                                        <a class='col-md-2 col-xs-4 item-video-container ' href='/Mart/Goods/Index?goods_id=ZkdYT2MzajAxRW8zS0JwdVdLMXNveWd5SmRmZUdGdXJtVlB2UG1PdVJ1VFBub0VTbE8rNDczY1hFdVF4WmpZLw=='>
                        <div class='item-video video-sx' style='background-size:cover;background-image: url(/Storage/test.jpg)'>
                            <span>115</span>
                        </div>
                        <h4 class='title video-st'>222</h4>
                    </a>
                                        <a class='col-md-2 col-xs-4 item-video-container ' href='/Mart/Goods/Index?goods_id=dFBTL2E5Vkh3ZXVPS290cWdNaE50cTVLQTJVRm9mVGg3K1hMdGxYY3dGaTdBcTM1SkNseGdySGlWdUN5MnVxNA=='>
                        <div class='item-video video-sx' style='background-size:cover;background-image: url(/Storage/test.jpg)'>
                            <span>113</span>
                        </div>
                        <h4 class='title video-st'>ssss</h4>
                    </a>
                                        <a class='col-md-2 col-xs-4 item-video-container ' href='/Mart/Goods/Index?goods_id=SXhlUjV5Ykc5bnhFRGRKajJWS09rSXJUOHdIT3VRWUxsS0QxTVZtbVJGK1Q2OWxHNnJqWmhzWEQ1Nis0dTlTMw=='>
                        <div class='item-video video-sx' style='background-size:cover;background-image: url(/Storage/test.jpg)'>
                            <span>113</span>
                        </div>
                        <h4 class='title video-st'>nnnn</h4>
                    </a>
                                        <a class='col-md-2 col-xs-4 item-video-container ' href='/Mart/Goods/Index?goods_id=ZkdYT2MzajAxRW8zS0JwdVdLMXNvNUpwOGkzNTlhQ0FJOGRDcndZV1h1V0huS1ptQ0JiUU5EWVBJbkwvZklaQQ=='>
                        <div class='item-video video-sx' style='background-size:cover;background-image: url(http://127.0.0.1/Storage/test1.jpg)'>
                            <span>111</span>
                        </div>
                        <h4 class='title video-st'>77777</h4>
                    </a>
                                    </div>
                                <a class='col-md-4 item-video-container'   href='/Mart/Goods/Index?goods_id=ZkdYT2MzajAxRW8zS0JwdVdLMXNvNGtOc2NrckRmRGpraFA3UjdqU3dKUnY1REJiVHE2dlNLbUd3N084SFVjUA=='>
                    <div class='item-video video-mx' style='background-size:cover;background-image: url(http://127.0.0.1/Storage/test1.jpg)'></div>
                    <div class='title video-mt'>1111</div>
                </a>
                                <a class='col-md-4 item-video-container'   href='/Mart/Goods/Index?goods_id=dFBTL2E5Vkh3ZXVPS290cWdNaE50cGEwQTROQ2xaNzE0L3E1RXluWmI3YXZ3cC9yOUUvcUwxclZvRm50UmZEcw=='>
                    <div class='item-video video-mx' style='background-size:cover;background-image: url(http://127.0.0.1/Storage/test1.jpg)'></div>
                    <div class='title video-mt'>2222</div>
                </a>
                                <a class='col-md-4 item-video-container'   href='/Mart/Goods/Index?goods_id=WGJVVWVtdDUwMVNld2VMVGhhOHlCZ0hOOFE5VVUzT21MczhWeG9qNS9QYz0='>
                    <div class='item-video video-mx' style='background-size:cover;background-image: url(http://127.0.0.1/Storage/test1.jpg)'></div>
                    <div class='title video-mt'>77777</div>
                </a>
                                <a class='col-md-4 item-video-container'   href='/Mart/Goods/Index?goods_id=ZkdYT2MzajAxRW8zS0JwdVdLMXNvMDQ0K2V0Q3R4UERNcldFUnhFazZ2eDlvdldjNTFtaTVGR2dzSDhHR1piUw=='>
                    <div class='item-video video-mx' style='background-size:cover;background-image: url(/Storage/test.jpg)'></div>
                    <div class='title video-mt'>222</div>
                </a>
                                <a class='col-md-4 item-video-container'   href='/Mart/Goods/Index?goods_id=ZkdYT2MzajAxRW8zS0JwdVdLMXNvMXRncFhUT3hHSGo0bzJ0SXY4TjFRYVFtT2NiSjRZOG00T21KZUYxTHVmYQ=='>
                    <div class='item-video video-mx' style='background-size:cover;background-image: url(/Storage/test.jpg)'></div>
                    <div class='title video-mt'>333</div>
                </a>
                                <a class='col-md-4 item-video-container'   href='/Mart/Goods/Index?goods_id=dFBTL2E5Vkh3ZXVPS290cWdNaE50dlRDK09NaGk5Q21CeWplaVZrcUFQT2ZVVkNKRDJGUTRiZXBTTUx1Tkd4NQ=='>
                    <div class='item-video video-mx' style='background-size:cover;background-image: url(/Storage/test1.jpg)'></div>
                    <div class='title video-mt'>sdf</div>
                </a>
                                <a class='col-md-4 item-video-container'   href='/Mart/Goods/Index?goods_id=UGFicWdINWx5NjlrSVdYb2FNZTloRFQ0cFY4dHgxNFJTbGxjRTY3VFNpclNRa2FpelJJa3FLbUZnUWVPL0RZZQ=='>
                    <div class='item-video video-mx' style='background-size:cover;background-image: url(/Storage/test.jpg)'></div>
                    <div class='title video-mt'>55</div>
                </a>
                                <a class='col-md-4 item-video-container'   href='/Mart/Goods/Index?goods_id=c3IzMnNmTDNmdzNtaWJOVlVha0UzU0RCelpJZWVncklEaG5HVDRSTnBtWGVYLzNnbkdocmk2YlF0cjdFc3NGSQ=='>
                    <div class='item-video video-mx' style='background-size:cover;background-image: url(/Storage/test.jpg)'></div>
                    <div class='title video-mt'>nnn</div>
                </a>
                                <a class='col-md-4 item-video-container'   href='/Mart/Goods/Index?goods_id=dFBTL2E5Vkh3ZXVPS290cWdNaE50bVQ0SnZzMmhZNHp6aU5JbTBTRER3TFcva1M3MHVsMlJra2VDVXY4dHdFbQ=='>
                    <div class='item-video video-mx' style='background-size:cover;background-image: url(/Storage/test1.jpg)'></div>
                    <div class='title video-mt'>ddd</div>
                </a>
                                <a class='col-md-4 item-video-container'   href='/Mart/Goods/Index?goods_id=dFBTL2E5Vkh3ZXVPS290cWdNaE50cFUyTGJHNkQwL0UzTS81Rkg4MG9ZNFh1Q2EzdkxRZ2lORmF6TGRSU1R4OQ=='>
                    <div class='item-video video-mx' style='background-size:cover;background-image: url(/Storage/test.jpg)'></div>
                    <div class='title video-mt'>tttt</div>
                </a>
                                <a class='col-md-4 item-video-container'   href='/Mart/Goods/Index?goods_id=SEllQWVzRVdRbkFyQUt1UTNhV1l2WHBFWTZRWSs4cmRzV3hkZ3RVWWIwSFk5UG5QazBxUG83aGdGTld2REEyOQ=='>
                    <div class='item-video video-mx' style='background-size:cover;background-image: url(/Storage/test.jpg)'></div>
                    <div class='title video-mt'>ssss</div>
                </a>
                                <a class='col-md-4 item-video-container'   href='/Mart/Goods/Index?goods_id=dFBTL2E5Vkh3ZXVPS290cWdNaE50djkzcGN5UTNTeUZ0aHYzSFVkNUNPdEVLMFg0bEs5cFNSSUhEcm9XcVBaNA=='>
                    <div class='item-video video-mx' style='background-size:cover;background-image: url(/Storage/test.jpg)'></div>
                    <div class='title video-mt'>999999</div>
                </a>
                            </div>
            <div class='row'>
                <div class='pagination-container text-center'>
                    <ul class='pagination'>
                        <div class="col-sm-7">
                      <ul class="pagination">
                       <li><a href="?p=1">首页</a></li>
                       <li><a href="?p=1"><<<</a></li><li class="active"><a href="?p=1">1</a></li><li><a href="?p=2">2</a></li><li><a href="?p=2">>>></a></li>
                       <li><a href="?p=2">尾页</a></li>
                      </ul>
                   </div>

                    <div class="space col-sm-5"></div>
                    <div class="clearfix col-sm-5">
                       <DIV class="col-sm center"> <span class="blue"> 共 <b>&nbsp;20&nbsp;</b>条/共<b>&nbsp;2&nbsp;</b>页&nbsp;&nbsp;到第</span>
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
                                <li><a href='/Mart/Login/Index'>登录/注册</a> </li>
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
                                        未登录
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
