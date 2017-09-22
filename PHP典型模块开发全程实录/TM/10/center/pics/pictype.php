<?php
	session_start();
	header('content-type:text/html;charset=gb2312');
	include_once '../conn/conn.php';
if(isset($_GET['act'])){
	$act = $_GET['act'];
}else{
	$act="";
}
	$name = $_SESSION['name'];
	$sql = "select pictype from tb_member where name = '".$name."'";
	$typefields = $conne->getFields($sql,0);
?>
<table id="addtypefm" width="300" border="1" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td colspan="2" height="25" align="center" valign="middle" style="background-color:#f3fde8;">相册类别管理</td>
  </tr>
<?php
	$arr = explode(',',$typefields);
	foreach($arr as $value){
?>
  <tr>
    <td width="200" height="25" align="center" valign="middle">&nbsp;<?php echo $value; ?></td>
    <td height="25" align="center" valign="middle">&nbsp;<button id="delpictype" value="<?php echo $value; ?>" class="btn" onclick="return delpictype('<?php echo $typefields; ?>','<?php echo $value;?>')">删除</button></td>
  </tr>
<?php
	}
	
?>
  <tr>
  	<td width="200" height="25" align="center" valign="middle"><input id="addpictype" name="addpictype" type="text" class="txt" /></td>
	<td height="25" align="center" valign="middle"><button id="addpictype" value="<?php echo $value; ?>" class="btn" onclick="return addpictype('<?php echo $typefields; ?>');">添加新类</button></td>
  </tr>
</table>