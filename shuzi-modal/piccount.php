
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
	fclose($fp);
	$len = strlen($counter);
	$str = str_repeat("0", 6-$len);
	for ($i=0; $i < strlen($str); $i++) { 
		$result = $str[$i];
		$result = '<img src=images/0.gif>';
		echo $result;
	}
	for ($i=0; $i < strlen($counter); $i++) { 
		$result = $counter[$i];
		switch ($result) {
			case '0':
			$ret[$i]="0.gif";
			break;
			case '1':
			$ret[$i]="1.gif";
			break;
			case '2':
			$ret[$i]="2.gif";
			break;
			case '3':
			$ret[$i]="3.gif";
			break;
			case '4':
			$ret[$i]="4.gif";
			break;
			case '5':
			$ret[$i]="5.gif";
			break;
			case '6':
			$ret[$i]="6.gif";
			break;
			case '7':
			$ret[$i]="7.gif";
			break;
			case '8':
			$ret[$i]="8.gif";
			break;	
			case '9':
			$ret[$i]="9.gif";
			break;	
		}
		echo "<img src=images/".$ret[$i].">";
	}
}
?>