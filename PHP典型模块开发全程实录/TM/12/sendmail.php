<?php
include("function.php");
$mailfrom=$_POST['mailfrom'];	//获取发件人地址
$mailto=$_POST['mailto'];	//获取收件人地址
$mailcc=$_POST['mailcc'];	//获取抄送人地址
$mailbcc=$_POST['mailbcc'];	//获取密送人地址
$mailsubject=base64_encode($_POST['mailsubject']);	//获取邮件主题
$mailbody = base64_encode($_POST['mailbody']);	//获取邮件内容
if(empty($_FILES['upload_file']['name'])){
	$headers = "From:$mailfrom \r\n Cc:$mailcc \r\n Bcc:$mailbcc"; //定义邮件头
	$headers .= "Reply-To:$mailfrom\r\n";
	$headers .= "Content-type: text/html;\r\n charset=iso-8859-1 \r\n"; 
	if(@mail($mailto, $mailsubject,$mailbody,$headers)){ //通过mail()函数发送邮件，并给出邮件发送结果
  		echo "<script>alert('邮件发送成功！');history.back()</script>";   
	}else{ 
  		echo "<script>alert('邮件发送失败！');history.back()</script>";      
	}
}else{
	$file = $_FILES['upload_file']['tmp_name']; //获取附件名称
	$boundary = uniqid("");   //定义分界线
	$headers = "MIME-Version: 1.0 \n"; 
	$headers .= "Content-type: multipart/mixed; Boundary= $boundary \r\n";  
	$headers .= "From:$mailfrom\r\n"; //定义邮件头	
	if($_FILES['upload_file']['type']){  //判断附件类型
 		$mimeType = $_FILES['upload_file']['type']; 
 	}else{
 		$mimeType ="application/unknown"; //获取附件类型
 	}
	$fileName = $_FILES['upload_file']['name'];   //获得附件名称
	$fp = fopen($file, "r");  //打开文件 
	$read = fread($fp, filesize($file));  //将附件读入变量$read
	$read = base64_encode($read); //转换base64编码
	$read = chunk_split($read);   //将长字符串切成由每行76个字符组成的小块
	/*定义邮件体*/
	$body = "--$boundary-- 			
Content-type: text/plain; charset=iso-8859-1
$mailbody
--$boundary-- 
Content-type: $mimeType; name=$fileName 
Content-disposition: attachment; filename=$fileName 
Content-transfer-encoding: base64 
$read 
--$boundary--"; 
	if(mail($mailto, $mailsubject,$body,$headers)){ //用mail()函数发送邮件
  		echo "<script>alert('附件发送成功！');history.back()</script>";   
	}else{ 
  		echo "<script>alert('附件发送失败！');history.back()</script>";      
	}
}
?>