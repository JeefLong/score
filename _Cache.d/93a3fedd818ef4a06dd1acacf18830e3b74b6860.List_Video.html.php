<?php /*%%SmartyHeaderCode:1022679585d17882d6fdd93-36190630%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93a3fedd818ef4a06dd1acacf18830e3b74b6860' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Video\\Main\\List_Video.html',
      1 => 1561818740,
      2 => 'file',
    ),
    '7799055f5659069b9826bb245a23aa9bbc673d99' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Video\\Public\\head.html',
      1 => 1561301286,
      2 => 'file',
    ),
    '085f5c1cd16e9b3875f189fb0f393e4ec6001f45' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Video\\Public\\left.html',
      1 => 1561306038,
      2 => 'file',
    ),
    'b2a8f003fb3d026fe5b4098880d7105f8937fbdf' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Video\\Public\\right.html',
      1 => 1558540712,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1022679585d17882d6fdd93-36190630',
  'variables' => 
  array (
    'max' => 0,
    'val' => 0,
    'list' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5d17882d7b1209_54690819',
  'cache_lifetime' => '3600',
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d17882d7b1209_54690819')) {function content_5d17882d7b1209_54690819($_smarty_tpl) {?><!DOCTYPE html>
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
    <div class="page-with-sidebar" id="page-container">


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
            <a href='1' style='padding-left: 62px;'>
                <i class='fa fa-camera'></i>
                <span>
                    国内
                </span>
            </a>
        </li>
                <li class='list'>
            <a href='2' style='padding-left: 62px;'>
                <i class='fa fa-bath'></i>
                <span>
                    主流
                </span>
            </a>
        </li>
                <li class='list'>
            <a href='3' style='padding-left: 62px;'>
                <i class='fa fa-camera'></i>
                <span>
                    日韩
                </span>
            </a>
        </li>
                <li class='list'>
            <a href='4' style='padding-left: 62px;'>
                <i class='fa fa-bath'></i>
                <span>
                    户外
                </span>
            </a>
        </li>
                <li class='list'>
            <a href='5' style='padding-left: 62px;'>
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
            <a href='/Video/Max/Play'>
                <i class='fa fa-sort-amount-desc'></i>
                <span>播放最多</span>
            </a>
        </li>
        <li class=''>
            <a href='/Video/Max/Favo'>
                <i class='fa fa-thumb-tack'></i>
                <span>收藏最多</span>
            </a>
        </li>
    </ul>
</div>

        <div class="content">
            <h1 class="page-header">
                <i class="fa fa-pagelines"></i>
                国产
                <!-- div class='page-header-menu'></div -->
            </h1>
            <div class="row" style="position: relative">

                <div class='alert alert-warning alert-dismissible' role='alert'>
                    <button aria-label='Close' class='close' data-dismiss='alert' type='button'>
                        <span aria-hidden='true'>×</span>
                    </button>
                    <i class='fa fa-bell-o'></i>
                    登录成功.
                </div>

                <div class="alert alert-success alert-dismissible" role="alert" style="font-size: 14px">
                    <i class="fa fa-bell-o"></i>
                    请使用HTTPS访问：
                    <div class="text-success" style="display: inline-block;">正确姿势 https://abc555.xyz</div>
                    错误姿势 http://abc555.xyz
                </div>


                <div class="container-fluid">

                                        <a class="col-md-2 col-xs-4 item-video-container " href="/Video/Play/Index?v_id=7">
                        <div class="item-video video-sx" style="background-size:cover;background-image: url(http://127.0.0.1/Storage/test1.jpg)">
                            <span>108</span>
                        </div>
                        <h4 class="title video-st">8888</h4>
                    </a>
                                        <a class="col-md-2 col-xs-4 item-video-container " href="/Video/Play/Index?v_id=8">
                        <div class="item-video video-sx" style="background-size:cover;background-image: url(/Storage/test.jpg)">
                            <span>108</span>
                        </div>
                        <h4 class="title video-st">8888</h4>
                    </a>
                                        <a class="col-md-2 col-xs-4 item-video-container " href="/Video/Play/Index?v_id=9">
                        <div class="item-video video-sx" style="background-size:cover;background-image: url(/Storage/test.jpg)">
                            <span>108</span>
                        </div>
                        <h4 class="title video-st">8888</h4>
                    </a>
                                        <a class="col-md-2 col-xs-4 item-video-container " href="/Video/Play/Index?v_id=10">
                        <div class="item-video video-sx" style="background-size:cover;background-image: url(/Storage/test1.jpg)">
                            <span>108</span>
                        </div>
                        <h4 class="title video-st">8888</h4>
                    </a>
                                        <a class="col-md-2 col-xs-4 item-video-container " href="/Video/Play/Index?v_id=11">
                        <div class="item-video video-sx" style="background-size:cover;background-image: url(/Storage/test.jpg)">
                            <span>108</span>
                        </div>
                        <h4 class="title video-st">8888</h4>
                    </a>
                                        <a class="col-md-2 col-xs-4 item-video-container " href="/Video/Play/Index?v_id=12">
                        <div class="item-video video-sx" style="background-size:cover;background-image: url(/Storage/test.jpg)">
                            <span>108</span>
                        </div>
                        <h4 class="title video-st">8888</h4>
                    </a>
                                    </div>


                                <a class="col-md-4 item-video-container"   href="/Video/Play/Index?v_id=1">
                    <div class="item-video video-mx" style="background-size:cover;background-image: url(http://127.0.0.1/Storage/test1.jpg)"></div>
                    <div class="title video-mt">111</div>
                </a>
                                <a class="col-md-4 item-video-container"   href="/Video/Play/Index?v_id=2">
                    <div class="item-video video-mx" style="background-size:cover;background-image: url(http://127.0.0.1/Storage/test1.jpg)"></div>
                    <div class="title video-mt">11111</div>
                </a>
                                <a class="col-md-4 item-video-container"   href="/Video/Play/Index?v_id=7">
                    <div class="item-video video-mx" style="background-size:cover;background-image: url(http://127.0.0.1/Storage/test1.jpg)"></div>
                    <div class="title video-mt">8888</div>
                </a>
                                <a class="col-md-4 item-video-container"   href="/Video/Play/Index?v_id=8">
                    <div class="item-video video-mx" style="background-size:cover;background-image: url(/Storage/test.jpg)"></div>
                    <div class="title video-mt">8888</div>
                </a>
                                <a class="col-md-4 item-video-container"   href="/Video/Play/Index?v_id=9">
                    <div class="item-video video-mx" style="background-size:cover;background-image: url(/Storage/test.jpg)"></div>
                    <div class="title video-mt">8888</div>
                </a>
                                <a class="col-md-4 item-video-container"   href="/Video/Play/Index?v_id=10">
                    <div class="item-video video-mx" style="background-size:cover;background-image: url(/Storage/test1.jpg)"></div>
                    <div class="title video-mt">8888</div>
                </a>
                                <a class="col-md-4 item-video-container"   href="/Video/Play/Index?v_id=11">
                    <div class="item-video video-mx" style="background-size:cover;background-image: url(/Storage/test.jpg)"></div>
                    <div class="title video-mt">8888</div>
                </a>
                                <a class="col-md-4 item-video-container"   href="/Video/Play/Index?v_id=12">
                    <div class="item-video video-mx" style="background-size:cover;background-image: url(/Storage/test.jpg)"></div>
                    <div class="title video-mt">8888</div>
                </a>
                                <a class="col-md-4 item-video-container"   href="/Video/Play/Index?v_id=13">
                    <div class="item-video video-mx" style="background-size:cover;background-image: url(/Storage/test1.jpg)"></div>
                    <div class="title video-mt">8888</div>
                </a>
                                <a class="col-md-4 item-video-container"   href="/Video/Play/Index?v_id=14">
                    <div class="item-video video-mx" style="background-size:cover;background-image: url(/Storage/test.jpg)"></div>
                    <div class="title video-mt">8888</div>
                </a>
                                <a class="col-md-4 item-video-container"   href="/Video/Play/Index?v_id=15">
                    <div class="item-video video-mx" style="background-size:cover;background-image: url(/Storage/test.jpg)"></div>
                    <div class="title video-mt">8888</div>
                </a>
                                <a class="col-md-4 item-video-container"   href="/Video/Play/Index?v_id=16">
                    <div class="item-video video-mx" style="background-size:cover;background-image: url(/Storage/test.jpg)"></div>
                    <div class="title video-mt">999999</div>
                </a>
                            </div>
            <div class="row">
                <div class="pagination-container text-center">
                    <ul class="pagination">
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

        <div class="navbar navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button class="col-xs-2 navbar-toggle collapsed pull-left" data-target="#sidebar-left" data-toggle="collapse" type="button">
                菜单
            </button>
            <a class="col-xs-8 navbar-brand" href="/Video/Main/Index">
                <img class="navbar-logo" src='/Video/images/apple-touch-icon.png'>
                卡布奇诺
            </a>
            <button class="col-xs-2 navbar-toggle collapsed" data-target="#sidebar-right" data-toggle="collapse" type="button">
                用户
            </button>
        </div>
        <div class="collapse navbar-collapse" id="header-navbar">
            <ul class="nav navbar-nav navbar-right">
               
                <li><a href="/Video/Login/Index">登录/注册</a> </li>
            </ul>
            <div class="navbar-menu"> </div>
        </div>
    </div>
</div>

<div class="sidebar sidebar-light collapse navbar-collapse" id="sidebar-right">
    <div class="title">用户信息</div>
    <ul class="nav">
        <li>
            <a href="/Vide/Favor/Index">
                <i class="fa fa-heart"></i>
                我的收藏 &gt;&gt;
            </a>
        </li>
        <li>
            <a>
                <i class="fa fa-id-badge"></i>
                账户权限:
                <span>
                    未登陆
                </span>
            </a>
        </li>
    </ul>
    <div class="title">无限尽享</div>
    <ul class="nav">
        <li>
            <a href="/Vide/Pay/Index" target="_blank">
                <span>
                    39元 一月 VIP &gt;&gt;
                </span>
            </a>
        </li>
        <li>
            <a href="/Vide/Pay/Index" target="_blank">
                300元 一年 VIP &gt;&gt;
            </a>
        </li>
    </ul>
    <div class="title">联系方式</div>
    <ul class="nav">
        <li>
            <a>
                <span>root@citybay.net</span>
            </a>
        </li>
    </ul>
</div>

    </div>

    <script src='/Video/js/play.js'></script>

</body>
</html><?php }} ?>
