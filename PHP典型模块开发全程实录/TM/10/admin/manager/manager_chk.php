<?php
	session_start();
	header('Content-Type:text/html;charset=gb2312');
	include_once '../conn/conn.php';
	$act = $_GET['act'];
	if($act == 'del'){
		$chk = $_POST['chk'];
		$sql = "delete from tb_admin where id = -1 ";
		$cont = '删除操作，删除了管理员：';
		if(!empty($chk)){
			foreach($chk as $value){
				$cont .= $value.' ';
				$sql .= "or id = ".$value." ";
			}
			$num = $conne->uidRst($sql);
			if(!empty($num)){
				$inssql = "insert into tb_log values('','".$cont."','".$_SESSION['manager']."',NOW())";
				$num = $conne->uidRst($inssql);
				echo "<script>alert('删除成功');location='manager.php';</script>";
			}else{
				echo "<script>alert('该管理员已删除！');location='manager.php';</script>";
			}
		}
	}else if($act == 'freeze'){
		$id = $_GET['id'];
		$freeze = ($_GET['fz']+1) % 2;
		$sql = "update tb_admin set freeze = ".$freeze." where id = ".$id;
		$cont = '冻结(解冻)操作，管理员账号：'.$id;
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
			$cont = '添加管理员，添加账号：'.$manager;
			$inssql = "insert into tb_log values('','".$cont."','".$_SESSION['manager']."',NOW())";
			$mansql = "insert into tb_admin values('','".$manager."','".md5($pwd)."','".getenv("REMOTE_ADDR")."',NOW(),'')";
			$logsql = "insert into tb_log values('','".$cont."','".$_SESSION['manager']."',NOW())";
			$num = $conne->uidRst($inssql);
			$num = $conne->uidRst($mansql);
			if($num == 1){
				echo "<script>alert('添加成功');location='manager.php';</script>";
			}
		}
	}else if($act == 'mod'){
		$modid = $_POST['modid'];
		$pwd  = $_POST['modpwd1'];
		if(!empty($modid) and !empty($pwd)){
			$cont = '修改管理员密码，修改管理员的id：'.$modid;
			$mansql = "update tb_admin set password = '".md5($pwd)."' where id = ".$modid;
			$logsql = "insert into tb_log values('','".$cont."','".$_SESSION['manager']."',NOW())";
			$num = $conne->uidRst($inssql);
			$num = $conne->uidRst($mansql);
			if($num == 1){
				echo "<script>alert('修改成功');location='manager.php';</script>";
			}else{
				echo "<script>alert('修改失败，请确定要修改的密码与原密码不一致');history.go(-1);</script>";
			}
		}
	}
?>