<?php
	session_start();
	header("Content-type:text/html; charset=gb2312");
	include '../../config.php';
	include '../inc/func.php';
	$f_name = show_file(PATH.ROOT.ADMIN.BAK);
	for($num = 2;$num < count($f_name);$num++){
		unlink(PATH.ROOT.ADMIN.BAK.$f_name[$num]);
	}
	echo "<script>alert('É¾³ý³É¹¦£¡');location='bak.php'</script>";
?>