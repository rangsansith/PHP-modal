<?php
	// 检测用户名是否重复
	include_once("conn.class.php");
	$sql = "select * from tb_member where name='".$_GET['name']."'";
	$num = $conne->getRowsNum($sql);
	if ($num == 1) {
		echo "2";
	}
	else if ($num == 0) {
		echo "1";
	}
	else{
		echo $conne->msg_error();
	}
?>