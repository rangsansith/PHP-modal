<?php

  include_once 'conn/conn.php';
  include_once '../config.php';
  if(!empty($_GET['uid']) and !is_null($_GET['uid'])){
	$sql = "select * from tb_member where name = '".$_GET['uid']."'";
	$arr = $conne->getRowsArray($sql);
	$conne->close_rst();
?>
	<div style=" width: 205px; height:24px; line-height: 24px; background-image:url(images/sbg.gif); background-position: top; background-repeat:no-repeat; text-align:left;"></div>
	<table width="205px" border="0" cellspacing="0" cellpadding="0" align="center" style=" border: 1px #d7e5e9 solid; background-color: #fcfdf8;">
  <tr>
    <td height="150" align="center" valign="middle"><img src="<?php echo ROOT.HEADGIF.$arr[0]['headgif']; ?>" border="1" width="100" height="120" /></td>
  </tr>
  <tr>
    <td height="25" align="center" valign="middle"><strong>博主：<?php echo $_GET['uid']; ?></strong></td>
  </tr>
  <tr>
    <td height="25" align="center" valign="middle">博客点击率：<?php echo $arr[0]['hitnum']; ?>&nbsp;次</td>
  </tr>
  <tr>
    <td height="25" align="center" valign="middle"><img align="middle" src="images/header12.gif" width="9" height="12" border="0"  />&nbsp;<a onclick="return addfrd('<?php echo $_GET['uid']; ?>') ">&nbsp;加为好友</a></td>
  </tr>
  <tr>`
    <td height="25" align="center" valign="middle"><img align="middle" src="images/header2.gif" border="0" width="11" height="12" />&nbsp;<a onclick="return sendscrip('<?php echo $_GET['uid']; ?>')">发送小纸条</a></td>
  </tr>
</table>
<?php
  }
?>