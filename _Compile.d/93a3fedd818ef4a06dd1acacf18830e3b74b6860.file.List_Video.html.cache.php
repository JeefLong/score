<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-06-29 23:47:57
         compiled from "F:\HTDOCS\Angent_game\Application\views\Video\Main\List_Video.html" */ ?>
<?php /*%%SmartyHeaderCode:1022679585d17882d6fdd93-36190630%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93a3fedd818ef4a06dd1acacf18830e3b74b6860' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Video\\Main\\List_Video.html',
      1 => 1561818740,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1022679585d17882d6fdd93-36190630',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'max' => 0,
    'val' => 0,
    'list' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5d17882d7370e0_43059480',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d17882d7370e0_43059480')) {function content_5d17882d7370e0_43059480($_smarty_tpl) {?><?php if (!is_callable('smarty_function_vsource')) include 'F:\\HTDOCS\\Angent_game\\Application\\library\\Smarty\\plugins\\function.vsource.php';
?><?php echo $_smarty_tpl->getSubTemplate ("Video/Public/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>

<body>
    <div class="page-with-sidebar" id="page-container">


        <?php echo $_smarty_tpl->getSubTemplate ("Video/Public/left.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>


        <div class="content">
            <h1 class="page-header">
                <i class="fa fa-pagelines"></i>
                国产
                <!-- div class='page-header-menu'></div -->
            </h1>
            <div class="row" style="position: relative">

                <div class='alert alert-warning alert-dismissible' role='alert'>
                    <button aria-label='Close' class='close' data-dismiss='alert' type='button'>
                        <span aria-hidden='true'>×</span>
                    </button>
                    <i class='fa fa-bell-o'></i>
                    登录成功.
                </div>

                <div class="alert alert-success alert-dismissible" role="alert" style="font-size: 14px">
                    <i class="fa fa-bell-o"></i>
                    请使用HTTPS访问：
                    <div class="text-success" style="display: inline-block;">正确姿势 https://abc555.xyz</div>
                    错误姿势 http://abc555.xyz
                </div>


                <div class="container-fluid">

                    <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['max']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
                    <a class="col-md-2 col-xs-4 item-video-container " href="/Video/Play/Index?v_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
">
                        <div class="item-video video-sx" style="background-size:cover;background-image: url(<?php echo $_smarty_tpl->tpl_vars['val']->value['v_img'];?>
)">
                            <span><?php echo $_smarty_tpl->tpl_vars['val']->value['v_play_count'];?>
</span>
                        </div>
                        <h4 class="title video-st"><?php echo $_smarty_tpl->tpl_vars['val']->value['v_name'];?>
</h4>
                    </a>
                    <?php } ?>
                </div>


                <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
                <a class="col-md-4 item-video-container"   href="/Video/Play/Index?v_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
">
                    <div class="item-video video-mx" style="background-size:cover;background-image: url(<?php echo $_smarty_tpl->tpl_vars['val']->value['v_img'];?>
)"></div>
                    <div class="title video-mt"><?php echo $_smarty_tpl->tpl_vars['val']->value['v_name'];?>
</div>
                </a>
                <?php }
if (!$_smarty_tpl->tpl_vars['val']->_loop) {
?>
                <a class="col-md-4 item-video-container"  href="#">
                    暂未发布，敬请期待！
                </a>
                <?php } ?>
            </div>
            <div class="row">
                <div class="pagination-container text-center">
                    <ul class="pagination">
                        <?php echo $_smarty_tpl->tpl_vars['page']->value;?>

                    </ul>
                </div>
            </div>
        </div>

        <?php echo $_smarty_tpl->getSubTemplate ("Video/Public/right.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>


    </div>

    <?php echo '<script'; ?>
 src='<?php echo smarty_function_vsource(array('js'=>"play.js"),$_smarty_tpl);?>
'><?php echo '</script'; ?>
>

</body>
</html><?php }} ?>
