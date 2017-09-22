<?php 
require_once('Connections/conn.php');			//连接数据库
require_once('config.php');						//配置语言
$colname_rs='1';								//定义变量值
if(isset($_GET['id'])){							//检测变量是否被设置
	$colname_rs=(get_magic_quotes_gpc())?$_GET['id']:addslashes($_GET['id']);	//对数据格式进行转换
}
$query_rs=sprintf("select * from tb_articles where id=%s",$colname_rs);			//对字符串进行格式化
$rs=mysql_query($query_rs,$conn) or die(mysql_error());							//执行查询操作
$row_rs=mysql_fetch_array($rs);									//获取查询结果集
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
  <div id="header"><img src="images/<?php if($rs_filter=="en"){echo "OA_021.jpg";}else{echo "OA_02.jpg";}?>" width="780" height="120" border="0" usemap="#Map" />
	<map name="Map" id="Map"><area shape="rect" coords="708,73,775,95" href="setlang.php?lang=ch&link=addnew" /><area shape="rect" coords="706,98,772,113" href="setlang.php?lang=en&link=addnew" /></map>
  <!-- end #header --></div>
  <div id="sidebar1">
	<img src="images/<?php if($rs_filter=="en"){echo "OA_061.jpg";}else{echo "OA_06.jpg";}?>" width="188" height="396" border="0" usemap="#Map2" />
		<map name="Map2" id="Map2"><area shape="rect" coords="47,111,154,132" href="index.php" /><area shape="rect" coords="43,71,163,98" href="add_data.php" /></map>
  <!-- end #sidebar1 --></div>
  <div id="mainContent" style="padding-left:210px;">
	<P><?php echo $row_rs['topic'];?></p>
	<P><?php echo $show_author; ?>：<?php echo $row_rs['author'];?></p>
	<P><?php echo $show_comefrom;?>：<?php echo $row_rs['comefrom'];?></p>
	<P><?php
		$len=iconv_strlen($row_rs['content'],'utf-8');			//对文章内容长度进行统计
		if($len>100){
			echo iconv_substr($row_rs['content'],0,100,'utf-8')."......";		//对文章内容进行截取输出
		}else{
			echo $row_rs['content'];					//输出文章内容
		}
	?></p>
	<P><?php echo $show_upttime;?>：<?php echo $row_rs['addtime'];?></p>
	<P><a href="setup_pdf.php?id=<?php echo $row_rs['id']; ?>" target="_blank"><?php echo $show_down;?></a></p>

	<!-- end #mainContent --></div>
  <div id="footer"><img src="images/OA_13-14.jpg" width="780" height="78" />
  <!-- end #footer --></div>
<!-- end #container --></div>
</body>
</html>
<?php 
mysql_free_result($rs);

?>