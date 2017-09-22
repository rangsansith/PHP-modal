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
if(!empty($_GET["dir"])){
$path=$_GET["dir"];
}else{
$path="";
}
$dirname=$path.$_POST["filename"];
$link = @ftp_connect($ip);
$login = @ftp_login($link, $user, $pwd);
$result = ftp_mkdir($link, $dirname);             //创建文件目录
if($result) {                                  //判断文件目录是否被创建

	echo '<script>alert("目录'.$dirname.'\n创建成功！");window.close();;</script>';
}else {
    echo '<script>alert("目录'.$dirname.'\n创建成功！");history.back();</script>';
}
ftp_close($link);                              //关闭FTP连接*/
?>

