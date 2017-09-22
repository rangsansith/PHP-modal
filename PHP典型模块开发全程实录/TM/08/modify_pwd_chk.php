<?php
session_start(); 
header ( "Content-type: text/html; charset=UTF-8" ); 						//设置文件编码格式
require("system/system.inc.php");  						//包含配置文件
$oldpwd = md5($_POST['old']);
$sqls = 'select * from tb_user where id = '.$_SESSION['id'].' and password = \''.$oldpwd.'\'';
$arrs = $admindb->ExecSQL($sqls,$conn);
if($arrs){
	$sql = "update tb_user set password='".md5($_POST['new1'])."' where id = '".$_SESSION['id']."'";
	$arr = $admindb->ExecSQL($sql,$conn);
	if($arr)
		echo "<script>alert('修改成功');location=('index.php');</script>"; 
	else
		echo "<script>alert('修改失败');history.go(-1);</script>";
}else{
	echo "<script>alert('输入的原始密码不正确');history.go(-1);</script>";
}
?>
