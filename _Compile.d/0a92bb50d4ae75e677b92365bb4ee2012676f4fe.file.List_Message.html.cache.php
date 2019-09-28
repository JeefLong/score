<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-04-15 23:00:43
         compiled from "F:\HTDOCS\Angent_game\Application\views\Admin\Message\List_Message.html" */ ?>
<?php /*%%SmartyHeaderCode:9808829685cb49c9bc2b4a3-27806191%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a92bb50d4ae75e677b92365bb4ee2012676f4fe' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Admin\\Message\\List_Message.html',
      1 => 1510229284,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9808829685cb49c9bc2b4a3-27806191',
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
  'unifunc' => 'content_5cb49c9bc80292_63668378',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5cb49c9bc80292_63668378')) {function content_5cb49c9bc80292_63668378($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("Admin/Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>

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
                        <a href="/Admin/Message/ListMessage">站内信管理</a>
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
                        站内信管理
                        <small>
                            <i class="icon-double-angle-right"></i>
                            列表
                            <i class="arrow fa fa-angle-right"></i>
                            <a href='#myModal' data-toggle="modal" data-target="#myModal" ><span class="green">新建短信</span></a>
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
                                        <th>发信人</th>
                                        <th>收信人</th>
                                        <th>信息概要</th>
                                        <th>起始时间</th>
                                        <th>是否全部已读</th>
                                        <th>详情/回复</th>
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
                                        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['send_name'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['recive_name'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['contend'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['add_time'];?>
</td>
                                        <td><?php if ($_smarty_tpl->tpl_vars['val']->value['is_read']==0) {?> <b class="red">未读</b> <?php } else { ?> <b class="green">已读</b> <?php }?> </td>
                                        <td>
                                            <a href = "/Admin/Message/ShowMessage?tid=<?php echo $_smarty_tpl->tpl_vars['val']->value['topic_id'];?>
" ><span class="menu-icon fa fa-pencil bigger-150"></span></a>
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
                                    <h4 class="modal-title" id="myModalLabel">新建短信</h4>
                                </div>
                                <div class="modal-body">
                                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                        <tr>
                                            <td>代理ID:</td>
                                            <td><input type="text" id="aid" placeholder="代理ID【必填】" /></td>
                                            
                                        </tr>
                                        <tr><td>内容:</td> <td><textarea id="content" cols="60" rows="10" placeholder="回复内容[限300字]"></textarea></td>  </tr>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                    <button type="button" class="btn btn-primary" id="sub_data">提交</button>
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
            $.ajax({
                url: '/Admin/<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
/AjaxDelMessage',
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


        $('#sub_data').click(function () {
            var aid = $('#aid').val();
            var content = $('#content').val();
            $.ajax({
                type: 'POST',
                url: '/Admin/<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
/AjaxAdd<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
',
                async: false,
                data: {'aid': aid, 'content': content, },
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
