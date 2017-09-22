<?php
session_start();
include_once("config/config.php");
$up=$_FILES["file"]["tmp_name"];
$file=$_FILES["file"]["name"];


if(ftp_put($link,$file,$up,FTP_BINARY)){
echo '<script>alert("上传'.$file.'\n成功！");window.close();</script>';
}else {
echo '<script>alert("上传'.$file.'\n失败！");history.back();</script>';
} 
ftp_close($link);                                //关闭FTP连接
?>

