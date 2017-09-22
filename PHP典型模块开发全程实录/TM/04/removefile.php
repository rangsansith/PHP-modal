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
$dirname="AppServ/".$_GET['file'];
$link = @ftp_connect($ip);
$login = @ftp_login($link, $user, $pwd);   
$file = $_GET['dir'].$_GET['file'];    
if(ftp_delete($link, $file)){                      //判断文件是否被删除
    echo '<script>alert("删除文件成功！");history.back();</script>';
}else{
    echo '<script>alert("删除文件失败！");history.back();</script>';
}
ftp_close($link);                                 //关闭FTP连接
?>

