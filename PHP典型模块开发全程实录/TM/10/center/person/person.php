<?php
	session_start();
	header('content-type:text/html;charset=gb2312');
	include_once '../conn/conn.php';
	include_once '../../config.php';
	$name= $_SESSION['name'];
	if(!empty($name) and !is_null($name)){
		$sql = "select * from tb_member where name = '".$_SESSION['name']."'";
		$arr = $conne->getRowsArray($sql);	
?>
<p/>
<table border="1" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td height="25" colspan="6" align="center" valign="middle" style="background-color:#f3fde8;">������Ϣ�������޸ģ�</td>
  </tr>
  <tr>
    <td width="100" height="25" align="center" valign="middle">�ϴ�����</td>
    <td width="100" align="center" valign="middle">&nbsp;<?php echo $arr[0]['upfile']; ?>&nbsp;ƪ</td>
    <td width="75" align="center" valign="middle">�ϴ�ͼƬ</td>
    <td width="125" align="center" valign="middle">&nbsp;<?php echo $arr[0]['uppics']; ?>&nbsp;��</td>
  </tr>
  <tr>
    <td width="100" height="25" align="center" valign="middle">�����</td>
    <td width="100" align="center" valign="middle">&nbsp;<?php echo $arr[0]['hitnum']; ?>&nbsp;��</td>
    <td width="75" align="center" valign="middle">����¼ʱ��</td>
    <td width="125" align="center" valign="middle">&nbsp;<?php echo $arr[0]['lasttime']; ?></td>
  </tr>
</table>
<p />
<table border="1" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td height="25" colspan="5" align="center" valign="middle"  style="background-color:#f3fde8;">������Ϣ�����޸ģ�</td>
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
    <td height="25" colspan="3" align="left" valign="middle">&nbsp;<?php echo $arr[0]['homepage']; ?></td>
	<td height="25" align="center" valign="middle"><button id="modper" class="btn" onclick="return modperson()">�޸�</button></td>
  </tr>
  <tr>
  	<td height="50" align="center" valign="middle">���ԣ�</td>
  	<td colspan="4" align="left" valign="middle">&nbsp;<?php echo $arr[0]['unwrite']; ?></td>
  </tr>
</table>
<?php
	}
?>
