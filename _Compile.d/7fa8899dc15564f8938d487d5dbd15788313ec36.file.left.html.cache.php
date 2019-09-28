<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-09-24 23:39:38
         compiled from "F:\HTDOCS\Angent_game\Application\views\Mart\Public\left.html" */ ?>
<?php /*%%SmartyHeaderCode:16322723125d8a38ba386483-54607805%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7fa8899dc15564f8938d487d5dbd15788313ec36' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Mart\\Public\\left.html',
      1 => 1562431732,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16322723125d8a38ba386483-54607805',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'vleft' => 0,
    'val' => 0,
    'key' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5d8a38ba397d96_72445454',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d8a38ba397d96_72445454')) {function content_5d8a38ba397d96_72445454($_smarty_tpl) {?><div class='sidebar collapse navbar-collapse' id='sidebar-left'>
    <form class="sidebar-search full-width" action="/search" accept-charset="UTF-8" method="get">
        <div class='form-group'>
            <input type="text" name="q" id="q" value="" class="form-control f-s-12" placeholder="搜索" />
            <button class='btn btn-search' type='submit'>
                <i class='fa fa-search'></i>
            </button>
        </div>
    </form>
    <div class='title'>分类</div>
    <ul class='nav'>
        <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['vleft']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
        <li class='list'>
            <a href='/Mart/List/Index?type=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
' style='padding-left: 62px;'>
                <i class='fa <?php if ($_smarty_tpl->tpl_vars['key']->value%2==0) {?>fa-camera<?php } else { ?>fa-bath<?php }?>'></i>
                <span>
                    <?php echo $_smarty_tpl->tpl_vars['val']->value['t_name'];?>

                </span>
            </a>
        </li>
        <?php } ?>
    </ul>
    <div class='title'>排行</div>
    <ul class='nav'>
        <li class=''>
            <a href='/Mart/Max/Play'>
                <i class='fa fa-sort-amount-desc'></i>
                <span>播放最多</span>
            </a>
        </li>
        <li class=''>
            <a href='/Mart/Max/Favo'>
                <i class='fa fa-thumb-tack'></i>
                <span>收藏最多</span>
            </a>
        </li>
    </ul>
</div><?php }} ?>
