<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		.error{
			color: red;
		}
	</style>
</head>
<body>
<?php
$name = $email = $website = $comment = $gender = "";
$nameer = $emailer = $websiteer = $commenter = $genderer = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (empty($_POST['name'])) {
		$nameer = "name is required";
	}else{
		$name = testform($_POST['name']);
		if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
			$nameer = "只允许字母和空格！";
		}
	}
	if (empty($_POST['email'])) {
		$emailer = "email is required";
	}else{
		$email = testform($_POST['email']);
		if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
			$emailer = "无效的email格式";
		}
	}
	if (empty($_POST['website'])) {
		$websiteer = "";
	}else{
		$website = testform($_POST['website']);
		if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%
=~_|]/i", $website)) {
			$websiteer = "无效的 URL";
		}
	}
	if (empty($_POST['comment'])) {
		$commenter = "";
	}else{
		$comment = testform($_POST['comment']);
	}
	if (empty($_POST['gender'])) {
		$genderer = "gender is required";
	}else{
		$gender = testform($_POST['gender']);
	}
	
}

function testform($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
Name:：<input type="text" name="name" value="<?php echo $name; ?>"><span class="error">*<?php echo $nameer?></span><br /><br />
Website：<input type="text" name="website" value="<?php echo $website; ?>"><span class="error">*<?php echo $websiteer?></span><br /><br />
E-mail：<input type="text" name="email" value="<?php echo $email; ?>"><span class="error">*<?php echo $emailer?></span><br /><br />
Comment：<textarea name="comment" rows="5" cols="40"><?php echo $comment; ?></textarea><span class="error">*<?php echo $commenter?></span><br /><br />
Gender：<input type="radio" name="gender" value="man" <?php if (isset($gender) && $gender=="man") {echo "checked";} ?>>man
<input type="radio" name="gender" value="women" <?php if (isset($gender) && $gender=="women") {echo "checked";} ?>>women<span class="error">*<?php echo $genderer?></span><br /><br />
<input type="submit" name="submit">
</form>

<?php

echo "输入为：<br />";
echo "$name<br />";
echo "$email<br />";
echo "$website<br />";
echo "$comment<br />";
echo "$gender<br />";

?>
</body>
</html>