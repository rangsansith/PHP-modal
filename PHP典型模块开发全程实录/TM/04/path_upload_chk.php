<?php
session_start();
include_once("config/config.php");
$getpath=$_GET["dir"];
$pathup=$_FILES["file"]["tmp_name"];
$pathfile=$_FILES["file"]["name"];
$pathfile=$getpath.$pathfile;
if(ftp_put($link,$pathfile,$pathup,FTP_BINARY)){
echo "<script>alert('�ϴ� $pathfile �ɹ���');window.close();</script>";
}else {
    echo "<script>alert('�ϴ� $pathfile ʧ�ܣ�');history.back();</script>";
} 
ftp_close($link);                                //�ر�FTP����
?>