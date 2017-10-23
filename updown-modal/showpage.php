<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Bootstrap 101 Template</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!-- [if lt IE 9]> -->
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<!-- <![endif] -->
</head>
<body>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>

	<?php
	include_once("conn.class.php");
	header("Content-Type:text/html; charset=utf8");
	$sql = "SELECT * FROM tb_upfile";
	$getArr = $conne->getRowsArray($sql);
	echo " <table class='table table-striped table-bordered table-hover table-condensed'>
      <tr class='success'>
      <td>文件名</td> 
      <td>操作</td> 
      </tr>";
	foreach ($getArr as $key => $value) {
		echo "<tr class='success'>
      <td>".$value['filename']."</td> 
      <td><a href='download.php?filepath=".$value['filepath']."' class='btn'>下載</a></td> 
      </tr>";
	}
	echo "</table>";
	?>
</body>
</html>