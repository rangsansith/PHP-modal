<?php
	session_start();
	header('content-type:text/html;charset=gb2312');
	include_once 'conn/conn.php';
	if(isset($_SESSION['name'])){
	$name = $_SESSION['name'];
	$sql = "select * from tb_script where isnew = 0 and accept = '".$name."'";
	$num = $conne->getRowsNum($sql);
	if($num != 0){
		echo '&nbsp;<font color=red>����'.$num.'����ֽ������ע��鿴</font>';
	}else{
		echo '';
	}
	}
?>