<?php
	session_start();
	header('Content-Type:text/html;charset=gb2312');
	include_once '../conn/conn.php';
	$reback = '0';
	$headgif = substr(strrchr($_GET['headgif'],'//'),1);
	$name = $_SESSION['name'];
	if(!empty($name) and !is_null($name)){
		$sql = "update tb_member set email='".$_GET['email']."', realname='".$_GET['realname']."',sex='".$_GET['sex']."',birthday='".$_GET['birthday']."',tel='".$_GET['tel']."',address='".$_GET['address']."',homepage='".$_GET['homepage']."',qq='".$_GET['qq']."',unwrite='".$_GET['unwrite']."',headgif='".$headgif."' where name = '".$name."'";
		$num = $conne->uidRst($sql);
		if($num == 1){
			$reback = '1';
		}else{
			$reback = $conne->msg_error();
		}
	}
	echo $reback;
?>