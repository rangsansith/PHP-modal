<?php  include("conn/conn.php"); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>��վ������ͳ��</title>
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
	//��ѯ���ݿ����ܵķ�����
    $result_1=mysql_query($query_1);
    $countes_1=mysql_result($result_1,0,'countes');
	echo "<p class='STYLE1'>��վ�ܵķ�������$countes_1</p>";
	//��ѯ���ݿ����ܵ�IP������
    $query_2="select * from tb_count10 ";
    $result_2=mysql_query($query_2);
	while($myrow=mysql_fetch_array($result_2)){
		$counts_2[]=$myrow[ip];						//����ȡ��ip��ֵ��������
	}
	$results_2=array_unique($counts_2);					//ȥ���������ظ���ֵ
	$countes_2=count($results_2);						//��ȡ������ֵ�����������ܵ�ip������
	echo "<p class='STYLE1'>��վ�ܵ�IP��������$countes_2</p>";
?></td>
    <td width="240" align="center" valign="middle">
<?php 
    //��ѯ���ݿ��е����ܵķ�����
    $query_3="select sum(counts) as countes from tb_count10 where data2='".substr(date("Y-m-d"),0,7)."'";										
    $result_3=mysql_query($query_3);
    $countes_3=mysql_result($result_3,0,'countes');
	echo "<p class='STYLE2'>��վ���µķ�������$countes_3</p>";
	//��ѯ���ݿ��е��µ�IP������
    $query_4="select * from tb_count10 where data2='".substr(date("Y-m-d"),0,7)."'";
    $result_4=mysql_query($query_4);
	$counts_4=array();
	while($myrow_4=mysql_fetch_array($result_4)){
		$counts_4[]=$myrow_4['ip'];						//����ȡ��ip��ֵ��������
	}
	$results_4=array_unique($counts_4);					//ȥ���������ظ���ֵ
	$countes_4=count($results_4);						//��ȡ������ֵ�����������ܵ�ip������
	echo "<p class='STYLE2'>��վ����IP�ķ�������$countes_4</p>";
?></td>
    <td width="248" align="center" valign="middle">
<?php 
	//��ѯ���ݿ��е����ܵķ�����
    $query_5="select sum(counts) as countes from tb_count10 where data1='".date("Y-m-d")."' ";		
    $result_5=mysql_query($query_5);
    $countes_5=mysql_result($result_5,0,'countes');
	echo "<p class='STYLE3'>��վ���յķ�������$countes_5</p>";
	//��ѯ���ݿ��е��յ�IP������
    $query_6="select * from tb_count10 where data1='".date("Y-m-d")."'";
    $result_6=mysql_query($query_6);
	$counts_6=array();
	while($myrow_6=mysql_fetch_array($result_6)){
		$counts_6[]=$myrow_6['ip'];						//����ȡ��ip��ֵ��������
	}
if(is_array($counts_6)){
	$results_6=array_unique($counts_6);					//ȥ���������ظ���ֵ
	$countes_6=count($results_6);						//��ȡ������ֵ�����������ܵ�ip������
	echo "<p class='STYLE3'>��վ����IP�ķ�������$countes_6</p>";
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
    <input type="submit" name="Submit" value="�ύ">
</form>
 </td>
          </tr>
        </table>
<?php
if(isset($_POST['select'])){			//�ж��ύ�������Ƿ�Ϊ��
	$query="select counts,data1 from tb_count10 where data2='".$_POST['select']."' order by data1 ";	//����SQL���
	$result=mysql_query($query);		//ִ�в�ѯ���
	$results=array();					//��������
	$datas=array();						//��������
	while($myrow=mysql_fetch_array($result)){	//ѭ�������ѯ���
		$results[]=$myrow['counts'];			//����ѯ����洢��������
		$lmbs=implode(",",$results);			//��������������һ���ַ���
		$datas[]=substr($myrow['data1'],8,2);	//��ȡʱ�����ݣ����洢��������
		$das=implode(",",$datas);				//��������������һ���ַ���
	}
?>
<table width="902" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#D5D5D5">
	<tr>
    	<td height="18" background="images/mysql_9.jpg" bgcolor="#FFFFFF" class="STYLE4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_POST['select'];?>����վ����������ͼ</td>
	</tr>
    <tr>
    	<td bgcolor="#FFFFFF">
        	<p><img src="stat.php?lmbs=<?php echo $lmbs; ?>&das=<?php echo $das;?>"/></p>
    		<p align="center" class="STYLE2"><?php echo $_POST['select'];?>����վ����������ͼ</p>    
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
