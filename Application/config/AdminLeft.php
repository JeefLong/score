<?php
return array(
'Main'=> array(
	'Title'=>'数据中心',
	 'Prive'=>'3',
	 'Show'=>1,
	 'Href'=>'#',
	'Actions'=> array(
				'index'=> array('Title'=>'后台首页', 'Prive'=>'3', 'Show'=>1, 'Href'=>'#',),
				'listnote'=> array('Title'=>'站点公告', 'Prive'=>'1', 'Show'=>1, 'Href'=>'#',),
				'subnote'=> array('Title'=>'动态获取一条', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				'ajaxsubnote'=> array('Title'=>'修改添加动作', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				'ajaxdelnote'=> array('Title'=>'删除公告', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				'shownote'=> array('Title'=>'查看已读', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				),
	),

'User'=> array(
	'Title'=>'用户管理',
	 'Prive'=>'3',
	 'Show'=>1,
	 'Href'=>'#',
	'Actions'=> array(
				'listuser'=> array('Title'=>'用户列表', 'Prive'=>'3', 'Show'=>1, 'Href'=>'#',),
				'subuser'=> array('Title'=>'查询一个用户', 'Prive'=>'2', 'Show'=>0, 'Href'=>'#',),
				'ajaxsubuser'=> array('Title'=>'添加与修改动作', 'Prive'=>'2', 'Show'=>0, 'Href'=>'#',),
				'ajaxdeluser'=> array('Title'=>'动态删除用户', 'Prive'=>'2', 'Show'=>0, 'Href'=>'#',),
				'getrecord'=> array('Title'=>'获取记录', 'Prive'=>'2', 'Show'=>0, 'Href'=>'#',),
				),
	),

'Video'=> array(
	'Title'=>'视频管理',
	 'Prive'=>'1',
	 'Show'=>1,
	 'Href'=>'#',
	'Actions'=> array(
				'listvideo'=> array('Title'=>'视频管理', 'Prive'=>'1', 'Show'=>1, 'Href'=>'#',),
				'subvideo'=> array('Title'=>'查询一个视频', 'Prive'=>'2', 'Show'=>0, 'Href'=>'#',),
				'ajaxsubvideo'=> array('Title'=>'添加与修改动作', 'Prive'=>'2', 'Show'=>0, 'Href'=>'#',),
				'ajaxdelvideo'=> array('Title'=>'动态删除', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				),
	),

'Angent'=> array(
	'Title'=>'代理管理',
	 'Prive'=>'2',
	 'Show'=>0,
	 'Href'=>'#',
	'Actions'=> array(
				'listangent'=> array('Title'=>'代理列表', 'Prive'=>'2', 'Show'=>1, 'Href'=>'#',),
				'ajaxsubangent'=> array('Title'=>'添加修改代理动作', 'Prive'=>'2', 'Show'=>0, 'Href'=>'#',),
				'subangent'=> array('Title'=>'获取一个代理', 'Prive'=>'2', 'Show'=>0, 'Href'=>'#',),
				'ajaxdelangent'=> array('Title'=>'删除代理动作', 'Prive'=>'2', 'Show'=>0, 'Href'=>'#',),
				'chgangent'=> array('Title'=>'变更推荐人', 'Prive'=>'2', 'Show'=>1, 'Href'=>'#',),
				'ajaxchgangent'=> array('Title'=>'变更推荐人动作', 'Prive'=>'2', 'Show'=>0, 'Href'=>'#',),
				'getimg'=> array('Title'=>'获取推广二维码', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				'addagent'=> array('Title'=>'添加代理', 'Prive'=>'1', 'Show'=>1, 'Href'=>'#',),
				'getimg'=> array('Title'=>'推广二维码', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				),
	),

'Club'=> array(
	'Title'=>'俱乐部管理',
	 'Prive'=>'1',
	 'Show'=>0,
	 'Href'=>'#',
	'Actions'=> array(
				'listclub'=> array('Title'=>'俱乐部列表', 'Prive'=>'1', 'Show'=>1, 'Href'=>'#',),
				'subclub'=> array('Title'=>'获取一个', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				'ajaxsubclub'=> array('Title'=>'动态修改', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				'ajaxdelclub'=> array('Title'=>'删除俱乐部', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				),
	),

'Charge'=> array(
	'Title'=>'房卡充值',
	 'Prive'=>'2',
	 'Show'=>1,
	 'Href'=>'#',
	'Actions'=> array(
				'addcharge'=> array('Title'=>'代理充卡', 'Prive'=>'2', 'Show'=>1, 'Href'=>'#',),
				'ajaxaddcharge'=> array('Title'=>'充值动作', 'Prive'=>'2', 'Show'=>0, 'Href'=>'#',),
				'ajaxexgcharge'=> array('Title'=>'转让房卡动作', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				'exgcharge'=> array('Title'=>'房卡转让', 'Prive'=>'2', 'Show'=>1, 'Href'=>'#',),
				),
	),

'Posit'=> array(
	'Title'=>'金币充值',
	 'Prive'=>'1',
	 'Show'=>1,
	 'Href'=>'#',
	'Actions'=> array(
				'addposit'=> array('Title'=>'代理充币', 'Prive'=>'1', 'Show'=>1, 'Href'=>'#',),
				'ajaxaddposit'=> array('Title'=>'充值动作', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				'exgposit'=> array('Title'=>'金币转让', 'Prive'=>'1', 'Show'=>1, 'Href'=>'#',),
				'ajaxexgposit'=> array('Title'=>'转让动作', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				),
	),

'Order'=> array(
	'Title'=>'房卡记录',
	 'Prive'=>'2',
	 'Show'=>1,
	 'Href'=>'#',
	'Actions'=> array(
				'listorder'=> array('Title'=>'订单记录', 'Prive'=>'2', 'Show'=>1, 'Href'=>'#',),
				'sumorder'=> array('Title'=>'销售业绩', 'Prive'=>'2', 'Show'=>1, 'Href'=>'#',),
				'ajaxcalorder'=> array('Title'=>'绩效统计动作', 'Prive'=>'2', 'Show'=>0, 'Href'=>'#',),
				'ajaxdelorder'=> array('Title'=>'删除订单动作', 'Prive'=>'0', 'Show'=>0, 'Href'=>'#',),
				),
	),

'Gold'=> array(
	'Title'=>'金币记录',
	 'Prive'=>'1',
	 'Show'=>1,
	 'Href'=>'#',
	'Actions'=> array(
				'listgold'=> array('Title'=>'订单记录', 'Prive'=>'1', 'Show'=>1, 'Href'=>'#',),
				'sumgold'=> array('Title'=>'销售业绩', 'Prive'=>'1', 'Show'=>1, 'Href'=>'#',),
				'ajaxcalgold'=> array('Title'=>'绩效统计动作', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				'ajaxdelgold'=> array('Title'=>'删除订单动作', 'Prive'=>'0', 'Show'=>0, 'Href'=>'#',),
				),
	),

'Room'=> array(
	'Title'=>'房间管理',
	 'Prive'=>'3',
	 'Show'=>0,
	 'Href'=>'#',
	'Actions'=> array(
				'listroom'=> array('Title'=>'房间列表', 'Prive'=>'3', 'Show'=>1, 'Href'=>'#',),
				'ajaxdelroom'=> array('Title'=>'删除房间', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				),
	),

'Player'=> array(
	'Title'=>'留言管理',
	 'Prive'=>'2',
	 'Show'=>0,
	 'Href'=>'#',
	'Actions'=> array(
				'listcommit'=> array('Title'=>'玩家留言', 'Prive'=>'2', 'Show'=>1, 'Href'=>'#',),
				'subcommit'=> array('Title'=>'查看留言', 'Prive'=>'2', 'Show'=>0, 'Href'=>'#',),
				'ajaxdelcommit'=> array('Title'=>'删除留言动作', 'Prive'=>'2', 'Show'=>0, 'Href'=>'#',),
				),
	),

'Note'=> array(
	'Title'=>'游戏公告',
	 'Prive'=>'1',
	 'Show'=>0,
	 'Href'=>'#',
	'Actions'=> array(
				'subnote'=> array('Title'=>'修改公告', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				'ajaxsubnote'=> array('Title'=>'添加公告动作', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				'ajaxdelnote'=> array('Title'=>'删除公告动作', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				'listnote'=> array('Title'=>'大厅公告', 'Prive'=>'1', 'Show'=>1, 'Href'=>'#',),
				'listbull'=> array('Title'=>'游戏公告', 'Prive'=>'1', 'Show'=>1, 'Href'=>'#',),
				'subbull'=> array('Title'=>'游戏内通知', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				'ajaxsubbull'=> array('Title'=>'游戏内公告工作', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				'ajaxdelbull'=> array('Title'=>'删除游戏内公告', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				),
	),

'Packet'=> array(
	'Title'=>'活动管理',
	 'Prive'=>'1',
	 'Show'=>0,
	 'Href'=>'#',
	'Actions'=> array(
				'subtime'=> array('Title'=>'获取时间', 'Prive'=>'2', 'Show'=>0, 'Href'=>'#',),
				'listtime'=> array('Title'=>'活动时间', 'Prive'=>'1', 'Show'=>1, 'Href'=>'#',),
				'ajaxsubtime'=> array('Title'=>'修改时间动作', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				'listlog'=> array('Title'=>'活动日志', 'Prive'=>'1', 'Show'=>1, 'Href'=>'#',),
				'setuser'=> array('Title'=>'定制人员', 'Prive'=>'1', 'Show'=>1, 'Href'=>'#',),
				),
	),

'Manage'=> array(
	'Title'=>'管理中心',
	 'Prive'=>'1',
	 'Show'=>1,
	 'Href'=>'#',
	'Actions'=> array(
				'loginlog'=> array('Title'=>'登录日志', 'Prive'=>'0', 'Show'=>1, 'Href'=>'#',),
				'ajaxdellog'=> array('Title'=>'删除登录日志动作', 'Prive'=>'0', 'Show'=>0, 'Href'=>'#',),
				'listaction'=> array('Title'=>'行为日志', 'Prive'=>'0', 'Show'=>1, 'Href'=>'#',),
				'subaction'=> array('Title'=>'查看行为日志', 'Prive'=>'0', 'Show'=>0, 'Href'=>'#',),
				'ajaxdelact'=> array('Title'=>'删除行为日志动作', 'Prive'=>'0', 'Show'=>0, 'Href'=>'#',),
				'listsms'=> array('Title'=>'验证码日志', 'Prive'=>'0', 'Show'=>1, 'Href'=>'#',),
				'ajaxdelsms'=> array('Title'=>'删除验证码动作', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				'listmanage'=> array('Title'=>'后台管理员', 'Prive'=>'1', 'Show'=>1, 'Href'=>'#',),
				'submanage'=> array('Title'=>'获取一个管理员信息', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				'ajaxdelmanage'=> array('Title'=>'删除管理员动作', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
				'modadmin'=> array('Title'=>'标题修改管理员', 'Prive'=>'3', 'Show'=>0, 'Href'=>'#',),
				'ajaxsubmanage'=> array('Title'=>'添加管理员动作', 'Prive'=>'2', 'Show'=>0, 'Href'=>'#',),
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
				'ajaxdelmessage'=> array('Title'=>'删除动作', 'Prive'=>'1', 'Show'=>0, 'Href'=>'#',),
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
				'writemenu'=> array('Title'=>'生成菜单', 'Prive'=>'0', 'Show'=>1, 'Href'=>'#',),
				'ajaxwritemenu'=> array('Title'=>'生成菜单动作', 'Prive'=>'0', 'Show'=>0, 'Href'=>'#',),
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
				'checklogin'=> array('Title'=>'登录检查', 'Prive'=>'FF', 'Show'=>0, 'Href'=>'#',),
				),
	),

'Logon'=> array(
	'Title'=>'登录管理',
	 'Prive'=>'2',
	 'Show'=>0,
	 'Href'=>'#',
	'Actions'=> array(
				'listlogon'=> array('Title'=>'登录信息', 'Prive'=>'2', 'Show'=>1, 'Href'=>'#',),
				),
	),

);
