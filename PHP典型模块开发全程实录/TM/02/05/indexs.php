<?php  include("conn/conn.php"); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>网站访问量统计</title>
<style type="text/css">
<!--
.STYLE2 {color: #0066FF;
font-size: 12px}
body {
	background-color: #515151;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.STYLE4 {color: #000000;font-size: 12px}
-->
</style></head>
<body>
<table width="1003" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="images/mysql1_8 (3).jpg" width="1003" height="79"></td>
  </tr>
  <tr>
    <td height="2"></td>
  </tr>
  <tr>
    <td><img src="images/mysql1_8 (4).jpg" width="1003" height="30"></td>
  </tr>
  <tr>
    <td width="1003" height="500" align="center" valign="top" bgcolor="#FFFFFF"><table width="950" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#A6D98C">
      <tr>
        <td bgcolor="#FFFFFF"><img src="images/mysql1_8.jpg" width="950" height="25"></td>
      </tr>
      <tr>
        <td height="400" align="center" valign="top" bgcolor="#FFFFFF"><table width="902" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#D5D5D5">
          <tr>
            <td bgcolor="#FFFFFF"><img src="images/mysql1_8 (1).jpg" width="902" height="18"></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="240" height="25" align="center" valign="middle">
<?php 
    $query_1="select sum(counts) as countes from tb_count10 ";
	//查询数据库中总的访问量
    $result_1=mysql_query($query_1);
    $countes_1=mysql_result($result_1,0,'countes');
	echo "<p class='STYLE1'>网站总的访问量：$countes_1</p>";
	//查询数据库中总的IP访问量
    $query_2="select * from tb_count10 ";
    $result_2=mysql_query($query_2);
	while($myrow=mysql_fetch_array($result_2)){
		$counts_2[]=$myrow[ip];						//将获取的ip的值赋给变量
	}
	$results_2=array_unique($counts_2);					//去除数组中重复的值
	$countes_2=count($results_2);						//获取数组中值的数量，即总的ip访问量
	echo "<p class='STYLE1'>网站总的IP访问量：$countes_2</p>";
?></td>
    <td width="240" align="center" valign="middle">
<?php 
    //查询数据库中当月总的访问量
    $query_3="select sum(counts) as countes from tb_count10 where data2='".substr(date("Y-m-d"),0,7)."'";										
    $result_3=mysql_query($query_3);
    $countes_3=mysql_result($result_3,0,'countes');
	echo "<p class='STYLE2'>网站当月的访问量：$countes_3</p>";
	//查询数据库中当月的IP访问量
    $query_4="select * from tb_count10 where data2='".substr(date("Y-m-d"),0,7)."'";
    $result_4=mysql_query($query_4);
	$counts_4=array();
	while($myrow_4=mysql_fetch_array($result_4)){
		$counts_4[]=$myrow_4['ip'];						//将获取的ip的值赋给变量
	}
	$results_4=array_unique($counts_4);					//去除数组中重复的值
	$countes_4=count($results_4);						//获取数组中值的数量，即总的ip访问量
	echo "<p class='STYLE2'>网站当月IP的访问量：$countes_4</p>";
?></td>
    <td width="248" align="center" valign="middle">
<?php 
	//查询数据库中当日总的访问量
    $query_5="select sum(counts) as countes from tb_count10 where data1='".date("Y-m-d")."' ";		
    $result_5=mysql_query($query_5);
    $countes_5=mysql_result($result_5,0,'countes');
	echo "<p class='STYLE3'>网站当日的访问量：$countes_5</p>";
	//查询数据库中当日的IP访问量
    $query_6="select * from tb_count10 where data1='".date("Y-m-d")."'";
    $result_6=mysql_query($query_6);
	$counts_6=array();
	while($myrow_6=mysql_fetch_array($result_6)){
		$counts_6[]=$myrow_6['ip'];						//将获取的ip的值赋给变量
	}
if(is_array($counts_6)){
	$results_6=array_unique($counts_6);					//去除数组中重复的值
	$countes_6=count($results_6);						//获取数组中值的数量，即总的ip访问量
	echo "<p class='STYLE3'>网站当日IP的访问量：$countes_6</p>";
}
?></td>
  </tr>
</table>
<form name="form1" method="post" action="indexs.php">
	<select name="select">
    <?php 
	$que="select distinct data2 from tb_count10";
	$res=mysql_query($que,$id);
	while($myrow=mysql_fetch_array($res)){
	?>
		<option value="<?php echo $myrow['data2'];?>"><?php echo $myrow['data2'];?></option>
        <?php 
	}
		?>
	</select>&nbsp;&nbsp;
    <input type="submit" name="Submit" value="提交">
</form>
 </td>
          </tr>
        </table>
<?php
if(isset($_POST['select'])){			//判断提交的数据是否为真
	$query="select counts,data1 from tb_count10 where data2='".$_POST['select']."' order by data1 ";	//定义SQL语句
	$result=mysql_query($query);		//执行查询语句
	$results=array();					//定义数组
	$datas=array();						//定义数组
	while($myrow=mysql_fetch_array($result)){	//循环输出查询结果
		$results[]=$myrow['counts'];			//将查询结果存储到数组中
		$lmbs=implode(",",$results);			//将数组重新生成一个字符串
		$datas[]=substr($myrow['data1'],8,2);	//截取时间数据，并存储到数组中
		$das=implode(",",$datas);				//将数组重新生成一个字符串
	}
?>
<table width="902" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#D5D5D5">
	<tr>
    	<td height="18" background="images/mysql_9.jpg" bgcolor="#FFFFFF" class="STYLE4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['select'];?>月网站访问量走势图</td>
	</tr>
    <tr>
    	<td bgcolor="#FFFFFF">
        	<p><img src="stat.php?lmbs=<?php echo $lmbs; ?>&das=<?php echo $das;?>"/></p>
    		<p align="center" class="STYLE2"><?php echo $_POST['select'];?>月网站访问量走势图</p>    
		</td>
  	</tr>
</table>
<?php
}
?>


</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><img src="images/mysql1_8 (2).jpg" width="1003" height="30"></td>
  </tr>
</table>
</body>
</html>
