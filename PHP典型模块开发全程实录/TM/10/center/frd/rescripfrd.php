<?php
	session_start();
	header('content-type:text/html;charset=gb2312');
	include_once '../conn/conn.php';
	$sname = $_GET['sname'];
?>
<table border="0" cellpadding="0" cellspacing="0" align="center">
	<tr>
		<td height="25" colspan="2" align="center" valign="middle"  style="background-color:#f3fde8;">����Сֽ��</td>
	</tr>
	<tr>
		<td height="25" align="right" valign="middle" width="100">�����ˣ�</td>
		<td width="150" align="left" valign="middle">&nbsp;<input id="sendtoacpt" name="sendtoacpt" type="text" class="txt" value="<?php echo $sname; ?>" readonly="" /></td>
	</tr>
	<tr>
		<td align="right" valign="middle">���ݣ�</td>
		<td align="left" valign="middle"><textarea id="sendcont" name="sendcont" rows="5" cols="25"></textarea></td>
	</tr>
	<tr>
		<td height="25" colspan="2" align="center" valign="middle"><button class="btn" onclick="return enterscrip()">�ύ</button></td>
	</tr>
</table>