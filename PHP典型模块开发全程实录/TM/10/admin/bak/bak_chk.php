<?php
	session_start();
	header("Content-type:text/html; charset=gb2312");
	include "../../config.php";
	$mysqlistr = mysqliPATH.'mysqldump -u'.mysqliUSER.' -h'.mysqliHOST.' -p'.mysqliPWD. ' --opt -B '.mysqliDATA.' > '.PATH.ROOT.ADMIN.BAK.$_POST['b_name'];
	exec($mysqlistr);
	echo "<script>alert('���ݳɹ�');location='bak.php'</script>";
	
?>
