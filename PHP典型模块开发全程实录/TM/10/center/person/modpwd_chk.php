<?php
	session_start();
	header('content-type:text/html;charset=gb2312');
	include_once '../conn/conn.php';
	$name = $_SESSION['name'];
	$act = $_GET['act'];
	$reback;
	if(!empty($name) and !is_null($name)){
		if($act == 'old'){
			$pwd = $_GET['pwd'];
			$sql = "select * from tb_member where name = '".$name."' and pwd = '".md5($pwd)."'";
			$num = $conne->getRowsNum($sql);
			if($num == 1){
				$reback = '1';
			}else{
				$reback = '2';
			}
		}else if($act == 'new'){
			$pwd = $_GET['pwd'];
			$sql = "update tb_member set pwd = '".md5($pwd)."' where name = '".$name."'";
			$num = $conne->uidRst($sql);
			if($num == 1){
				$reback = '1';
			}else{
				$reback = '2';
			}
		}
		echo $reback;
	}
?>