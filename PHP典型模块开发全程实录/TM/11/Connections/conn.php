<?php 
$conn=mysql_connect("localhost","root","111") or die('连接失败:' . mysql_error());	//连接服务器
mysql_select_db("db_pdf",$conn) or die ('数据库选择失败:' . mysql_error());			//选择数据库
mysql_query("set names utf8");		//设置页面编码格式
