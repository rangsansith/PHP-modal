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
if(ftp_delete($link, $file)){                      //�ж��ļ��Ƿ�ɾ��
    echo '<script>alert("ɾ���ļ��ɹ���");history.back();</script>';
}else{
    echo '<script>alert("ɾ���ļ�ʧ�ܣ�");history.back();</script>';
}
ftp_close($link);                                 //�ر�FTP����
?>

