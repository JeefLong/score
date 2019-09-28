<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-09-24 23:40:30
         compiled from "F:\HTDOCS\Angent_game\Application\views\Admin\Main\List_Note.html" */ ?>
<?php /*%%SmartyHeaderCode:15025624235d8a38ee804aa8-37385213%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88b5e827e73d04d1f1144f154c5efebcae7a6a0e' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Admin\\Main\\List_Note.html',
      1 => 1512040269,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15025624235d8a38ee804aa8-37385213',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'val' => 0,
    'page' => 0,
    'Ctrl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5d8a38ee840f24_31532544',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d8a38ee840f24_31532544')) {function content_5d8a38ee840f24_31532544($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'F:\\HTDOCS\\Angent_game\\Application\\library\\Smarty\\plugins\\modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include 'F:\\HTDOCS\\Angent_game\\Application\\library\\Smarty\\plugins\\modifier.date_format.php';
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
                        <a href="/Admin/Main/ListNote">平台公告</a>
                    </li>
                    <li class="active">列表</li>
                </ul><!-- /.breadcrumb -->
                <!--
                <div class="nav-search" id="nav-search">
                    <form class="form-search" method="get">
                        <span class="input-icon">
                            <input type="text" placeholder="手机号或姓名[回车]" class="nav-search-input" name = "search_angent" id = "search_angent" />
                            <i class="ace-icon fa fa-search nav-search-icon"></i>
                        </span>
                    </form>
                </div> 
                -->
            </div>

            <div class="page-content">
                <?php echo $_smarty_tpl->getSubTemplate ("Admin/Public/styletool.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>
 
                <div class="page-header">
                    <h1>
                        平台公告
                        <small>
                            <i class="icon-double-angle-right"></i>
                            列表
                            <i class="arrow fa fa-angle-right"></i>
                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('0');" ><span class="green">新建公告</span></a>
                        </small>
                    </h1>
                </div><!-- /.page-header -->
                <div class="row">

                    <!-- PAGE CONTENT BEGINS -->

                    <div class="col-xs-12 col-sm-12 col-lg-12">
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
                                        <th>ID</th>
                                        <th>发布者</th>
                                        <th>公告名</th>
                                        <th>公告内容</th>
                                        <th>开始时间</th>
                                        <th>结束时间</th>
                                        <th>状态</th>
                                        <th>已读</th>
                                        <th>操作</th>
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
                                        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['op_id'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['note_title'];?>
</td>
                                        <td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['val']->value['note_content'],30);?>
</td>
                                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['val']->value['note_date'],'Y-m-d H:i:s');?>
</td>
                                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['val']->value['end_date'],'Y-m-d H:i:s');?>
</td>
                                        <td><?php if ($_smarty_tpl->tpl_vars['val']->value['is_show']==0) {?> <b class="red">关闭</b> <?php } else { ?> <b class="green">开启</b> <?php }?> </td>
                                        <td>
                                            <a href = "/Admin/Main/ShowNote?nid=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" > 查看 </a>
                                        </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                    <?php }
if (!$_smarty_tpl->tpl_vars['val']->_loop) {
?>
                                    <tr>
                                        <td colspan="11" style="color: red"> 没找到信息! </td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <td colspan = "11">
                                            <button class="btn btn-purple btn-sm" type="button" onclick="del();">
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
                    </div><!-- /.col -->

                    <!-- PAGE CONTENT ENDS -->
                    <!-- -------------------------------------------------- 浮动窗口 ------------------------------- -->
                    <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">查看商品</button>  -->
                    <!-- 窗口内容 -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">代理公告</h4>
                                </div>
                                <div class="modal-body">
                                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                        <tr><td>标题:</td><td><input type="text" id="ntitle" placeholder="标题不能为空" /></td></tr>
                                        <tr><td>内容:</td> <td><textarea id="ncontent" cols="60" rows="10" placeholder="内容不能为空" ></textarea></td>  </tr>
                                        <tr><td>发布时间:</td><td><input type="text" id="ntime" placeholder="留空为当前时间" readonly /></td></tr>
                                        <tr><td>剩余天数:</td><td><input type="text" id="nduration" value = '7' placeholder="持续天数" /></td></tr>
                                        <tr>
                                            <td>开关:</td>
                                            <td>
                                                <input id="nstatus" class="ace ace-switch ace-switch-4 btn-rotate" type="checkbox" />
                                                <span class="lbl"></span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                    <button type="button" class="btn btn-primary" id="sub_data">提交</button>
                                    <ipput type='hidden' id='nid' />
                                </div>
                            </div> <!-- /.modal-content -->
                        </div> <!-- /.modal -->
                    </div>
                    <!-- /-------------------------------------------------- 浮动窗口 ------------------------------- -->

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
            $.ajax({
                url: '/Admin/<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
/AjaxDelNote',
                type: 'POST',
                data: {'ids': data, },
                dataType: 'json',
                success: function (json) {
                    alert(json.emsg);
                    if (json.ecode == 200)
                    {
                        location.reload();
                    }
                }
            });
        }


        function get_data(id)
        {
            $('#nid').val(id);
            $.ajax({
                url: '/Admin/<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
/SubNote',
                type: 'POST',
                data: {'nid': id},
                dataType: 'json',
                success: function (json) {
                    $('#ntitle').val(json.note_title);
                    $('#ncontent').val(json.note_content);
                    $('#ntime').val(json.note_date);
                    $('#nduration').val(json.end_date);
                    // 选中判断
                    $('#nstatus').prop('checked', false);
                    if (json.is_show == 1) {
                        $('#nstatus').prop("checked", true);
                    }
                },
                error: function () {
                    alert('获取失败!');
                    location.reload();
                }
            });
        }


        $('#sub_data').click(function () {
            var nid = $('#nid').val();
            var ntitle = $('#ntitle').val();
            var ncontent = $('#ncontent').val();
            var ntime = $('#ntime').val();
            var nduration = $('#nduration').val();
            var nstatus = 0;
            if ($('#nstatus').is(':checked'))
            {
                nstatus = 1;
            }


            $.ajax({
                type: 'POST',
                url: '/Admin/<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
/AjaxSubNote',
                async: false,
                data: {'nid': nid, 'ntitle': ntitle, 'ncontent': ncontent, 'ntime': ntime, 'nduration': nduration, 'nstatus': nstatus},
                dataType: 'json',
                success: function (json)
                {
                    if (json.ecode == 200)
                    {
                        $('.modal-body').html('<b class="green">操作成功！</b>');
                        document.location.reload();
                    }
                    else
                    {
                        alert(json.emsg);
                        $('#sub_data').removeAttr('disabled').removeClass('disabled');
                    }
                },
                error: function () {
                    $('.modal-body').html('<b class="red">数据加载失败！</b>');
                    document.location.reload();
                }
            });
        });

    <?php echo '</script'; ?>
>

    <?php echo $_smarty_tpl->getSubTemplate ('Admin/Public/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>



<?php }} ?>
