<?php
	session_start();
	header('Content-Type:text/html;charset=gb2312');
	include_once '../conn/conn.php';
	$act = $_GET['act'];
	if($act == 'del'){
		$chk = $_POST['chk'];
		$sql = "delete from tb_log where id = -1 ";
		$cont = 'ɾ��������ɾ����־id��';
		if(!empty($chk)){
			foreach($chk as $value){
				$cont .= $value.' ';
				$sql .= "or id = ".$value." ";
			}
			$num = $conne->uidRst($sql);
			if(!empty($num)){
				$inssql = "insert into tb_log values('','".$cont."','".$_SESSION['manager']."',now())";
				$num = $conne->uidRst($inssql);
				echo "<script>alert('ɾ���ɹ�');location='log.php';</script>";
			}else{
				echo "<script>alert('��ɾ����');location='log.php';</script>";
			}
		}
	}
?>