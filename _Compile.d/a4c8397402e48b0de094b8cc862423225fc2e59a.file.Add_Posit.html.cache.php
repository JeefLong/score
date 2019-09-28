<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-04-13 22:31:45
         compiled from "F:\HTDOCS\Angent_game\Application\views\Admin\Posit\Add_Posit.html" */ ?>
<?php /*%%SmartyHeaderCode:17832214665cb1f2d1c56419-47866377%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a4c8397402e48b0de094b8cc862423225fc2e59a' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Admin\\Posit\\Add_Posit.html',
      1 => 1512380650,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17832214665cb1f2d1c56419-47866377',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Ctrl' => 0,
    'aid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5cb1f2d1cb64c0_95171073',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5cb1f2d1cb64c0_95171073')) {function content_5cb1f2d1cb64c0_95171073($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("Admin/Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>

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
                        <a href="/Admin/Index">首页</a>
                    </li>

                    <li>
                        <a href="/Admin/<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
/Add<?php echo $_smarty_tpl->tpl_vars['Ctrl']->value;?>
">代理充值</a>
                    </li>
                    <li class="active">查看</li>
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
                        代理充值
                        <small>
                            <i class="icon-double-angle-right"></i>
                            查看
                        </small>
                    </h1>
                </div><!-- /.page-header -->
                <div class="row">
                    <div class="row col-xs-12 col-sm-12 col-lg-12">
                        <div class="table-responsive fadeInDown animated">
                            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                <tr> <th>代理对应的ID</th>    
                                    <td>
                                        <input type="text"  placeholder="代理的ID" id="agent_id" name="agent_id" <?php if (!empty($_smarty_tpl->tpl_vars['aid']->value)) {?> value ="<?php echo $_smarty_tpl->tpl_vars['aid']->value;?>
" <?php }?> />
                                        <input type="button"  data-toggle="modal" data-target="#myModal" id="charge_button" name="charge_button" value="查看" class="btn btn-sm" /> 
                                    </td>
                                </tr>
                                <tr> <th>充值/提现数量</th>
                                    <td>
                                        <input type="text"  placeholder="正数充值;负数提现" id="charge_gold" name="charge_gold" /> 
                                        <b class="red">   * [代理提现] 当充值为负数时是扣除相应的金币,直到数量为0; [代理充值] 当为正数时是增加相应的金币  </b>
                                    </td>
                                </tr>

                                <tr> <th>充值/提现说明</th>
                                    <td>
                                        <input type="text"  placeholder="充值/提现说明" id="charge_desc" name="charge_desc" /> 
                                        <b class="red">   * 请给出充值说明,可以不填</b>
                                    </td>
                                </tr>

                                <tr> <td colspan = "3">
                                        <button id="add_data" type="button" class="btn btn-purple btn-sm">
                                            提交
                                            <i class="icon-home icon-on-right bigger-110"></i>
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </div><!-- /.table-responsive -->
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
                                        <tr> <th>代理ID</th>   <td><input type="text"  id="agt_id" readonly />   </td> </tr>
                                        <tr> <th>登录名</th>   <td><input type="text"  placeholder="登录名" id="agt_name" readonly />   </td> </tr>
                                        <tr> <th>密码</th>     <td><input type="text"  placeholder="留空则不修改" id="agt_pass" readonly />       </td> </tr>
                                        <tr> <th>姓名</th>     <td><input type="text"  placeholder="代理姓名" id="real_name" readonly />       </td> </tr>
                                        <tr> <th>手机号</th>   <td><input type="text"  placeholder="手机号" id="agt_mobile" readonly />   </td> </tr>
                                        <tr> <th>推荐人ID</th>   <td><input type="text"  placeholder="推荐人" id="ref_id" readonly />  </td>  </tr>
                                        <tr> <th>金币数量</th> <td><input type="number"  placeholder="金币数量" id="agt_gold" value="0" readonly />     </td>  </tr>
                                        <tr> <th>下线提成</th> <td><input type="text"  placeholder="下线提成" id="off_rate" value="0.00" readonly />  </td>  </tr>
                                        <tr> <th>购买折算</th> <td><input type="text"  placeholder="购买折算" id="buy_rate" value="1.00" readonly />  </td>  </tr>
                                        <tr> <th>用户状态</th>
                                            <td>
                                                <select name="agt_status" id="agt_status" disabled="disabled">
                                                    <option value="0">未审核</option>
                                                    <option value="1">已审核</option>
                                                    <option value="2">已锁定</option>
                                                    <option value="3">已冻结</option>
                                                </select>
                                            </td>
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
        $('#add_data').click(function () {
            var agent_id = $('#agent_id').val();
            var charge_gold = $('#charge_gold').val();
            var charge_desc = $('#charge_desc').val();

            $.ajax({
                type: 'POST',
                url: '/Admin/Posit/AjaxAddPosit',
                async: false,
                data: {'agent_id': agent_id, 'charge_gold': charge_gold, 'charge_desc': charge_desc},
                dataType: 'json',
                success: function (json)
                {
                    alert(json.emsg);
                    if (json.ecode == 200)
                    {
                        window.location.href = '/Admin/Order/ListOrder';
                    }
                }
            });
        });




        function get_data(uid)
        {
            $.ajax({
                url: '/Admin/Angent/SubAngent',
                type: 'POST',
                data: {'uid': uid},
                dataType: 'json',
                success: function (json) {
                    if ((typeof json.ecode != 'undefined'))
                    {
                        $('.modal-body').html(json.emsg);
                        location.reload();
                    }

                    $('#agt_id').val(json.id);
                    $('#agt_name').val(json.agent_name);
                    if (uid > 0)
                    {
                        $('#agt_name').attr('disabled', 'disabled');
                    }
                    else
                    {
                        $('#agt_name').removeAttr("disabled");
                    }
                    $('#real_name').val(json.real_name);

                    $('#agt_mobile').val(json.agent_mobile);
                    $('#ref_id').val(json.ref_id);
                    $('#agt_gold').val(json.game_card);
                    if (uid == 0) {
                        $('#off_rate').val('0.00');
                    } else {
                        $('#off_rate').val(json.off_rate);
                    }
                    if (uid == 0) {
                        $('#buy_rate').val('1.00');
                    } else {
                        $('#buy_rate').val(json.buy_rate);
                    }
                    if (uid == 0) {
                        $('#agt_status').val(0);
                    } else {
                        $('#agt_status').val(json.agent_status);
                    }

                },
                error: function () {
                    alert('获取失败!');
                    location.reload();
                }
            });
        }


        $("#charge_button").click(function () {
            var agt_id = $('#agent_id').val();
            if (agt_id < 1 || isNaN(agt_id))
            {
                alert('请输入正确的ID');
                return false;
            }
            get_data(agt_id);
        });

    <?php echo '</script'; ?>
>
    <?php echo $_smarty_tpl->getSubTemplate ('Admin/Public/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>

<?php }} ?>
