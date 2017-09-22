<?php
session_start();						//初始化SESSION变量
$filename='file/'.$_GET['filename'];	//获取附件在服务器中的存储位置
if(!isset($_SESSION['user'])){			//判断当前用户的访问权限
	echo "<script>alert('对不起，本站暂时停止该文件下载!');history.back();</script>";
 	exit;
}
$fp=fopen($filename,"r");				//打开指定的文件
header("Content-type:application/octet-stream");
header("Accept-ranges:bytes");
header("Accept-length:".filesize($filename));
header("Content-Disposition:attachment;filename=".$filename);
echo fread($fp,filesize($filename));	//输出文件
fclose($fp);							//关闭文件
?>
