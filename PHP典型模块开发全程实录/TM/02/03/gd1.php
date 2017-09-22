<?php 
if(($fp=fopen("counter.txt","r"))==false){
	echo "打开文件失败!";
}else{
	$counter=fgets($fp,1024);
	fclose($fp);
    //通过GD2函数创建画布
	$im=imagecreate(240,24);
	$gray=imagecolorallocate($im,255,255,255);	//定义背景
	$color =imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));    //定义字体颜色
	//输出中文字符
	$text="couter:";       					//对指定的中文字符串进行转换
	//输出网站的访问次数
	imagestring($im,5,160,5,$text.$counter,$color);
	imagepng($im);
	imagedestroy($im);  //以PNG格式将图像输出到浏览器
}  	
?>