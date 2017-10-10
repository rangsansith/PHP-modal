<?php
header("Content-Type:text/html; charset=utf8");
if (!isset($_SESSION['temp'])) {
	if (($fp = fopen('counter.txt', 'r')) == false) {
		echo "打開失敗";
	}
	else{
		$counter = fgets($fp, 1024);
		fclose($fp);
		$counter++;
		$fp = fopen('counter.txt', 'w');
		fputs($fp, $counter);
		fclose($fp);
	}
	$_SESSION['temp']=1;
}
if (($fp = fopen('counter.txt', 'r')) == false) {
	echo "打開失敗";
}
else{
	$counter = fgets($fp, 1024);
	echo $counter;
	fclose($fp);
}






?>