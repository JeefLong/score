<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-09-25 21:06:49
         compiled from "F:\HTDOCS\Angent_game\Application\views\Admin\Public\header.html" */ ?>
<?php /*%%SmartyHeaderCode:11329356905d8b6669b87289-62789550%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c4300f71360157503e49021357270e4183c597d' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Admin\\Public\\header.html',
      1 => 1540279299,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11329356905d8b6669b87289-62789550',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5d8b6669bb9576_10707634',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d8b6669bb9576_10707634')) {function content_5d8b6669bb9576_10707634($_smarty_tpl) {?><?php if (!is_callable('smarty_function_asource')) include 'F:\\HTDOCS\\Angent_game\\Application\\library\\Smarty\\plugins\\function.asource.php';
?><!DOCTYPE HTML>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="Content-Language" content="zh-CN" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>数据管理中心</title>
        <meta name="keywords" content="数据管理中心" />
        <meta name="description" content="数据管理中心" />
        <link rel="bookmark" href="<?php echo smarty_function_asource(array('img'=>'faviconie.ico'),$_smarty_tpl);?>
" />
        <link rel="shortcut icon" href="<?php echo smarty_function_asource(array('img'=>'faviconie.ico'),$_smarty_tpl);?>
" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <!-- basic styles -->
        <link href="<?php echo smarty_function_asource(array('css'=>'bootstrap.min.css'),$_smarty_tpl);?>
" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo smarty_function_asource(array('css'=>'font-awesome.min.css'),$_smarty_tpl);?>
" />

        <link rel="stylesheet" href="<?php echo smarty_function_asource(array('css'=>'ace.min.css'),$_smarty_tpl);?>
" />

        <!--[if lte IE 9]>
                <link rel="stylesheet" href="<?php echo smarty_function_asource(array('css'=>'ace-part2.min.css'),$_smarty_tpl);?>
" class="ace-main-stylesheet" />
        <![endif]-->
        <link rel="stylesheet" href="<?php echo smarty_function_asource(array('css'=>'ace-skins.min.css'),$_smarty_tpl);?>
" />
        <link rel="stylesheet" href="<?php echo smarty_function_asource(array('css'=>'ace-rtl.min.css'),$_smarty_tpl);?>
" />

        <!--[if lte IE 9]>
          <link rel="stylesheet" href="<?php echo smarty_function_asource(array('css'=>'ace-ie.min.css'),$_smarty_tpl);?>
" />
        <![endif]-->

        <!-- inline styles related to this page -->

        <!-- ace settings handler -->
        <?php echo '<script'; ?>
 src="<?php echo smarty_function_asource(array('js'=>'ace-extra.min.js'),$_smarty_tpl);?>
"><?php echo '</script'; ?>
>
        <link rel="stylesheet" href="<?php echo smarty_function_asource(array('css'=>'animate.css'),$_smarty_tpl);?>
" />

        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lt IE 9]>
        <?php echo '<script'; ?>
 src="<?php echo smarty_function_asource(array('js'=>'html5shiv.min.js'),$_smarty_tpl);?>
"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo smarty_function_asource(array('js'=>'respond.min.js'),$_smarty_tpl);?>
"><?php echo '</script'; ?>
>
        <![endif]-->

        <!--[if !IE]> -->
        <?php echo '<script'; ?>
 type="text/javascript">
            window.jQuery || document.write("<?php echo '<script'; ?>
 src='<?php echo smarty_function_asource(array('js'=>'jquery-2.1.4.min.js'),$_smarty_tpl);?>
'>" + "<" + "/script>");
        <?php echo '</script'; ?>
>
        <!-- <![endif]-->

        <!--[if IE]>
        <?php echo '<script'; ?>
 type="text/javascript">
            window.jQuery || document.write("<?php echo '<script'; ?>
 src='<?php echo smarty_function_asource(array('js'=>'jquery-1.11.3.min.js'),$_smarty_tpl);?>
'>"+"<"+"/script>");
        <?php echo '</script'; ?>
>
        <![endif]-->


        <?php echo '<script'; ?>
 type="text/javascript">
            if ('ontouchstart' in document.documentElement)
                document.write("<?php echo '<script'; ?>
 src='<?php echo smarty_function_asource(array('js'=>'jquery.mobile.custom.min.js'),$_smarty_tpl);?>
'>" + "<" + "/script>");
        <?php echo '</script'; ?>
>

    </head>
    <body class="skin-2">
        <!-- #section:basics/navbar.layout -->
        <div id="navbar" class="navbar navbar-default ace-save-state">
            <div class="navbar-container ace-save-state" id="navbar-container">
                <!-- #section:basics/sidebar.mobile.toggle -->
                <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                    <span class="sr-only">菜单</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- /section:basics/sidebar.mobile.toggle -->
                <div class="navbar-header pull-left">
                    <!-- #section:basics/navbar.layout.brand -->
                    <a href="#" class="navbar-brand">
                        <small>
                            <i class="fa fa-leaf"></i>
                            数据管理中心
                        </small>
                    </a>
                    <!-- /section:basics/navbar.layout.brand -->
                    <!-- #section:basics/navbar.toggle -->
                    <!-- /section:basics/navbar.toggle -->
                </div>

                <!-- #section:basics/navbar.dropdown -->
                <div class="navbar-buttons navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav">
                        <!-- 第三个开始 -->
                        <li class="green dropdown-modal">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
                                <span class="badge badge-success" id="mssage_count2">0</span>
                            </a>

                            <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                                <li class="dropdown-header">
                                    <i class="ace-icon fa fa-envelope-o"></i>
                                    <b id="mssage_count1">0</b>条新消息
                                </li>

                                <li class="dropdown-content">
                                    <ul class="dropdown-menu dropdown-navbar" id="message_list">
                                         <!-- Ajax Messages -->
                                    </ul>
                                </li>

                                <li class="dropdown-footer">
                                    <a href="/Admin/Message/ListMessage">
                                        查看全部
                                        <i class="ace-icon fa fa-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- ./第三个结束 -->

                        <!-- #section:basics/navbar.user_menu -->
                        <!-- 管理员头像 -->
                        <li class="light-blue dropdown-modal">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <img class="nav-user-photo" src="<?php echo smarty_function_asource(array('img'=>'user.jpg'),$_smarty_tpl);?>
" alt="Admin's Photo" />
                                <span class="user-info">
                                    <small>欢迎 </small>
                                    <?php echo $_SESSION['_admin_user']['uname'];?>

                                </span>

                                <i class="ace-icon fa fa-caret-down"></i>
                            </a>

                            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <!--   <li>
                                        <a href="/Admin/Manage/ModAdmin?uid=<?php echo $_SESSION['_admin_user']['uid'];?>
">
                                        <i class="ace-icon fa fa-envelope"></i> 站内信
                                          </a>
                                        </li>  -->
                                <li class="divider"></li>
                                <li>
                                    <a href="/Admin/Manage/ModAdmin?uid=<?php echo $_SESSION['_admin_user']['uid'];?>
">
                                        <i class="ace-icon fa fa-cog"></i>
                                        修改
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="/Admin/Login/LogOut">
                                        <i class="ace-icon fa fa-android"></i>
                                        退出
                                    </a>
                                </li>

                                <li class="divider"></li>

                            </ul>
                        </li>
                        <!-- /.管理员头像结束 -->
                        <!-- /section:basics/navbar.user_menu -->
                    </ul>
                </div>

                <!-- /section:basics/navbar.dropdown -->
            </div><!-- /.navbar-container -->
        </div>
<?php }} ?>
