<?php
session_start();					//��ʼ��SESSION����
include_once("conn.php");			//�������ݿ������ļ�
$sql=mysql_query("select id from tb_user where usernc='".$_SESSION["unc"]."'",$conn);	//ִ�в�ѯ���
$info=mysql_fetch_array($sql);			//��ȡ��ѯ���
$userid=$info['id'];					//��ȡ�û�ID	
$createtime=date("Y-m-d H:i:s");		//��ȡϵͳ��ǰʱ��
//ִ��������
if(mysql_query("insert into tb_leaveword(userid,createtime,title,content)values('$userid','$createtime','".$_POST['title']."','".$_POST['content']."')",$conn)){
	echo "<script>alert('���Է���ɹ���');history.back();</script>";
}else{
  	echo "<script>alert('���Է���ʧ�ܣ�');history.back();</script>";
}
?>