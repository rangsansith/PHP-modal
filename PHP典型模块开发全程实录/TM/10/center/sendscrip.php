<?php
header('content-type:text/html;charset=gb2312');
?>
<script language="javascript" src="js/xmlhttprequest.js"></script>
<script language="javascript" src="js/personinfo.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/table.css" rel="stylesheet" type="text/css" />
<table border="0" cellpadding="0" cellspacing="0" align="center">
	<tr>
		<td height="25" colspan="2" align="center" valign="middle">����Сֽ��</td>
	</tr>
	<tr>
		<td height="25" align="right" valign="middle" width="100">�����ˣ�</td>
		<td width="150" align="left" valign="middle"><input id="sendtoacpt" name="sendtoacpt" type="text" class="txt" value="<?php echo $_GET['acpt']; ?>" readonly="" /></td>
	</tr>
	<tr>
		<td align="right" valign="middle">���ݣ�</td>
		<td align="left" valign="middle"><textarea id="sendcont" name="sendcont" rows="5" cols="25"></textarea></td>
	</tr>
	<tr>
		<td height="25" colspan="2" align="center" valign="middle"><button class="btn" onclick="return enterscrip()">�ύ</button></td>
	</tr>
</table>