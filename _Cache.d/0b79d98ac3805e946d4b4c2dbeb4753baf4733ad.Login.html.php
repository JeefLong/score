<?php /*%%SmartyHeaderCode:7600333155d8a38c6d72619-60900831%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b79d98ac3805e946d4b4c2dbeb4753baf4733ad' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Admin\\Login\\Login.html',
      1 => 1553441927,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7600333155d8a38c6d72619-60900831',
  'variables' => 
  array (
    'Uname' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5d8a38c6daae14_94134316',
  'cache_lifetime' => '3600',
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d8a38c6daae14_94134316')) {function content_5d8a38c6daae14_94134316($_smarty_tpl) {?><!DOCTYPE HTML>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="Content-Language" content="zh-CN" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>数据管理中心</title>
        <meta name="keywords" content="数据管理中心" />
        <meta name="description" content="数据管理中心" />
        <link rel="shortcut icon" href="/Back/Assets/images/faviconie.ico" type="image/x-icon" />
        <link rel="bookmark" href="/Back/Assets/images/faviconie.ico" type="image/x-icon" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
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
        <link rel="stylesheet" href="/Back/Assets/css/animate.css" />

        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lt IE 8]>
        <script src="/Back/Assets/js/html5shiv.min.js"></script>
        <script src="/Back/Assets/js/respond.min.js"></script>
        <![endif]-->

        <!--[if !IE]> -->
        <script type="text/javascript">
            window.jQuery || document.write("<script src='/Back/Assets/js/jquery-2.1.4.min.js'>" + "<" + "script>");</script>
        <!-- <![endif]-->
        <!--[if IE]>
        <script type="text/javascript">
            window.jQuery || document.write("<script src='/Back/Assets/js/jquery-1.11.3.min.js'>"+"<"+"script>");
        </script>
        <![endif]-->

        <script type="text/javascript">
            if ('ontouchstart' in document.documentElement)
                document.write("<script src='/Back/Assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");</script>

    </head>

    <body class="login-layout">
        <div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
                try {
                    ace.settings.loadState('main-container')
                } catch (e) {
                }
            </script>

            <div class="navbar navbar-default" id="navbar">
                <script type="text/javascript">
                    try {
                        ace.settings.check('navbar', 'fixed')
                    } catch (e) {
                    }
                </script>
                <div class="navbar-container" id="navbar-container">
                    <div class="navbar-header pull-left">
                        <a href="#" class="navbar-brand">
                            <small>
                                <i class="ace-icon fa fa-coffee"></i>
                                <b class="white-opaque">数据管理中心</b>
                            </small>
                        </a><!-- /.brand -->
                    </div><!-- /.navbar-header -->
                </div><!-- /.container -->
            </div><!-- /.navbar-->

            <div class="main-content">
                <div class="row">
                    <div class="login-container">
                        <div class="center bounceInUp animated">
                            <div class="space-30"></div>
                            <div class="space-30"></div>
                            <h1>
                                <i class="ace-icon fa fa-android green"></i>
                                <span class="red">Admin</span>
                                <span class="white" id="id-text2">Data Center</span>
                            </h1>
                            <h4 class="blue" id="id-company-text">&copy; 2016-2017</h4>
                        </div>

                        <div class="login-box visible widget-box no-border  bounceInDown animated">
                            <div class="widget-main">
                                <h4 class="header blue lighter bigger">
                                    <i class="ace-icon fa fa-key green"></i>
                                    <b class="green">登录入口</b>
                                </h4>
                                <div class="space-6"></div>
                                <fieldset>
                                    <label class="block clearfix">
                                        <span class="block input-icon">
                                            <input type="text" class="form-control" name="username" id="username" placeholder="请输入用户名"  />
                                                   <i class="ace-icon fa fa-user blue"></i>
                                        </span>
                                        <span class="text-center"  id='error_msg_name'></span>
                                    </label>

                                    <label class="block clearfix">
                                        <span class="block input-icon">
                                            <input type="password" class="form-control" name="password" id="password" placeholder="请输入密码" />
                                            <i class="ace-icon fa fa-lock blue"></i>
                                        </span>
                                        <span class="text-center"  id='error_msg_pwd'></span>
                                    </label>
                                                                        <div class="space-1"></div>

                                    <label class="block clearfix">
                                        <button type="button"  id="btn_submit" class="width-35 pull-right btn btn-sm btn-primary">
                                            <i class="icon-key"></i>
                                            登&nbsp; &nbsp; &nbsp;录
                                        </button>
                                        <input type="hidden" id='iscode' value='' />
                                    </label>
                                    <div class="space-4"></div>
                                </fieldset>
                            </div> <!-- /widget-main -->
                        </div> <!-- /login-box -->
                    </div> <!-- login-container -->
                </div> <!-- /.row -->
            </div> <!--/.main-content-->
        </div> <!-- /.main-container -->

        <script type="text/javascript">

            $(function () {
                //repull
                $('#reget').click(function (e)
                {
                    $('#pic_yzm').attr('src', '/Admin/Login/Code?id=' + Math.random());
                    $('#codestatu').removeClass().addClass('ace-icon fa fa-key').addClass('red');
                });
                //key 13 check
                $('#password').keypress(function (e) {
                    if (e.keyCode == 13)
                    {
                        $('#btn_submit').click();
                    }
                });
                $('#yzm').keypress(function (e) {
                    if (e.keyCode == 13)
                    {
                        $('#btn_submit').click();
                    }
                });
                $('#username').keypress(function (e) {
                    if (e.keyCode == 13)
                    {
                        $('#btn_submit').click();
                    }
                }); //end keypress

                //Code Check
                $('#yzm').keyup(function (e) {
                    var yzm = $.trim($('#yzm').val());
                    if (yzm.length != 5)
                    {
                        $('#codestatu').removeClass().addClass('ace-icon fa fa-key').addClass('red');
                        return false;
                    }
                    $.ajax({
                        type: 'POST',
                        url: '/Admin/Login/AjaxCheck',
                        data: {'yzm': yzm},
                        dataType: "json",
                        success: function (json) {
                            if (json.code == 200) {
                                $('#codestatu').removeClass().addClass('ace-icon fa fa-key').addClass('blue');
                                $('#error_msg_yzm').hide();
                            } else {
                                $('#codestatu').removeClass().addClass('ace-icon fa fa-key').addClass('red');
                            }
                        },
                        failure: function () {
                            alert('获取中......');
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            alert('获取中......');
                        }
                    }); //end ajax
                });
                //Dig by me 
                $('#btn_submit').click(function ()
                {
                    var userName = $.trim($('#username').val());
                    var passWord = $.trim($('#password').val());
                    var yzm = $.trim($('#yzm').val());
                    var encode = $('#iscode').val();
                    if (userName.length < 3)
                    {
                        $('#error_msg_name').html('*请输入用户名').addClass('red');
                        return false;
                    } else
                    {
                        $('#error_msg_name').hide();
                    }

                    if (passWord.length < 3)
                    {
                        $('#error_msg_pwd').html('*请输入密码').addClass('red');
                        return false;
                    } else
                    {
                        $('#error_msg_pwd').hide();
                    }

                    if (encode > 0 && (yzm.length < 4 || yzm.length > 6))
                    {
                        $('#error_msg_yzm').html('*请输入正确验证码').addClass('red');
                        return false;
                    } else
                    {
                        $("#error_msg_yzm").hide();
                    }
                    $('#btn_submit').attr('disabled', 'disabled').addClass('disabled');
                    $.ajax({
                        type: 'POST',
                        url: '/Admin/Login/AjaxLogin',
                        data: {'username': userName, 'password': passWord, 'login': 1, 'yzm': yzm},
                        dataType: 'json',
                        complete: function (xhr, data) {
                            var Authorization = xhr.getResponseHeader('Authorization');
                            sessionStorage.setItem('Authorization', Authorization);
                        },
                        success: function (json)
                        {
                            if (json.code == 200)
                            {
                                window.location.href = json.url;
                            } else if (json.code == -1)
                            {
                                $('#error_msg_name').html('*用户名已被禁用,联系站长').show().addClass('red');
                                $('#reget').click();
                            } else if (json.code == -2)
                            {
                                $('#error_msg_pwd').html('*用户名或密码错误').show().addClass('red');
                                $('#reget').click();
                            } else if (json.code == -3)
                            {
                                $('#error_msg_pwd').html('*登录时间受限').show().addClass('red');
                                $('#reget').click();
                            } else if (json.code == -4)
                            {
                                $('#error_msg_pwd').html('*IP被查封,请联系站长').show().addClass('red');
                                $('#reget').click();
                            } else if (json.code == 400)
                            {
                                $('#error_msg_yzm').html('*输入验证码错误').show().addClass('red');
                                $('#reget').click();
                            } else
                            {
                                window.location.href = '/Admin/Login/Index';
                            }
                            $('#btn_submit').removeAttr('disabled').removeClass('disabled');
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            alert('登陆中......');
                        }
                    }); //end ajax

                }); //end submit
            }); //end function

        </script>
    </body>  
</html>
<?php }} ?>
