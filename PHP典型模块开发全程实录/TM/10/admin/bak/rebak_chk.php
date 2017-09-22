<?php
	session_start();
	header("Content-type:text/html; charset=gb2312");
	include "../../config.php";
	$mysqlistr = mysqliPATH.'mysql -u'.mysqliUSER.' -h'.mysqliHOST.' -p'.mysqliPWD.' '.mysqliDATA.' < '.PATH.ROOT.ADMIN.BAK.$_POST['r_name'];
	exec($mysqlistr);
	echo "<script>alert('»Ö¸´³É¹¦');location='bak.php'</script>";
?>
