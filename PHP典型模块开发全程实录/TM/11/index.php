<?php 
require_once('Connections/conn.php');		//包含数据库连接文件
require_once('config.php');					//包含语言配置文件
$query_rs="select * from tb_articles where langver='$rs_filter' order by id desc";	//定义查询语句
$rs=mysql_query($query_rs,$conn) or die(mysql_error());		//执行查询语句
$row_rs=mysql_fetch_assoc($rs);				//获取查询结果
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $index_title ?></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body class="twoColLiqLtHdr">

<div id="container"> 
  <div id="header" ><img src="images/<?php if($rs_filter=="en"){echo "OA_021.jpg";}else{echo "OA_02.jpg";}?>" width="780" height="120" border="0" usemap="#Map" />
	<map name="Map" id="Map"><area shape="rect" coords="709,73,776,95" href="setlang.php?lang=ch&link=addnew" /><area shape="rect" coords="706,98,772,113" href="setlang.php?lang=en&link=addnew" /></map>
  <!-- end #header --></div>
  <div id="sidebar1" >
	<img src="images/<?php if($rs_filter=="en"){echo "OA_061.jpg";}else{echo "OA_06.jpg";}?>" width="188" height="396" border="0" usemap="#Map2" />
		<map name="Map2" id="Map2"><area shape="rect" coords="47,110,154,131" href="index.php" /> <area shape="rect" coords="43,71,163,98" href="add_data.php" /></map>
  <!-- end #sidebar1 --></div>
  <div id="mainContent" style="padding-left:210px;">
<P>
				<?php echo $index_topic; ?>
				<?php echo $index_author; ?>&nbsp;
				<?php echo $index_comefrom; ?>&nbsp;
				<?php echo $index_addtime; ?>&nbsp;

    </P>	 
<?php 
	do{
?><P>
			<a href="look_over.php?id=<?php echo $row_rs['id'];?>"><?php echo $row_rs['topic'];?></a>
				<?php echo $row_rs['author'];?>
				<?php echo $row_rs['comefrom'];?>
				<?php echo $row_rs['addtime'];?>
	</P>	
	 <?php 
  }while($row_rs=mysql_fetch_assoc($rs));
   mysql_free_result($rs);
   ?>
	<!-- end #mainContent --></div>
  <div id="footer"><img src="images/OA_13-14.jpg" width="780" height="78" />
  <!-- end #footer --></div>
<!-- end #container --></div>
</body>
</html>