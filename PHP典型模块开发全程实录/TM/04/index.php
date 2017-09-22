<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>FTP管理</title>
<style type="text/css">
<!--
.STYLE1 {
	font-size: 12px;
	color: #000000;
}
body{
	text-align:center;
	background-color: #ffffff;
}
-->
</style>
<script src="js/check.js"></script>
</head>
<body>
<table width="448" height="287" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td background="images/img.jpg"><table width="200" height="22" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table>
      <table width="100%" height="145" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="45%">&nbsp;</td>
        <td width="55%" class="STYLE1">
		  <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <form id="login" name="login" method="post" action="main.php" onsubmit="return chklogin();"><tr>
              <td height="30" align="left">IP地址：
                <input type="text" name="ip" id="ip" /></td>
            </tr>
            <tr>
              <td height="30" align="left">用户名：
                <input type="text" name="username" id="username" /></td>
            </tr>
            <tr>
              <td height="30" align="left">密&nbsp; 码：
                <input type="password" name="password" id="password"/></td>
            </tr>
            <tr>
              <td height="30" align="center"><input type="submit" name="login" value="登录" /></td>
            </tr></form>
          </table>
		  </td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
