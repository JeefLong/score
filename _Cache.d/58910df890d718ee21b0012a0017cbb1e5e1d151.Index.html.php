<?php /*%%SmartyHeaderCode:12573629905d470143251036-36440027%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58910df890d718ee21b0012a0017cbb1e5e1d151' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Mart\\Goods\\Index.html',
      1 => 1564931324,
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
  'nocache_hash' => '12573629905d470143251036-36440027',
  'variables' => 
  array (
    'val' => 0,
    'fav' => 0,
    'vid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5d470143301aa3_19549620',
  'cache_lifetime' => '3600',
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d470143301aa3_19549620')) {function content_5d470143301aa3_19549620($_smarty_tpl) {?><!DOCTYPE html>
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
                <div class='video-head-title'>
                    <i class='fa fa-pagelines'></i>
                    物料
                </div>
                <div class='page-header-menu'> </div>
            </h1>
            <div class='row' style='position: relative'>
                <div class='m-l-15 m-r-15 alert alert-warning alert-dismissible' role='alert'>
                    <button aria-label='Close' class='close' data-dismiss='alert' type='button'>
                        <span aria-hidden='true'>×</span>
                    </button>
                    <i class='fa fa-bell-o'></i>
                    <strong>观看说明</strong>
                    <ul>
                        <li>
                            免费用户可任意欣赏3部普通物料
                        </li>
                        <li>
                            加入 VIP 即可观看全站所有'隐藏'与最新物料
                        </li>
                        <li>
                            <a target='_blank' href='/balance'>极速加入 &gt;&gt;</a>
                        </li>
                    </ul>
                </div>
                <div class='m-l-15 m-r-15'>
                    <video autoplay='autoplay' class='mejs__player' controls='controls' id='mediaplayer' style='width: 100%; height: 100%; display: block;'>
                        您的浏览器不支持播放此视频,请使用 QQ浏览器 或 谷歌浏览器^.^
                    </video>
                    <div class='video-info'>
                        <div class='video-title'>
                            2222222
                        </div>
                                                <a class='btn btn-sm btn-success m-t-15 p-l-10 p-r-10' href = 'javascript:void(0);' id='Fav' onclick = "Fav('TEJQVXVWeGpIaC9uU1p2N2dtWmMvd2tKSGJIUU95eGxOOVdzdDJ4MStrYzZGbTkyT3ZVYkxKSWRmWHdkSTFacQ==');">收藏</a>

                                            </div>


                </div>

            </div>
            <div class='row'></div>
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
    <script type="text/javascript">
                            $(function () {
                                var mplayer = document.getElementById('mediaplayer');
                                mplayer.src = '/Show/TEJQVXVWeGpIaC9uU1p2N2dtWmMvd2tKSGJIUU95eGxOOVdzdDJ4MStrYzZGbTkyT3ZVYkxKSWRmWHdkSTFacQ==';
                            });

                            function Fav(val)
                            {

                                $.ajax({
                                    type: 'POST',
                                    url: '/Mart/Goods/AddFav',
                                    data: {'goods_id': val},
                                    dataType: "json",
                                    success: function (json) {
                                        if (json.ecode == 200) {
                                            $('#Fav').text('取消');
                                        } else if (json.ecode == 201) {
                                            $('#Fav').text('收藏');
                                        } else {
                                            alert('收藏失败');
                                        }
                                    },
                                    failure: function () {
                                        alert('获取中......');
                                    },
                                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                                        alert('获取中......');
                                    }
                                }); //end ajax
                            }


    </script>
</body>
</html>
<?php }} ?>
