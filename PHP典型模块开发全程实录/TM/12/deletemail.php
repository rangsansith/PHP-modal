<?php
session_start();
if(isset($_SESSION['user'])){
	include("mailclass.php");	//����POP3���ʼ���
	$rec=new pop3($_SESSION['host'],110,10);		//������г�ʼ��
	$rec->open();		//����POP3������
	$rec->login(substr($_SESSION['user'],0,strpos($_SESSION['user'],'@')),$_SESSION['pass']);	//�Ե�ǰ�û����������֤
	$rec->dele($_GET['del']);	//����POP3���dele()������ɾ��$_GET[del]ָ�����ʼ�
	$rec->close();		 //�ر���POP3�����������ӣ���ִ��ɾ������
	if(!empty($_GET['filename'])){
		unlink('file/'.$_GET['filename']);
	}
	echo "<script>alert('ɾ���ɹ�!');window.location.href='receivemail.php';</script>";
}else{
	echo "<script>alert('�����߱�ɾ��Ȩ�ޣ�����ȷ��¼!');window.location.href='index.php';;</script>";

}
?>