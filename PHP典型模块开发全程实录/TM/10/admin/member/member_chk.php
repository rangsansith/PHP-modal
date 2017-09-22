<?php
	session_start();
	header('Content-Type:text/html;charset=gb2312');
	include_once '../conn/conn.php';
	$act = $_GET['act'];
	if($act == 'del'){
		$chk = $_POST['chk'];
		$sql = "delete from tb_member where id = -1 ";
		$cont = '删除操作，删除了账号：';
		if(!empty($chk)){
			foreach($chk as $value){
				$cont .= $value.' ';
				$sql .= "or id = ".$value." ";
			}
			$num = $conne->uidRst($sql);
			if(!empty($num)){
				$inssql = "insert into tb_log values('','".$cont."','".$_SESSION['manager']."',now())";
				$num = $conne->uidRst($inssql);
				echo "<script>alert('删除成功');location='member.php';</script>";
			}else{
				echo "<script>alert('该用户已删除！');location='member.php';</script>";
			}
		}
	}else if($act == 'nominate'){
		$id = $_GET['id'];
		$nominate = ($_GET['isnominate']+1) % 2;
		$sql = "update tb_member set isnominate = ".$nominate." where id = ".$id;
		$cont = '推荐用户操作，账号：'.$id;
		$num = $conne->uidRst($sql);
		if(!empty($num)){
			$inssql = "insert into tb_log values('','".$cont."','".$_SESSION['manager']."',now())";
			$num = $conne->uidRst($inssql);
		}
		echo "<script>location='member.php';</script>";
	}else if($act == 'freeze'){
		$id = $_GET['id'];
		$freeze = ($_GET['fz']+1) % 2;
		$sql = "update tb_member set freeze = ".$freeze." where id = ".$id;
		$cont = '冻结(解冻)操作，账号：'.$id;
		$num = $conne->uidRst($sql);
		if(!empty($num)){
			$inssql = "insert into tb_log values('','".$cont."','".$_SESSION['manager']."',now())";
			$num = $conne->uidRst($inssql);
		}
		echo "<script>location='member.php';</script>";
	}
?>