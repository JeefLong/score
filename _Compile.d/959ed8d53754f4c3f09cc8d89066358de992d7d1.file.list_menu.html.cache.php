<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-09-23 23:43:57
         compiled from "F:\HTDOCS\Angent_game\Application\views\Admin\Menu\list_menu.html" */ ?>
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
  ),
  'nocache_hash' => '10028134435d88e83d6d4776-70088193',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Ctrl' => 0,
    'list' => 0,
    'val' => 0,
    'nval' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5d88e83d73cda4_27142197',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d88e83d73cda4_27142197')) {function content_5d88e83d73cda4_27142197($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'F:\\HTDOCS\\Angent_game\\Application\\library\\Smarty\\plugins\\modifier.truncate.php';
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
                        <a href="/Admin/<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
/List<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
">菜单管理</a>
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
                <?php echo $_smarty_tpl->getSubTemplate ("Admin/Public/styletool.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>
 
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
                                    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
                                    <?php if ($_smarty_tpl->tpl_vars['val']->value['pid']==0) {?>
                                    <tr class="warning">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" />
                                                <span class="lbl"></span>
                                                <b class="red">Controller</b>
                                            </label>
                                        </td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['action'];?>
</td>
                                        <td><a href="<?php echo $_smarty_tpl->tpl_vars['val']->value['href'];?>
" target="_blank"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['val']->value['href'],21);?>
</a></td>
                                        <td><?php if ($_smarty_tpl->tpl_vars['val']->value['pid']==0) {?>ROOT<?php } else {
echo $_smarty_tpl->tpl_vars['val']->value['pid'];
}?></td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['private'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['order'];?>
</td>
                                        <td><?php if ($_smarty_tpl->tpl_vars['val']->value['show']==1) {?>显示<?php } else { ?>不显示<?php }?></td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>

                                    <?php  $_smarty_tpl->tpl_vars['nval'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['nval']->_loop = false;
 $_smarty_tpl->tpl_vars['nkey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['val']->value['node']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['nval']->key => $_smarty_tpl->tpl_vars['nval']->value) {
$_smarty_tpl->tpl_vars['nval']->_loop = true;
 $_smarty_tpl->tpl_vars['nkey']->value = $_smarty_tpl->tpl_vars['nval']->key;
?>
                                    <tr class="info">
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" class="ace" name="check_pro" value = "<?php echo $_smarty_tpl->tpl_vars['nval']->value['id'];?>
" />
                                                <span class="lbl"></span>
                                                <b class="green">Action</b>
                                            </label>
                                        </td>
                                        <th><?php echo $_smarty_tpl->tpl_vars['nval']->value['id'];?>
</th>
                                        <td><?php echo $_smarty_tpl->tpl_vars['nval']->value['name'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['nval']->value['action'];?>
</td>
                                        <td><a href="<?php echo $_smarty_tpl->tpl_vars['nval']->value['href'];?>
"  target="_blank"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['nval']->value['href'],21);?>
</a></td>
                                        <th><?php echo $_smarty_tpl->tpl_vars['nval']->value['pid'];?>
</th>
                                        <td><?php echo $_smarty_tpl->tpl_vars['nval']->value['private'];?>
 </td>
                                        <th><?php echo $_smarty_tpl->tpl_vars['nval']->value['order'];?>
</th>
                                        <td><?php if ($_smarty_tpl->tpl_vars['nval']->value['show']==1&&$_smarty_tpl->tpl_vars['val']->value['show']==1) {?><font class="green">显示</font><?php } else { ?><font class="red">不显示</font><?php }?> </td>
                                        <td>
                                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('<?php echo $_smarty_tpl->tpl_vars['nval']->value['id'];?>
');"><span class="menu-icon fa fa-pencil bigger-150"></span></a>
                                        </td>
                                    </tr>
                                    <?php }
if (!$_smarty_tpl->tpl_vars['nval']->_loop) {
?>
                                    <tr>
                                        <td colspan="9" style="color: red"> 该菜单下面没有分类! </td>
                                    </tr>
                                    <?php } ?>
                                    <?php }?>
                                    <?php } ?>
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
                url: '/Admin/<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
/AjaxDel<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
',
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
                url: '/Admin/<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
/Sub<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
',
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
                url: '/Admin/<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
/AjaxSub<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
',
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

    <?php echo '</script'; ?>
>

    <?php echo $_smarty_tpl->getSubTemplate ('Admin/Public/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>

<?php }} ?>
