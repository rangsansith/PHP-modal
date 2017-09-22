<?php 
session_start();
switch($_GET['lang']){			//获取超级链接传递的语言选项的值
	case "en":
		$_SESSION['lang']="en";	//根据超级链接的值，为SESSION变量赋值
		break;
	case "ch":
		$_SESSION['lang']="ch";
		break;
	default :
		$_SESSION['lang']="en";
		break;

}
if($_GET['link']=="addnew"){	//根据超级链接的值，跳转到不同操作页面
	header("Location:add_data.php");	
}elseif ($_GET['link']=="show"){
	header("Location:look_over.php");
}else{
	header("Location:index.php");		
}
?>