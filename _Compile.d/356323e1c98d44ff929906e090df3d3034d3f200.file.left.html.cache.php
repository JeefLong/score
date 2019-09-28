<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-09-25 21:06:49
         compiled from "F:\HTDOCS\Angent_game\Application\views\Admin\Public\left.html" */ ?>
<?php /*%%SmartyHeaderCode:3384898765d8b6669bcaa44-47470499%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '356323e1c98d44ff929906e090df3d3034d3f200' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Admin\\Public\\left.html',
      1 => 1489589075,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3384898765d8b6669bcaa44-47470499',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'val' => 0,
    'Ctrl' => 0,
    'key' => 0,
    'vval' => 0,
    'Act' => 0,
    'vkey' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5d8b6669bedd11_92740184',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d8b6669bedd11_92740184')) {function content_5d8b6669bedd11_92740184($_smarty_tpl) {?><div id="sidebar" class="sidebar responsive ace-save-state">
    <?php echo '<script'; ?>
 type="text/javascript">
        try {
            ace.settings.loadState('sidebar')
        } catch (e) {
        }
    <?php echo '</script'; ?>
>
    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="ace-icon fa fa-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="ace-icon fa fa-pencil"></i>
            </button>

            <button class="btn btn-warning">
                <i class="ace-icon fa fa-users"></i>
            </button>

            <button class="btn btn-danger">
                <i class="ace-icon fa fa-cogs"></i>
            </button>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- #sidebar-shortcuts -->

    <ul class="nav nav-list">
        <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = LeftMenuModel::left(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
  
        <?php if ($_smarty_tpl->tpl_vars['val']->value['Show']==1&&($_smarty_tpl->tpl_vars['val']->value['Prive']>=$_SESSION['_admin_user']['roleid'])) {?>
        <li <?php if ($_smarty_tpl->tpl_vars['Ctrl']->value==$_smarty_tpl->tpl_vars['key']->value) {?> class = 'highlight active open' <?php }?>>
            <a href='<?php echo $_smarty_tpl->tpl_vars['val']->value['Href'];?>
' class='dropdown-toggle'>
                <i class="menu-icon fa fa-pencil-square-o"></i>
                <span class="menu-text"> <?php echo $_smarty_tpl->tpl_vars['val']->value['Title'];?>
 </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
                <?php  $_smarty_tpl->tpl_vars['vval'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vval']->_loop = false;
 $_smarty_tpl->tpl_vars['vkey'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['val']->value['Actions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vval']->key => $_smarty_tpl->tpl_vars['vval']->value) {
$_smarty_tpl->tpl_vars['vval']->_loop = true;
 $_smarty_tpl->tpl_vars['vkey']->value = $_smarty_tpl->tpl_vars['vval']->key;
?>
                <?php if ($_smarty_tpl->tpl_vars['vval']->value['Show']==1&&$_smarty_tpl->tpl_vars['vval']->value['Prive']>=$_SESSION['_admin_user']['roleid']) {?>
                <li<?php if ($_smarty_tpl->tpl_vars['Act']->value==$_smarty_tpl->tpl_vars['vkey']->value) {?> class = "active" <?php }?>>
                    <a href='/Admin/<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['vkey']->value;?>
'>
                        <i class="menu-icon fa fa-caret-right"></i>
                        <?php echo $_smarty_tpl->tpl_vars['vval']->value['Title'];?>
 
                    </a>
                    <b class="arrow"></b>
                </li>
                <?php }?>
                <?php } ?>
            </ul>
        </li>
        <?php }?>
        <?php } ?>
    </ul><!-- /.nav-list -->


    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>

    <?php echo '<script'; ?>
 type="text/javascript">
        try {
            ace.settings.check('sidebar', 'collapsed')
        }
        catch (e)
        {
        }

    <?php echo '</script'; ?>
>

</div>
<?php }} ?>
