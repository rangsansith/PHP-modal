<?php
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
if(!$login){
	echo '´íÎó£¬<a href="index.php">·µ»Ø</a>';
	exit();
}
?>