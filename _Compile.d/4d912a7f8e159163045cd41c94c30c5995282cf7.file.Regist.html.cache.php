<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-05-05 21:16:08
         compiled from "F:\HTDOCS\Angent_game\Application\views\Video\Regist\Regist.html" */ ?>
<?php /*%%SmartyHeaderCode:16466103625ccee218eb5f90-86999173%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d912a7f8e159163045cd41c94c30c5995282cf7' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Video\\Regist\\Regist.html',
      1 => 1556119119,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16466103625ccee218eb5f90-86999173',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5ccee218eca303_89328075',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ccee218eca303_89328075')) {function content_5ccee218eca303_89328075($_smarty_tpl) {?><?php if (!is_callable('smarty_function_vsource')) include 'F:\\HTDOCS\\Angent_game\\Application\\library\\Smarty\\plugins\\function.vsource.php';
?><?php echo $_smarty_tpl->getSubTemplate ("Video/Public/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>

<body>
    <div class='page-with-sidebar' id='page-container'>
        <?php echo $_smarty_tpl->getSubTemplate ("Video/Public/left.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>

        <div class='content'>
            <div class='row' style='position: relative'>
                <div class='m-t-40'>
                    <div class='login-header'>
                        <div class='brand'>
                            <img class='logo' src='<?php echo smarty_function_vsource(array('img'=>"apple-touch-icon.png"),$_smarty_tpl);?>
'>注册
                        </div>
                    </div>
                    <div class='login-content'>
                        <form class="new_user" id="new_user" accept-charset="UTF-8" >

                            <div class='form-group m-b-15'>
                                <input autofocus="autofocus" class="form-control input-lg" placeholder="输入邮箱" type="email" value="" name="email" id="email" />
                            </div>

                            <div class='form-group m-b-15'>
                                <input autocomplete="off" class="form-control input-lg" placeholder="输入密码" type="password" name="password1" id="password1" />
                            </div>

                            <div class='form-group m-b-15'>
                                <input autocomplete="off" class="form-control input-lg" placeholder="确认密码" type="password" name="password2" id="password2" />
                            </div>

                            <div class='checkbox m-b-30'>
                                <label>
                                    <input type="checkbox" value="1" name="remember" id="remember" />
                                    记住登录信息
                                </label>
                            </div>
                            <div class='login-buttons'>
                                <input type="button" id="commit" name="commit" value="注册" class="btn btn-success btn-block btn-lg" data-disable-with="注册" />
                            </div>
                            <div class='m-t-20 m-b-40 p-b-40 text-inverse'>
                                已注册过？
                                <a class='text-success' href='/Video/Login/Index'>点此登录</a>
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
                var password1 = $.trim($('#password1').val());
                var password2 = $.trim($('#password2').val());
                var remember = $.trim($('#remember').val());
                var virfy = $.trim($('#remember').val());
                $.ajax({
                    type: 'POST',
                    url: '/Video/Regist/AjaxReg',
                    data: {'email': email, 'password1': password1, 'password2': password2, 'remember': remember, 'virfy': virfy},
                    dataType: 'json',
                    success: function (json) {
                        if (json.ecode == 200) {
                            window.location.href = json.emsg;
                        } else {
                            alert(json.emsg);
                        }
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert('注册中......');
                    }
                }); // end ajax
            }); // end click
        }); // end function

    <?php echo '</script'; ?>
>
</body>
</html>
<?php }} ?>
