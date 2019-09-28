<?php /*%%SmartyHeaderCode:21448446475d178577cb8914-13681694%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '089a47a9956bec748d55ecc8b6dce47ffac2ab07' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Video\\Login\\Login.html',
      1 => 1556462770,
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
  'nocache_hash' => '21448446475d178577cb8914-13681694',
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5d178577d34865_66216119',
  'cache_lifetime' => '3600',
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d178577d34865_66216119')) {function content_5d178577d34865_66216119($_smarty_tpl) {?><!DOCTYPE html>
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
        <div class='content'>
            <h1 class='page-header'>
                <div class='page-header-menu'></div>
            </h1>
            <div class='row' style='position: relative'>
                <div class='m-t-40'>
                    <div class='login-header'>
                        <div class='brand'>
                            <img class='logo' src='/Video/images/apple-touch-icon.png'>登录
                        </div>
                    </div>
                    <div class='login-content'>
                        <form class="new_user" id="new_user" accept-charset="UTF-8">
                            <div class='form-group m-b-15'>
                                <input autofocus="autofocus" class="form-control input-lg" placeholder="邮箱" type="email" value="" name="email[email]" id="email" />
                            </div>
                            <div class='form-group m-b-15'>
                                <input autocomplete="off" class="form-control input-lg" placeholder="密码" type="password" name="password[password]" id="password" />
                            </div>
                            <div class='checkbox m-b-30'>
                                <label>
                                    <input type="checkbox" value="1" name="remember[remember_me]" id="remember" />
                                    记住登录信息
                                </label>
                            </div>
                            <div class='login-buttons'>
                                <button id="commit" type="button" class="btn btn-success btn-block btn-lg" data-disable-with="登录">登录</button>
                            </div>
                            <div class='m-t-20 m-b-20 text-inverse pull-left'>
                                未注册过？
                                <a class='text-success' href='/Video/Regist/Index'>点此注册</a>
                            </div>
                            <div class='m-t-20 m-b-40 p-b-40 text-inverse pull-right'>
                                忘记密码？
                                <a class='text-success' href='/Video/Reset/Index'>点此重设</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class='row'></div>
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

    <script type="text/javascript">
        $(function () {

            $('#commit').click(function () {
                var email = $.trim($('#email').val());
                var password = $.trim($('#password').val());
                var remember = $.trim($('#remember').val());
                var virfy = $.trim($('#remember').val());
                $.ajax({
                    type: 'POST',
                    url: '/Video/Login/AjaxLogin',
                    data: {'email': email, 'password': password, 'remember': remember, 'virfy': virfy},
                    dataType: 'json',
                    success: function (json) {
                        if (json.ecode == 200) {
                            window.location.href = json.url;
                        } else {
                            alert(json.emsg);
                            window.location.href = '/Video/Login/Index';
                        }
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert('登录中......');
                    }
                }); // end ajax
            }); // end click
        }); // end function

    </script>

</body>
</html>
<?php }} ?>
