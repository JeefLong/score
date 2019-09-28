<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-09-24 23:40:31
         compiled from "F:\HTDOCS\Angent_game\Application\views\Admin\Main\Index.html" */ ?>
<?php /*%%SmartyHeaderCode:3179392115d8a38efcc4d76-53482068%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5619134b18c04a55a29eebdf4f0c0ff27b34ecc7' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Admin\\Main\\Index.html',
      1 => 1553415365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3179392115d8a38efcc4d76-53482068',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
    'agt_num' => 0,
    'play_num' => 0,
    'order_num' => 0,
    'a_sell' => 0,
    'p_sell' => 0,
    'na_count' => 0,
    'da_count' => 0,
    'wo_count' => 0,
    'mo_count' => 0,
    'na_sell' => 0,
    'da_sell' => 0,
    'wa_sell' => 0,
    'ma_sell' => 0,
    'np_sell' => 0,
    'dp_sell' => 0,
    'wp_sell' => 0,
    'mp_sell' => 0,
    'nf_count' => 0,
    'df_count' => 0,
    'wf_count' => 0,
    'mf_count' => 0,
    'npl_count' => 0,
    'dpl_count' => 0,
    'wpl_count' => 0,
    'mpl_count' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5d8a38efd12b20_71571593',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d8a38efd12b20_71571593')) {function content_5d8a38efd12b20_71571593($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("Admin/Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>

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
                    <li class="active">信息</li>
                </ul><!-- /.breadcrumb -->

                <div class="nav-search" id="nav-search">
                    <form class="form-search">
                        <span class="input-icon">
                            <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                            <i class="ace-icon fa fa-search nav-search-icon"></i>
                        </span>
                    </form>
                </div><!-- /.nav-search -->
            </div>

            <div class="page-content">
                <?php echo $_smarty_tpl->getSubTemplate ("Admin/Public/styletool.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>
 
                <div class="page-header">
                    <h1>
                        控制台
                        <small>
                            <i class="icon-double-angle-right"></i>
                            查看
                        </small>
                    </h1>
                </div><!-- /.page-header -->
                <div class="row">
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="col-xs-12 col-sm-12 col-lg-12">

                        <div class="alert alert-block alert-success shake animated">
                            <button type="button" class="close" data-dismiss="alert">
                                <i class="ace-icon fa fa-times"></i>
                            </button>
                            <i class="ace-icon fa fa-check green"></i>
                            登录提示:
                            <strong class="red">
                                <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

                            </strong>
                            <small> Ver(<?php echo @constant('VER');?>
)</small>
                        </div>

                        <div class="row bounceInUp animated">
                            <div class="space-6"></div>

                            <div class="col-sm-0 infobox-container">
                                <div class="infobox infobox-green  ">
                                    <div class="infobox-icon">
                                        <i class="ace-icon fa fa-comments"></i>
                                    </div>

                                    <div class="infobox-data">
                                        <span class="infobox-data-number"><?php echo $_smarty_tpl->tpl_vars['agt_num']->value;?>
</span>
                                        <div class="infobox-content">代理人数</div>
                                    </div>
                                    <!--<div class="stat stat-success">8%</div>-->
                                </div>

                                <div class="infobox infobox-blue  ">
                                    <div class="infobox-icon">
                                        <i class="ace-icon fa fa-twitter"></i>
                                    </div>

                                    <div class="infobox-data">
                                        <span class="infobox-data-number"><?php echo $_smarty_tpl->tpl_vars['play_num']->value;?>
</span>
                                        <div class="infobox-content">玩家数量</div>
                                    </div>

                                    <!-- <div class="badge badge-success">
                                            +32%
                                           <i class="ace-icon fa fa-arrow-up"></i>
                                         </div> -->
                                </div>

                                <div class="infobox infobox-pink  ">
                                    <div class="infobox-icon">
                                        <i class="ace-icon fa fa-shopping-cart"></i>
                                    </div>

                                    <div class="infobox-data">
                                        <span class="infobox-data-number"><?php echo $_smarty_tpl->tpl_vars['order_num']->value;?>
</span>
                                        <div class="infobox-content">订单数量</div>
                                    </div>
                                    <!-- <div class="stat stat-important">4%</div> -->
                                </div>

                                <div class="infobox infobox-red  ">
                                    <div class="infobox-icon">
                                        <i class="ace-icon fa fa-flask"></i>
                                    </div>

                                    <div class="infobox-data">
                                        <span class="infobox-data-number"><?php echo $_smarty_tpl->tpl_vars['a_sell']->value;?>
</span>
                                        <div class="infobox-content">购卡总数</div>
                                    </div>
                                </div>

                                <div class="infobox infobox-orange2  ">
                                    <div class="infobox-icon">
                                        <i class="ace-icon fa fa-android"></i>
                                    </div>

                                    <div class="infobox-data">
                                        <span class="infobox-data-number"><?php echo $_smarty_tpl->tpl_vars['p_sell']->value;?>
</span>
                                        <div class="infobox-content">玩家充值</div>
                                    </div>
                                </div>

                                <div class="space-6"></div>

                            </div>
                            <div class="vspace-sm"></div>
                        </div><!-- /row -->

                        <div class="hr hr32 hr-dotted"></div>

                        <div class="row  bounceInDown animated">
                            <div class="col-sm-0">
                                <div class="widget-box transparent">
                                    <div class="widget-header widget-header-flat">
                                        <h4 class="widget-title lighter">
                                            <i class="ace-icon fa fa-star orange"></i>
                                            数据统计
                                        </h4>

                                        <div class="widget-toolbar">
                                            <a href="#" data-action="collapse">
                                                <i class="icon-chevron-up"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="widget-body">
                                        <div class="widget-main no-padding">
                                            <table class="table table-bordered table-striped">
                                                <thead class="thin-border-bottom">
                                                    <tr>
                                                        <th>
                                                            <i class="ace-icon fa fa-coffee red"></i>
                                                        </th>

                                                        <th>
                                                            <i class="ace-icon fa fa-caret-right blue"></i>
                                                            今日
                                                        </th>

                                                        <th>
                                                            <i class="ace-icon fa fa-caret-right blue"></i>
                                                            昨日
                                                        </th>

                                                        <th>
                                                            <i class="ace-icon fa fa-caret-right blue"></i>
                                                            上周
                                                        </th>

                                                        <th>
                                                            <i class="ace-icon fa fa-caret-right blue"></i>
                                                            上月
                                                        </th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <b class="green">下单数量</b>
                                                        </td>

                                                        <td>
                                                            <b class="orange"><?php echo $_smarty_tpl->tpl_vars['na_count']->value;?>
</b>
                                                            <!--<small class="green"> 3.7%<i class="ace-icon fa fa-arrow-up"></i></small>-->
                                                        </td>

                                                        <td>
                                                            <b class="orange"><?php echo $_smarty_tpl->tpl_vars['da_count']->value;?>
</b>
                                                            <!--<small class="green"> 3.7%<i class="ace-icon fa fa-arrow-up"></i></small>-->
                                                        </td>

                                                        <td>
                                                            <b class="orange"><?php echo $_smarty_tpl->tpl_vars['wo_count']->value;?>
</b>  
                                                            <!--<small class="green"> 3.7%<i class="ace-icon fa fa-arrow-up"></i></small>-->
                                                        </td>

                                                        <td>
                                                            <b class="orange"><?php echo $_smarty_tpl->tpl_vars['mo_count']->value;?>
</b>  
                                                            <!--<small class="green"> 3.7%<i class="ace-icon fa fa-arrow-up"></i></small>-->
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <b class="green">官方售出</b>
                                                        </td>
                                                        <td>
                                                            <b class="orange"><?php echo $_smarty_tpl->tpl_vars['na_sell']->value;?>
</b>  
                                                            <!--<small class="green"> 3.7%<i class="ace-icon fa fa-arrow-up"></i></small>-->
                                                        </td>

                                                        <td>
                                                            <b class="orange"><?php echo $_smarty_tpl->tpl_vars['da_sell']->value;?>
</b>  
                                                            <!--<small class="green"> 3.7%<i class="ace-icon fa fa-arrow-up"></i></small>-->
                                                        </td>

                                                        <td>
                                                            <b class="orange"><?php echo $_smarty_tpl->tpl_vars['wa_sell']->value;?>
</b>  
                                                            <!--<small class="green"> 3.7%<i class="ace-icon fa fa-arrow-up"></i></small>-->
                                                        </td>

                                                        <td>
                                                            <b class="orange"><?php echo $_smarty_tpl->tpl_vars['ma_sell']->value;?>
</b>  
                                                            <!--<small class="green"> 3.7%<i class="ace-icon fa fa-arrow-up"></i></small>-->
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td><b class="green">代理售出</b></td>
                                                        <td>
                                                            <b class="orange"><?php echo $_smarty_tpl->tpl_vars['np_sell']->value;?>
</b>  
                                                            <!--<small class="green"> 3.7%<i class="ace-icon fa fa-arrow-up"></i></small>-->
                                                        </td>

                                                        <td>
                                                            <b class="orange"><?php echo $_smarty_tpl->tpl_vars['dp_sell']->value;?>
</b>  
                                                            <!--<small class="green"> 3.7%<i class="ace-icon fa fa-arrow-up"></i></small>-->
                                                        </td>

                                                        <td>
                                                            <b class="orange"><?php echo $_smarty_tpl->tpl_vars['wp_sell']->value;?>
</b>  
                                                            <!--<small class="green"> 3.7%<i class="ace-icon fa fa-arrow-up"></i></small>-->
                                                        </td>

                                                        <td>
                                                            <b class="orange"><?php echo $_smarty_tpl->tpl_vars['mp_sell']->value;?>
</b>  
                                                            <!--<small class="red"> 1.7%<i class="ace-icon fa fa-arrow-down"></i></small>-->
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td><b class="green">新增代理</b></td>
                                                        <td>
                                                            <b class="orange"><?php echo $_smarty_tpl->tpl_vars['nf_count']->value;?>
</b>  
                                                            <!--<small class="green"> 3.7%<i class="ace-icon fa fa-arrow-up"></i></small>-->
                                                        </td>

                                                        <td>
                                                            <b class="orange"><?php echo $_smarty_tpl->tpl_vars['df_count']->value;?>
</b>  
                                                            <!--<small class="green"> 3.7%<i class="ace-icon fa fa-arrow-up"></i></small>-->
                                                        </td>

                                                        <td>
                                                            <b class="orange"><?php echo $_smarty_tpl->tpl_vars['wf_count']->value;?>
</b>  
                                                            <!--<small class="green"> 3.7%<i class="ace-icon fa fa-arrow-up"></i></small>-->
                                                        </td>

                                                        <td>
                                                            <b class="orange"><?php echo $_smarty_tpl->tpl_vars['mf_count']->value;?>
</b>  
                                                            <!--<small class="red"> 1.7%<i class="ace-icon fa fa-arrow-down"></i></small>-->
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td><b class="green">新增玩家</b></td>
                                                        <td>
                                                            <b class="orange"><?php echo $_smarty_tpl->tpl_vars['npl_count']->value;?>
</b>  
                                                            <!--<small class="green"> 3.7%<i class="ace-icon fa fa-arrow-up"></i></small>-->
                                                        </td>

                                                        <td>
                                                            <b class="orange"><?php echo $_smarty_tpl->tpl_vars['dpl_count']->value;?>
</b>  
                                                            <!--<small class="green"> 3.7%<i class="ace-icon fa fa-arrow-up"></i></small>-->
                                                        </td>

                                                        <td>
                                                            <b class="orange"><?php echo $_smarty_tpl->tpl_vars['wpl_count']->value;?>
</b>  
                                                            <!--<small class="green"> 3.7%<i class="ace-icon fa fa-arrow-up"></i></small>-->
                                                        </td>

                                                        <td>
                                                            <b class="orange"><?php echo $_smarty_tpl->tpl_vars['mpl_count']->value;?>
</b>  
                                                            <!--<small class="red"> 1.7%<i class="ace-icon fa fa-arrow-down"></i></small>-->
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div><!-- /widget-main -->
                                    </div><!-- /widget-body -->
                                </div><!-- /widget-box -->
                            </div>
                        </div><!-- /row -->
                    </div><!-- /.col -->

                    <!-- PAGE CONTENT ENDS -->

                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div><!-- /.main-content-inner -->
    </div><!-- /.main-content -->
    <!-- </div> /.main-container -->
    <?php echo $_smarty_tpl->getSubTemplate ("Admin/Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>

<?php }} ?>
