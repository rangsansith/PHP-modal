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
$result = ftp_mkdir($link, $dirname);             //�����ļ�Ŀ¼
if($result) {                                  //�ж��ļ�Ŀ¼�Ƿ񱻴���

	echo '<script>alert("Ŀ¼'.$dirname.'\n�����ɹ���");window.close();;</script>';
}else {
    echo '<script>alert("Ŀ¼'.$dirname.'\n�����ɹ���");history.back();</script>';
}
ftp_close($link);                              //�ر�FTP����*/
?>

