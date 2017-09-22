<?php
	session_start();
	header('Content-Type:text/html;charset=gb2312');
	include_once '../config.php';
	include_once 'conn/conn.php';
	$reback = '0';
	$name = $_GET['name'];
	$pwd = md5($_GET['pwd']);
	if(!empty($name) and !empty($pwd)){
		$sql = "select * from tb_member where name = '".$name."' and pwd = '".$pwd."'";
		$num = $conne->getRowsNum($sql);
		if($num == 1){
			$upsql = "update tb_member set lasttime=now() where name= '".$name."'";
			$num = $conne->uidRst($upsql);
			$_SESSION['name'] = $name;
			$reback = '1';
		}else{
			$reback = '2';
		}
	}
	echo $reback;
?>