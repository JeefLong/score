<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-04-13 22:29:37
         compiled from "F:\HTDOCS\Angent_game\Application\views\Admin\Manage\list_manage.html" */ ?>
<?php /*%%SmartyHeaderCode:5430076805cb1f2512820a2-31894269%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1cfe1094e058c332b8e0a412faf2a4308b5b9955' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Admin\\Manage\\list_manage.html',
      1 => 1504331874,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5430076805cb1f2512820a2-31894269',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Ctrl' => 0,
    'list' => 0,
    'val' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5cb1f251375142_66694181',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5cb1f251375142_66694181')) {function content_5cb1f251375142_66694181($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'F:\\HTDOCS\\Angent_game\\Application\\library\\Smarty\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_modifier_truncate')) include 'F:\\HTDOCS\\Angent_game\\Application\\library\\Smarty\\plugins\\modifier.truncate.php';
if (!is_callable('smarty_function_asource')) include 'F:\\HTDOCS\\Angent_game\\Application\\library\\Smarty\\plugins\\function.asource.php';
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
">管理中心</a>
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
                        管理中心
                        <small>
                            <i class="arrow fa fa-angle-right"></i>
                            列表
                            <i class="arrow fa fa-angle-right"></i>
                            <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('FF');"><span class="green">添加</span></a>
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
                                        <th>ID</th>
                                        <th>登录名</th>
                                        <th>角色ID</th>
                                        <th>状态</th>
                                        <th>修改时间</th>
                                        <th>锁定日期</th>
                                        <th>登陆提示</th>
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
                                        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['username'];?>
</td>
                                        <td>
                                            <?php if ($_smarty_tpl->tpl_vars['val']->value['roleid']==0) {?>
                                            <b class="orange">ROOT</b>
                                            <?php } elseif ($_smarty_tpl->tpl_vars['val']->value['roleid']==1) {?>
                                            <b class="orange">Admin</b>
                                            <?php } elseif ($_smarty_tpl->tpl_vars['val']->value['roleid']==2) {?>
                                            <b class="orange">User</b>
                                            <?php } else { ?>
                                            <b class="orange">Other</b>
                                            <?php }?>
                                        </td>
                                        <td>
                                            <?php if ($_smarty_tpl->tpl_vars['val']->value['status']==0) {?> 
                                            <b class="red">锁定</b>
                                            <?php } elseif ($_smarty_tpl->tpl_vars['val']->value['status']==1) {?>
                                            <b class="green">正常</b>
                                            <?php }?>
                                        </td>
                                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['val']->value['reg_time'],"Y-m-d H:i:s");?>
 </td>   
                                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['val']->value['lock_date'],"Y-m-d H:i:s");?>
 </td>   
                                        <td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['val']->value['login_message'],20);?>
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
                        <!-- /.Sub Page -->

                    </div>

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
                                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                        <tr> <th>ID</th>   <td><input type="text"  id="ad_id"  placeholder="禁止修改"  disabled="disabled" />   </td> </tr>
                                        <tr> <th>登录名</th>     <td><input type="text"  id="ad_name"  placeholder="用户名不能为空"  value="" />       </td> </tr>
                                        <tr> <th>登录密码</th>     <td><input type="password" id="ad_pass" value="" placeholder="留空则不修改" />     </td>  </tr>
                                        <tr> <th>角色ID</th>     <td><input type="text" id="ad_role"  />   </td>  </tr>
                                        <tr> <th>状态</th>    
                                            <td>
                                                <select id="ad_status">
                                                    <option value="0">锁定</option>
                                                    <option value="1">正常</option>
                                                </select>
                                            </td>  
                                        </tr>
                                        <tr> <th>锁定时间</th>     <td><input type="text" value=""  id="ad_lock" placeholder = "大于当前时间为有效"  />     </td>  </tr>
                                        <tr> <th>登陆消息</th>     <td><input type="text" value=""  id="ad_message" placeholder = "登录后的提示" />     </td>  </tr>
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

    <!-- 日历控件 -->
    <link rel="stylesheet" href="<?php echo smarty_function_asource(array('css'=>'bootstrap-datetimepicker.min.css'),$_smarty_tpl);?>
" />
    <?php echo '<script'; ?>
 src="<?php echo smarty_function_asource(array('js'=>'date-time/moment.min.js'),$_smarty_tpl);?>
"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo smarty_function_asource(array('js'=>'date-time/bootstrap-datetimepicker.min.js'),$_smarty_tpl);?>
"><?php echo '</script'; ?>
>

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
                                                           type: 'POST',
                                                           data: {'uids': data},
                                                           dataType: 'json',
                                                           success: function (json) {
                                                               alert(json.emsg);
                                                               if (json.ecode == 200)
                                                               {
                                                                   location.reload();
                                                               }
                                                           },
                                                           error: function () {
                                                               alert('删除失败!');
                                                           }
                                                       });
                                                       $('#deldata').removeAttr('disabled').removeClass('disabled');
                                                   }



                                                   function get_data(id)
                                                   {

                                                       $.ajax({
                                                           url: '/Admin/<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
/Sub<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
',
                                                           type: 'POST',
                                                           data: {'id': id},
                                                           dataType: 'json',
                                                           success: function (json) {
                                                               if (typeof json.ecode != 'undefined')
                                                               {
                                                                   $('.modal-body').html(json.emsg);
                                                                   location.reload();
                                                               }

                                                               $('#ad_id').val(json.id);
                                                               $('#ad_name').val(json.username);

                                                               if (id == 0) {
                                                                   $('#ad_role').val(1);
                                                                   $('#ad_status').val(1);
                                                               }
                                                               else
                                                               {
                                                                   $('#ad_role').val(json.roleid);
                                                                   $('#ad_status').val(json.status);
                                                               }
                                                               $('#ad_lock').val(json.lock_date);
                                                               $('#ad_message').val(json.login_message);

                                                           },
                                                           error: function () {
                                                               alert('获取失败!');
                                                               location.reload();
                                                           }
                                                       });
                                                   }



                                                   $('#sub_data').click(function () {
                                                       var ad_id = $('#ad_id').val();
                                                       var ad_name = $('#ad_name').val();
                                                       var ad_role = $('#ad_role').val();
                                                       var ad_pass = $('#ad_pass').val();
                                                       var ad_role = $('#ad_role').val();
                                                       var ad_status = $('#ad_status').val();
                                                       var ad_lock = $('#ad_lock').val();
                                                       var ad_message = $('#ad_message').val();

                                                       $('#sub_data').attr('disabled', 'disabled').addClass('disabled');
                                                       $.ajax({
                                                           type: 'POST',
                                                           url: '/Admin/<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
/AjaxSub<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
',
                                                           async: false,
                                                           data: {'id': ad_id, 'ad_name': ad_name, 'ad_pass': ad_pass, 'ad_role': ad_role, 'ad_status': ad_status, 'ad_lock': ad_lock, 'ad_message': ad_message},
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

                                                   $('#ad_lock').datetimepicker({
                                                       format: 'yyyy-mm-dd hh:ii'
                                                               // pickDate: false,
                                                               // startView: 1,
                                                   }).on('changeDate', function () {
                                                       $(this).datetimepicker('hide');
                                                   });

    <?php echo '</script'; ?>
>

    <?php echo $_smarty_tpl->getSubTemplate ('Admin/Public/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>

<?php }} ?>
