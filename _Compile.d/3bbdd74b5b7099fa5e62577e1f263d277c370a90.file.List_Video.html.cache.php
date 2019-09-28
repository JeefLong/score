<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-09-25 21:06:49
         compiled from "F:\HTDOCS\Angent_game\Application\views\Admin\Video\List_Video.html" */ ?>
<?php /*%%SmartyHeaderCode:3246648525d8b6669b3f180-89038471%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3bbdd74b5b7099fa5e62577e1f263d277c370a90' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Admin\\Video\\List_Video.html',
      1 => 1556291077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3246648525d8b6669b3f180-89038471',
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
  'unifunc' => 'content_5d8b6669b742c7_43202617',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d8b6669b742c7_43202617')) {function content_5d8b6669b742c7_43202617($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'F:\\HTDOCS\\Angent_game\\Application\\library\\Smarty\\plugins\\modifier.truncate.php';
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
                        <a href="/Admin/Video/ListVideo">视频管理</a>
                    </li>
                    <li class="active">列表</li>
                </ul><!-- /.breadcrumb -->

                <div class="nav-search" id="nav-search">
                    <form class="form-search" method="get">
                        <span class="input-icon">
                            <input type="text" placeholder="标题[回车]" class="nav-search-input" name = "search_data" id = "search_data" />
                            <i class="ace-icon fa fa-search nav-search-icon"></i>
                        </span>
                    </form>
                </div> 

            </div>

            <div class="page-content">
                <?php echo $_smarty_tpl->getSubTemplate ("Admin/Public/styletool.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>
 
                <div class="page-header">
                    <h1>
                        视频管理
                        <small>
                            <i class="icon-double-angle-right"></i>
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
                                    <tr>
                                        <th>
                                            <label class="position-relative">
                                                <input type="checkbox" id ="check_all" class="ace" />
                                                <span class="lbl"></span>
                                            </label>
                                        </th>
                                        <th>ID</th>
                                        <th>视频名称</th>
                                        <th>视频简介</th>
                                        <th>视频地址</th>
                                        <th>添加时间</th>
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
                                        <td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['val']->value['v_name'],10);?>
</td>
                                        <td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['val']->value['v_text'],20);?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['val']->value['v_url'];?>
</td>
                                        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['val']->value['v_add_time'],'Y-m-d H:i:s');?>
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
                                    <h4 class="modal-title" id="myModalLabel">数据信息</h4>
                                </div>
                                <div class="modal-body">
                                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                        <tr> <th>视频标题</th>   
                                            <td>
                                                <input type="text" class="col-xs-12" id="v_name"  />   
                                            </td>
                                        </tr>

                                        <tr> <th>视频简介</th>   
                                            <td>
                                                <textarea id="v_text" class="col-xs-12" rows="10" ></textarea>
                                            </td>
                                        </tr>
                                        <tr> <th>视频地址</th> <td>  <input type="text" class="col-xs-12" id="v_url" />    </td>  </tr>
                                        <tr> <th>图片地址</th> <td>  <input type="text" class="col-xs-12" id="v_img" />    </td>  </tr>
                                        <tr> <th>视频分类</th> <td>  <input type="text" class="col-xs-12" id="v_type" />    </td>  </tr>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                    <button type="button" class="btn btn-primary" id="sub_data">确定</button>
                                    <input type="hidden" id="v_id" />
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
        ///
        $('#check_all').click(function () {
            $('[name=check_pro]:checkbox').each(function () {
                this.checked = !this.checked;
            });
        });

        function del() {
            var data = '';
            var inputs = document.getElementsByName('check_pro');
            for (var i = 0; i < inputs.length; i++) {
                if (inputs[i].checked) {
                    data = data + ',' + inputs[i].value;
                }
            }
            data = data.substr(1);
            if (data.length < 1) {
                alert('请选择要删除的数据');
                return false;
            }
            if (!confirm('确认要删除吗？')) {
                return false;
            }
            $.ajax({
                url: '/Admin/<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
/AjaxDelVideo',
                type: 'POST',
                data: {'ids': data, },
                beforeSend: function (request) {
                    var Authorization = localStorage.getItem('Authorization');
                    request.setRequestHeader('Authorization', Authorization);
                },
                dataType: 'json',
                success: function (json) {
                    alert(json.emsg);
                    if (json.ecode == 200) {
                        location.reload();
                    }
                }
            });
        }


        function get_data(id) {
            $('#v_id').val(id);
            $.ajax({
                url: '/Admin/<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
/SubVideo',
                type: 'POST',
                data: {'v_id': id},
                beforeSend: function (request) {
                    var Authorization = sessionStorage.getItem('Authorization');
                    request.setRequestHeader('Authorization', Authorization);
                },
                dataType: 'json',
                success: function (json) {
                    if (typeof json.ecode != 'undefined') {
                        $('.modal-body').html('<b class="red">' + json.emsg + '</b>');
                        return 0;
                    }
                    $('#v_id').val(json.id);
                    $('#v_type').val(json.v_type);
                    $('#v_name').val(json.v_name);
                    $('#v_img').val(json.v_img);
                    $('#v_text').val(json.v_text);
                    $('#v_url').val(json.v_url);
                },
                error: function () {
                    $('.modal-body').html('<b class="red">获取失败</b>');
                }
            });
        }


        $('#sub_data').click(function () {
            var v_id = $('#v_id').val();
            var v_type = $('#v_type').val();
            var v_name = $('#v_name').val();
            var v_img = $('#v_img').val();
            var v_text = $('#v_text').val();
            var v_url = $('#v_url').val();
            var token = '';
            $('#sub_data').attr('disabled', 'disabled').addClass('disabled');
            $.ajax({
                type: 'POST',
                url: '/Admin/<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
/AjaxSubVideo',
                async: false,
                data: {'v_id': v_id, 'v_type': v_type, 'v_name': v_name, 'v_img': v_img, 'v_text': v_text, 'v_url': v_url, },
                beforeSend: function (request) {
                    request.setRequestHeader("Authorization", token);
                },
                dataType: 'json',
                success: function (json) {
                    if (json.ecode == 200) {
                        $('.modal-body').html('<b class="green">操作成功！</b>');
                        document.location.reload();
                    } else {
                        alert(json.emsg);
                        $('#sub_data').removeAttr('disabled').removeClass('disabled');
                    }
                },
                error: function () {
                    $('.modal-body').html('<b class="red">数据加载失败！</b>');
                }
            });
        });

    <?php echo '</script'; ?>
>

    <?php echo $_smarty_tpl->getSubTemplate ('Admin/Public/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>

<?php }} ?>
