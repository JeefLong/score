<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-06-15 17:35:32
         compiled from "F:\HTDOCS\Angent_game\Application\views\Admin\User\list_user.html" */ ?>
<?php /*%%SmartyHeaderCode:6805856915d04bbe469ff32-85317244%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21aa5694ee43732d54f3fc1f6ff25f6c1c6c43e3' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Admin\\User\\list_user.html',
      1 => 1555509342,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6805856915d04bbe469ff32-85317244',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Ctrl' => 0,
    'sort' => 0,
    'list' => 0,
    'val' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5d04bbe46f5537_26500509',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d04bbe46f5537_26500509')) {function content_5d04bbe46f5537_26500509($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'F:\\HTDOCS\\Angent_game\\Application\\library\\Smarty\\plugins\\modifier.date_format.php';
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

                        <input  class="nav-search-input" type="text" id="start_time" name='start_time' placeholder = "开始日期"  />

                        <input   class="nav-search-input" type="text" id="end_time"  name='end_time' placeholder = "结束日期"  />

                        <select id = 'search_id' name = 'search_id'>
                            <option value = '1'> 用户ID </option>
                            <option value = '2'> Email </option>
                            <option value = '3'> 组别 </option>
                        </select>
                        <span class="input-icon">
                            <input type="text" placeholder="内容[回车]" class="nav-search-input" name = "search_data" id = "search_data" />
                            <i class="ace-icon fa fa-search nav-search-icon"></i>
                        </span>
                        <input type="submit" value="GO"  class="btn btn-purple btn-sm" />
                    </form><!-- /.nav-search -->
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
                            <!--      <a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('0');"><span class="green">添加</span></a> -->
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
                                        <td>
                                            <label class="position-relative">
                                                <input type="checkbox" id ="check_all" class="ace" />
                                                <span class="lbl"></span>
                                            </label>
                                        </td>
                                        <td>ID</td>
                                        <!--  <td>登录名</td> -->
                                        <td>用户昵称</td>
                                        <td>组别</td>
                                        <td>到期时间<a href="?sort=<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
&type=exp"> &nbsp;(↑↓)</a></td>
                                        <td>房卡数量<a href="?sort=<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
&type=card"> &nbsp;(↑↓)</a></td>
                                        <td>金币数量<a href="?sort=<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
&type=gold"> &nbsp;(↑↓)</a></td>

                                        <td>累计购卡</td>
                                        <td>累计购币</td>

                                        <td>注册日期<a href="?sort=<?php echo $_smarty_tpl->tpl_vars['sort']->value;?>
&type=reg"> &nbsp;(↑↓)</a></td>
                                        <td>操作</td>
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
                                        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['email'];?>
</td>
                                        <td><a href="/Admin/User/listuser?search_id=3&search_data=<?php echo $_smarty_tpl->tpl_vars['val']->value['group'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['group'];?>
</a></td>
                                        <td <?php if ($_smarty_tpl->tpl_vars['val']->value['exp_time']>@constant('NOW')) {?>class="green"<?php } else { ?>class="red"<?php }?>  >
                                            <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['val']->value['exp_time'],"Y-m-d H:i:s");?>

                                        </td>
                                    <td class="orange"><?php echo $_smarty_tpl->tpl_vars['val']->value['card'];?>
</td>
                                    <td class="green"><?php echo $_smarty_tpl->tpl_vars['val']->value['gold'];?>
</td>
                                    <td><a href="/Admin/Order/listorder?search_id=4&search_data=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" ><?php echo $_smarty_tpl->tpl_vars['val']->value['c_count'];?>
</a></td>
                                    <td><a href="/Admin/Order/listorder?search_id=5&search_data=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" ><?php echo $_smarty_tpl->tpl_vars['val']->value['g_count'];?>
</a></td>
                                    <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['val']->value['reg_time'],"Y-m-d H:i:s");?>
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
                                    <td colspan="9" style="color: red"> 没找到信息!</td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan = "19"> 
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
                                    <tr>
                                        <td>头像</td> 
                                        <td>
                                            <img style ="width:100px; height:100px;" class="nav-user-photo img-circle"  id = "pl_img" alt="暂无头像" />    
                                        </td>
                                    </tr>

                                    <tr> 
                                        <td>ID</td>   
                                        <td><input type="text" readonly   id="pl_id" />   </td> 
                                    </tr>

                                    <tr> 
                                        <td>登录ID</td>
                                        <td><input type="text"  id="pl_account" readonly />  </td> 
                                    </tr>

                                    <tr> 
                                        <td>性别</td>
                                        <td>
                                            <select id="pl_sex" disabled = "disabled">
                                                <option value = "0">保密</option>
                                                <option value = "1">男</option>
                                                <option value = "2">女</option>
                                            </select>
                                        </td> 
                                    </tr>

                                    <tr> 
                                        <td>微信昵称</td>
                                        <td><input type="text" id="pl_name" readonly />     </td>  
                                    </tr>

                                    <tr>
                                        <td>房卡数量</td>  
                                        <td><input type="text" id="pl_gold" readonly />     </td>  
                                    </tr>
                                    <?php if ($_SESSION['_admin_user']['uname']=='admin'||$_SESSION['_admin_user']['roleid']<1) {?>
                                    <tr>
                                        <td>特殊安检</td>  
                                        <td>
                                            <input id="pl_chg" class="ace ace-switch ace-switch-4 btn-rotate" type="checkbox" />
                                            <span class="lbl"></span>
                                        </td>  
                                    </tr>

                                    <tr>
                                        <td>权值设置</td>  
                                        <td>
                                            麻将HP:
                                            <input type="checkbox" class="ace" name="perm" value = "1" />
                                            <span class="lbl"></span>
                                            &nbsp;

                                            帕斯KP:
                                            <input type="checkbox" class="ace" name="perm" value = "2" />
                                            <span class="lbl"></span>
                                            &nbsp;

                                            帕斯BS:
                                            <input type="checkbox" class="ace" name="perm" value = "4" />
                                            <span class="lbl"></span>
                                            &nbsp;

                                            代开FJ:
                                            <input type="checkbox" class="ace" name="perm" value = "8" />
                                            <span class="lbl"></span>

                                        </td>  
                                    </tr>
                                    <?php }?>

                                    <tr>
                                        <td>金币数量</td>  
                                        <td><input type="text" id="pl_coins" readonly />    </td>  
                                    </tr>

                                    <tr>
                                        <td>俱乐部ID</td>  
                                        <td><input type="text" id="pl_club" />    </td>  
                                    </tr>

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
        if (!confirm('确认要删除吗?'))
        {
            return false;
        }
        $('#deldata').attr('disabled', 'disabled').addClass('disabled');
        $.ajax({
            url: '/Admin/<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
/AjaxDel<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
',
            type: 'POST',
            data: {'pl_ids': data},
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
        $('#id').val(id);
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
                $('#pl_id').val(json.id);
                $('#pl_account').val(json.account);
                $('#pl_img').attr('src', json.headimg);
                $('#pl_sex').val(json.sex);
                $('#pl_name').val(json.uname);
                $('#pl_gold').val(json.gems);
                $('#pl_club').val(json.club_id)
                if (json.lv == 2)
                {
                    $('#pl_chg').prop("checked", true);
                } else
                {
                    $('#pl_chg').prop("checked", false);
                }
                $('#pl_coins').val(json.coins);
            },
            error: function () {
                alert('获取失败!');
                location.reload();
            }
        });
    }

    $('#sub_data').click(function () {
        var pl_id = $('#pl_id').val();
        var pl_account = $('#pl_account').val();
        var pl_name = $('#pl_name').val();
        var pl_sex = $('#pl_sex').val();
        var pl_gold = $('#pl_gold').val();
        var pl_coins = $('#pl_coins').val();
        var pl_club = $('#pl_club').val();
        var pl_chg = 1;
        if ($('#pl_chg').is(':checked'))
        {
            pl_chg = 2;
        }

        var data = '';
        var inputs = document.getElementsByName('perm');
        for (var i = 0; i < inputs.length; i++)
        {
            if (inputs[i].checked)
            {
                data = data + ',' + inputs[i].value;
            }
        }
        data = data.substr(1);

        $('#sub_data').attr('disabled', 'disabled').addClass('disabled');
        $.ajax({
            type: 'POST',
            url: '/Admin/<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
/AjaxSub<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
',
            async: false,
            data: {
                'pl_id': pl_id,
                'pl_account': pl_account,
                'pl_name': pl_name,
                'pl_sex': pl_sex,
                'pl_gold': pl_gold,
                'pl_chg': pl_chg,
                'pl_coins': pl_coins,
                'pl_club': pl_club,
                'perm': data,
            },
            dataType: 'json',
            success: function (json)
            {
                if (json.ecode == 200)
                {
                    $('.modal-body').html('<b class="green">操作成功!</b>');
                    document.location.reload();
                } else
                {
                    $('.modal-body').html('<b class="red">' + json.emsg + '!</b>');
                    document.location.reload();
                }
            },
            error: function () {
                $('.modal-body').html('<b class="red">数据加载失败!</b>');
                document.location.reload();
            }
        });
    });

<?php echo '</script'; ?>
>
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

    $('#start_time').datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        // pickDate: false,
        // startView: 1,
    }).on('changeDate', function () {
        $(this).datetimepicker('hide');
    });


    $('#end_time').datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        // pickDate: false,
        // startView: 1,
    }).on('changeDate', function () {
        $(this).datetimepicker('hide');
    });
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate ('Admin/Public/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>

<?php }} ?>
