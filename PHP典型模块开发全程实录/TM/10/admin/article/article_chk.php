<?php
	session_start();
	header('Content-Type:text/html;charset=gb2312');
	include_once '../conn/conn.php';
	$act = $_GET['act'];
	if($act == 'del'){
		$chk = $_POST['chk'];
		$sql = "delete from tb_article where id = -1 ";
		$cont = '删除操作。删除文章id：';
		if(!empty($chk)){
			foreach($chk as $value){
				$cont .= $value.' ';
				$sql .= "or id = ".$value." ";
			}
			$num = $conne->uidRst($sql);
			if(!empty($num)){
				$inssql = "insert into tb_log values('','".$cont."','".$_SESSION['manager']."',now())";
				$num = $conne->uidRst($inssql);
				echo "<script>alert('删除成功');location='article.php';</script>";
			}else{
				echo "<script>alert('该文章已删除！');location='article.php';</script>";
			}
		}
	}else if($act == 'nominate'){
		$id = $_GET['id'];
		$nominate = ($_GET['isnominate']+1) % 2;
		$sql = "update tb_article set isnominate = ".$nominate." where id = ".$id;
		$cont = '推荐文章操作，账号：'.$id;
		$num = $conne->uidRst($sql);
		if(!empty($num)){
			$inssql = "insert into tb_log values('','".$cont."','".$_SESSION['manager']."',now())";
			$num = $conne->uidRst($inssql);
		}
		echo "<script>location='article.php';</script>";
	}else if($act == 'pass'){
		$id = $_GET['id'];
		$sql = "update tb_article set examine = 1 where id = ".$id;
		$cont = '审核操作，文章id：'.$id;
		$num = $conne->uidRst($sql);
		if(!empty($num)){
			$inssql = "insert into tb_log values('','".$cont."','".$_SESSION['manager']."',now())";
			$num = $conne->uidRst($inssql);
		}
		echo "<script>location='article.php';</script>";
		
	}else if($act == 'stop'){
		$id = $_GET['id'];
		$sql = "update tb_article set examine = 2 where id = ".$id;
		$cont = '审核操作，文章id：'.$id;
		$num = $conne->uidRst($sql);
		if(!empty($num)){
			$inssql = "insert into tb_log values('','".$cont."','".$_SESSION['manager']."',now())";
			$num = $conne->uidRst($inssql);
		}
		echo "<script>location='article.php';</script>";
	}
?>