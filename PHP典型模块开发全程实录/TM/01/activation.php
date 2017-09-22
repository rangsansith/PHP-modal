<?php
session_start();
header('Content-Type:text/html;charset=gb2312');
include_once("conn/conn.php");
if (!empty($_GET['name']) && !is_null($_GET['name'])){				//����ע���û�
	$num=$conne->getRowsNum("select * from tb_member where name='".$_GET['name']."' and password = '".$_GET['pwd']."'");
	if ($num>0){
		$upnum=$conne->uidRst("update tb_member set active = 1 where name='".$_GET['name']."' and password = '".$_GET['pwd']."'");
		if($upnum > 0){
			$_SESSION['name'] = $_GET['name'];
			echo "<script>alert('�û�����ɹ���');window.location.href='main.php';</script>";
		}else{
			echo "<script>alert('���Ѿ����');window.location.href='main.php';</script>";
		}
		
	}else{
		echo "<script>alert('�û�����ʧ�ܣ�');window.location.href='register.php';</script>";
	}
}
?>