<?php
	require("config.inc.php");
	include("header.php");
	$sqldo="select count(*) as title from $mytable where sub_id<1";
	$result=mysql_query($sqldo);
	$message_count=mysql_result($result,0,"title");
	echo "<div align=\"center\">
  <center>
  <table border=\"0\" width=\"$table_width\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"$menu_bgcolor\">
    <tr>
      <td width=\"50%\"><font color=\"$menu_fontcolor\">留言总数: $message_count</font></td>
      <td width=\"50%\" align=\"right\"><font color=\"$menu_fontcolor\"><a href=\"index.php\" $menu_linkstyle>看留言</a> | <a href=\"/\" $menu_linkstyle>首页</a></font>&nbsp;</td>
    </tr>
  </table>
  </center>
</div><br>
";
	if ($del) {
			echo "
<form method=\"POST\" action=\"admin.php?recid=$recid\">
  <p align=\"center\">请确认是否真要删除此记录？<br>密码：<input type=\"password\" size=\"15\" name=\"password\"><br><input type=\"submit\" value=\"是\" name=\"dodel\"> <input type=\"button\" value=\"否\" onClick=\"history.back()\"></p>
</form>
";
	}
	elseif ($dodel=="是"&&$recid) {
		$sqldo="select * from $mytable where id=".$recid;
	    $result=mysql_query($sqldo);
	    if($result){
		    $old_pass=mysql_result($result,0,'password');
		}
		if ($password&&($password==$old_pass||$password==$admin_pass)) {
			$result=mysql_query("delete from $mytable where id=$recid");
			echo "<p align=\"center\">删除成功！<a href=\"index.php\">看留言</a></p>\n";
		}
		else {
			echo "<p align=\"center\">密码错误！<a href=\"JavaScript:history.back()\">返回</a></p>\n";
		}
	}
	elseif ($doedit&&$recid){
	    $name=htmlspecialchars($name);
	    $email=htmlspecialchars($email);
	    $comefrom=htmlspecialchars($comefrom);
	    $homepage=htmlspecialchars($homepage);
	    $icq=htmlspecialchars($icq);
	    $oicq=htmlspecialchars($oicq);
	    $image=htmlspecialchars($image);
	    $comment=htmlspecialchars($comment);

		$sqldo="select * from $mytable where id=".$recid;
	    $result=mysql_query($sqldo);
	    if($result){
		    $old_pass=mysql_result($result,0,'password');
		}
		if ($password&&($password==$old_pass||$password==$admin_pass)) {
			if ($name&&$comment) {
				$result=mysql_query("update $mytable set name='$name',email='$email',comefrom='$comefrom',homepage='$homepage',icq='$icq',oicq='$oicq',image='$image',comment='$comment' where id=$recid");
			echo "<p align=\"center\">修改成功！<a href=\"index.php\">看留言</a></p>\n";
			}
			else {
				echo "<p align=\"center\">姓名和内容必须填写！<a href=\"JavaScript:history.back()\">返回</a></p>\n";
			}
		}
		else {
			echo "<p align=\"center\">密码错误！<a href=\"JavaScript:history.back()\">返回</a></p>\n";
		}
	}
	elseif ($edit) {
	    $sqldo="select * from $mytable where id=".$recid;
	    $result=mysql_query($sqldo);
	    if($result){
		    $name=mysql_result($result,0,'name');
		    $email=mysql_result($result,0,'email');
		    $comefrom=mysql_result($result,0,'comefrom');
		    $homepage=mysql_result($result,0,'homepage');
		    $icq=mysql_result($result,0,'icq');
		    $oicq=mysql_result($result,0,'oicq');
		    $image=mysql_result($result,0,'image');
		    $comment=mysql_result($result,0,'comment');
		}
	echo "<p align=\"center\">修改留言</p>
<form method=\"POST\" action=\"admin.php?$QUERY_STRING\">
  <div align=\"center\">
    <center>
    <table border=\"0\" width=\"$table_width\">
      <tr>
        <td>
          <div align=\"center\">
            <table border=\"0\" width=\"80%\" cellpadding=\"20\" cellspacing=\"0\">
              <tr>
                <td width=\"100%\" bgcolor=\"$table_body_bgcolor\">姓名: <input type=\"text\" name=\"name\" size=\"25\" value=\"$name\"> 
                  电子邮件: <input type=\"text\" name=\"email\" size=\"25\" value=\"$email\"><br>
                  来自: <input type=\"text\" name=\"comefrom\" size=\"25\" value=\"$comefrom\"> 主页地址: <input type=\"text\" name=\"homepage\" size=\"25\" value=\"$homepage\"><br>
                  ICQ:&nbsp;&nbsp;<input type=\"text\" name=\"icq\" size=\"25\" value=\"$icq\"> 
                  &nbsp;&nbsp;&nbsp;&nbsp;OICQ: <input type=\"text\" name=\"oicq\" size=\"25\" value=\"$oicq\">
                  <p>表情: ";
		while ( list( $key, $val ) = each( $images ) ) {
			$checked="";
			if ($image==$key) {
				$checked=" checked";
			}
			echo "<input type=\"radio\" value=\"$key\" name=\"image\"$checked><img border=\"0\" src=\"$imgdir/$key\" alt=\"$val\"> ";
		}
		echo "</p>\n                  <p><b>留言:</b><br>
                  <textarea rows=\"4\" name=\"comment\" cols=\"72\">$comment</textarea></p>
                  <p>密码: <input type=\"password\" name=\"password\" size=\"12\"> (修改或删除留言必须填写初始密码)</p>
                  <p><input type=\"submit\" value=\"确定修改\" name=\"doedit\"> <input type=\"reset\" value=\"恢复原状\"> <input type=\"button\" value=\"返回前页\" onClick=\"history.back()\"></td>
              </tr>
            </table>
          </div>
        </td>
      </tr>
    </table>
    </center>
  </div>
</form>
";
	}
	else {
		echo "<p align=\"center\">条件不够，不能运行！</p>\n";
	}
	include("footer.php");
?>