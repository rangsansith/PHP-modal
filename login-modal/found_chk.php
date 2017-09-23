<?php
	include_once("conn.class.php");
	require_once("PHPMailer/PHPMailer.class.php"); 
	require_once("PHPMailer/SMTP.class.php"); 
	date_default_timezone_set("PRC");
	$reback = '0';
	$name = $_GET['foundname'];
	$question = $_GET['question'];
	$answer = $_GET['answer'];
	$sql = "select email from tb_member where name ='".$name."'and question ='".$question."'and answer ='".$answer."'";
	$email = $conne->getFields($sql,0);
	if ($email != "") {
		$rnd = rand(1000,time());
		$sql = "update tb_member set password ='".md5($rnd)."'where name ='".$name."'and question='".$question."'and answer='".$answer."'";
		$tmpnum = $conne->uidRst($sql);
		if ($tmpnum >= 1) {
			$title = "找回密码";
			$mailbody = "密码找回成功，您账号的新密码是" . $rnd;
			$envelope = "h574114947zl@163.com";
			$mail = new PHPMailer();
			$mail -> IsSMTP();
			$mail -> SMTPAuth = true;
			$mail -> Host = 'smtp.163.com';
			$mail -> From = $envelope;
			$mail -> FromName = $envelope;
			$mail -> Username = $envelope;
			$mail -> Password = '1392576983';
			$mail -> IsHTML(true);
			$mail -> CharSet = 'utf-8';
			$mail -> Subject = $title;
			$mail -> MsgHTML($mailbody);
			$mail -> AddAddress($email);
			$result = $mail -> Send();
			if ($result == false) {
				$reback = '-1';
			}
			else{
				$reback = '1';
			}
		}
		else{
			$reback = '2';
		}
	}
	else{
		$reback = $sql;
	}
	echo $reback;
?>