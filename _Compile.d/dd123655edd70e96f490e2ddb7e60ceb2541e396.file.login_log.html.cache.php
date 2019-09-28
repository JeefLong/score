<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-04-13 22:29:24
         compiled from "F:\HTDOCS\Angent_game\Application\views\Admin\Manage\login_log.html" */ ?>
<?php /*%%SmartyHeaderCode:10976171075cb1f2441eb399-39393373%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd123655edd70e96f490e2ddb7e60ceb2541e396' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Admin\\Manage\\login_log.html',
      1 => 1486977804,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10976171075cb1f2441eb399-39393373',
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
  'unifunc' => 'content_5cb1f2442c5b57_85851435',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5cb1f2442c5b57_85851435')) {function content_5cb1f2442c5b57_85851435($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'F:\\HTDOCS\\Angent_game\\Application\\library\\Smarty\\plugins\\modifier.date_format.php';
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
                        <a href="/Admin/Manage/LoginLog">登录日志</a>
                    </li>
                    <li class="active">列表</li>
                </ul><!-- /.breadcrumb -->

                <div class="nav-search" id="nav-search">
                    <form class="form-search" method="get">
                        <span class="input-icon">
                            <input type="text" placeholder="登录名[回车]" class="nav-search-input" name = "search_angent" id = "search_angent" />
                            <i class="ace-icon fa fa-search nav-search-icon"></i>
                        </span>
                    </form>
                </div><!-- /.nav-search -->
            </div>

            <div class="page-content">
                <?php echo $_smarty_tpl->getSubTemplate ("Admin/Public/styletool.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>
 
                <div class="page-header">
                    <h1>
                        登录日志
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
                                        <th>登录名称</th>
                                        <th>登录时间</th>
                                        <th>登录IP</th>
                                        <th>登录描述</th>
                                        <th>登录结果</th>
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
                                        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['login_name'];?>
</td>

                                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['val']->value['login_date'],"Y-m-d H:i:s");?>
 </td>   
                                        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['login_ip'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['err_msg'];?>
 </td>
                                        <td><?php if ($_smarty_tpl->tpl_vars['val']->value['is_checked']==1) {?><b class="green">登录成功</b><?php } else { ?> <b class="red">登录失败</b><?php }?></td>
                                    </tr>
                                    <?php }
if (!$_smarty_tpl->tpl_vars['val']->_loop) {
?>
                                    <tr>
                                        <td colspan="9" style="color: red"> 没找到要搜索的信息! </td>
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
                url: '/Admin/Manage/AjaxDelLog',
                type: 'POST',
                data: {'logids': data, },
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

    <?php echo '</script'; ?>
>

    <?php echo $_smarty_tpl->getSubTemplate ('Admin/Public/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>

<?php }} ?>
