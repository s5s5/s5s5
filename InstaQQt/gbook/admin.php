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
      <td width=\"50%\"><font color=\"$menu_fontcolor\">��������: $message_count</font></td>
      <td width=\"50%\" align=\"right\"><font color=\"$menu_fontcolor\"><a href=\"index.php\" $menu_linkstyle>������</a> | <a href=\"/\" $menu_linkstyle>��ҳ</a></font>&nbsp;</td>
    </tr>
  </table>
  </center>
</div><br>
";
	if ($del) {
			echo "
<form method=\"POST\" action=\"admin.php?recid=$recid\">
  <p align=\"center\">��ȷ���Ƿ���Ҫɾ���˼�¼��<br>���룺<input type=\"password\" size=\"15\" name=\"password\"><br><input type=\"submit\" value=\"��\" name=\"dodel\"> <input type=\"button\" value=\"��\" onClick=\"history.back()\"></p>
</form>
";
	}
	elseif ($dodel=="��"&&$recid) {
		$sqldo="select * from $mytable where id=".$recid;
	    $result=mysql_query($sqldo);
	    if($result){
		    $old_pass=mysql_result($result,0,'password');
		}
		if ($password&&($password==$old_pass||$password==$admin_pass)) {
			$result=mysql_query("delete from $mytable where id=$recid");
			echo "<p align=\"center\">ɾ���ɹ���<a href=\"index.php\">������</a></p>\n";
		}
		else {
			echo "<p align=\"center\">�������<a href=\"JavaScript:history.back()\">����</a></p>\n";
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
			echo "<p align=\"center\">�޸ĳɹ���<a href=\"index.php\">������</a></p>\n";
			}
			else {
				echo "<p align=\"center\">���������ݱ�����д��<a href=\"JavaScript:history.back()\">����</a></p>\n";
			}
		}
		else {
			echo "<p align=\"center\">�������<a href=\"JavaScript:history.back()\">����</a></p>\n";
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
	echo "<p align=\"center\">�޸�����</p>
<form method=\"POST\" action=\"admin.php?$QUERY_STRING\">
  <div align=\"center\">
    <center>
    <table border=\"0\" width=\"$table_width\">
      <tr>
        <td>
          <div align=\"center\">
            <table border=\"0\" width=\"80%\" cellpadding=\"20\" cellspacing=\"0\">
              <tr>
                <td width=\"100%\" bgcolor=\"$table_body_bgcolor\">����: <input type=\"text\" name=\"name\" size=\"25\" value=\"$name\"> 
                  �����ʼ�: <input type=\"text\" name=\"email\" size=\"25\" value=\"$email\"><br>
                  ����: <input type=\"text\" name=\"comefrom\" size=\"25\" value=\"$comefrom\"> ��ҳ��ַ: <input type=\"text\" name=\"homepage\" size=\"25\" value=\"$homepage\"><br>
                  ICQ:&nbsp;&nbsp;<input type=\"text\" name=\"icq\" size=\"25\" value=\"$icq\"> 
                  &nbsp;&nbsp;&nbsp;&nbsp;OICQ: <input type=\"text\" name=\"oicq\" size=\"25\" value=\"$oicq\">
                  <p>����: ";
		while ( list( $key, $val ) = each( $images ) ) {
			$checked="";
			if ($image==$key) {
				$checked=" checked";
			}
			echo "<input type=\"radio\" value=\"$key\" name=\"image\"$checked><img border=\"0\" src=\"$imgdir/$key\" alt=\"$val\"> ";
		}
		echo "</p>\n                  <p><b>����:</b><br>
                  <textarea rows=\"4\" name=\"comment\" cols=\"72\">$comment</textarea></p>
                  <p>����: <input type=\"password\" name=\"password\" size=\"12\"> (�޸Ļ�ɾ�����Ա�����д��ʼ����)</p>
                  <p><input type=\"submit\" value=\"ȷ���޸�\" name=\"doedit\"> <input type=\"reset\" value=\"�ָ�ԭ״\"> <input type=\"button\" value=\"����ǰҳ\" onClick=\"history.back()\"></td>
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
		echo "<p align=\"center\">�����������������У�</p>\n";
	}
	include("footer.php");
?>