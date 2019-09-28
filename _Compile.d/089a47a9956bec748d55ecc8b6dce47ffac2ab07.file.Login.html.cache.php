<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-06-29 23:36:23
         compiled from "F:\HTDOCS\Angent_game\Application\views\Video\Login\Login.html" */ ?>
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
  ),
  'nocache_hash' => '21448446475d178577cb8914-13681694',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5d178577cca4e7_18489677',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d178577cca4e7_18489677')) {function content_5d178577cca4e7_18489677($_smarty_tpl) {?><?php if (!is_callable('smarty_function_vsource')) include 'F:\\HTDOCS\\Angent_game\\Application\\library\\Smarty\\plugins\\function.vsource.php';
?><?php echo $_smarty_tpl->getSubTemplate ("Video/Public/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>

<body>
    <div class='page-with-sidebar' id='page-container'>
        <?php echo $_smarty_tpl->getSubTemplate ("Video/Public/left.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>

        <div class='content'>
            <h1 class='page-header'>
                <div class='page-header-menu'></div>
            </h1>
            <div class='row' style='position: relative'>
                <div class='m-t-40'>
                    <div class='login-header'>
                        <div class='brand'>
                            <img class='logo' src='<?php echo smarty_function_vsource(array('img'=>"apple-touch-icon.png"),$_smarty_tpl);?>
'>登录
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
        <?php echo $_smarty_tpl->getSubTemplate ("Video/Public/right.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>


    </div>
    <?php echo '<script'; ?>
 src='<?php echo smarty_function_vsource(array('js'=>"play.js"),$_smarty_tpl);?>
'><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 type="text/javascript">
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

    <?php echo '</script'; ?>
>

</body>
</html>
<?php }} ?>
