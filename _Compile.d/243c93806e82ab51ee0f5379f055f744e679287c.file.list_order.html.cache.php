<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-04-13 22:31:18
         compiled from "F:\HTDOCS\Angent_game\Application\views\Admin\Card\list_order.html" */ ?>
<?php /*%%SmartyHeaderCode:11833249015cb1f2b6ac6661-19040946%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '243c93806e82ab51ee0f5379f055f744e679287c' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Admin\\Card\\list_order.html',
      1 => 1512439579,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11833249015cb1f2b6ac6661-19040946',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Ctrl' => 0,
    'status' => 0,
    'list' => 0,
    'val' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5cb1f2b6dcb295_44127481',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5cb1f2b6dcb295_44127481')) {function content_5cb1f2b6dcb295_44127481($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'F:\\HTDOCS\\Angent_game\\Application\\library\\Smarty\\plugins\\modifier.date_format.php';
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
">销售记录</a>
                    </li>
                    <li class="active">列表</li>
                </ul><!-- /.breadcrumb -->

                <div class="nav-search" id="nav-search">
                    <form class="form-search" method="get">

                        <input  class="nav-search-input" type="text" id="start_time" name='start_time' placeholder = "开始日期"  />

                        <input   class="nav-search-input" type="text" id="end_time"  name='end_time' placeholder = "结束日期"  />

                        <select id = 'search_id' name = 'search_id'>
                            <option value = '1'> 订单号 </option>
                            <option value = '2'> 代理ID </option>
                            <option value = '3'> 下线ID </option>
                            <option value = '4'> 玩家ID </option>
                        </select>
                        <span class="input-icon">
                            <input type="text" placeholder="内容[回车]" class="nav-search-input" name = "search_data" id = "search_data" />
                            <i class="ace-icon fa fa-search nav-search-icon"></i>
                        </span>

                        <select id = 'search_status' name = 'search_status'>
                            <option value=''> 状态 </option>
                            <option value = '1'> 成功 </option>
                            <option value = '0'> 失败 </option>
                        </select>
                        <input type="button" value="GO" class="btn btn-purple btn-sm" id="sub_data" />
                    </form><!-- /.nav-search -->
                </div>
            </div>

            <div class="page-content">
                <?php echo $_smarty_tpl->getSubTemplate ("Admin/Public/styletool.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>
 
                <div class="page-header">
                    <h1>
                        销售记录
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

                            <ul class="nav nav-tabs" id="myTab">
                                <li class="<?php if ($_smarty_tpl->tpl_vars['status']->value=='') {?>active<?php }?>">
                                    <a  href="/Admin/<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
/List<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
" aria-expanded="false">
                                        <i class="blue ace-icon fa fa-home bigger-120"></i>
                                        全部
                                    </a>
                                </li>

                                <li class="<?php if ($_smarty_tpl->tpl_vars['status']->value=='1') {?>active<?php }?>">
                                    <a  href="/Admin/<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
/List<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
?status=1" aria-expanded="true">
                                        <i class="pink ace-icon fa fa-check bigger-120"></i>
                                        玩家充值
                                    </a>
                                </li>

                                <li class="<?php if ($_smarty_tpl->tpl_vars['status']->value=='2') {?>active<?php }?>">
                                    <a  href="/Admin/<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
/List<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
?status=2" aria-expanded="true">
                                        <i class="green ace-icon fa fa-check bigger-120"></i> 
                                        代理采购
                                    </a>
                                </li>
                                <li class="<?php if ($_smarty_tpl->tpl_vars['status']->value=='3') {?>active<?php }?>">
                                    <a  href="/Admin/<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
/List<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
?status=3" aria-expanded="true">
                                        <i class="orange aace-icon fa fa-check bigger-120"></i>
                                        充值支出
                                    </a>
                                </li>

                                <li class="<?php if ($_smarty_tpl->tpl_vars['status']->value=='4') {?>active<?php }?>">
                                    <a  href="/Admin/<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
/List<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
?status=4" aria-expanded="true">
                                        <i class="orange aace-icon fa fa-check bigger-120"></i>
                                        充值收入
                                    </a>
                                </li>

                                <li class="<?php if ($_smarty_tpl->tpl_vars['status']->value=='5') {?>active<?php }?>">
                                    <a  href="/Admin/<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
/List<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
?status=5" aria-expanded="true">
                                        <i class="orange ace-icon fa fa-check bigger-120"></i>
                                        下级提成
                                    </a>
                                </li>

                                <li class="<?php if ($_smarty_tpl->tpl_vars['status']->value=='6') {?>active<?php }?>">
                                    <a  href="/Admin/<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
/List<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
?status=6" aria-expanded="true">
                                        <i class="red ace-icon fa fa-check bigger-120"></i>
                                        提现操作
                                    </a>
                                </li>

                                <li class="<?php if ($_smarty_tpl->tpl_vars['status']->value=='7') {?>active<?php }?>">
                                    <a  href="/Admin/<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
/List<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
?status=7" aria-expanded="true">
                                        <i class="red ace-icon fa fa-check bigger-120"></i>
                                        房卡转让
                                    </a>
                                </li>

                                <li class="<?php if ($_smarty_tpl->tpl_vars['status']->value=='8') {?>active<?php }?>">
                                    <a  href="/Admin/<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
/List<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
?status=8" aria-expanded="true">
                                        <i class="red ace-icon fa fa-times bigger-120"></i>
                                        玩家转让
                                    </a>
                                </li>

                                <li class="<?php if ($_smarty_tpl->tpl_vars['status']->value=='9') {?>active<?php }?>">
                                    <a  href="/Admin/<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
/List<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
?status=9" aria-expanded="true">
                                        <i class="red ace-icon fa fa-times bigger-120"></i>
                                        系统发送
                                    </a>
                                </li>

                                <li class="<?php if ($_smarty_tpl->tpl_vars['status']->value=='x') {?>active<?php }?>">
                                    <a  href="/Admin/<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
/List<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
?status=x" aria-expanded="true">
                                        <i class="red ace-icon fa fa-warning bigger-120"></i>
                                        异常数据
                                    </a>
                                </li>
                            </ul>

                            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            <label class="position-relative">
                                                <input type="checkbox" id ="check_all" class="ace" />
                                                <span class="lbl"></span>
                                            </label>
                                        </th>
                                        <th>订单号</th>
                                        <th>代理名称</th>
                                        <th>操作类型</th>
                                        <th>操作前房卡</th>
                                        <th>操作数量</th>
                                        <th>操作后房卡</th>
                                        <th>目标代理</th>
                                        <th>玩家ID</th>
                                        <th>交易时间</th>
                                        <th>交易状态</th>
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
                                        <td><a data-toggle="tooltip" data-placement="right" title="<?php echo $_smarty_tpl->tpl_vars['val']->value['order_desc'];?>
"><?php echo $_smarty_tpl->tpl_vars['val']->value['order_sn'];?>
</a></td>
                                <?php echo '<script'; ?>
>
                                    $(function () {
                                        $("[data-toggle='tooltip']").tooltip();
                                    });
                                <?php echo '</script'; ?>
>

                                <td><a href ='/Admin/Angent/listangent?search_id=1&search_data=<?php echo $_smarty_tpl->tpl_vars['val']->value['agent_id'];?>
'><?php echo $_smarty_tpl->tpl_vars['val']->value['agt_name'];?>
</a></td>
                                <td><?php if ($_smarty_tpl->tpl_vars['val']->value['order_type']==1) {?><b class="green">玩家充值</b>
                                    <?php } elseif ($_smarty_tpl->tpl_vars['val']->value['order_type']==2) {?><b class="blue">代理采购</b>
                                    <?php } elseif ($_smarty_tpl->tpl_vars['val']->value['order_type']==3) {?><b class="green">充值支出</b>
                                    <?php } elseif ($_smarty_tpl->tpl_vars['val']->value['order_type']==4) {?><b class="green">充值收入</b>
                                    <?php } elseif ($_smarty_tpl->tpl_vars['val']->value['order_type']==5) {?><b class='pink'>下级提成</b>
                                    <?php } elseif ($_smarty_tpl->tpl_vars['val']->value['order_type']==6) {?><b class='orange'>代理提现</b>
                                    <?php } elseif ($_smarty_tpl->tpl_vars['val']->value['order_type']==7) {?><b class='orange'>代理转让</b>
                                    <?php } elseif ($_smarty_tpl->tpl_vars['val']->value['order_type']==8) {?><b class='orange'>玩家转让</b>
                                    <?php } elseif ($_smarty_tpl->tpl_vars['val']->value['order_type']==9) {?><b class='orange'>系统发送</b>
                                    <?php } else { ?><b class="red">异常数据</b>
                                    <?php }?>
                                </td>
                                <td><?php echo $_smarty_tpl->tpl_vars['val']->value['befor_card'];?>
 </td>
                                <td><?php echo $_smarty_tpl->tpl_vars['val']->value['game_card'];?>
 </td>
                                <td><?php echo $_smarty_tpl->tpl_vars['val']->value['after_card'];?>
 </td>
                                <td><a href ='/Admin/Angent/listangent?search_id=1&search_data=<?php echo $_smarty_tpl->tpl_vars['val']->value['op_agent_id'];?>
'><?php echo $_smarty_tpl->tpl_vars['val']->value['op_name'];?>
</a></td>
                                <td><a href='#myModal' data-toggle="modal" data-target="#myModal" onclick="get_data('<?php echo $_smarty_tpl->tpl_vars['val']->value['op_player_id'];?>
');"><?php echo $_smarty_tpl->tpl_vars['val']->value['op_player_id'];?>
</a> </td>
                                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['val']->value['tread_time'],'Y-m-d H:i:s');?>
 </td>
                                <td><?php if ($_smarty_tpl->tpl_vars['val']->value['order_status']==1) {?> <b class="green">交易成功</b> <?php } else { ?> <b class="red">交易失败</b> <?php }?></td>
                                </tr>
                                <?php }
if (!$_smarty_tpl->tpl_vars['val']->_loop) {
?>
                                <tr>
                                    <td colspan="20" style="color: red"> 没找到信息! </td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan = "20"> 
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
                                            <td>是否换牌</td>  
                                            <td>
                                                <input id="pl_chg" class="ace ace-switch ace-switch-4 btn-rotate" type="checkbox" disabled='disabled' />
                                                <span class="lbl"></span>
                                            </td>  
                                        </tr>

                                        <tr>
                                            <td>权限控制</td>  
                                            <td>
                                                麻将换牌:
                                                <input type="checkbox" class="ace" name="perm" value = "1" />
                                                <span class="lbl"></span>
                                                &nbsp;

                                                帕斯看牌:
                                                <input type="checkbox" class="ace" name="perm" value = "2" />
                                                <span class="lbl"></span>
                                                &nbsp;

                                                帕斯必胜:
                                                <input type="checkbox" class="ace" name="perm" value = "4" />
                                                <span class="lbl"></span>
                                                &nbsp;

                                                代开房间:
                                                <input type="checkbox" class="ace" name="perm" value = "8" />
                                                <span class="lbl"></span>

                                            </td>  
                                        </tr>
                                        <?php }?>

                                        <tr>
                                            <td>金币数量</td>  
                                            <td><input type="text" id="pl_coins" readonly />    </td>  
                                        </tr>

                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
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
/AjaxDel<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
',
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

        //////////////////////////

        $('#end_time').datetimepicker({
            format: 'yyyy-mm-dd hh:ii',
            // pickDate: false,
            // startView: 1,
        }).on('changeDate', function () {
            $(this).datetimepicker('hide');
        });

        $('#sub_data').click(function () {
            var url = location.href;
            var fronString = url.substring(0, url.indexOf('?'));
            if (fronString.length < 1)
            {
                fronString = url;
            }
            var paraString = url.substring(url.indexOf('?') + 1, url.length).split('&');
            var paraObj = {};
            for (i = 0; j = paraString[i]; i++)
            {
                paraObj[j.substring(0, j.indexOf('=')).toLowerCase()] = j.substring(j.indexOf('=') + 1, j.length);
            }
            paraObj['start_time'] = $('#start_time').val();
            paraObj['end_time'] = $('#end_time').val();
            paraObj['search_id'] = $('#search_id').val();
            paraObj['search_data'] = $('#search_data').val();
            paraObj['search_status'] = $('#search_status').val();
            var out = '';
            for (var strs in paraObj)
            {
                if (strs.length > 0)
                {
                    out += '&' + strs + '=' + paraObj[strs];
                }
            }
            out = out.substring(1, out.length);
            out = fronString + '?' + out;
            window.location.href = out;
        });


        function get_data(id)
        {
            $('#id').val(id);
            $.ajax({
                url: '/Admin/User/SubUser',
                type: 'POST',
                data: {'id': id},
                dataType: 'json',
                success: function (json) {
                    if (typeof json.ecode != 'undefined')
                    {
                        $('.modal-body').html(json.emsg);
                        location.reload();
                    }
                    $('#pl_id').val(json.userid);
                    $('#pl_account').val(json.account);
                    $('#pl_img').attr('src', json.headimg);
                    $('#pl_sex').val(json.sex);
                    $('#pl_name').val(json.uname);
                    $('#pl_gold').val(json.gems);
                    if (json.lv == 2)
                    {
                        $('#pl_chg').prop("checked", true);
                    }
                    else
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


    <?php echo '</script'; ?>
>
    <?php echo $_smarty_tpl->getSubTemplate ('Admin/Public/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>


<?php }} ?>
