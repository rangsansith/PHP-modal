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
$result = ftp_rmdir($link, $deletefile);               //ɾ��mynewfile�ļ�Ŀ¼
if($result){                                       //�ж��Ƿ�ɾ���ɹ�
	 echo '<script>alert("ɾ��Ŀ¼�ɹ���");history.back();</script>';
}else{
     echo '<script>alert("ɾ��Ŀ¼ʧ�ܣ�");history.back();</script>';
}
?>