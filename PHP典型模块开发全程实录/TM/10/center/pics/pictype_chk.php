<?php
	session_start();
	header('Content-Type:text/html;charset=gb2312');
	include_once '../conn/conn.php';
	$act = $_GET['act'];
	$typestr = $_GET['typestr'];
	$typename = $_GET['typename'];
	$arr = explode(',',$typestr);
	$reback = '0';
	$name = $_SESSION['name'];
	if($act == 'add'){
		if(in_array($typename,$arr)){
			$reback = '3';
		}else{
			$typestr .= ','.$typename;
			$sql = "update tb_member set pictype = '".$typestr."' where name = '".$name."'";
			$num = $conne->uidRst($sql);
			if($num == 1){
				$reback = '1';
			}else{
				$reback = '2';
			}
		}
	}else if($act == 'del'){
		
		if($typename == '我的相册'){
			$reback = '3';
		}else{
			$tmpstr = '我的相册';
			for($i=1;$i<count($arr);$i++){
				if($arr[$i]  != $typename){
					$tmpstr .= ','.$arr[$i];
				}
			}
			$changesql = "update tb_uppics set pictype='我的相册' where upauthor = '".$name."'";
			$sql = "update tb_member set pictype = '".$tmpstr."' where name = '".$name."'";
			$num = $conne->uidRst($sql);
			if($num == 1){
				$reback = '1';
			}else{
				$reback = '2';
			}
		}
	}
	echo $reback;
?>