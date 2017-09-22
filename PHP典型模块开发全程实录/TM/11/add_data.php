<?php
header("Content-type:text/html;charset=utf-8");
require_once('Connections/conn.php');	//连接数据库
require_once('config.php');				//配置语言
//定义格式转换的方法
function GetSQLValueString($theValue,$theType,$theDefinedValue="",$theNotDefinedValue=""){
	$theValue=(!get_magic_quotes_gpc()) ? addslashes($theValue):$theValue;
	switch($theType){
		case "text";
			$theValue=($theValue !="")? "'". $theValue. "'" : "NULL";
			break;		
	}
	return $theValue;
}
if(isset($_POST['Submit'])){
	//获取表单中提交的数据，并完成对数据格式的转换
	$insertSQL=sprintf("insert into tb_articles(topic,author,comefrom,content,langver) values(%s,%s,%s,%s,%s)",
		GetSQLValueString($_POST['topic'],"text"),
		GetSQLValueString($_POST['author'],"text"),
		GetSQLValueString($_POST['comefrom'],"text"),
		GetSQLValueString($_POST['content'],"text"),
		GetSQLValueString($_POST['langver'],"text")
		);
		//执行添加语句，将数据添加到数据表中
	$Result1=mysql_query($insertSQL,$conn) or die(mysql_error());
	echo "<script>alert('$add_data_Suc'); window.location.href='add_data.php';</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $add_data_title; ?></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body class="twoColLiqLtHdr">

<div id="container"> 
  <div id="header"><img src="images/<?php $rs_filter=$_SESSION['lang'];if($rs_filter=="en"){echo "OA_021.jpg";}else{echo "OA_02.jpg";}?>" width="780" height="120" border="0" usemap="#Map" />
	<map name="Map" id="Map"><area shape="rect" coords="708,73,775,95" href="setlang.php?lang=ch&link=addnew" /><area shape="rect" coords="706,98,772,113" href="setlang.php?lang=en&link=addnew" /></map>
  <!-- end #header --></div>
 
  <table border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td> <div id="sidebar1">
	<img src="images/<?php if($rs_filter=="en"){echo "OA_061.jpg";}else{echo "OA_06.jpg";}?>" width="188" height="396" border="0" usemap="#Map2" />
	<map name="Map2" id="Map2"><area shape="rect" coords="47,110,154,131" href="index.php" />
		 <area shape="rect" coords="43,71,163,98" href="add_data.php" />
	</map>
  <!-- end #sidebar1 --></div></td>
      <td align="left"><div id="mainContent" >
	<img src="images/<?php if($rs_filter=="en"){echo "OA_07-091.jpg";}else{echo "OA_07-09.jpg";}?>"/>
   	<form name="form" method="post" action="">
    <p><?php echo $add_data_topic; ?>：<input type="text" name="topic" value="" /></p>
    <p><?php echo $add_data_author; ?>：<input type="text" name="author" value="" /></p>
    <p><?php echo $add_data_comefrom; ?>：<input type="text" name="comefrom" value="" /></p>
    <p><?php echo $add_data_content; ?>： </p>
    <textarea name="content" id="textarea" cols="65" rows="6"></textarea>
<p><?php echo $add_data_langsp; ?>：<input type="radio" name="langver" value="en" />&nbsp;&nbsp;<?php echo $add_data_lenver ?>：<input type="radio" name="langver" value="ch" /><?php echo $add_data_lchver ?></p>
    <p><input type="submit" name="Submit" value="<?php echo $add_data_submit ?>" />&nbsp;&nbsp;<input type="reset" name="Reset" value="<?php echo $add_data_reset ?>" /></p>
    </form>
	<!-- end #mainContent --></div></td>
    </tr>
  </table>
  
	<!-- 这个用于清除浮动的元素应当紧跟 #mainContent div 之后，以便强制 #container div 包含所有的子浮动 --><br class="clearfloat" />
  <div id="footer"><img src="images/OA_13-14.jpg" width="780" height="78" />
  <!-- end #footer --></div>
<!-- end #container --></div>
</body>
</html>