<?php session_start(); include("conn/conn.php"); 
    $query="select count(ip) as count_ip from tb_count04 ";					//查询数据库中总的IP访问量
    $result=mysql_query($query);
    $countes=mysql_result($result,0,'count_ip');
	
	//通过GD2函数创建画布
	$im=imagecreate(240,24);
	$gray=imagecolorallocate($im,200,200,200);
	$color =imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));    //定义字体颜色
	//输出中文字符
	$text=iconv("gb2312","utf-8","统计IP的数量：");       					//对指定的中文字符串进行转换
	$font = "fonts/FZHCJW.TTF";  
	imagettftext($im,14,0,20,18,$color,$font,$text);       					//输出中文
	//输出网站的访问次数
	imagestring($im,5,160,5,$countes,$color);
	imagepng($im);
	imagedestroy($im);
?>