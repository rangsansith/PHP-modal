<?php
	include_once '../conn/conn.php';
?>
<script language="javascript" src="../js/query.js"></script>
<table border="0" cellpadding="0" cellspacing="0" align="center">
<form id="queryfm" name="queryfm" method="post" action="member.php?act=query" onSubmit="return chkquery()">
	<tr>
		<td width="50" height="25">��ѯ��</td>
		<td width="100">
		<select id="querymem" name="querymem" onChange="return changequery()">
			<option value="id">���</option>
			<option value="name">�˺�</option>
			<option value="realname">��ʵ����</option>
			<option value="email">email</option>
			<option value="qq">qq</option>
		
			<option value="upfile">������</option>
			<option value="uppics">�ϴ�ͼƬ</option>
			<option value="hitnum">�����</option>
		</select>
		</td>
		<td width="50" align="center" valign="middle"><div id="sign">
		<select id="signslt" name="signslt">
			<Option value="&gt;">����</Option>
			<option value="=">����</option>
			<option value="&lt;">С��</option>
		</select>
		</div></td>
		<td width="100"><div id="input"><input id="cont" name="cont" type="text" size="30" /></div></td>
		<td><input id="querybt" name="querybt" type="submit" value="��ѯ"></td>
	</tr>
</form>
</table>