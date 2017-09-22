<?php
session_start();
if(isset($_POST['login'])){
    $_SESSION['ip'] = $_POST['ip'];
	$_SESSION['user'] = $_POST['username'];
	$_SESSION['pwd'] = $_POST['password'];
   }
$ip = $_SESSION['ip'];
$user = $_SESSION['user'];
$pwd = $_SESSION['pwd'];
$link = @ftp_connect($ip);
$login = @ftp_login($link, $user, $pwd);
$deletefile=$_GET["dir"];
$result = ftp_rmdir($link, $deletefile);               //删除mynewfile文件目录
if($result){                                       //判断是否删除成功
	 echo '<script>alert("删除目录成功！");history.back();</script>';
}else{
     echo '<script>alert("删除目录失败！");history.back();</script>';
}
?>