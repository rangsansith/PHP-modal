<?php
	session_start();
	header('Content-Type:text/html;charset=gb2312');
	include_once 'conn/conn.php';
	include_once '../config.php';
	$reback = '0';
	//echo $_GET['headgif'];
	$headgif = substr(strrchr($_GET['headgif'],'//'),1);
	$sql = "insert into tb_member(name,pwd,question,answer,email,realname,sex,birthday,tel,address,homepage,qq,unwrite,headgif,blogname,blogurl,arttype,pictype) values('".trim($_GET['name'])."','".md5(trim($_GET['pwd']))."','".$_GET['question']."','".$_GET['answer']."','".$_GET['email']."','".$_GET['realname']."','".$_GET['sex']."','".$_GET['birthday']."','".$_GET['tel']."','".$_GET['address']."','".$_GET['homepage']."','".$_GET['qq']."','".$_GET['unwrite']."','".$headgif."','".$_GET['name']."的博客','http://".$_SERVER['HTTP_HOST'].ROOT."center/center.php?uid=".trim($_GET['name'])."','日记','我的相册')";
	$num = $conne->uidRst($sql);
	if($num == 1){
		$_SESSION['name'] = $_GET['name'];
		$reback = '1';
	}else{
		$reback = $conne->msg_error();
	}
	echo $reback;
?>