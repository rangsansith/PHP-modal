<?php
	session_start();
	header("Content-type:text/html; charset=gb2312");
	include_once '../conn/conn.php';
	include_once '../../config.php';
	$id = $_GET['id'];
	if(!empty($id) and !is_null($id)){
		$sql = 'select * from tb_member where id = '.$id;
		$arr = $conne->getRowsArray($sql);
	}
?>
<link rel="stylesheet" href="../css/style.css" />

<table border="1" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td height="25" colspan="5" align="center" valign="middle">������Ϣ</td>
  </tr>
  <tr>
    <td width="100" height="25" align="center" valign="middle">id</td>
    <td width="100" height="25" align="left" valign="middle">&nbsp;<?php echo $arr[0]['id']; ?></td>
    <td width="100" height="25" align="center" valign="middle">�˺�</td>
    <td width="100" height="25" align="left" valign="middle">&nbsp;<?php echo $arr[0]['name']; ?></td>
    <td width="85" rowspan="4" align="center" valign="middle">&nbsp;<img src="<?php echo PATH.ROOT.HEADGIF.$arr[0]['headgif']; ?>" border="0" width="60" height="60"></td>
  </tr>
  <tr>
    <td height="25" align="center" valign="middle">�Ա�</td>
    <td height="25" align="left" valign="middle">&nbsp;<?php echo $arr[0]['sex']; ?></td>
    <td height="25" align="center" valign="middle">����</td>
    <td height="25" align="left" valign="middle">&nbsp;<?php echo $arr[0]['birthday']; ?></td>
  </tr>
  <tr>
    <td height="25" align="center" valign="middle">��ʵ����</td>
    <td height="25" align="left" valign="middle">&nbsp;<?php echo $arr[0]['realname']; ?></td>
    <td height="25" align="center" valign="middle">QQ</td>
    <td height="25" align="left" valign="middle">&nbsp;<?php echo $arr[0]['qq']; ?></td>
  </tr>
  <tr>
    <td height="25" align="center" valign="middle">Email</td>
    <td height="25" align="left" valign="middle">&nbsp;<?php echo $arr[0]['email']; ?></td>
    <td height="25" align="center" valign="middle">��ϵ��ַ</td>
    <td height="25" align="left" valign="middle">&nbsp;<?php echo $arr[0]['address']; ?></td>
  </tr>
  <tr>
    <td height="25" align="center" valign="middle">������ҳ</td>
    <td height="25" colspan="4" align="left" valign="middle">&nbsp;<?php echo $arr[0]['homepage']; ?></td>
  </tr>
</table>
<p />
<table border="1" cellspacing="0" cellpadding="0" align="center">
	<tr>
    	<td height="25" colspan="6" align="center" valign="middle">������Ϣ</td>
	</tr>
	<tr>
		<td width="100" height="25" align="center" valign="middle">�ϴ�����</td>
		<td width="100" align="center" valign="middle">&nbsp;<?php echo $arr[0]['upfile']; ?>&nbsp;ƪ</td>
	  <td width="100" align="center" valign="middle">�ϴ�ͼƬ</td>
		<td width="150" align="center" valign="middle">&nbsp;<?php echo $arr[0]['uppics']; ?>&nbsp;��</td>
	  
	</tr>
	<tr>
		<td width="100" height="25" align="center" valign="middle">�����</td>
		<td width="100" align="center" valign="middle">&nbsp;<?php echo $arr[0]['hitnum']; ?>&nbsp;��</td>
		
		<td width="80" align="center" valign="middle">����¼ʱ��</td>
		<td align="center" valign="middle">&nbsp;<?php echo $arr[0]['lasttime']; ?></td>
	</tr>
</table>
