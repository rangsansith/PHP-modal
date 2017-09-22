<?php

	include_once 'conn/conn.php';
	include_once '../config.php';
	$uid= $_GET['uid'];
	if(!empty($uid) and !is_null($uid)){
		$sql = "select * from tb_member where name = '".$uid."'";
		$arr = $conne->getRowsArray($sql);	
?>
<div style=" background-image:url(images/header10.gif); background-position:left; background-repeat: no-repeat; height:25px; text-align:left; line-height: 25px; text-indent: 8px; border-bottom: 1px #CCCCCC dashed; color:#f79100;">&nbsp;我的资料</div>
<p />
<table border="0" cellspacing="0" cellpadding="0" align="center" style=" border: 1px #D1D1D1 solid;">
  <tr>
    <td width="106" height="25" align="center" valign="middle"  style=" border: 1px #D1D1D1 solid;">id</td>
    <td width="59" height="25" align="left" valign="middle"  style=" border: 1px #D1D1D1 solid;">&nbsp;<?php echo $arr[0]['id']; ?></td>
    <td width="62" height="25" align="center" valign="middle"  style=" border: 1px #D1D1D1 solid;">Email</td>
    <td width="197" height="25" align="left" valign="middle"  style=" border: 1px #D1D1D1 solid;">&nbsp;<?php echo $arr[0]['email']; ?></p>
    </td>
    <td width="91" rowspan="4" align="center" valign="middle"  style=" border: 1px #D1D1D1 solid;">&nbsp;<img src="<?php echo ROOT.HEADGIF.$arr[0]['headgif']; ?>" border="0" width="60" height="60"></td>
  </tr>
  <tr>
    <td height="25" align="center" valign="middle"  style=" border: 1px #D1D1D1 solid;">性别</td>
    <td height="25" align="left" valign="middle"  style=" border: 1px #D1D1D1 solid;">&nbsp;<?php echo $arr[0]['sex']; ?></td>
    <td height="25" align="center" valign="middle"  style=" border: 1px #D1D1D1 solid;">生日</td>
    <td height="25" align="left" valign="middle"  style=" border: 1px #D1D1D1 solid;">&nbsp;<?php echo $arr[0]['birthday']; ?></td>
  </tr>
  <tr>
    <td height="25" align="center" valign="middle"  style=" border: 1px #D1D1D1 solid;">真实姓名</td>
    <td height="25" align="left" valign="middle"  style=" border: 1px #D1D1D1 solid;">&nbsp;<?php echo $arr[0]['realname']; ?></td>
    <td height="25" align="center" valign="middle"  style=" border: 1px #D1D1D1 solid;">QQ</td>
    <td height="25" align="left" valign="middle"  style=" border: 1px #D1D1D1 solid;">&nbsp;<?php echo $arr[0]['qq']; ?></td>
  </tr>
  <tr>
    <td height="25" align="center" valign="middle"  style=" border: 1px #D1D1D1 solid;">账号</td>
    <td height="25" align="left" valign="middle"  style=" border: 1px #D1D1D1 solid;">&nbsp;<?php echo $arr[0]['name']; ?></td>
    <td height="25" align="center" valign="middle"  style=" border: 1px #D1D1D1 solid;">联系地址</td>
    <td height="25" align="left" valign="middle"  style=" border: 1px #D1D1D1 solid;">&nbsp;<?php echo $arr[0]['address']; ?></td>
  </tr>
  <tr>
    <td height="25" align="center" valign="middle"  style=" border: 1px #D1D1D1 solid;">个人主页</td>
    <td height="25" colspan="3" align="left" valign="middle"  style=" border: 1px #D1D1D1 solid;">&nbsp;<?php echo $arr[0]['homepage']; ?></td>
	<td height="25" align="center" valign="middle"  style=" border: 1px #D1D1D1 solid;">&nbsp;</td>
  </tr>
  <tr>
  	<td height="50" align="center" valign="middle"  style=" border: 1px #D1D1D1 solid;">格言：</td>
  	<td colspan="4" align="left" valign="middle"  style=" border: 1px #D1D1D1 solid;">&nbsp;<?php echo $arr[0]['unwrite']; ?></td>
  </tr>
</table>
<?php
	}
?>
