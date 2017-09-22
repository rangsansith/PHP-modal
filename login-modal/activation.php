<?php
session_start();
header('Content-Type:text/html;charset=utf-8');
include_once("conn.class.php");
if (!empty($_GET['name']) && !is_null($_GET['name'])) {
	$num = $conne->getRowsNum("select * from tb_member where name='".$_GET['name']."'and password='".$_GET['pwd']."'");
if ($num>0) {
	$upnum = $conne->uidRst("update tb_member set active=1 where name='".$_GET['name']."'and password='".$_GET['pwd']."'");
if ($upnum>0) {
	$_SESSION['name'] = $_GET['name'];
	echo "<script language='javascript'>alert('用户激活成功');window.location.href='main.php';</script>";
}
else{
	echo "<script language='javascript'>alert('您已经激活');window.location.href='main.php';</script>";
}
}
else{
	echo "<script language='javascript'>alert('用户激活失败');window.location.href='register.php';</script>";
}
}

?>