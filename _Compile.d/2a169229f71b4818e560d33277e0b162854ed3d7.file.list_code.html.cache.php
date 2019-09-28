<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-04-13 22:29:26
         compiled from "F:\HTDOCS\Angent_game\Application\views\Admin\Manage\list_code.html" */ ?>
<?php /*%%SmartyHeaderCode:128303985cb1f2464e51f8-65362299%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a169229f71b4818e560d33277e0b162854ed3d7' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Admin\\Manage\\list_code.html',
      1 => 1486977778,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '128303985cb1f2464e51f8-65362299',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'val' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5cb1f246560964_19099268',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5cb1f246560964_19099268')) {function content_5cb1f246560964_19099268($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'F:\\HTDOCS\\Angent_game\\Application\\library\\Smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("Admin/Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>

<div class="main-container ace-save-state" id="main-container">
    <?php echo '<script'; ?>
 type="text/javascript">
        try {
            ace.settings.loadState('main-container')
        } catch (e) {
        }
    <?php echo '</script'; ?>
>
    <?php echo $_smarty_tpl->getSubTemplate ("Admin/Public/left.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>

    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="/Admin/Main/Index">首页</a>
                    </li>

                    <li>
                        <a href="/Admin/Manage/ListSms">验证码管理</a>
                    </li>
                    <li class="active">列表</li>
                </ul><!-- /.breadcrumb -->

                <div class="nav-search" id="nav-search">
                    <form class="form-search" method="get">
                        <span class="input-icon">
                            <input type="text" placeholder="输入手机号[回车]" class="nav-search-input" name = "search_angent" id = "search_angent" />
                            <i class="ace-icon fa fa-search nav-search-icon"></i>
                        </span>
                    </form>
                </div><!-- /.nav-search -->
            </div>

            <div class="page-content">
                <?php echo $_smarty_tpl->getSubTemplate ("Admin/Public/styletool.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>
 
                <div class="page-header">
                    <h1>
                        验证码管理
                        <small>
                            <i class="icon-double-angle-right"></i>
                            列表
                        </small>
                    </h1>
                </div><!-- /.page-header -->
                <div class="row">

                    <!-- PAGE CONTENT BEGINS -->

                    <div class="row col-xs-12 col-sm-12 col-lg-12">

                        <div class="table-responsive fadeInDown animated">
                            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            <label class="position-relative">
                                                <input type="checkbox" id ="check_all" class="ace" />
                                                <span class="lbl"></span>
                                            </label>
                                        </th>
                                        <th>手机号码</th>
                                        <th>验证码</th>
                                        <th>用户IP</th>
                                        <th>发送时间</th>
                                        <th>使用状态</th>
                                        <th>验证目的</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
                                    <tr>
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" />
                                                <span class="lbl"></span>
                                            </label>
                                        </td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['user_phone'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['user_code'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['user_ip'];?>
</td>
                                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['val']->value['send_time'],"Y-m-d H:i:s");?>
 </td>
                                        <td>
                                            <?php if ($_smarty_tpl->tpl_vars['val']->value['is_check']==0) {?>
                                            <b class="pink">未使用</b>
                                            <?php } elseif ($_smarty_tpl->tpl_vars['val']->value['is_check']==1) {?>
                                            <b class="green">已使用</b>
                                            <?php }?>
                                        </td>
                                        <td>
                                            <?php if ($_smarty_tpl->tpl_vars['val']->value['code_type']==0) {?>
                                            <b class="orange">注册认证</b>
                                            <?php } elseif ($_smarty_tpl->tpl_vars['val']->value['code_type']==1) {?>
                                            <b class="orange">支付密码</b>
                                            <?php } elseif ($_smarty_tpl->tpl_vars['val']->value['code_type']==2) {?>
                                            <b class="orange">找回密码</b>
                                            <?php }?>
                                        </td>

                                    </tr>
                                    <?php }
if (!$_smarty_tpl->tpl_vars['val']->_loop) {
?>
                                    <tr>
                                        <td colspan="9" style="color: red"> 没找到信息! </td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <td colspan = "9"> 
                                            <button class="btn btn-purple btn-sm" type="button" id="deldata" onclick="del();">
                                                删除
                                                <i class="icon-cog icon-on-right bigger-110"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><!-- /.table-responsive -->
                        <!-- Sub Page -->
                        <div class="row"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
                        <!-- /Sub Page -->
                    </div><!-- /.row .col -->

                    <!-- PAGE CONTENT ENDS -->

                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div><!-- /.main-content-inner -->
    </div> <!-- /.main-content -->
    <!-- </div> /.main-container -->

    <?php echo '<script'; ?>
 type="text/javascript">
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
                url: '/Admin/Manage/AjaxDelSms',
                type: 'POST',
                data: {'ids': data, },
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
            $('#deldata').removeAttr('disabled').removeClass('disabled');
        }

    <?php echo '</script'; ?>
>

    <?php echo $_smarty_tpl->getSubTemplate ('Admin/Public/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>

<?php }} ?>
