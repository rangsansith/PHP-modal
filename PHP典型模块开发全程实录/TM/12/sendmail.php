<?php
include("function.php");
$mailfrom=$_POST['mailfrom'];	//��ȡ�����˵�ַ
$mailto=$_POST['mailto'];	//��ȡ�ռ��˵�ַ
$mailcc=$_POST['mailcc'];	//��ȡ�����˵�ַ
$mailbcc=$_POST['mailbcc'];	//��ȡ�����˵�ַ
$mailsubject=base64_encode($_POST['mailsubject']);	//��ȡ�ʼ�����
$mailbody = base64_encode($_POST['mailbody']);	//��ȡ�ʼ�����
if(empty($_FILES['upload_file']['name'])){
	$headers = "From:$mailfrom \r\n Cc:$mailcc \r\n Bcc:$mailbcc"; //�����ʼ�ͷ
	$headers .= "Reply-To:$mailfrom\r\n";
	$headers .= "Content-type: text/html;\r\n charset=iso-8859-1 \r\n"; 
	if(@mail($mailto, $mailsubject,$mailbody,$headers)){ //ͨ��mail()���������ʼ����������ʼ����ͽ��
  		echo "<script>alert('�ʼ����ͳɹ���');history.back()</script>";   
	}else{ 
  		echo "<script>alert('�ʼ�����ʧ�ܣ�');history.back()</script>";      
	}
}else{
	$file = $_FILES['upload_file']['tmp_name']; //��ȡ��������
	$boundary = uniqid("");   //����ֽ���
	$headers = "MIME-Version: 1.0 \n"; 
	$headers .= "Content-type: multipart/mixed; Boundary= $boundary \r\n";  
	$headers .= "From:$mailfrom\r\n"; //�����ʼ�ͷ	
	if($_FILES['upload_file']['type']){  //�жϸ�������
 		$mimeType = $_FILES['upload_file']['type']; 
 	}else{
 		$mimeType ="application/unknown"; //��ȡ��������
 	}
	$fileName = $_FILES['upload_file']['name'];   //��ø�������
	$fp = fopen($file, "r");  //���ļ� 
	$read = fread($fp, filesize($file));  //�������������$read
	$read = base64_encode($read); //ת��base64����
	$read = chunk_split($read);   //�����ַ����г���ÿ��76���ַ���ɵ�С��
	/*�����ʼ���*/
	$body = "--$boundary-- 			
Content-type: text/plain; charset=iso-8859-1
$mailbody
--$boundary-- 
Content-type: $mimeType; name=$fileName 
Content-disposition: attachment; filename=$fileName 
Content-transfer-encoding: base64 
$read 
--$boundary--"; 
	if(mail($mailto, $mailsubject,$body,$headers)){ //��mail()���������ʼ�
  		echo "<script>alert('�������ͳɹ���');history.back()</script>";   
	}else{ 
  		echo "<script>alert('��������ʧ�ܣ�');history.back()</script>";      
	}
}
?>