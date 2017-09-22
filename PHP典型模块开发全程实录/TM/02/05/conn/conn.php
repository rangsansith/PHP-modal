<?php 
	$id=mysql_connect('localhost','root','111');	//连接数据库服务器
    mysql_select_db('db_counter',$id);				//连接db_counter数据库
	mysql_query("set names gb2312");				//指定数据库中字符的编码格式
?>