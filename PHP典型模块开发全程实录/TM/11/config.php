<?php 
session_start();
$lang=$_SERVER['HTTP_ACCEPT_LANGUAGE'];		//获取语言选项
$lang=explode(';',$lang);					//以“;”对字符串进行分隔
$lang=$lang[0];								//为数组赋值
$lang=explode(',',$lang);					//以“,”对字符串进行分隔
$lang=$lang[0];								//为数组赋值
switch(strtolower($lang)){								//根据获取到的语言选项的值，为变量赋值
	case "en-us":
		$lang="en";
		break;
	case "zh-cn":
		$lang="ch";
		break;
	default :
		$lang="en";
		break;
}
if(isset($_SESSION['lang'])){
	$lang=$_SESSION['lang'];			//为SESSION变量赋值
}
include "lang/lang_$lang.php";			//调用不同的语言配置文件
?>
