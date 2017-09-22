<?php
	session_start();
	header('content-type:text/html;charset=gb2312');
	include_once '../conn/conn.php';
	$accept = $_GET['acpt'];
	$name = $_SESSION['name'];
	$cont = $_GET['sendcont'];
	$reback = '0';
	$sql = "insert into tb_script (accept,sender,content) values('".$accept."','".$name."','".$cont."')";
	$num = $conne->uidRst($sql);
	if($num == 1){
		$reback = '1';
	}else{
		$reback = '2';
	}
	echo $reback;
?>