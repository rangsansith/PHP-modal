<?php

	include_once 'conn/conn.php';
	$sql = "select arttype from tb_member where name = '".$_GET['uid']."'";
	$typefields = $conne->getFields($sql,0);
	$conne->close_rst();
?>
<div style=" width:204px; height:20px; text-align:left; background-image:url(images/bbg.gif); background-position:left; background-repeat:repeat-x; text-indent: 8px; padding:2px;"><img src="images/header7.gif" border="0" width="13" height="14" />&nbsp;ндуб╥жюЮ</div>
<ul style="list-style-type: none;">
<?php
	$typearr = explode(',',$typefields);
	foreach($typearr as $value){
?>
<li style="  text-align:left; height:25px; line-height:25px;"><img src="images/header6.gif" width="5" height="5" border="0" />&nbsp;<a onclick="return artpagination('newart.php?act=<?php echo $value; ?>&uid=<?php echo $_GET['uid']; ?>')"><?php echo $value; ?></a>(<?php
		$selectsql = "select * from tb_article where typename = '".$value."' and author = '".$_GET['uid']."'";
		$num = $conne->getRowsNum($selectsql);
		echo $num;
	 ?>)</li>
<?php
	}
?>
</ul>