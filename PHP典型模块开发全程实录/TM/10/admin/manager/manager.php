<?php
	session_start();
	header("Content-type:text/html; charset=gb2312");
	include_once '../conn/conn.php';
?>
<link rel="stylesheet" href="../css/style.css" />
<link rel="stylesheet" href="../css/table.css" />
<script language="javascript" src="../js/choose.js"></script>
<script language="javascript" src="../js/manager.js"></script>
<style>
body{
	background-image:url(../images/abg.gif);
	background-position:top;
	background-repeat:repeat-x;
	width:100%;
	height:28px;
}
</style>
<p>&nbsp;</p>
<div class="classtop">����Ա����</div>
<table border="1" cellpadding="0" cellspacing="0" align="center">
<form id="showmem" name="showmem" method="post" action="manager_chk.php?act=del">
	<tr>
		<td height="25" colspan="6" align="center" valign="middle"><a href="#" onclick="return showadd()">��ӹ���Ա</a></td>
	</tr>
	<tr>
		<td width="30" height="25" align="center" valign="middle">&nbsp;</td>
		<td width="50" align="center" valign="middle">id</td>
		<td width="100" align="center" valign="middle">����Ա�˺�</td>
		<td width="100" align="center" valign="middle">����¼ʱ��</td>
		<td width="100" align="center" valign="middle">����/�ⶳ</td>
		<td width="100" align="center" valign="middle">����</td>
	</tr>
<?php
	$sql = "select * from tb_admin";
	$arr = $conne->getRowsArray($sql);
	foreach($arr as $value){
?>
	<tr>
		<td align=center valign=middle height=25><input id="chk" name="chk[]" type="checkbox" value="<?php echo $value['id']; ?>" /></td>
		<td align=center valign=middle height=25>&nbsp;<?php echo $value['id']; ?></td>
		<td align=center valign=middle height=25>&nbsp;<?php echo $value['manager']; ?></td>
		<td align=center valign=middle height=25>&nbsp;<?php echo $value['lasttime']; ?></td>
		<td align=center valign=middle height=25>&nbsp;<a href="manager_chk.php?act=freeze&amp;id=<?php echo $value['id']; ?>&amp;fz=<?php echo $value['freeze']; ?>"><?php echo ($value['freeze']==0?"����":"�ⶳ"); ?></a></td>
		<td align="center" valign="middle"><a href="#" onClick="return showmod('<?php echo $value['id']; ?>','<?php echo $value['manager'] ?>')">�޸�����</a></td>
	</tr>
<?php 
	}
?>
<tr>
		<td colspan="6" height="30"><a href="#" onclick="return alldel(showmem);">ȫѡ</a> <a href="#" onclick="return overdel(showmem);">��ѡ</a>&nbsp;&nbsp;
          <input type="submit" value="ɾ��ѡ��" class="btn" onclick = 'return del(showmem)' /></td>
</tr>
</form>
</table>
<p />&nbsp;
<div id="adddiv" style="display:none;">
<table border="0" cellpadding="0" cellspacing="0" align="center">
<form id="addfm" name="addfm" method="post" action="manager_chk.php?act=add" onSubmit="return chkaddfm()" >
	<tr>
		<td colspan="2" align="center" valign="middle" height="25">��ӹ���Ա</td>
	</tr>
	<tr>
		<td height="25" align="right" valign="middle">����Ա�˺ţ�</td>
		<td><input id="addman" name="addman" type="text"></td>
	</tr>
	<tr>
		<td height="25" align="right" valign="middle">����Ա���룺</td>
		<td><input id="addpwd1" name="addpwd1" type="password"></td>
	</tr>
	<tr>
		<td height="25" align="right" valign="middle">ȷ�����룺</td>
		<td><input id="addpwd2" name="addpwd2" type="password"></td>
	</tr>
	<tr>
		<td height="25" colspan="2" align="center" valign="middle"><input id="addsbt" name="addsbt" type="submit" value="���"></td>
	</tr>
</form>
</table>
</div>
<div id="moddiv" style="display:none;">
<table border="0" cellpadding="0" cellspacing="0" align="center">
<form id="modfm" name="modfm" method="post" action="manager_chk.php?act=mod" onSubmit="return chkmodfm()" >
	<tr>
		<td colspan="2" align="center" valign="middle" height="25">�޸�����</td>
	</tr>
	<tr>
		<td height="25" align="right" valign="middle">���޸��˺ţ�</td>
		<td><input id="modman" name="modman" type="text" readonly="readonly"></td>
	</tr>
	<tr>
		<td height="25" align="right" valign="middle">����Ա���룺</td>
		<td><input id="modpwd1" name="modpwd1" type="password"></td>
	</tr>
	<tr>
		<td height="25" align="right" valign="middle">ȷ�����룺</td>
		<td><input id="modpwd2" name="modpwd2" type="password"></td>
	</tr>
	<tr>
		<td height="25" colspan="2" align="center" valign="middle"><input id="modid" name="modid" type="hidden"><input id="modsbt" name="modsbt" type="submit" value="�޸�"></td>
	</tr>
</form>
</table>
</div>