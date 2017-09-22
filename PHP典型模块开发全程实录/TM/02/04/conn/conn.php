<?php 
	$id=mysql_connect('localhost','root','111');	//连接数据库服务器
	mysql_select_db('db_counter',$id);					//连接db_dxmk
	mysql_query("set names gb2312");				//指定数据库中字符串的编码格式为gb2312
?>