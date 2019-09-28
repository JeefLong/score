<?php /*%%SmartyHeaderCode:10028134435d88e83d6d4776-70088193%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '959ed8d53754f4c3f09cc8d89066358de992d7d1' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Admin\\Menu\\list_menu.html',
      1 => 1534751526,
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
  'nocache_hash' => '10028134435d88e83d6d4776-70088193',
  'variables' => 
  array (
    'Ctrl' => 0,
    'list' => 0,
    'val' => 0,
    'nval' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5d88e83d883065_37099182',
  'cache_lifetime' => '3600',
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d88e83d883065_37099182')) {function content_5d88e83d883065_37099182($_smarty_tpl) {?><!DOCTYPE HTML>
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
                                                <li class = "active" >
                    <a href='/Admin/Menu/listmenu'>
                        <i class="menu-icon fa fa-caret-right"></i>
                        菜单浏览 
                    </a>
                    <b class="arrow"></b>
                </li>
                                                                                                                                                                <li>
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
                            <input type="text" placeholder="菜单名[回车]" class="nav-search-input" name = "search_data" id = "search_angent" />
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
                            <i class="arrow fa fa-angle-right"></i>
                            列表
                            <i class="arrow fa fa-angle-right"></i>
                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('0');"><span class="green">添加</span></a>
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
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" id="check_all" class="ace" name="check_all" />
                                                <span class="lbl"></span>
                                            </label>
                                        </td>
                                        <th>ID</th>
                                        <th>名称</th>
                                        <th>控制器/动作</th>
                                        <th>链接</th>
                                        <th>上级ID</th>
                                        <th>权限值</th>
                                        <td>顺序</td>
                                        <th>是否显示</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                                                                                            <tr class="warning">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "53" />
                                                <span class="lbl"></span>
                                                <b class="red">Controller</b>
                                            </label>
                                        </td>
                                        <td>53</td>
                                        <td>数据中心</td>
                                        <td>Main</td>
                                        <td><a href="#" target="_blank">#</a></td>
                                        <td>ROOT</td>
                                        <td>3</td>
                                        <td>1</td>
                                        <td>显示</td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('53');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>

                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "54" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>54</th>
                                        <td>后台首页</td>
                                        <td>Index</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>53</th>
                                        <td>3 </td>
                                        <th>1</th>
                                        <td><font class="green">显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('54');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "128" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>128</th>
                                        <td>站点公告</td>
                                        <td>ListNote</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>53</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="green">显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('128');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "129" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>129</th>
                                        <td>动态获取一条</td>
                                        <td>SubNote</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>53</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('129');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "130" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>130</th>
                                        <td>修改添加动作</td>
                                        <td>AjaxSubNote</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>53</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('130');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "138" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>138</th>
                                        <td>查看已读</td>
                                        <td>ShowNote</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>53</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('138');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "131" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>131</th>
                                        <td>删除公告</td>
                                        <td>AjaxDelNote</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>53</th>
                                        <td>1 </td>
                                        <th>101</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('131');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                                                                                                                                    <tr class="warning">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "69" />
                                                <span class="lbl"></span>
                                                <b class="red">Controller</b>
                                            </label>
                                        </td>
                                        <td>69</td>
                                        <td>用户管理</td>
                                        <td>User</td>
                                        <td><a href="#" target="_blank">#</a></td>
                                        <td>ROOT</td>
                                        <td>3</td>
                                        <td>10</td>
                                        <td>显示</td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('69');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>

                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "70" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>70</th>
                                        <td>用户列表</td>
                                        <td>ListUser</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>69</th>
                                        <td>3 </td>
                                        <th>20</th>
                                        <td><font class="green">显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('70');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "71" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>71</th>
                                        <td>查询一个用户</td>
                                        <td>SubUser</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>69</th>
                                        <td>2 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('71');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "72" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>72</th>
                                        <td>添加与修改动作</td>
                                        <td>AjaxSubUser</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>69</th>
                                        <td>2 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('72');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "73" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>73</th>
                                        <td>动态删除用户</td>
                                        <td>AjaxDelUser</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>69</th>
                                        <td>2 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('73');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "83" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>83</th>
                                        <td>获取记录</td>
                                        <td>GetRecord</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>69</th>
                                        <td>2 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('83');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                                                                                                                                    <tr class="warning">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "145" />
                                                <span class="lbl"></span>
                                                <b class="red">Controller</b>
                                            </label>
                                        </td>
                                        <td>145</td>
                                        <td>视频管理</td>
                                        <td>Video</td>
                                        <td><a href="#" target="_blank">#</a></td>
                                        <td>ROOT</td>
                                        <td>1</td>
                                        <td>20</td>
                                        <td>显示</td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('145');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>

                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "146" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>146</th>
                                        <td>视频管理</td>
                                        <td>ListVideo</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>145</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="green">显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('146');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "147" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>147</th>
                                        <td>查询一个视频</td>
                                        <td>SubVideo</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>145</th>
                                        <td>2 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('147');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "148" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>148</th>
                                        <td>添加与修改动作</td>
                                        <td>AjaxSubVideo</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>145</th>
                                        <td>2 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('148');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "149" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>149</th>
                                        <td>动态删除</td>
                                        <td>AjaxDelVideo</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>145</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('149');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                                                                                                                                    <tr class="warning">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "40" />
                                                <span class="lbl"></span>
                                                <b class="red">Controller</b>
                                            </label>
                                        </td>
                                        <td>40</td>
                                        <td>代理管理</td>
                                        <td>Angent</td>
                                        <td><a href="#" target="_blank">#</a></td>
                                        <td>ROOT</td>
                                        <td>2</td>
                                        <td>30</td>
                                        <td>不显示</td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('40');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>

                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "41" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>41</th>
                                        <td>代理列表</td>
                                        <td>ListAngent</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>40</th>
                                        <td>2 </td>
                                        <th>1</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('41');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "43" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>43</th>
                                        <td>添加修改代理动作</td>
                                        <td>AjaxSubAngent</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>40</th>
                                        <td>2 </td>
                                        <th>1</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('43');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "44" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>44</th>
                                        <td>获取一个代理</td>
                                        <td>SubAngent</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>40</th>
                                        <td>2 </td>
                                        <th>1</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('44');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "46" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>46</th>
                                        <td>删除代理动作</td>
                                        <td>AjaxDelAngent</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>40</th>
                                        <td>2 </td>
                                        <th>1</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('46');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "74" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>74</th>
                                        <td>变更推荐人</td>
                                        <td>ChgAngent</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>40</th>
                                        <td>2 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('74');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "75" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>75</th>
                                        <td>变更推荐人动作</td>
                                        <td>AjaxChgAngent</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>40</th>
                                        <td>2 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('75');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "140" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>140</th>
                                        <td>获取推广二维码</td>
                                        <td>getImg</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>40</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('140');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "141" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>141</th>
                                        <td>添加代理</td>
                                        <td>AddAgent</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>40</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('141');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "142" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>142</th>
                                        <td>推广二维码</td>
                                        <td>GetImg</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>40</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('142');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                                                                                                                                    <tr class="warning">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "133" />
                                                <span class="lbl"></span>
                                                <b class="red">Controller</b>
                                            </label>
                                        </td>
                                        <td>133</td>
                                        <td>俱乐部管理</td>
                                        <td>Club</td>
                                        <td><a href="#" target="_blank">#</a></td>
                                        <td>ROOT</td>
                                        <td>1</td>
                                        <td>40</td>
                                        <td>不显示</td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('133');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>

                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "134" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>134</th>
                                        <td>俱乐部列表</td>
                                        <td>ListClub</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>133</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('134');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "135" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>135</th>
                                        <td>获取一个</td>
                                        <td>SubClub</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>133</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('135');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "136" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>136</th>
                                        <td>动态修改</td>
                                        <td>AjaxSubClub</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>133</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('136');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "137" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>137</th>
                                        <td>删除俱乐部</td>
                                        <td>AjaxDelClub</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>133</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('137');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                                                                                                                                    <tr class="warning">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "76" />
                                                <span class="lbl"></span>
                                                <b class="red">Controller</b>
                                            </label>
                                        </td>
                                        <td>76</td>
                                        <td>房卡充值</td>
                                        <td>Charge</td>
                                        <td><a href="#" target="_blank">#</a></td>
                                        <td>ROOT</td>
                                        <td>2</td>
                                        <td>100</td>
                                        <td>显示</td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('76');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>

                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "77" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>77</th>
                                        <td>代理充卡</td>
                                        <td>AddCharge</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>76</th>
                                        <td>2 </td>
                                        <th>100</th>
                                        <td><font class="green">显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('77');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "78" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>78</th>
                                        <td>充值动作</td>
                                        <td>AjaxAddCharge</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>76</th>
                                        <td>2 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('78');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "118" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>118</th>
                                        <td>转让房卡动作</td>
                                        <td>AjaxExgCharge</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>76</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('118');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "79" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>79</th>
                                        <td>房卡转让</td>
                                        <td>ExgCharge</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>76</th>
                                        <td>2 </td>
                                        <th>200</th>
                                        <td><font class="green">显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('79');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                                                                                                                                    <tr class="warning">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "114" />
                                                <span class="lbl"></span>
                                                <b class="red">Controller</b>
                                            </label>
                                        </td>
                                        <td>114</td>
                                        <td>金币充值</td>
                                        <td>Posit</td>
                                        <td><a href="#" target="_blank">#</a></td>
                                        <td>ROOT</td>
                                        <td>1</td>
                                        <td>101</td>
                                        <td>显示</td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('114');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>

                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "115" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>115</th>
                                        <td>代理充币</td>
                                        <td>AddPosit</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>114</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="green">显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('115');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "116" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>116</th>
                                        <td>充值动作</td>
                                        <td>AjaxAddPosit</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>114</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('116');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "117" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>117</th>
                                        <td>金币转让</td>
                                        <td>ExgPosit</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>114</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="green">显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('117');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "132" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>132</th>
                                        <td>转让动作</td>
                                        <td>AjaxExgPosit</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>114</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('132');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                                                                                                                                    <tr class="warning">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "60" />
                                                <span class="lbl"></span>
                                                <b class="red">Controller</b>
                                            </label>
                                        </td>
                                        <td>60</td>
                                        <td>房卡记录</td>
                                        <td>Order</td>
                                        <td><a href="#" target="_blank">#</a></td>
                                        <td>ROOT</td>
                                        <td>2</td>
                                        <td>103</td>
                                        <td>显示</td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('60');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>

                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "62" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>62</th>
                                        <td>订单记录</td>
                                        <td>ListOrder</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>60</th>
                                        <td>2 </td>
                                        <th>1</th>
                                        <td><font class="green">显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('62');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "63" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>63</th>
                                        <td>销售业绩</td>
                                        <td>SumOrder</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>60</th>
                                        <td>2 </td>
                                        <th>1</th>
                                        <td><font class="green">显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('63');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "64" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>64</th>
                                        <td>绩效统计动作</td>
                                        <td>AjaxCalOrder</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>60</th>
                                        <td>2 </td>
                                        <th>1</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('64');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "65" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>65</th>
                                        <td>删除订单动作</td>
                                        <td>AjaxDelOrder</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>60</th>
                                        <td>0 </td>
                                        <th>1</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('65');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                                                                                                                                    <tr class="warning">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "109" />
                                                <span class="lbl"></span>
                                                <b class="red">Controller</b>
                                            </label>
                                        </td>
                                        <td>109</td>
                                        <td>金币记录</td>
                                        <td>Gold</td>
                                        <td><a href="#" target="_blank">#</a></td>
                                        <td>ROOT</td>
                                        <td>1</td>
                                        <td>104</td>
                                        <td>显示</td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('109');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>

                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "110" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>110</th>
                                        <td>订单记录</td>
                                        <td>ListGold</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>109</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="green">显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('110');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "111" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>111</th>
                                        <td>销售业绩</td>
                                        <td>SumGold</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>109</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="green">显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('111');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "112" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>112</th>
                                        <td>绩效统计动作</td>
                                        <td>AjaxCalGold</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>109</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('112');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "113" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>113</th>
                                        <td>删除订单动作</td>
                                        <td>AjaxDelGold</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>109</th>
                                        <td>0 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('113');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                                                                                                                                    <tr class="warning">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "106" />
                                                <span class="lbl"></span>
                                                <b class="red">Controller</b>
                                            </label>
                                        </td>
                                        <td>106</td>
                                        <td>房间管理</td>
                                        <td>ROOM</td>
                                        <td><a href="#" target="_blank">#</a></td>
                                        <td>ROOT</td>
                                        <td>3</td>
                                        <td>150</td>
                                        <td>不显示</td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('106');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>

                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "107" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>107</th>
                                        <td>房间列表</td>
                                        <td>ListRoom</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>106</th>
                                        <td>3 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('107');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "108" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>108</th>
                                        <td>删除房间</td>
                                        <td>AjaxDelRoom</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>106</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('108');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                                                                                                                                    <tr class="warning">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "55" />
                                                <span class="lbl"></span>
                                                <b class="red">Controller</b>
                                            </label>
                                        </td>
                                        <td>55</td>
                                        <td>留言管理</td>
                                        <td>Player</td>
                                        <td><a href="#" target="_blank">#</a></td>
                                        <td>ROOT</td>
                                        <td>2</td>
                                        <td>200</td>
                                        <td>不显示</td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('55');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>

                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "57" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>57</th>
                                        <td>玩家留言</td>
                                        <td>ListCommit</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>55</th>
                                        <td>2 </td>
                                        <th>1</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('57');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "58" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>58</th>
                                        <td>查看留言</td>
                                        <td>SubCommit</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>55</th>
                                        <td>2 </td>
                                        <th>1</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('58');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "59" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>59</th>
                                        <td>删除留言动作</td>
                                        <td>AjaxDelCommit</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>55</th>
                                        <td>2 </td>
                                        <th>1</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('59');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                                                                                                                                    <tr class="warning">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "91" />
                                                <span class="lbl"></span>
                                                <b class="red">Controller</b>
                                            </label>
                                        </td>
                                        <td>91</td>
                                        <td>游戏公告</td>
                                        <td>Note</td>
                                        <td><a href="#" target="_blank">#</a></td>
                                        <td>ROOT</td>
                                        <td>1</td>
                                        <td>301</td>
                                        <td>不显示</td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('91');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>

                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "92" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>92</th>
                                        <td>修改公告</td>
                                        <td>SubNote</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>91</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('92');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "93" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>93</th>
                                        <td>添加公告动作</td>
                                        <td>AjaxSubNote</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>91</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('93');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "94" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>94</th>
                                        <td>删除公告动作</td>
                                        <td>AjaxDelNote</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>91</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('94');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "95" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>95</th>
                                        <td>大厅公告</td>
                                        <td>ListNote</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>91</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('95');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "96" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>96</th>
                                        <td>游戏公告</td>
                                        <td>ListBull</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>91</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('96');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "97" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>97</th>
                                        <td>游戏内通知</td>
                                        <td>SubBull</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>91</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('97');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "98" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>98</th>
                                        <td>游戏内公告工作</td>
                                        <td>AjaxSubBull</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>91</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('98');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "99" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>99</th>
                                        <td>删除游戏内公告</td>
                                        <td>AjaxDelBull</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>91</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('99');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                                                                                                                                    <tr class="warning">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "100" />
                                                <span class="lbl"></span>
                                                <b class="red">Controller</b>
                                            </label>
                                        </td>
                                        <td>100</td>
                                        <td>活动管理</td>
                                        <td>Packet</td>
                                        <td><a href="#" target="_blank">#</a></td>
                                        <td>ROOT</td>
                                        <td>1</td>
                                        <td>302</td>
                                        <td>不显示</td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('100');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>

                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "102" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>102</th>
                                        <td>获取时间</td>
                                        <td>SubTime</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>100</th>
                                        <td>2 </td>
                                        <th>1</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('102');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "101" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>101</th>
                                        <td>活动时间</td>
                                        <td>ListTime</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>100</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('101');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "103" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>103</th>
                                        <td>修改时间动作</td>
                                        <td>AjaxSubTime</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>100</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('103');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "104" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>104</th>
                                        <td>活动日志</td>
                                        <td>ListLog</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>100</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('104');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "105" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>105</th>
                                        <td>定制人员</td>
                                        <td>SetUser</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>100</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('105');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                                                                                                                                    <tr class="warning">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "26" />
                                                <span class="lbl"></span>
                                                <b class="red">Controller</b>
                                            </label>
                                        </td>
                                        <td>26</td>
                                        <td>管理中心</td>
                                        <td>Manage</td>
                                        <td><a href="#" target="_blank">#</a></td>
                                        <td>ROOT</td>
                                        <td>1</td>
                                        <td>400</td>
                                        <td>显示</td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('26');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>

                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "27" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>27</th>
                                        <td>登录日志</td>
                                        <td>LoginLog</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>26</th>
                                        <td>0 </td>
                                        <th>1</th>
                                        <td><font class="green">显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('27');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "28" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>28</th>
                                        <td>删除登录日志动作</td>
                                        <td>AjaxDelLog</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>26</th>
                                        <td>0 </td>
                                        <th>1</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('28');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "29" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>29</th>
                                        <td>行为日志</td>
                                        <td>ListAction</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>26</th>
                                        <td>0 </td>
                                        <th>1</th>
                                        <td><font class="green">显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('29');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "30" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>30</th>
                                        <td>查看行为日志</td>
                                        <td>SubAction</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>26</th>
                                        <td>0 </td>
                                        <th>1</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('30');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "31" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>31</th>
                                        <td>删除行为日志动作</td>
                                        <td>AjaxDelAct</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>26</th>
                                        <td>0 </td>
                                        <th>1</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('31');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "32" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>32</th>
                                        <td>验证码日志</td>
                                        <td>ListSMS</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>26</th>
                                        <td>0 </td>
                                        <th>1</th>
                                        <td><font class="green">显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('32');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "33" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>33</th>
                                        <td>删除验证码动作</td>
                                        <td>AjaxDelSMS</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>26</th>
                                        <td>1 </td>
                                        <th>1</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('33');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "34" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>34</th>
                                        <td>后台管理员</td>
                                        <td>ListManage</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>26</th>
                                        <td>1 </td>
                                        <th>1</th>
                                        <td><font class="green">显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('34');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "36" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>36</th>
                                        <td>获取一个管理员信息</td>
                                        <td>SubManage</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>26</th>
                                        <td>1 </td>
                                        <th>1</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('36');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "37" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>37</th>
                                        <td>删除管理员动作</td>
                                        <td>AjaxDelManage</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>26</th>
                                        <td>1 </td>
                                        <th>1</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('37');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "38" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>38</th>
                                        <td>标题修改管理员</td>
                                        <td>ModAdmin</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>26</th>
                                        <td>3 </td>
                                        <th>1</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('38');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "39" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>39</th>
                                        <td>添加管理员动作</td>
                                        <td>AjaxSubManage</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>26</th>
                                        <td>2 </td>
                                        <th>1</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('39');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                                                                                                                                    <tr class="warning">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "119" />
                                                <span class="lbl"></span>
                                                <b class="red">Controller</b>
                                            </label>
                                        </td>
                                        <td>119</td>
                                        <td>站内信</td>
                                        <td>Message</td>
                                        <td><a href="#" target="_blank">#</a></td>
                                        <td>ROOT</td>
                                        <td>1</td>
                                        <td>500</td>
                                        <td>显示</td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('119');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>

                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "120" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>120</th>
                                        <td>头部消息获取</td>
                                        <td>AjaxGetMessage</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>119</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('120');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "121" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>121</th>
                                        <td>站内信</td>
                                        <td>ListMessage</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>119</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="green">显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('121');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "122" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>122</th>
                                        <td>查看对话</td>
                                        <td>ShowMessage</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>119</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('122');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "123" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>123</th>
                                        <td>回复动作</td>
                                        <td>AjaxSubMessage</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>119</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('123');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "124" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>124</th>
                                        <td>新短信动作</td>
                                        <td>AjaxAddMessage</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>119</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('124');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "125" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>125</th>
                                        <td>删除动作</td>
                                        <td>AjaxDelMessage</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>119</th>
                                        <td>1 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('125');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                                                                                                                                    <tr class="warning">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "17" />
                                                <span class="lbl"></span>
                                                <b class="red">Controller</b>
                                            </label>
                                        </td>
                                        <td>17</td>
                                        <td>菜单管理</td>
                                        <td>Menu</td>
                                        <td><a href="#" target="_blank">#</a></td>
                                        <td>ROOT</td>
                                        <td>0</td>
                                        <td>700</td>
                                        <td>显示</td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('17');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>

                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "18" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>18</th>
                                        <td>菜单浏览</td>
                                        <td>ListMenu</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>17</th>
                                        <td>0 </td>
                                        <th>1</th>
                                        <td><font class="green">显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('18');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "21" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>21</th>
                                        <td>删除菜单动作</td>
                                        <td>AjaxDelMenu</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>17</th>
                                        <td>0 </td>
                                        <th>1</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('21');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "22" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>22</th>
                                        <td>修改菜单</td>
                                        <td>SubMenu</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>17</th>
                                        <td>0 </td>
                                        <th>1</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('22');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "23" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>23</th>
                                        <td>修改菜单动作</td>
                                        <td>AjaxSubMenu</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>17</th>
                                        <td>0 </td>
                                        <th>1</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('23');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "24" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>24</th>
                                        <td>生成菜单</td>
                                        <td>WriteMenu</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>17</th>
                                        <td>0 </td>
                                        <th>1</th>
                                        <td><font class="green">显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('24');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "25" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>25</th>
                                        <td>生成菜单动作</td>
                                        <td>AjaxWriteMenu</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>17</th>
                                        <td>0 </td>
                                        <th>1</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('25');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                                                                                                                                    <tr class="warning">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "11" />
                                                <span class="lbl"></span>
                                                <b class="red">Controller</b>
                                            </label>
                                        </td>
                                        <td>11</td>
                                        <td>登录控制器</td>
                                        <td>Login</td>
                                        <td><a href="#" target="_blank">#</a></td>
                                        <td>ROOT</td>
                                        <td>FF</td>
                                        <td>900</td>
                                        <td>不显示</td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('11');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>

                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "12" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>12</th>
                                        <td>登录页面</td>
                                        <td>Index</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>11</th>
                                        <td>FF </td>
                                        <th>1</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('12');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "13" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>13</th>
                                        <td>获取验证码</td>
                                        <td>Code</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>11</th>
                                        <td>FF </td>
                                        <th>2</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('13');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "14" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>14</th>
                                        <td>验证验证码动作</td>
                                        <td>AjaxCheck</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>11</th>
                                        <td>FF </td>
                                        <th>3</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('14');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "15" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>15</th>
                                        <td>后台登录动作</td>
                                        <td>AjaxLogin</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>11</th>
                                        <td>FF </td>
                                        <th>4</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('15');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "16" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>16</th>
                                        <td>退出</td>
                                        <td>LogOut</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>11</th>
                                        <td>FF </td>
                                        <th>5</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('16');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "139" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>139</th>
                                        <td>登录检查</td>
                                        <td>CheckLogin</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>11</th>
                                        <td>FF </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('139');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                                                                                                                                    <tr class="warning">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "81" />
                                                <span class="lbl"></span>
                                                <b class="red">Controller</b>
                                            </label>
                                        </td>
                                        <td>81</td>
                                        <td>登录管理</td>
                                        <td>Logon</td>
                                        <td><a href="#" target="_blank">#</a></td>
                                        <td>ROOT</td>
                                        <td>2</td>
                                        <td>900</td>
                                        <td>不显示</td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('81');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>

                                                                        <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "82" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th>82</th>
                                        <td>登录信息</td>
                                        <td>ListLogon</td>
                                        <td><a href="#"  target="_blank">#</a></td>
                                        <th>81</th>
                                        <td>2 </td>
                                        <th>100</th>
                                        <td><font class="red">不显示</font> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('82');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                                                                                                                            </tbody>


                                <tr>
                                    <td colspan = "9"> 
                                        <button class="btn btn-purple btn-sm" type="button" id="deldata" onclick="del();">
                                            删除
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

                    <!-- -------------------------------------------------- 浮动窗口 ------------------------------- -->
                    <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">查看商品</button>  -->
                    <!-- 窗口内容 -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">数据信息</h4>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tr> <th>菜单名称</th>   <td><input type="text"  id="m_name" placeholder="菜单名称不能为空" value="" />   <b class="red">* 菜单名称不能为空 </b>       </td> </tr>
                                        <tr> <th>控制器名称</th> <td><input type="text" id="m_act" placeholder="Ctrl or Act 不能为空" value="" /> <b class="red">* 控制器或动作必须存在 </b>   </td>  </tr>
                                        <tr> <th>外链地址</th>   <td><input type="text" id="m_href" placeholder="http://+URL" value="#" />        <b class="red">* 外链地址会覆盖控制器或动作 </b> </td>  </tr>
                                        <tr> <th>权限ID</th>     <td><input type="text" id="m_private" placeholder="权限的ID" value="1" />        <b class="red">* 用户权限 <font class="green">FF</font> 是任何用户都能执行 </b>  </td>  </tr>
                                        <tr> <th>排列顺序</th>   <td><input type="text" id="m_order" placeholder="顺序" value = "100" />        <b class="red">* 菜单的顺序 </b>  </td>  </tr>
                                        <tr> <th>子目录</th>    
                                            <td>
                                                <select id="m_pid"> </select>
                                            </td>  
                                        </tr>
                                        <tr> <th>是否显示</th>    
                                            <td>
                                                <input id="m_show" class="ace ace-switch ace-switch-4 btn-rotate" type="checkbox" />
                                                <span class="lbl"></span>
                                            </td>  
                                        </tr>

                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                    <button type="button" class="btn btn-primary" id="sub_data">提交</button>
                                    <input type="hidden" id="mid" />
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal -->
                    </div>
                    <!-- /-------------------------------------------------- 浮动窗口 ------------------------------- -->

                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div><!-- /.main-content-inner -->
    </div> <!-- /.main-content -->
    <!-- </div> /.main-container -->

    <script type="text/javascript">
        $('#check_all').click(function () {
            $('[name=check_pro]:checkbox').each(function () {
                this.checked = !this.checked;
            });
        });

        function del()
        {
            var data = '';
            var inputs = document.getElementsByName('check_pro');
            for (var i = 0; i < inputs.length; i++)
            {
                if (inputs[i].checked)
                {
                    data = data + ',' + inputs[i].value;
                }
            }
            data = data.substr(1);
            if (data.length < 1)
            {
                alert('请选择要删除的数据');
                return false;
            }
            if (!confirm('确认要删除吗？'))
            {
                return false;
            }
            $('#deldata').attr('disabled', 'disabled').addClass('disabled');
            $.ajax({
                url: '/Admin/Menu/AjaxDelMenu',
                async: false,
                type: 'POST',
                data: {'ids': data},
                dataType: 'json',
                success: function (json) {
                    alert(json.emsg);
                    location.reload();
                },
                error: function () {
                    alert('删除失败!');
                    location.reload();
                }
            });
        }

        function get_data(id)
        {

            $('#mid').val(id);
            $.ajax({
                url: '/Admin/Menu/SubMenu',
                async: false,
                type: 'POST',
                data: {'id': id},
                dataType: 'json',
                success: function (json) {
                    if (typeof json.ecode != 'undefined')
                    {
                        $('.modal-body').html('<b calss="red">' + json.emsg + "</b>");
                        location.reload();
                    }

                    $('#m_name').val(json.name);
                    $('#m_act').val(json.action);
                    if (json.href != null) {
                        $('#m_href').val(json.href);
                    }
                    if (json.private != null) {
                        $('#m_private').val(json.private);
                    }
                    if (json.order != null) {
                        $('#m_order').val(json.order);
                    }

                    // 选中判断
                    $('#m_show').prop('checked', false);
                    if (json.show == 1) {
                        $('#m_show').prop("checked", true);
                    }
                    // 下拉选择
                    $('#m_pid').html('<option value = "0">根目录</option>');
                    for (var i = 0; i < json.pre.length; i++)
                    {
                        $('#m_pid').append('<option value = "' + json.pre[i].id + '"  >' + json.pre[i].name + '</option>');
                    }
                    // 选中那个对的
                    if (json.pid > 0) {
                        $('#m_pid').val(json.pid);
                    } else {
                        $('#m_pid').val(0);
                    }
                },
                error: function () {
                    $('.modal-body').html('<b class="red">读取失败！</b>');
                }
            });
        }


        $('#sub_data').click(function () {
            var id = $('#mid').val();
            var m_name = $('#m_name').val();
            var m_act = $('#m_act').val();
            var m_href = $('#m_href').val();
            var m_private = $('#m_private').val();
            var m_pid = $('#m_pid').val();
            var m_order = $('#m_order').val();
            var m_show = 0;
            if ($('#m_show').is(':checked'))
            {
                m_show = 1;
            }

            $('#sub_data').attr('disabled', 'disabled').addClass('disabled');
            $.ajax({
                type: 'POST',
                url: '/Admin/Menu/AjaxSubMenu',
                async: false,
                data: {'id': id, 'm_name': m_name, 'm_act': m_act, 'm_href': m_href, 'm_private': m_private, 'm_pid': m_pid, 'm_show': m_show, 'm_order': m_order, },
                dataType: 'json',
                success: function (json)
                {
                    if (json.ecode == 200)
                    {
                        $('.modal-body').html('<b class="green">操作成功！</b>');
                        document.location.reload();
                    } else
                    {
                        $('.modal-body').html('<b class="red">操作失败！</b>');
                        $('#sub_data').removeAttr('disabled').removeClass('disabled');
                    }
                },
                error: function () {
                    $('.modal-body').html('<b class="red">数据加载失败！</b>');
                    document.location.reload();
                }
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
