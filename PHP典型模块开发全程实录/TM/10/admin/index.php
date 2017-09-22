<?php
	session_start();
	$num="";
	for($i=0;$i<4;$i++){
		$num .= dechex(rand(0,15));
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>后台管理系统登录页面</title>
<script language="javascript" src="js/login.js"></script>
<script language="javascript" src="js/xmlhttprequest.js"></script>
<style type="text/css">
<!--
body,td,th {
	font-size: 12px;
}
body {
	margin-left: 12px;
	margin-top: 12px;
}
.txt {
	border: 1px #000000 solid;
	width:150px;
	height:18px;
}
.bnt {
	border: 1px #000000 solid;
	background-color:#ffffff;
	width:50px;
	height:20px;
}
-->
</style>
</head>
<body onload="javascript:loginform.manager.focus();">
<table width="351" height="196" border="0" align="center" cellpadding="0" cellspacing="0" background="images/login.jpg">
<form id="loginform" name="loginform" method="post" action="#" onkeydown="return enterlogin(loginform);">
  <tr>
    <td height="25" colspan="3" align="center" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td width="129" height="25" align="right" valign="middle">管理员帐号：</td>
    <td colspan="2" align="left" valign="middle">&nbsp;<input id="manager" name="manager" type="text" onMouseOver="this.style.backgroundColor=''" onMouseOut="this.style.backgroundColor='#FFEEBC'" class="txt" style=" background-color:#ffeebc;" /></td>
  </tr>
  <tr>
    <td width="129" height="25" align="right" valign="middle">管理员密码：</td>
    <td colspan="2" align="left" valign="middle">&nbsp;<input id="pwd" name="pwd" type="password" onMouseOver="this.style.backgroundColor=''" onMouseOut="this.style.backgroundColor='#FFEEBC'" class="txt" style=" background-color:#ffeebc;"  /></td>
  </tr>
  <tr>
   	<td width="129" height="30" align="right" valign="middle">验证码：</td>
    <td width="112" align="right" valign="middle"> <input id="chk" name="chk" type="text"onmouseover="this.style.backgroundColor=''" onmouseout="this.style.backgroundColor='#FFEEBC'" class="txt" style=" background-color:#ffeebc;width:100px;" /></td>
    <td width="110" align="center" valign="middle"><img src="inc/valcode.php?num=<?php echo $num; ?>" width="55" height="18" /></td>
  </tr>
  <tr>
    <td height="25" colspan="3" align="center" valign="middle"><input id="chknm" name="chknm" type="hidden" value="<?php echo $num; ?>"  /><input id="lgbt" name="lgbt" type="button" value="登录" class="bnt" onclick="return chklogin(loginform)" /></td>
  </tr>
  <tr>
  	<td colspan="3">&nbsp;</td>
  </tr>
</form>
</table>
</body>
</html>