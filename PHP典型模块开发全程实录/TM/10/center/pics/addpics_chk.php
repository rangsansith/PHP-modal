<?php
	session_start();
	header('Content-Type:text/html;charset=gb2312');
	include_once '../conn/conn.php';
	$name = $_SESSION['name'];
	$picname = $_GET['picname'];
	$pictype = $_GET['pictype'];
	$picpath = $_GET['picpath'];
	$reback = '0';
	$sql = "insert into tb_uppics(picname,picpath,upauthor,pictype) values('".$picname."','".$picpath."','".$name."','".$pictype."')";
	$num = $conne->uidRst($sql);
	if($num == 1){
		$selectsql = "select uppics from tb_member where name = '".$name."'";
		$picnum = $conne->getFields($selectsql,0);
		$upsql = "update tb_member set uppics = ".(++$picnum)." where name = '".$name."'";
		$num = $conne->uidRst($upsql);
		$reback = '1';
	}else{
		$reback = '2';
	}
	echo $reback;
?>