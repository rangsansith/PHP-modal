<?php
	include_once '../config.php';
	$filepath = ROOT.PIC.$_GET['path'];
?>
<img src="<?php echo $filepath; ?>" border="0">