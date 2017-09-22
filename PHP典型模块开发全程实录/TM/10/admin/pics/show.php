<?php
	include_once '../../config.php';
	header("Content-type:text/html; charset=gb2312");
	$filepath = ROOT.PIC.$_GET['path'];
?>
<img src="<?php echo $filepath; ?>" border="0">