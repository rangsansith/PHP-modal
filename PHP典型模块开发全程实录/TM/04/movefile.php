<?php
session_start();
include_once("config/config.php");
$filename=$_GET['dir'].$_GET['filename'];
$fname=$_GET["filename"];
if(empty($_POST['movepath'])){
?>
<form id="movefile" action="#" method="post" onSubmit="return chkpath();">
��<?php echo $filename; ?>�ƶ�����
<p>
  <center>
    <input class="inpt1" id="path" type="text" name="movepath">
  </center>
<p>
  <center>
    <span class="notice">*����д��ȷ��·����"��/Appserv/"</span>
  </center>
<p>
  <center>
    <input class="btn2" type="submit" value="�ƶ��ļ�">
  </center>
</form>
<?php 
}else{	
	$newpath=$_POST["movepath"].$fname;              	//���������ִ���ƶ�����
	if(ftp_put($link,$newpath,'E:/wamp/www/'.$filename,FTP_BINARY)){    	//���ļ��ƶ���ָ���ļ�Ŀ¼
		ftp_delete($link, $filename);					//ɾ��ԭ��λ�õ��ļ�
	    echo '<script>alert("�ƶ�'.$file.'\n��'.$_POST['movepath'].'�ɹ���");window.close();</script>';
	}else{                                          	//��ʾ�ƶ��ɹ�
	    echo '<script>alert("�ƶ�'.$file.'\n��'.$_POST['movepath'].'ʧ�ܣ�");history.back();</script>';
	}                                               	//��ʾ�ƶ�ʧ��
	ftp_close($link);                                  	//�ر�FTP����*/
}
?>
<link href="css/mkdir.css" type="text/css" rel="stylesheet" />
<script src="js/check.js"></script>
