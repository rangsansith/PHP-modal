<?php
header("Content-Type:text/html; charset=utf8");
$filepath = $_GET['filepath'];
$filename = basename($filepath);
$file = fopen($filepath, "r");
header("Content-type:application/octet-stream");
header("Accept-ranges:bytes");
header("Accept-length:".filesize($filepath));
header("Content-Disposition:attachment;filename=".$filename);
echo fread($file, filesize($filepath));
fclose($file);
exit;
?>