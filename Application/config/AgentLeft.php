<?php
return array(
'Main'=> array(
	'Title'=>'数据中心',
	 'Prive'=>'1',
	 'Show'=>1,
	 'Href'=>'#',
	'Actions'=> array(
				'index'=> array('Title'=>'后台首页', 'Prive'=>'1', 'Show'=>1, 'Href'=>'#',),
				'getnote'=> array('Title'=>'获取公告', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				'ajaxread'=> array('Title'=>'已读动作', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				'help'=> array('Title'=>'帮助信息', 'Prive'=>'1', 'Show'=>1, 'Href'=>'#',),
				),
	),

'Club'=> array(
	'Title'=>'俱乐部管理',
	 'Prive'=>'1',
	 'Show'=>1,
	 'Href'=>'#',
	'Actions'=> array(
				'listclub'=> array('Title'=>'俱乐部', 'Prive'=>'1', 'Show'=>1, 'Href'=>'#',),
				'subclub'=> array('Title'=>'获取俱乐部', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				'ajaxsubclub'=> array('Title'=>'动态修改', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				'ajaxdelclub'=> array('Title'=>'删除俱乐部', 'Prive'=>'0', 'Show'=>0, 'Href'=>'#',),
				),
	),

'Play'=> array(
	'Title'=>'用户播放',
	 'Prive'=>'1',
	 'Show'=>1,
	 'Href'=>'#',
	'Actions'=> array(
				'userplay'=> array('Title'=>'第一房间', 'Prive'=>'1', 'Show'=>1, 'Href'=>'#',),
				),
	),

'Angent'=> array(
	'Title'=>'代理管理',
	 'Prive'=>'1',
	 'Show'=>1,
	 'Href'=>'#',
	'Actions'=> array(
				'listangent'=> array('Title'=>'代理列表', 'Prive'=>'1', 'Show'=>1, 'Href'=>'#',),
				'ajaxsubangent'=> array('Title'=>'添加修改代理动作', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				'subangent'=> array('Title'=>'获取一个代理', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				'ajaxdelangent'=> array('Title'=>'删除代理动作', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				'addagent'=> array('Title'=>'代理推广', 'Prive'=>'1', 'Show'=>1, 'Href'=>'#',),
				'subagt'=> array('Title'=>'获取一个代理', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				'getimg'=> array('Title'=>'推广二维码', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				),
	),

'Charge'=> array(
	'Title'=>'充值中心',
	 'Prive'=>'1',
	 'Show'=>1,
	 'Href'=>'#',
	'Actions'=> array(
				'addcharge'=> array('Title'=>'代理充值', 'Prive'=>'1', 'Show'=>1, 'Href'=>'#',),
				'ajaxaddcharge'=> array('Title'=>'代理充值动作', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				'ajaxplayercharge'=> array('Title'=>'玩家充值动作', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				'playercharge'=> array('Title'=>'玩家充值', 'Prive'=>'1', 'Show'=>1, 'Href'=>'#',),
				),
	),

'Order'=> array(
	'Title'=>'销售记录',
	 'Prive'=>'1',
	 'Show'=>1,
	 'Href'=>'#',
	'Actions'=> array(
				'listorder'=> array('Title'=>'订单记录', 'Prive'=>'1', 'Show'=>1, 'Href'=>'#',),
				'sumorder'=> array('Title'=>'销售业绩', 'Prive'=>'1', 'Show'=>1, 'Href'=>'#',),
				'ajaxcalorder'=> array('Title'=>'绩效统计动作', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				'ajaxdelorder'=> array('Title'=>'删除订单动作', 'Prive'=>'-1', 'Show'=>0, 'Href'=>'#',),
				),
	),

'Manage'=> array(
	'Title'=>'管理中心',
	 'Prive'=>'1',
	 'Show'=>0,
	 'Href'=>'#',
	'Actions'=> array(
				'modagent'=> array('Title'=>'标题修改管理员', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				'ajaxsubagent'=> array('Title'=>'添加管理员动作', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				),
	),

'Message'=> array(
	'Title'=>'站内信',
	 'Prive'=>'1',
	 'Show'=>1,
	 'Href'=>'#',
	'Actions'=> array(
				'ajaxgetmessage'=> array('Title'=>'头部消息获取', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				'listmessage'=> array('Title'=>'站内信', 'Prive'=>'1', 'Show'=>1, 'Href'=>'#',),
				'showmessage'=> array('Title'=>'查看对话', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				'ajaxsubmessage'=> array('Title'=>'回复动作', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				'ajaxaddmessage'=> array('Title'=>'新短信动作', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				'ajaxdelmessage'=> array('Title'=>'删除动作', 'Prive'=>'0', 'Show'=>0, 'Href'=>'#',),
				),
	),

'Menu'=> array(
	'Title'=>'菜单管理',
	 'Prive'=>'0',
	 'Show'=>1,
	 'Href'=>'#',
	'Actions'=> array(
				'listmenu'=> array('Title'=>'菜单浏览', 'Prive'=>'0', 'Show'=>1, 'Href'=>'#',),
				'ajaxdelmenu'=> array('Title'=>'删除菜单动作', 'Prive'=>'0', 'Show'=>0, 'Href'=>'#',),
				'submenu'=> array('Title'=>'修改菜单', 'Prive'=>'0', 'Show'=>0, 'Href'=>'#',),
				'ajaxsubmenu'=> array('Title'=>'修改菜单动作', 'Prive'=>'0', 'Show'=>0, 'Href'=>'#',),
				'ajaxwritemenu'=> array('Title'=>'生成菜单动作', 'Prive'=>'0', 'Show'=>0, 'Href'=>'#',),
				'writemenu'=> array('Title'=>'生成菜单', 'Prive'=>'0', 'Show'=>1, 'Href'=>'#',),
				),
	),

'Login'=> array(
	'Title'=>'登录控制器',
	 'Prive'=>'FF',
	 'Show'=>0,
	 'Href'=>'#',
	'Actions'=> array(
				'index'=> array('Title'=>'登录页面', 'Prive'=>'FF', 'Show'=>0, 'Href'=>'#',),
				'code'=> array('Title'=>'获取验证码', 'Prive'=>'FF', 'Show'=>0, 'Href'=>'#',),
				'ajaxcheck'=> array('Title'=>'验证验证码动作', 'Prive'=>'FF', 'Show'=>0, 'Href'=>'#',),
				'ajaxlogin'=> array('Title'=>'后台登录动作', 'Prive'=>'FF', 'Show'=>0, 'Href'=>'#',),
				'logout'=> array('Title'=>'退出', 'Prive'=>'FF', 'Show'=>0, 'Href'=>'#',),
				'main'=> array('Title'=>'手机端登录', 'Prive'=>'FF', 'Show'=>0, 'Href'=>'#',),
				'checklogin'=> array('Title'=>'检查登录', 'Prive'=>'FF', 'Show'=>0, 'Href'=>'#',),
				),
	),

'Regist'=> array(
	'Title'=>'注册',
	 'Prive'=>'FF',
	 'Show'=>0,
	 'Href'=>'#',
	'Actions'=> array(
				'index'=> array('Title'=>'注册页面', 'Prive'=>'FF', 'Show'=>0, 'Href'=>'#',),
				'ajaxreg'=> array('Title'=>'注册动作', 'Prive'=>'FF', 'Show'=>0, 'Href'=>'#',),
				'send'=> array('Title'=>'发送验证码', 'Prive'=>'FF', 'Show'=>0, 'Href'=>'#',),
				'check'=> array('Title'=>'核实验证码', 'Prive'=>'FF', 'Show'=>0, 'Href'=>'#',),
				),
	),

);
