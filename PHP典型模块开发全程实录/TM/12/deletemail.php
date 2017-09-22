<?php
session_start();
if(isset($_SESSION['user'])){
	include("mailclass.php");	//包含POP3发邮件类
	$rec=new pop3($_SESSION['host'],110,10);		//对类进行初始化
	$rec->open();		//连接POP3服务器
	$rec->login(substr($_SESSION['user'],0,strpos($_SESSION['user'],'@')),$_SESSION['pass']);	//对当前用户进行身份验证
	$rec->dele($_GET['del']);	//调用POP3类的dele()方法来删除$_GET[del]指定的邮件
	$rec->close();		 //关闭与POP3服务器的连接，并执行删除操作
	if(!empty($_GET['filename'])){
		unlink('file/'.$_GET['filename']);
	}
	echo "<script>alert('删除成功!');window.location.href='receivemail.php';</script>";
}else{
	echo "<script>alert('您不具备删除权限，请正确登录!');window.location.href='index.php';;</script>";

}
?>