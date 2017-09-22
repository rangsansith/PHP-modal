<?php
	session_start();
	header('Content-Type:text/html;charset=gb2312');
?>
<table border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" colspan="2" align="center" valign="middle" style="background-color:#f3fde8;">Ìí¼ÓºÃÓÑ</td>
  </tr>
  <tr>
    <td height="25" align="center" valign="middle"><input type="text" name="frdname" id="frdname" class="txt">&nbsp;<button id="addfrdbtn" name="addfrdbtn" class="btn" onClick="return chkaddfrd('<?php echo $_SESSION['name']; ?>')">Ìí¼Ó</button></td>
  </tr>
</table>
