<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-06-29 23:49:00
         compiled from "F:\HTDOCS\Angent_game\Application\views\Video\Public\right.html" */ ?>
<?php /*%%SmartyHeaderCode:6402911855d17886c565094-16148480%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2a8f003fb3d026fe5b4098880d7105f8937fbdf' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Video\\Public\\right.html',
      1 => 1558540712,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6402911855d17886c565094-16148480',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5d17886c5682c4_18304795',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d17886c5682c4_18304795')) {function content_5d17886c5682c4_18304795($_smarty_tpl) {?><?php if (!is_callable('smarty_function_vsource')) include 'F:\\HTDOCS\\Angent_game\\Application\\library\\Smarty\\plugins\\function.vsource.php';
?><div class="navbar navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button class="col-xs-2 navbar-toggle collapsed pull-left" data-target="#sidebar-left" data-toggle="collapse" type="button">
                菜单
            </button>
            <a class="col-xs-8 navbar-brand" href="/Video/Main/Index">
                <img class="navbar-logo" src='<?php echo smarty_function_vsource(array('img'=>"apple-touch-icon.png"),$_smarty_tpl);?>
'>
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
</div><?php }} ?>
