<?php
	define('PATH',$_SERVER['DOCUMENT_ROOT']);				//服务器目录
	define('ROOT','/TM/10/');							//博客目录
	define('ADMIN','admin/');								//后台目录
	define('PIC','center/pics/image/');									//上传图片目录
	define('BAK','sqlbak/');								//备份目录
	define('HEADGIF','headgif/');							//头像目录
	define('mysqliPATH','C:\\Program Files\MySQL\\MySQL Server 5.5\\data\\');			//mysqli执行文件路径
	define('mysqliHOST','localhost');						//mysqli服务器ip
	define('mysqliDATA','db_blog');							//mysqli数据库
	define('mysqliUSER','root');								//mysqli账号
	define('mysqliPWD','111');								//mysqli密码
	$picpostfix = array('image/gif','image/pjpeg','image/bmp');	//允许上传的图片后缀
	define('MAXSIZEPIC',500000);						//允许上传的图片的最大字节数
?>