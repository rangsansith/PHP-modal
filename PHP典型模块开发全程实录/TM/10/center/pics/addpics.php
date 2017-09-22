<?php
	session_start();
	header('Content-Type:text/html;charset=gb2312');
	include_once '../conn/conn.php';
	$sql = "select pictype from tb_member where name='".$_SESSION['name']."'";
	$typefields = $conne->getFields($sql,0);
	$arr = explode(',',$typefields);
?>
<table width="400" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" colspan="2" align="center" valign="middle"  style="background-color:#f3fde8;">添加相册</td>
  </tr>
  <tr>
    <td width="100" height="25" align="right" valign="middle">图片名称：</td>
    <td height="25" align="left" valign="middle">&nbsp;<input id="picname" name="picname" type="text" class="txt" /></td>
  </tr>
  <tr>
    <td width="100" height="25" align="right" valign="middle">图片类别：</td>
    <td height="25" align="left" valign="middle">&nbsp;
	<select id="pictypeslt">
<?php
	foreach($arr as $value){
?>
	<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
<?php
	}
?>
	</select>
	</td>
  </tr>
  <tr>
    <td width="100" height="25" align="right" valign="middle">上传图片：</td>
    <td height="25" align="left" valign="top"><div id="showinfo">&nbsp;<iframe id="subpage" height="25" src="pics/upfile.php" width="300" scrolling="no" style="border:1px #ffffff solid;"></iframe></div></td>
  </tr>
  <tr>
    <td colspan="2" height="25" align="center" valign="middle"><input id="upfilepath" type="hidden" value="" /><button id='savepic' class="btn" onclick="return savepicinfo()">保存</button></td>
  </tr>
</table>
`