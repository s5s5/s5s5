<?php
	$dbuser=mysql_connect('localhost','root','');		// MySQl �����������û�������
	$mydb=mysql_select_db('corner',$dbuser);			// ���ݿ���

	$my_title="�������Բ�";
	$mytable="gbook";									// ����
	$page_size=4;

	$admin_pass = "1234";
	$admin_email = "";		// ��ʽ�� gouhuo@126.com
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

	$images = array( "say.gif" => "���˵˵",
					"happy.gif" => "����",
					"sad.gif" => "����",
					"toohappy.gif" => "��Ц",
					"wilk.gif" => "գ��",
					"warning.gif" => "����",
					"question.gif" => "����",
					"reply.gif" => "�ش�",
					"attention.gif" => "ע��",
					"agree.gif" => "ͬ��",
					"other.gif" => "����" );
?>
