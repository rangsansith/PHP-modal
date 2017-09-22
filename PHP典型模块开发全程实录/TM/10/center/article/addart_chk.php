<?php
session_start();
header('content-type:text/html;charset=gb2312');
include "../Conn/conn.php";
$title=$_GET['title'];
$typename = $_GET['arttype'];
$author=$_SESSION['name'];
$content=$_GET['cont'];
$reback = '0';
$sql="Insert Into tb_article (typename,title,content,author) Values ('".$typename."','".$title."','".$content."','".$author."')";
$num = $conne->uidRst($sql);
if($num == 1){
	$selectsql = "select upfile from tb_member where name = '".$author."'";
	$artnum = $conne->getFields($selectsql,0);
	$upsql = "update tb_member set upfile = ".(++$artnum)." where name = '".$author."'";
	$num = $conne->uidRst($upsql);
	$reback = '1';
}else{
	$reback = '2';
}
echo $reback;
?>