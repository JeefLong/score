<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-04-13 14:01:26
         compiled from "F:\HTDOCS\Angent_game\Application\views\Video\Main\Play_Video.html" */ ?>
<?php /*%%SmartyHeaderCode:5555882255cb17b36501524-96571573%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5022397a1b9fec2513f9a6202ac98881936aeaa' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Video\\Main\\Play_Video.html',
      1 => 1554909529,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5555882255cb17b36501524-96571573',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'conf' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5cb17b3654d991_15337466',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5cb17b3654d991_15337466')) {function content_5cb17b3654d991_15337466($_smarty_tpl) {?><?php if (!is_callable('smarty_function_vsource')) include 'F:\\HTDOCS\\Angent_game\\Application\\library\\Smarty\\plugins\\function.vsource.php';
?><?php echo $_smarty_tpl->getSubTemplate ("Video/Public/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>

<body>
    <div class='page-with-sidebar' id='page-container'>

        <?php echo $_smarty_tpl->getSubTemplate ("Video/Public/left.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>


        <div class='content'>
            <h1 class='page-header'>
                <div class='video-head-title'>
                    <i class='fa fa-pagelines'></i>
                    视频
                </div>

                <div class='page-header-menu'>

                </div>
            </h1>
            <div class='row' style='position: relative'>
                <div class='m-l-15 m-r-15 alert alert-warning alert-dismissible' role='alert'>
                    <button aria-label='Close' class='close' data-dismiss='alert' type='button'>
                        <span aria-hidden='true'>×</span>
                    </button>
                    <i class='fa fa-bell-o'></i>
                    <strong>观看说明</strong>
                    <ul>
                        <li>
                            免费用户可任意欣赏3部普通视频
                        </li>
                        <li>
                            加入 VIP 即可观看全站所有"隐藏"与最新视频
                        </li>
                        <li>
                            <a target="_blank" href="/balance">极速加入 &gt;&gt;</a>
                        </li>
                    </ul>
                </div>
                <div class='m-l-15 m-r-15'>
                    <video autoplay='autoplay' class='mejs__player' controls='controls' id='mediaplayer' src="<?php echo $_smarty_tpl->tpl_vars['conf']->value['video'];
echo $_smarty_tpl->tpl_vars['val']->value['v_url'];?>
" style='width: 100%; height: 100%; display: block;'>
                        您的浏览器不支持播放此视频,请使用 QQ浏览器 或 谷歌浏览器^.^
                    </video>
                    <div class='video-info'>
                        <div class='video-title'>
                            <?php echo $_smarty_tpl->tpl_vars['val']->value['v_text'];?>

                        </div>
                        <a class="btn btn-sm btn-success m-t-15 p-l-10 p-r-10" href="/favourite/8789">收藏</a>
                    </div>

                </div>

            </div>
            <div class='row'></div>
        </div>
        <?php echo $_smarty_tpl->getSubTemplate ("Video/Public/right.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, NULL, array(), 0);?>


    </div>

    <?php echo '<script'; ?>
 src='<?php echo smarty_function_vsource(array('js'=>"play.js"),$_smarty_tpl);?>
'><?php echo '</script'; ?>
>
</body>
</html>
<?php }} ?>
