<?php 
if(($fp=fopen("counter.txt","r"))==false){
	echo "���ļ�ʧ��!";
}else{
	$counter=fgets($fp,1024);
	fclose($fp);
    //ͨ��GD2������������
	$im=imagecreate(240,24);
	$gray=imagecolorallocate($im,255,255,255);	//���屳��
	$color =imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));    //����������ɫ
	//��������ַ�
	$text="couter:";       					//��ָ���������ַ�������ת��
	//�����վ�ķ��ʴ���
	imagestring($im,5,160,5,$text.$counter,$color);
	imagepng($im);
	imagedestroy($im);  //��PNG��ʽ��ͼ������������
}  	
?>