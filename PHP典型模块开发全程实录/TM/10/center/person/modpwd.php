<?php
	session_start();
	header('Content-Type:text/html;charset=gb2312');
?>
<table width="300" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="25" colspan="2" align="center" valign="middle">修改密码</td>
  </tr>
  <tr>
    <td width="100" height="25" align="right" valign="middle">原密码：</td>
    <td align="left" valign="middle">&nbsp;<input id="oldpwd" name="oldpwd" type="password" class="txt" /></td>
  </tr>
  <tr>
    <td width="100" height="25" align="right" valign="middle">新密码：</td>
    <td align="left" valign="middle">&nbsp;<input id="newpwd1" name="newpwd1" type="password" class="txt" /></td>
  </tr>
  <tr>
    <td width="100" height="25" align="right" valign="middle">确认密码：</td>
    <td align="left" valign="middle">&nbsp;<input id="newpwd2" name="newpwd2" type="password" class="txt" /></td>
  </tr>
  <tr>
    <td height="25" colspan="2" align="center" valign="middle">&nbsp;<button id="modpwdbtn" onClick="return entermodinfo()" class="btn">修改</button></td>
  </tr>
</table>
