<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-09-25 21:06:49
         compiled from "F:\HTDOCS\Angent_game\Application\views\Admin\Public\footer.html" */ ?>
<?php /*%%SmartyHeaderCode:15279320255d8b6669c1b8b7-17075577%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b66a68f582fb467c4e69deef8a27a8fff7e504d' => 
    array (
      0 => 'F:\\HTDOCS\\Angent_game\\Application\\views\\Admin\\Public\\footer.html',
      1 => 1553439281,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15279320255d8b6669c1b8b7-17075577',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5d8b6669c5e3e8_52219527',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d8b6669c5e3e8_52219527')) {function content_5d8b6669c5e3e8_52219527($_smarty_tpl) {?><?php if (!is_callable('smarty_function_asource')) include 'F:\\HTDOCS\\Angent_game\\Application\\library\\Smarty\\plugins\\function.asource.php';
?><!-- TO TOP -->
<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
<!-- /.TO TOP -->
<div class="footer">
    <div class="footer-inner">
        <div class="footer-content">
            <span class="bigger-120">
                <span class="blue bolder"><?php echo @constant('WEBNAME');?>
</span>
                Application &copy; 2016-2017
            </span>
            &nbsp; &nbsp;
            <span class="action-buttons">
                <a href="#">
                    <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
                </a>

                <a href="#">
                    <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
                </a>

                <a href="#">
                    <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
                </a>
            </span>
        </div>
    </div>
</div>
</div><!-- /.main-container -->


<?php echo '<script'; ?>
 src="<?php echo smarty_function_asource(array('js'=>'bootstrap.min.js'),$_smarty_tpl);?>
"><?php echo '</script'; ?>
>
<!-- page specific plugin scripts -->
<!--[if lte IE 9]>
  <?php echo '<script'; ?>
 src="<?php echo smarty_function_asource(array('js'=>'excanvas.min.js'),$_smarty_tpl);?>
"><?php echo '</script'; ?>
>
<![endif]-->
<!-- ace scripts -->
<?php echo '<script'; ?>
 src="<?php echo smarty_function_asource(array('js'=>'ace-elements.min.js'),$_smarty_tpl);?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo smarty_function_asource(array('js'=>'ace.min.js'),$_smarty_tpl);?>
"><?php echo '</script'; ?>
>
<audio id="sound" autoplay="autoplay"></audio>
<?php echo '<script'; ?>
>
    function get_msg(){
    $.ajax({
    type: 'POST',
            url: '/Admin/Login/CheckLogin',
            data: {'login_type': '1191'},
            dataType: 'json',
            beforeSend: function (request) {
            var Authorization = sessionStorage.getItem('Authorization');
            request.setRequestHeader('Authorization', Authorization);
            },
            success: function (json) {
            if (json.ecode != 200){
            window.location.href = '/Admin/Login/Index';
            }
            }
    });
    $.ajax({
    type: 'POST',
            url: '/Admin/Message/AjaxGetMessage',
            data: {'uuid': '1191'},
            dataType: 'json',
            beforeSend: function (request) {
            var Authorization = sessionStorage.getItem('Authorization');
            request.setRequestHeader('Authorization', Authorization);
            },
            success: function (json) {
            if (typeof (json.ecode) != "undefined"){
            return false;
            }
            var node = '';
            var num = 0;
            $.each(json, function (i, o) {
            num = o.count;
            node += '<li>';
            node += '<a href="/Admin/Message/ListMessage?mid=';
            node += o.topic_id;
            node += '" class="clearfix">';
            node += '<img src="/Plant/Assets/images/user.jpg" class="msg-photo icon-animated-vertical" alt="新信息" />';
            node += '<span class="msg-body">';
            node += '<span class="msg-title">';
            node += '<span class="blue">';
            node += o.send_name;
            node += ' :</span>';
            node += o.contend;
            node += '</span>';
            node += ' <span class="msg-time">';
            node += ' <i class="ace-icon fa fa-clock-o"></i>';
            node += ' <span>';
            node += o.add_time;
            node += '</span>';
            node += ' </span>';
            node += ' </span>';
            node += ' </a>';
            node += ' </li>';
            });
            if (num > 0)
            {
            $("#message_list").html(node);
            $('#mssage_count1').html(num);
            $('#mssage_count2').html(num);
            $('#sound').attr('src', '/Plant/ring/new_message.mp3');
            }
            }
    }); //end ajax
    }
    get_msg();
    var requset3 = setInterval(get_msg, 30000);
<?php echo '</script'; ?>
>

</body>
</html>
<?php }} ?>
