<?php
session_start();
include("mailclass.php");		//包含发邮件类
$hostname=$_POST['servername'];		//获取提交的服务器地址
$mailname=substr($_POST['mailname'],0,strpos($_POST['mailname'],'@'));		//获取提交的用户邮箱地址
$mailpwd=$_POST['mailpwd'];		 //获取提交的用户邮箱密码
$rec=new pop3($hostname,110,10);	//对发邮件类进行初始化
if(!$rec->open()){		 //如果调用该类的open()方法返回false值，则说明没有成功连接上服务器，这时给出提示
	echo"<script>alert('对不起，无法连接服务器！');history.back();</script>";
   	exit;
}
if(!$rec->login($mailname,$mailpwd)){//如果调用发邮件类的login()方法返回false值，则说明用户输入的名称或密码错误
	echo"<script>alert('对不起，您的用户名或密码输入错误！');history.back();</script>";
  	exit;
}
$_SESSION['host']=$hostname;//如果用户登录成功，则注册session变量host保存服务器地址以备其他页面使用
$_SESSION['user']=$_POST['mailname']; //如果用户登录成功，则注册session变量user保存用户邮箱地址以备其他页面使用
$_SESSION['pass']=$mailpwd; //如果用户登录成功，则注册session变量pass保存用户邮箱密码以备其他页面使用
$rec->close(); //调用发邮件类的close()方法关闭与POP3服务器的连接
header("location:list.php");   //定位到发件箱页面
?>
