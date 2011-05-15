<?php
	require("config.inc.php");
	include("header.php");
	if (!$page){
		$page=1;
	}
	$sqldo="select count(*) as title from $mytable where sub_id<1";
	$result=mysql_query($sqldo);
	$message_count=mysql_result($result,0,"title");
	$page_count=ceil($message_count/$page_size);
	$offset=($page-1)*$page_size;
	$sqldo="select * from $mytable where sub_id<1 order by id desc limit $offset, $page_size";
	$result=mysql_query($sqldo);
	echo "<div align=\"center\">
  <center>
  <table border=\"0\" width=\"$table_width\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"$menu_bgcolor\">
    <tr>
      <td width=\"50%\"><font color=\"$menu_fontcolor\">留言总数: $message_count</font></td>
      <td width=\"50%\" align=\"right\"><font color=\"$menu_fontcolor\"><a href=\"add.php\" $menu_linkstyle>写留言</a> | <a href=\"/\" $menu_linkstyle>首页</a></font>&nbsp;</td>
    </tr>
  </table>
  </center>
</div><br><br>
";
	if($result){
		while($myrow=mysql_fetch_array($result)){
			list_one ($myrow,$table_width,1);

			$sqldo2="select * from $mytable where sub_id=$myrow[id] order by add_time";
			$result2=mysql_query($sqldo2);
			if($result2){
				$rows2=mysql_num_rows($result2);
				if ($rows2) {
					echo "    <tr>
      <td width=\"100%\">
        <table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">
          <tr>
            <td width=\"5%\" bgcolor=\"$table_head_bgcolor\" align=\"center\">回<br>复</td>
            <td width=\"95%\">
";
					while($myrow2=mysql_fetch_array($result2)){
						list_one ($myrow2,"100%",0);
						echo "  </table>
  </center>
</div>
";
					}
					echo "			</td>
          </tr>
        </table>
      </td>
    </tr>
";
				}
			}

			echo "  </table>
  </center>
</div><br>
";
		}
		$prev_page=$page-1;
		$next_page=$page+1;
		echo "             <p align=\"center\">[ ";
		if ($page<=1){
			echo "第一页 ";
		}
		else{
			echo "<a href='$PATH_INFO?page=1'>第一页</a> ";
		}
		if ($prev_page<1){
			echo "上一页 ";
		}
		else{
			echo "<a href='$PATH_INFO?page=$prev_page'>上一页</a> ";
		}
		if ($next_page>$page_count){
			echo "下一页 ";
		}
		else{
			echo "<a href='$PATH_INFO?page=$next_page'>下一页</a> ";
		}
		if ($page>=$page_count){
			echo "最后一页 ]</p>\n";
		}
		else{
			echo "<a href='$PATH_INFO?page=$page_count'>最后一页</a> ]</p>\n";
		}
	}
	include("footer.php");




function list_one($myrow,$this_table_width,$is_reply) {
	global $imgdir,$table_head_bgcolor,$table_body_bgcolor,$table_head_bodystyle;
			$comment=nl2br($myrow[comment]);
			if ($myrow[email]) {
				$line1_left="<img border=\"0\" src=\"$imgdir\\$myrow[image]\"> <a href=\"mailto:$myrow[email]\">$myrow[name]</a>";
			}
			else {
				$line1_left="<img border=\"0\" src=\"$imgdir\\$myrow[image]\"> $myrow[name]";
			}
			if ($myrow[comefrom]) {
				$line1_left .= "&nbsp;&nbsp;来自: $myrow[comefrom]";
			}
			if ($myrow[icq]) {
				$line1_right="<img border=\"0\" src=\"http://online.mirabilis.com/scripts/online.dll?icq=$myrow[icq]&img=5\" alt=\"ICQ:$myrow[icq]\">";
			}
			else {
				$line1_right="";
			}
			if ($myrow[oicq]) {
				$line1_right .= " <img border=\"0\" src=\"$imgdir\\oicq.gif\" alt=\"OICQ:$myrow[oicq]\">";
			}
			if ($myrow[homepage]) {
				$line1_right .= " <a href=\"$myrow[homepage]\" target=\"_blank\"><img border=\"0\" src=\"$imgdir\\homepage.gif\" alt=\"主页:$myrow[homepage]\"></a>";
			}
			if ($is_reply) {
				$toolsbar="<a href=\"add.php?reply=1&recid=$myrow[id]\" $table_head_bodystyle>回复</a>&nbsp;";
			}
			$toolsbar .= "<a href=\"admin.php?edit=1&recid=$myrow[id]\" $table_head_bodystyle>修改</a>&nbsp;<a href=\"admin.php?del=1&recid=$myrow[id]\" $table_head_bodystyle>删除</a>&nbsp;";
			echo "<div align=\"center\">
  <center>
  <table border=\"0\" width=\"$this_table_width\">
    <tr>
      <td width=\"100%\" bgcolor=\"$table_head_bgcolor\">
        <table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">
          <tr>
            <td width=\"50%\">$line1_left</td>
            <td width=\"50%\" align=\"right\">$line1_right&nbsp;</td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td width=\"100%\" bgcolor=\"$table_body_bgcolor\">$comment</td>
    </tr>
    <tr>
      <td width=\"100%\" bgcolor=\"$table_body_bgcolor\">
        <table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">
          <tr>
            <td width=\"50%\">留言时间：$myrow[add_time]</td>
            <td width=\"50%\" align=\"right\">$toolsbar</td>
          </tr>
        </table>
      </td>
    </tr>
";
}
?>