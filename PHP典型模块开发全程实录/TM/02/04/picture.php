<?php session_start(); include("conn/conn.php"); 
    $query="select count(ip) as count_ip from tb_count04 ";					//��ѯ���ݿ����ܵ�IP������
    $result=mysql_query($query);
    $countes=mysql_result($result,0,'count_ip');
	
	//ͨ��GD2������������
	$im=imagecreate(240,24);
	$gray=imagecolorallocate($im,200,200,200);
	$color =imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));    //����������ɫ
	//��������ַ�
	$text=iconv("gb2312","utf-8","ͳ��IP��������");       					//��ָ���������ַ�������ת��
	$font = "fonts/FZHCJW.TTF";  
	imagettftext($im,14,0,20,18,$color,$font,$text);       					//�������
	//�����վ�ķ��ʴ���
	imagestring($im,5,160,5,$countes,$color);
	imagepng($im);
	imagedestroy($im);
?>