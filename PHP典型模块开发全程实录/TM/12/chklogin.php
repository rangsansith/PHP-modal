<?php
session_start();
include("mailclass.php");		//�������ʼ���
$hostname=$_POST['servername'];		//��ȡ�ύ�ķ�������ַ
$mailname=substr($_POST['mailname'],0,strpos($_POST['mailname'],'@'));		//��ȡ�ύ���û������ַ
$mailpwd=$_POST['mailpwd'];		 //��ȡ�ύ���û���������
$rec=new pop3($hostname,110,10);	//�Է��ʼ�����г�ʼ��
if(!$rec->open()){		 //������ø����open()��������falseֵ����˵��û�гɹ������Ϸ���������ʱ������ʾ
	echo"<script>alert('�Բ����޷����ӷ�������');history.back();</script>";
   	exit;
}
if(!$rec->login($mailname,$mailpwd)){//������÷��ʼ����login()��������falseֵ����˵���û���������ƻ��������
	echo"<script>alert('�Բ��������û����������������');history.back();</script>";
  	exit;
}
$_SESSION['host']=$hostname;//����û���¼�ɹ�����ע��session����host�����������ַ�Ա�����ҳ��ʹ��
$_SESSION['user']=$_POST['mailname']; //����û���¼�ɹ�����ע��session����user�����û������ַ�Ա�����ҳ��ʹ��
$_SESSION['pass']=$mailpwd; //����û���¼�ɹ�����ע��session����pass�����û����������Ա�����ҳ��ʹ��
$rec->close(); //���÷��ʼ����close()�����ر���POP3������������
header("location:list.php");   //��λ��������ҳ��
?>
