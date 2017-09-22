<?php
	session_start();
	header('Content-Type:text/html;charset=gb2312');
	include_once '../conn/conn.php';
	$act = $_GET['act'];
	if($act == 'del'){
		$chk = $_POST['chk'];
		$sql = "delete from tb_log where id = -1 ";
		$cont = '删除操作。删除日志id：';
		if(!empty($chk)){
			foreach($chk as $value){
				$cont .= $value.' ';
				$sql .= "or id = ".$value." ";
			}
			$num = $conne->uidRst($sql);
			if(!empty($num)){
				$inssql = "insert into tb_log values('','".$cont."','".$_SESSION['manager']."',now())";
				$num = $conne->uidRst($inssql);
				echo "<script>alert('删除成功');location='log.php';</script>";
			}else{
				echo "<script>alert('已删除！');location='log.php';</script>";
			}
		}
	}
?>