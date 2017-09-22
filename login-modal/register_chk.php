<?php
	include_once("conn.class.php");
	require_once("PHPMailer/PHPMailer.class.php"); 
	require_once("PHPMailer/SMTP.class.php"); 
	date_default_timezone_set("PRC");
	$reback = '0';
	$to = $_GET['email'];
	$url = 'http://'.$_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME']).'/activation.php';
	$url .= '?name='.trim($_GET['name']).'&pwd='.md5(trim($_GET['pwd']));
	$title="激活码的获取";
	$mailbody='注册成功。您的激活码是：
	'.'<a href="'.$url.'"target="_blank">'.$url.'</a><br>'.'请点击该地址，激活您的用户!';
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
	$mail -> AddAddress($to);
	$result = $mail -> Send();
	// if ($result) {
	// 	echo "succeed";
	// }
	// else{
	// 	echo "fail";
	// }
	// $tr = new Zend_Mail_Transport_Smtp('smtp.qq.com');
	// $mail = new Zend_Mail();
	// $mail->addTo('574114947@qq.com','获取用户注册激活码');
	// $mail->setFrom('574114947@qq.com','恭喜您用户注册成功');
	// $mail->setSubject('获取注册用户的激活码');
	// $mail->setBodyHtml($mailbody);
	// $mail->send($tr);

	// $config = array(
	// 	'auth'=>'login',
	// 	'username'=>'574114947@qq.com',
	// 	'password'=>'pk5201314h'
	// );
	// $transport = new Zend_Mail_Transport_Smtp('localhost',$config);
	// $mail = new Zend_Mail('utf-8');
	// $mail->setBodyHtml($mailbody);
	// $mail->setFrom($envelope,'恭喜您用户注册成功');
	// $mail->addTo($_GET[email],'获取用户注册激活码');
	// $mail->setSubject('获取注册用户的激活码');
	// $mail->send($transport);

	$sql = "insert into tb_member(name,password,question,answer,email,realname,birthday,telephone,qq)values('".trim($_GET['name'])."','".md5(trim($_GET['pwd']))."','".$_GET['question']."','".$_GET['answer']."','".$_GET['email']."','".$_GET['realname']."','".$_GET['birthday']."','".$_GET['telephone']."','".$_GET['qq']."')";
	$num = $conne->uidRst($sql);
	if ($num == 1) {
		$reback = '1';
	}
	echo $reback;
?>