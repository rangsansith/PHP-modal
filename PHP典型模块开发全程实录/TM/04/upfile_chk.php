<?php
session_start();
include_once("config/config.php");
$up=$_FILES["file"]["tmp_name"];
$file=$_FILES["file"]["name"];


if(ftp_put($link,$file,$up,FTP_BINARY)){
echo '<script>alert("�ϴ�'.$file.'\n�ɹ���");window.close();</script>';
}else {
echo '<script>alert("�ϴ�'.$file.'\nʧ�ܣ�");history.back();</script>';
} 
ftp_close($link);                                //�ر�FTP����
?>

