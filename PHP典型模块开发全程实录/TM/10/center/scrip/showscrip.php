<?php
	session_start();
	header('content-type:text/html;charset=gb2312');
	include_once '../conn/conn.php';
	$id = $_GET['id'];
	$sql = "select * from tb_script where id = ".$id;
	$arr = $conne->getRowsArray($sql);
		if($arr[0]['isnew'] == 0){
			$upsql = "update tb_script set isnew = 1 where id = ".$id;
			$num = $conne->uidRst($upsql);
		}
?>
<div id="showscripdiv">
<table border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td height="25" colspan="4" align="center" valign="middle" style="background-color:#f3fde8;">小纸条<div id = 'newscrip'></div></td>
	</tr>
	<tr>
		<td height="25" width="100" align="right" valign="middle">发送人：</td>
		<td height='25' align='left' valign="middle" width="200">&nbsp;<?php echo $arr[0]['sender']; ?></td>
		<td width="100" align="right" valign="middle">发送时间：</td>
		<td width="150" align="left" valign="middle">&nbsp;<?php echo $arr[0]['sendtime']; ?></td>
	</tr>
	<tr>
		<td height="25" width="100" align="right" valign="middle">内容：</td>
		<td colspan="3" align="left" valign="middle">&nbsp;<div style="border: 1px #000000 dashed;"><pre><?php echo $arr[0]['content']; ?></pre></div></td>
	</tr>
	<tr>
		<td colspan="4" height="30" align="center" valign="bottom"><button id="rescripbtn" class="btn" onclick="return rescrip()">回复</button></td>
	</tr>
</table>
</div>
<div id="rescripdiv" style="display:none;">
<table border="0" cellpadding="0" cellspacing="0" align="center">
	<tr>
		<td height="25" colspan="2" align="center" valign="middle">发送小纸条</td>
	</tr>
	<tr>
		<td height="25" align="right" valign="middle" width="100">接收人：</td>
		<td width="150" align="left" valign="middle">&nbsp;<input id="sendtoacpt" name="sendtoacpt" type="text" class="txt" value="<?php echo $arr[0]['sender']; ?>" readonly="" /></td>
	</tr>
	<tr>
		<td align="right" valign="middle">内容：</td>
		<td align="left" valign="middle"><textarea id="sendcont" name="sendcont" rows="5" cols="25"></textarea></td>
	</tr>
	<tr>
		<td height="25" colspan="2" align="center" valign="middle"><button class="btn" onclick="return enterscrip()">提交</button></td>
	</tr>
</table>
</div>