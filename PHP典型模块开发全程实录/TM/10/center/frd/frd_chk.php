<?php
	session_start();
	header('content-type:text/html;charset=gb2312');
	include_once '../conn/conn.php';
	$act = $_GET['act'];
	$name = $_SESSION['name'];
	$reback = '0';
	if($act == 'add'){
		$frdname = $_GET['frdname'];
		$sql = "select * from tb_member where name = '".$frdname."'";
		$num = $conne->getRowsNum($sql);
		if($num == 0){
			$reback = '3';
		}else if($num == 1){
			$twosql = "select * from tb_frd where frdname = '".$frdname."' and frdmem = '".$name."'";
			$twonum = $conne->getRowsNum($twosql);
			if($twonum == 0){
				$threesql = "select * from tb_frd where frdname = '".$name."' and frdmem = '".$frdname."'";
				if($conne->getRowsNum($threesql) == 1){
					$reback = '4';
				}else{
					$addsql = "insert into tb_frd (frdname,frdmem,frdlevel) values('".$name."','".$frdname."',0)";
					$addnum = $conne->uidRst($addsql);
					$reback = '1';
				}
			}else if($twonum == 1){
				$reback = '2';
			}else{
				$reback = '6';
			}
		}else{
			$reback = '5';
		}
	}else if($act == 'enter'){
		$frdmem = $_GET['frdmem'];
		$sql = "select * from tb_member where name = '".$frdmem."'";
		$num = $conne->getRowsNum($sql);
		if($num == 0){
			$delsql = "delete from tb_frd where frdname = '".$frdmem."' and frdmem = '".$name."'";
			$num = $conne->uidRst($delsql);
			$reback = '3';
		}else if($num == 1){
			$twosql = "select * from tb_frd where frdname = '".$name."' and frdmem = '".$frdmem."'";
			$twonum = $conne->getRowsNum($twosql);
			if($twonum == 0){
				$addsql = "insert into tb_frd (frdname,frdmem,frdlevel) values('".$name."','".$frdmem."',1)";
				$addnum = $conne->uidRst($addsql);
			}else if($twonum == 1){
				$upsql = "update tb_frd set frdlevel = 1 where frdname = '".$name."' and frdmem = '".$frdmem."'";
				$addnum = $conne->uidRst($upsql);
			}
			$twoupsql = "update tb_frd set frdlevel = 1 where frdname = '".$frdmem."' and frdmem = '".$name."'";
			$addnum = $conne->uidRst($twoupsql);
			$reback = '1';
		}else{
			$reback = '5';
		}
	}
	echo $reback;
?>