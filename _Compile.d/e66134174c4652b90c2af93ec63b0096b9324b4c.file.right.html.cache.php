<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-09-24 23:39:38
         compiled from "F:\HTDOCS\Angent_game\Application\views\Mart\Public\right.html" */ ?>
<?php /*%%SmartyHeaderCode:5600463445d8a38ba3ab5f8-71984350%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e66134174c4652b90c2af93ec63b0096b9324b4c' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Mart\\Public\\right.html',
      1 => 1564295358,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5600463445d8a38ba3ab5f8-71984350',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5d8a38ba3bed00_32150550',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d8a38ba3bed00_32150550')) {function content_5d8a38ba3bed00_32150550($_smarty_tpl) {?><?php if (!is_callable('smarty_function_vsource')) include 'F:\\HTDOCS\\Angent_game\\Application\\library\\Smarty\\plugins\\function.vsource.php';
?><div class='navbar navbar-fixed-top'>
    <div class='container-fluid'>
        <div class='navbar-header'>
            <button class='col-xs-2 navbar-toggle collapsed pull-left' data-target='#sidebar-left' data-toggle='collapse' type='button'>
                菜单
            </button>
            <a class='col-xs-8 navbar-brand' href='/Mart/Main/Index'>
                <img class='navbar-logo' src="<?php echo smarty_function_vsource(array('img'=>'apple-touch-icon.png'),$_smarty_tpl);?>
">
                卡布奇诺
            </a>
            <button class='col-xs-2 navbar-toggle collapsed' data-target='#sidebar-right' data-toggle='collapse' type='button'>
                用户
            </button>
        </div>
        <div class='collapse navbar-collapse' id='header-navbar'>
            <ul class='nav navbar-nav navbar-right'>
                <?php if (!empty($_SESSION['_web_user']['uid'])) {?>
                <li class='dropdown'>
                    <a data-toggle='dropdown' href='javascript:;' style="text-align: center;">
                        <?php echo $_SESSION['_web_user']['email'];?>

                    </a>
                    <ul class='dropdown-menu'>
                        <li>
                            <a data-method='delete' href='/Mart/Login/AjaxLogout'>
                                <i class='fa fa-sign-out'></i>
                                退出登录
                            </a>
                        </li>
                    </ul>
                </li>
                <?php } else { ?>
                <li><a href='/Mart/Login/Index'>登录/注册</a> </li>
                <?php }?>
            </ul>
            <div class='navbar-menu'> </div>
        </div>
    </div>
</div>

<div class='sidebar sidebar-light collapse navbar-collapse' id='sidebar-right'>
    <div class='title'>用户信息</div>
    <ul class='nav'>
        <li>
            <a href='/Mart/Fav/Index'>
                <i class='fa fa-heart'></i>
                我的收藏 &gt;&gt;
            </a>
        </li>
        <li>
            <a>
                <i class='fa fa-id-badge'></i>
                账户权限:
                <span>
                    <?php if (empty($_SESSION['_web_user']['uid'])) {?>
                    未登录
                    <?php } else { ?>
                    <?php echo $_SESSION['_web_user']['group_name'];?>

                    <?php }?>
                </span>
            </a>
        </li>
    </ul>
    <div class='title'>无限尽享</div>
    <ul class='nav'>
        <li>
            <a href='/Mart/Pay/Index' target='_blank'>
                <span>
                    39元 一月 VIP &gt;&gt;
                </span>
            </a>
        </li>
        <li>
            <a href='/Mart/Pay/Index' target='_blank'>
                300元 一年 VIP &gt;&gt;
            </a>
        </li>
    </ul>
    <div class='title'>联系方式</div>
    <ul class='nav'>
        <li>
            <a>
                <span>root@citybay.net</span>
            </a>
        </li>
    </ul>
</div><?php }} ?>
