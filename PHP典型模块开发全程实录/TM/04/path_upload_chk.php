<?php
session_start();
include_once("config/config.php");
$getpath=$_GET["dir"];
$pathup=$_FILES["file"]["tmp_name"];
$pathfile=$_FILES["file"]["name"];
$pathfile=$getpath.$pathfile;
if(ftp_put($link,$pathfile,$pathup,FTP_BINARY)){
echo "<script>alert('上传 $pathfile 成功！');window.close();</script>";
}else {
    echo "<script>alert('上传 $pathfile 失败！');history.back();</script>";
} 
ftp_close($link);                                //关闭FTP连接
?>