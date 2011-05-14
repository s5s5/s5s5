<?php
	$dbuser=mysql_connect('localhost','root','');		// MySQl 服务器名、用户、密码
	$mydb=mysql_select_db('corner',$dbuser);			// 数据库名

	$my_title="动心留言簿";
	$mytable="gbook";									// 表名
	$page_size=4;

	$admin_pass = "1234";
	$admin_email = "";		// 格式如 gouhuo@126.com
	$homepage_url = "http://corner.yeah.net";
	$notify = 1;

	$table_width = "80%";
	$imgdir = "images";

	$menu_fontcolor = "#FFFFFF";
	$menu_linkstyle = "style=\"text-decoration: none; color: #FFFFFF\"";
	$menu_bgcolor = "#000080";

	$table_head_fontcolor = "#000000";
	$table_head_linkstyle = "style=\"text-decoration: none; color: #000080\"";
	$table_head_bgcolor = "#C0C0C0";

	$table_body_fontcolor = "#000080";
	$table_body_bgcolor = "#E0E0E0";
	$table_body_linkstyle = "style=\"text-decoration: none; color: #0000FF\"";

	$images = array( "say.gif" => "随便说说",
					"happy.gif" => "高兴",
					"sad.gif" => "悲伤",
					"toohappy.gif" => "大笑",
					"wilk.gif" => "眨眼",
					"warning.gif" => "警告",
					"question.gif" => "问题",
					"reply.gif" => "回答",
					"attention.gif" => "注意",
					"agree.gif" => "同意",
					"other.gif" => "号外" );
?>
