<?php
	session_start();
	header('Content-Type:text/html;charset=gb2312');
	include_once '../conn/conn.php';
	$act = $_GET['act'];
	if($act == 'del'){
		$chk = $_POST['chk'];
		$sql = "delete from tb_admin where id = -1 ";
		$cont = 'ɾ��������ɾ���˹���Ա��';
		if(!empty($chk)){
			foreach($chk as $value){
				$cont .= $value.' ';
				$sql .= "or id = ".$value." ";
			}
			$num = $conne->uidRst($sql);
			if(!empty($num)){
				$inssql = "insert into tb_log values('','".$cont."','".$_SESSION['manager']."',NOW())";
				$num = $conne->uidRst($inssql);
				echo "<script>alert('ɾ���ɹ�');location='manager.php';</script>";
			}else{
				echo "<script>alert('�ù���Ա��ɾ����');location='manager.php';</script>";
			}
		}
	}else if($act == 'freeze'){
		$id = $_GET['id'];
		$freeze = ($_GET['fz']+1) % 2;
		$sql = "update tb_admin set freeze = ".$freeze." where id = ".$id;
		$cont = '����(�ⶳ)����������Ա�˺ţ�'.$id;
		$num = $conne->uidRst($sql);
		if(!empty($num)){
			$inssql = "insert into tb_log values('','".$cont."','".$_SESSION['manager']."',NOW())";
			$num = $conne->uidRst($inssql);
		}
		echo "<script>location='manager.php';</script>";
	}else if($act == 'add'){
		$manager = $_POST['addman'];
		$pwd = $_POST['addpwd1'];
		if(!empty($manager) and !empty($pwd)){
			$cont = '��ӹ���Ա������˺ţ�'.$manager;
			$inssql = "insert into tb_log values('','".$cont."','".$_SESSION['manager']."',NOW())";
			$mansql = "insert into tb_admin values('','".$manager."','".md5($pwd)."','".getenv("REMOTE_ADDR")."',NOW(),'')";
			$logsql = "insert into tb_log values('','".$cont."','".$_SESSION['manager']."',NOW())";
			$num = $conne->uidRst($inssql);
			$num = $conne->uidRst($mansql);
			if($num == 1){
				echo "<script>alert('��ӳɹ�');location='manager.php';</script>";
			}
		}
	}else if($act == 'mod'){
		$modid = $_POST['modid'];
		$pwd  = $_POST['modpwd1'];
		if(!empty($modid) and !empty($pwd)){
			$cont = '�޸Ĺ���Ա���룬�޸Ĺ���Ա��id��'.$modid;
			$mansql = "update tb_admin set password = '".md5($pwd)."' where id = ".$modid;
			$logsql = "insert into tb_log values('','".$cont."','".$_SESSION['manager']."',NOW())";
			$num = $conne->uidRst($inssql);
			$num = $conne->uidRst($mansql);
			if($num == 1){
				echo "<script>alert('�޸ĳɹ�');location='manager.php';</script>";
			}else{
				echo "<script>alert('�޸�ʧ�ܣ���ȷ��Ҫ�޸ĵ�������ԭ���벻һ��');history.go(-1);</script>";
			}
		}
	}
?>