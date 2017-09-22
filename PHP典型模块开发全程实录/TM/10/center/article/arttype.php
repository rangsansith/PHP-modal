<?php
	session_start();
	header('content-type:text/html;charset=gb2312');
	include_once '../conn/conn.php';
	$act = $_GET['act'];
	$name = $_SESSION['name'];
	$sql = "select arttype from tb_member where name = '".$name."'";
	$typefields = $conne->getFields($sql,0);
?>
<table id="addtypefm" width="300" border="1" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td colspan="2" height="25" align="center" valign="middle" style="background-color:#f3fde8;">文章类别管理</td>
  </tr>
<?php
	$typearr = explode(',',$typefields);
	foreach($typearr as $value){
?>
  <tr>
    <td width="200" height="25" align="center" valign="middle">&nbsp;<?php echo $value; ?></td>
    <td height="25" align="center" valign="middle">&nbsp;<button id="deltype" value="<?php echo $value; ?>" class="btn" onclick="return delarttype('<?php echo $typefields; ?>','<?php echo $value;?>')">删除</button></td>
  </tr>
<?php
	}
?>
  <tr>
  	<td width="200" height="25" align="center" valign="middle"><input id="addarttype" name="addarttype" type="text" class="txt" /></td>
	<td height="25" align="center" valign="middle"><button id="addtype" value="<?php echo $value; ?>" class="btn" onclick="return addarttype('<?php echo $typefields; ?>')">添加新类</button></td>
  </tr>
</table>