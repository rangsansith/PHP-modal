<?php
	session_start();
	include_once 'center/conn/conn.php';
	include_once 'config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>明日博客</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="cetner/js/xmlhttprequest.js"></script>
</head>
<body>
<div id="contain"> 
  <div id="header"> 
    <div id="login"> 
      <div> <a onclick="javascript:window.open('center/login.php','login','width=300,height=200',false)">登录</a> 
        |&nbsp; <a onclick="javascript:window.open('center/register.php','register','',false)">注册</a>	
      </div>
    </div>
  </div>
  </head>
  <body> 
  <p />&nbsp;&nbsp;
  <div align="center"><a href="moreinfo.php?act=allblog">全部博客</a> | <a href="moreinfo.php?act=nominateblog">推荐博客</a> 
    | <a href="moreinfo.php?act=hotblog">热门博客排行</a> | <a href="moreinfo.php?act=nominatearticle">推荐文章</a> 
    | <a href="moreinfo.php?act=hotarticle">热门文章</a></div></p>
  <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
    <tr> 
      <td colspan="10" height="25" valign="middle" align="center">&nbsp;</td>
      <?php
	$act = $_GET['act'];
	$rows = 0;
	if($act == 'allblog'){
		$sql = "select name,blogname from tb_member";
		
		
		$arr = $conne->getRowsArray($sql);
	if($arr != ''){
		foreach($arr as $value){
		if($rows % 5 == 0){
?>
    </tr>
    <tr> 
      <?php
		}
?>
      <td height="25" align="center" valign="middle"><a href="center/center.php?uid=<?php echo $value['name']; ?>" target="_blank"><?php echo $value['blogname']; ?></a></td>
      <?php
	$rows++;
	}
		while($rows % 5 != 0){
		?>
      <td>&nbsp;</td>
      <?php
			$rows++;
		}
?>
    </tr>
    <?php
	}


	}else if($act == 'nominateblog'){
		$sql = "select name,blogname from tb_member where isnominate = 1";
		
		$arr = $conne->getRowsArray($sql);
	if($arr != ''){
		foreach($arr as $value){
		if($rows % 5 == 0){
?></tr>
    <tr> 
      <?php
		}
?>
      <td height="25" align="center" valign="middle"><a href="center/center.php?uid=<?php echo $value['name']; ?>" target="_blank"><?php echo $value['blogname']; ?></a></td>
      <?php
	$rows++;
	}
		while($rows % 5 != 0){
		?>
      <td>&nbsp;</td>
      <?php
			$rows++;
		}
?>
    </tr>
    <?php
	}
		
	}else if($act == 'hotblog'){
		$sql = "select name,blogname from tb_member order by hitnum desc";
		
		$arr = $conne->getRowsArray($sql);
	if($arr != ''){
		foreach($arr as $value){
		if($rows % 5 == 0){
?></tr>
    <tr> 
      <?php
		}
?>
      <td height="25" align="center" valign="middle"><a href="center/center.php?uid=<?php echo $value['name']; ?>" target="_blank"><?php echo $value['blogname']; ?></a></td>
      <?php
	$rows++;
	}
		while($rows % 5 != 0){
		?>
      <td>&nbsp;</td>
      <?php
			$rows++;
		}
?>
    </tr>
    <?php
	}
		
		
	}else if($act == 'nominatearticle'){
		$sql = "select id,title,author from tb_article where isnominate = 1";
		
		$arr = $conne->getRowsArray($sql);
	if($arr != ''){
		foreach($arr as $value){
		if($rows % 5 == 0){
?></tr>
    <tr> 
      <?php
		}
?>
      <td height="25" align="center" valign="middle"><a href="center/center.php?act=see&amp;uid=<?php echo $value['author']; ?>&amp;artid=<?php echo $value['id']; ?>" target="_blank"><?php echo $value['title']; ?></a></td>
      <?php
	$rows++;
	}
		while($rows % 5 != 0){
		?>
      <td>&nbsp;</td>
      <?php
			$rows++;
		}
?>
    </tr>
    <?php
	}
		
		
	}else if($act == 'hotarticle'){
		$sql = "select id,title,author from tb_article order by hitnum desc";
		
		$arr = $conne->getRowsArray($sql);
		if($arr != ''){
			foreach($arr as $value){
			if($rows % 5 == 0){
	?></tr>
    <tr> 
      <?php
			}
	?>
      <td height="25" align="center" valign="middle"><a href="center/center.php?act=see&amp;uid=<?php echo $value['author']; ?>&amp;artid=<?php echo $value['id']; ?>" target="_blank"><?php echo $value['title']; ?></a></td>
      <?php
		$rows++;
		}
			while($rows % 5 != 0){
			?>
      <td>&nbsp;</td>
      <?php
				$rows++;
			}
	?>
    </tr>
    <?php
		}
	}
?>
  </table>
</div>
</body>
<html>