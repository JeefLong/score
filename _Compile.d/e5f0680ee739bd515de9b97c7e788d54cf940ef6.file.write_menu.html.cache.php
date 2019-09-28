<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-09-23 23:26:43
         compiled from "F:\HTDOCS\Angent_game\Application\views\Admin\Menu\write_menu.html" */ ?>
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
  ),
  'nocache_hash' => '12846456415d88e433adb182-45686516',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5d88e433af0f34_22641562',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d88e433af0f34_22641562')) {function content_5d88e433af0f34_22641562($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("Admin/Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>

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
                <?php echo $_smarty_tpl->getSubTemplate ("Admin/Public/styletool.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>
 
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

    <?php echo '<script'; ?>
 type="text/javascript">
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

    <?php echo '</script'; ?>
>

    <?php echo $_smarty_tpl->getSubTemplate ('Admin/Public/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>

<?php }} ?>
