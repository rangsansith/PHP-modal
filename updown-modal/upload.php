<?php
include_once("conn.class.php");
header("Content-Type:text/html; charset=utf8");
$filename = $_FILES['upname']['name'];
$tmpname = $_FILES['upname']['tmp_name'];
if (!is_dir("upload/")) {
	mkdir("upload/");
}
$filepath = "upload/";
for ($i=0; $i < count($filename); $i++) { 
	$filearr[$i] = $filepath . $filename[$i];
	move_uploaded_file($tmpname[$i], $filearr[$i]);
	$sql = "INSERT INTO tb_upfile(filename, filepath) VALUES('".$filename[$i]."', '".$filearr[$i]."')";
	$conne->uidRst($sql);
}
$url = "showpage.php";

header("Location: $url");
?>