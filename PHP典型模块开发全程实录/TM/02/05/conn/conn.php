<?php 
	$id=mysql_connect('localhost','root','111');	//�������ݿ������
    mysql_select_db('db_counter',$id);				//����db_counter���ݿ�
	mysql_query("set names gb2312");				//ָ�����ݿ����ַ��ı����ʽ
?>