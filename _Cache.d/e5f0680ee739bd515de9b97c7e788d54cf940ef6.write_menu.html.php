<?php /*%%SmartyHeaderCode:12846456415d88e433adb182-45686516%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5f0680ee739bd515de9b97c7e788d54cf940ef6' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Admin\\Menu\\write_menu.html',
      1 => 1534751540,
      2 => 'file',
    ),
    '9c4300f71360157503e49021357270e4183c597d' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Admin\\Public\\header.html',
      1 => 1540279299,
      2 => 'file',
    ),
    '356323e1c98d44ff929906e090df3d3034d3f200' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Admin\\Public\\left.html',
      1 => 1489589075,
      2 => 'file',
    ),
    '3586cc26c450450ce5d65a7193113a65574b391b' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Admin\\Public\\styletool.html',
      1 => 1487318688,
      2 => 'file',
    ),
    '0b66a68f582fb467c4e69deef8a27a8fff7e504d' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Admin\\Public\\footer.html',
      1 => 1553439281,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12846456415d88e433adb182-45686516',
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5d88e433bc74e5_26444663',
  'cache_lifetime' => '3600',
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d88e433bc74e5_26444663')) {function content_5d88e433bc74e5_26444663($_smarty_tpl) {?><!DOCTYPE HTML>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="Content-Language" content="zh-CN" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>数据管理中心</title>
        <meta name="keywords" content="数据管理中心" />
        <meta name="description" content="数据管理中心" />
        <link rel="bookmark" href="/Back/Assets/images/faviconie.ico" />
        <link rel="shortcut icon" href="/Back/Assets/images/faviconie.ico" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <!-- basic styles -->
        <link href="/Back/Assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="/Back/Assets/css/font-awesome.min.css" />

        <link rel="stylesheet" href="/Back/Assets/css/ace.min.css" />

        <!--[if lte IE 9]>
                <link rel="stylesheet" href="/Back/Assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
        <![endif]-->
        <link rel="stylesheet" href="/Back/Assets/css/ace-skins.min.css" />
        <link rel="stylesheet" href="/Back/Assets/css/ace-rtl.min.css" />

        <!--[if lte IE 9]>
          <link rel="stylesheet" href="/Back/Assets/css/ace-ie.min.css" />
        <![endif]-->

        <!-- inline styles related to this page -->

        <!-- ace settings handler -->
        <script src="/Back/Assets/js/ace-extra.min.js"></script>
        <link rel="stylesheet" href="/Back/Assets/css/animate.css" />

        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lt IE 9]>
        <script src="/Back/Assets/js/html5shiv.min.js"></script>
        <script src="/Back/Assets/js/respond.min.js"></script>
        <![endif]-->

        <!--[if !IE]> -->
        <script type="text/javascript">
            window.jQuery || document.write("<script src='/Back/Assets/js/jquery-2.1.4.min.js'>" + "<" + "/script>");
        </script>
        <!-- <![endif]-->

        <!--[if IE]>
        <script type="text/javascript">
            window.jQuery || document.write("<script src='/Back/Assets/js/jquery-1.11.3.min.js'>"+"<"+"/script>");
        </script>
        <![endif]-->


        <script type="text/javascript">
            if ('ontouchstart' in document.documentElement)
                document.write("<script src='/Back/Assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>

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
                                <img class="nav-user-photo" src="/Back/Assets/images/user.jpg" alt="Admin's Photo" />
                                <span class="user-info">
                                    <small>欢迎 </small>
                                    R00T
                                </span>

                                <i class="ace-icon fa fa-caret-down"></i>
                            </a>

                            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <!--   <li>
                                        <a href="/Admin/Manage/ModAdmin?uid=10">
                                        <i class="ace-icon fa fa-envelope"></i> 站内信
                                          </a>
                                        </li>  -->
                                <li class="divider"></li>
                                <li>
                                    <a href="/Admin/Manage/ModAdmin?uid=10">
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

<div class="main-container ace-save-state" id="main-container">
    <script type="text/javascript">
        try {
            ace.settings.loadState('main-container')
        } catch (e) {
        }
    </script>
    <div id="sidebar" class="sidebar responsive ace-save-state">
    <script type="text/javascript">
        try {
            ace.settings.loadState('sidebar')
        } catch (e) {
        }
    </script>
    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="ace-icon fa fa-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="ace-icon fa fa-pencil"></i>
            </button>

            <button class="btn btn-warning">
                <i class="ace-icon fa fa-users"></i>
            </button>

            <button class="btn btn-danger">
                <i class="ace-icon fa fa-cogs"></i>
            </button>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- #sidebar-shortcuts -->

    <ul class="nav nav-list">
          
                <li >
            <a href='#' class='dropdown-toggle'>
                <i class="menu-icon fa fa-pencil-square-o"></i>
                <span class="menu-text"> 数据中心 </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
                                                <li>
                    <a href='/Admin/Main/index'>
                        <i class="menu-icon fa fa-caret-right"></i>
                        后台首页 
                    </a>
                    <b class="arrow"></b>
                </li>
                                                                <li>
                    <a href='/Admin/Main/listnote'>
                        <i class="menu-icon fa fa-caret-right"></i>
                        站点公告 
                    </a>
                    <b class="arrow"></b>
                </li>
                                                                                                                                                                            </ul>
        </li>
                  
                <li >
            <a href='#' class='dropdown-toggle'>
                <i class="menu-icon fa fa-pencil-square-o"></i>
                <span class="menu-text"> 用户管理 </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
                                                <li>
                    <a href='/Admin/User/listuser'>
                        <i class="menu-icon fa fa-caret-right"></i>
                        用户列表 
                    </a>
                    <b class="arrow"></b>
                </li>
                                                                                                                                                                            </ul>
        </li>
                  
                <li >
            <a href='#' class='dropdown-toggle'>
                <i class="menu-icon fa fa-pencil-square-o"></i>
                <span class="menu-text"> 视频管理 </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
                                                <li>
                    <a href='/Admin/Video/listvideo'>
                        <i class="menu-icon fa fa-caret-right"></i>
                        视频管理 
                    </a>
                    <b class="arrow"></b>
                </li>
                                                                                                                                            </ul>
        </li>
                  
                  
                  
                <li >
            <a href='#' class='dropdown-toggle'>
                <i class="menu-icon fa fa-pencil-square-o"></i>
                <span class="menu-text"> 房卡充值 </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
                                                <li>
                    <a href='/Admin/Charge/addcharge'>
                        <i class="menu-icon fa fa-caret-right"></i>
                        代理充卡 
                    </a>
                    <b class="arrow"></b>
                </li>
                                                                                                                                <li>
                    <a href='/Admin/Charge/exgcharge'>
                        <i class="menu-icon fa fa-caret-right"></i>
                        房卡转让 
                    </a>
                    <b class="arrow"></b>
                </li>
                                            </ul>
        </li>
                  
                <li >
            <a href='#' class='dropdown-toggle'>
                <i class="menu-icon fa fa-pencil-square-o"></i>
                <span class="menu-text"> 金币充值 </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
                                                <li>
                    <a href='/Admin/Posit/addposit'>
                        <i class="menu-icon fa fa-caret-right"></i>
                        代理充币 
                    </a>
                    <b class="arrow"></b>
                </li>
                                                                                                <li>
                    <a href='/Admin/Posit/exgposit'>
                        <i class="menu-icon fa fa-caret-right"></i>
                        金币转让 
                    </a>
                    <b class="arrow"></b>
                </li>
                                                                            </ul>
        </li>
                  
                <li >
            <a href='#' class='dropdown-toggle'>
                <i class="menu-icon fa fa-pencil-square-o"></i>
                <span class="menu-text"> 房卡记录 </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
                                                <li>
                    <a href='/Admin/Order/listorder'>
                        <i class="menu-icon fa fa-caret-right"></i>
                        订单记录 
                    </a>
                    <b class="arrow"></b>
                </li>
                                                                <li>
                    <a href='/Admin/Order/sumorder'>
                        <i class="menu-icon fa fa-caret-right"></i>
                        销售业绩 
                    </a>
                    <b class="arrow"></b>
                </li>
                                                                                                            </ul>
        </li>
                  
                <li >
            <a href='#' class='dropdown-toggle'>
                <i class="menu-icon fa fa-pencil-square-o"></i>
                <span class="menu-text"> 金币记录 </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
                                                <li>
                    <a href='/Admin/Gold/listgold'>
                        <i class="menu-icon fa fa-caret-right"></i>
                        订单记录 
                    </a>
                    <b class="arrow"></b>
                </li>
                                                                <li>
                    <a href='/Admin/Gold/sumgold'>
                        <i class="menu-icon fa fa-caret-right"></i>
                        销售业绩 
                    </a>
                    <b class="arrow"></b>
                </li>
                                                                                                            </ul>
        </li>
                  
                  
                  
                  
                  
                <li >
            <a href='#' class='dropdown-toggle'>
                <i class="menu-icon fa fa-pencil-square-o"></i>
                <span class="menu-text"> 管理中心 </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
                                                <li>
                    <a href='/Admin/Manage/loginlog'>
                        <i class="menu-icon fa fa-caret-right"></i>
                        登录日志 
                    </a>
                    <b class="arrow"></b>
                </li>
                                                                                                <li>
                    <a href='/Admin/Manage/listaction'>
                        <i class="menu-icon fa fa-caret-right"></i>
                        行为日志 
                    </a>
                    <b class="arrow"></b>
                </li>
                                                                                                                                <li>
                    <a href='/Admin/Manage/listsms'>
                        <i class="menu-icon fa fa-caret-right"></i>
                        验证码日志 
                    </a>
                    <b class="arrow"></b>
                </li>
                                                                                                <li>
                    <a href='/Admin/Manage/listmanage'>
                        <i class="menu-icon fa fa-caret-right"></i>
                        后台管理员 
                    </a>
                    <b class="arrow"></b>
                </li>
                                                                                                                                                                            </ul>
        </li>
                  
                <li >
            <a href='#' class='dropdown-toggle'>
                <i class="menu-icon fa fa-pencil-square-o"></i>
                <span class="menu-text"> 站内信 </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
                                                                                <li>
                    <a href='/Admin/Message/listmessage'>
                        <i class="menu-icon fa fa-caret-right"></i>
                        站内信 
                    </a>
                    <b class="arrow"></b>
                </li>
                                                                                                                                                                            </ul>
        </li>
                  
                <li  class = 'highlight active open' >
            <a href='#' class='dropdown-toggle'>
                <i class="menu-icon fa fa-pencil-square-o"></i>
                <span class="menu-text"> 菜单管理 </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
                                                <li>
                    <a href='/Admin/Menu/listmenu'>
                        <i class="menu-icon fa fa-caret-right"></i>
                        菜单浏览 
                    </a>
                    <b class="arrow"></b>
                </li>
                                                                                                                                                                <li class = "active" >
                    <a href='/Admin/Menu/writemenu'>
                        <i class="menu-icon fa fa-caret-right"></i>
                        生成菜单 
                    </a>
                    <b class="arrow"></b>
                </li>
                                                                            </ul>
        </li>
                  
                  
                    </ul><!-- /.nav-list -->


    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>

    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'collapsed')
        }
        catch (e)
        {
        }

    </script>

</div>

    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="/Admin/Main/Index">首页</a>
                    </li>

                    <li>
                        <a href="/Admin/Menu/ListMenu">菜单管理</a>
                    </li>
                    <li class="active">列表</li>
                </ul><!-- /.breadcrumb -->

                <div class="nav-search" id="nav-search">
                    <form class="form-search" method="get">
                        <span class="input-icon">
                            <input type="text" placeholder="菜单名[回车]" class="nav-search-input" name = "search_angent" id = "search_angent" />
                            <i class="ace-icon fa fa-search nav-search-icon"></i>
                        </span>
                    </form>
                </div><!-- /.nav-search -->
            </div>

            <div class="page-content">
                <div class="ace-settings-container" id="ace-settings-container">
                    <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                        <i class="ace-icon fa fa-cog bigger-130"></i>
                    </div>

                    <div class="ace-settings-box clearfix" id="ace-settings-box">
                        <div class="pull-left width-50">
                            <div class="ace-settings-item">
                                <div class="pull-left">
                                    <select id="skin-colorpicker" class="hide">
                                        <option data-skin="no-skin" value="#438EB9">#438EB9</option>
                                        <option data-skin="skin-1"  value="#222A2D">#222A2D</option>
                                        <option data-skin="skin-2"  value="#C6487E">#C6487E</option>
                                        <option data-skin="skin-3"  value="#D0D0D0">#D0D0D0</option>
                                    </select>
                                </div>
                                <span>&nbsp; 皮肤选择</span>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
                                <label class="lbl" for="ace-settings-navbar"> 固定导航</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
                                <label class="lbl" for="ace-settings-sidebar"> 固定侧栏</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
                                <label class="lbl" for="ace-settings-breadcrumbs"> 固定页导航</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
                                <label class="lbl" for="ace-settings-rtl">左右翻转</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
                                <label class="lbl" for="ace-settings-add-container">
                                    框架
                                    <b>.窄屏</b>
                                </label>
                            </div>
                        </div><!-- /.pull-left -->

                        <div class="pull-left width-50">
                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
                                <label class="lbl" for="ace-settings-hover"> 自动触发菜单</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
                                <label class="lbl" for="ace-settings-compact"> 固定菜单</label>
                            </div>

                            <div class="ace-settings-item">
                                <input type="checkbox" checked="checked" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
                                <label class="lbl" for="ace-settings-highlight"> 激活样式</label>
                            </div>
                        </div><!-- /.pull-left -->
                    </div><!-- /.ace-settings-box -->
                </div><!-- /.ace-settings-container --> 
                <div class="page-header">
                    <h1>
                        菜单管理
                        <small>
                            <i class="icon-double-angle-right"></i>
                            列表
                        </small>
                    </h1>
                </div><!-- /.page-header -->
                <div class="row">

                    <!-- PAGE CONTENT BEGINS -->

                    <div class="col-xs-12 col-sm-12 col-lg-12">
                        <div class="table-responsive fadeInDown animated">
                            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr class="danger">
                                        <th>ID</th>
                                        <th>菜单名称</th>
                                        <th>生成状态</th>

                                    </tr>
                                </thead>
                                <tbody id="indata">

                                </tbody>
                                <tr>
                                    <td colspan = "9"> 
                                        <button class="btn btn-purple btn-sm" type="button" id="deldata">
                                            生成
                                            <i class="icon-cog icon-on-right bigger-110"></i>
                                        </button>
                                    </td>
                                </tr>

                            </table>
                        </div><!-- /.table-responsive -->

                        <!-- Sub Page -->

                        <!-- /.Sub Page -->

                    </div><!-- /.row .col -->

                    <!-- PAGE CONTENT ENDS -->

                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div><!-- /.main-content-inner -->
    </div> <!-- /.main-content -->
    <!-- </div> /.main-container -->

    <script type="text/javascript">
        $('#deldata').click(function () {
            if (!confirm('确认要生成新菜单吗？'))
            {
                return false;
            }
            $('#deldata').attr('disabled', 'disabled').addClass('disabled');
            $.ajax({
                url: '/Admin/Menu/AjaxWriteMenu',
                type: 'POST',
                data: {'act': Math.random(), },
                dataType: 'json',
                success: function (json) {

                    $(json).each(function (i, val) {
                        $('#indata').delay(4000).append('<tr><td>' + val.id + '</td><td>' + val.name + '</td><td>OK</td></tr>');
                        $(val.node).each(function (ni, nval) {
                            $('#indata').delay(4000).append('<tr><td>' + nval.id + '</td><td>' + nval.name + '</td><td>OK</td></tr>');
                        });
                    });
                },
            });
        });

    </script>

    <!-- TO TOP -->
<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
<!-- /.TO TOP -->
<div class="footer">
    <div class="footer-inner">
        <div class="footer-content">
            <span class="bigger-120">
                <span class="blue bolder">Redua</span>
                Application &copy; 2016-2017
            </span>
            &nbsp; &nbsp;
            <span class="action-buttons">
                <a href="#">
                    <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
                </a>

                <a href="#">
                    <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
                </a>

                <a href="#">
                    <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
                </a>
            </span>
        </div>
    </div>
</div>
</div><!-- /.main-container -->


<script src="/Back/Assets/js/bootstrap.min.js"></script>
<!-- page specific plugin scripts -->
<!--[if lte IE 9]>
  <script src="/Back/Assets/js/excanvas.min.js"></script>
<![endif]-->
<!-- ace scripts -->
<script src="/Back/Assets/js/ace-elements.min.js"></script>
<script src="/Back/Assets/js/ace.min.js"></script>
<audio id="sound" autoplay="autoplay"></audio>
<script>
    function get_msg(){
    $.ajax({
    type: 'POST',
            url: '/Admin/Login/CheckLogin',
            data: {'login_type': '1191'},
            dataType: 'json',
            beforeSend: function (request) {
            var Authorization = sessionStorage.getItem('Authorization');
            request.setRequestHeader('Authorization', Authorization);
            },
            success: function (json) {
            if (json.ecode != 200){
            window.location.href = '/Admin/Login/Index';
            }
            }
    });
    $.ajax({
    type: 'POST',
            url: '/Admin/Message/AjaxGetMessage',
            data: {'uuid': '1191'},
            dataType: 'json',
            beforeSend: function (request) {
            var Authorization = sessionStorage.getItem('Authorization');
            request.setRequestHeader('Authorization', Authorization);
            },
            success: function (json) {
            if (typeof (json.ecode) != "undefined"){
            return false;
            }
            var node = '';
            var num = 0;
            $.each(json, function (i, o) {
            num = o.count;
            node += '<li>';
            node += '<a href="/Admin/Message/ListMessage?mid=';
            node += o.topic_id;
            node += '" class="clearfix">';
            node += '<img src="/Plant/Assets/images/user.jpg" class="msg-photo icon-animated-vertical" alt="新信息" />';
            node += '<span class="msg-body">';
            node += '<span class="msg-title">';
            node += '<span class="blue">';
            node += o.send_name;
            node += ' :</span>';
            node += o.contend;
            node += '</span>';
            node += ' <span class="msg-time">';
            node += ' <i class="ace-icon fa fa-clock-o"></i>';
            node += ' <span>';
            node += o.add_time;
            node += '</span>';
            node += ' </span>';
            node += ' </span>';
            node += ' </a>';
            node += ' </li>';
            });
            if (num > 0)
            {
            $("#message_list").html(node);
            $('#mssage_count1').html(num);
            $('#mssage_count2').html(num);
            $('#sound').attr('src', '/Plant/ring/new_message.mp3');
            }
            }
    }); //end ajax
    }
    get_msg();
    var requset3 = setInterval(get_msg, 30000);
</script>

</body>
</html>

<?php }} ?>
