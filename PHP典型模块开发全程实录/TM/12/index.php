<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>邮件收发系统</title>
<link rel="stylesheet" type="text/css" href="css/font.css">
</head>
<script language="javascript">
 function chkinput(form)
  {
    if(form.servername.value=="")
	 {
	   alert("请输入服务器名称！");
	   form.servername.select();
	   return(false);
	 }
	 if(form.mailname.value=="")
	 {
	   alert("请输入邮箱名称！");
	   form.mailname.select();
	   return(false);
	 }
	 if(form.mailname.value.indexOf('@')<0)
	 {
	   alert("请输入正确的邮箱名称！");
	   form.mailname.select();
	   return(false);
	 }
	 if(form.mailpwd.value=="")
	 {
	   alert("请输入邮箱密码！");
	   form.mailpwd.select();
	   return(false);
	 }
	 return(true);
  
  }

</script>
<body leftmargin="0" topmargin="0" bottommargin="0" class="scrollbar">
<table width="200" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td height="143">&nbsp;</td>
  </tr>
</table>
<table width="381" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td  width="450" height="136" colspan="2"><img src="images/back_image_1.gif" width="450" height="136"></td>
  </tr>
  <tr>
    <td width="234" height="92"><img src="images/back_image_2.gif" width="234" height="92"></td>
    <td width="216" height="92" background="images/back_image_3.gif">
	<table width="216" height="90" border="0" align="center" cellpadding="0" cellspacing="0">
	 <form name="form1" method="post" action="chklogin.php" onSubmit="return chkinput(this)">
      <tr>
        <td width="61" height="22"><div align="center">服务器：</div></td>
        <td width="155"><div align="left"><input type="text" name="servername" class="inputcss" size="20" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'"></div></td>
      </tr>
      <tr>
        <td height="22"><div align="center">邮&nbsp;&nbsp;箱：</div></td>
        <td height="22"><div align="left"><input type="text" name="mailname" class="inputcss" size="20" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'"></div></td>
      </tr>
      <tr>
        <td height="22"><div align="center">密&nbsp;&nbsp;码：</div></td>
        <td height="22"><div align="left"><input type="password" name="mailpwd" class="inputcss" size="20" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'"></div></td>
      </tr>
      <tr>
        <td height="22" colspan="2"><div align="center"><input type="submit" value="登录" class="buttoncss">&nbsp;<input type="reset" value="重置" class="buttoncss"></div></td>
      </tr>
	  </form>
    </table></td>
  </tr>
  <tr>
    <td width="450" height="52" colspan="2" background="images/back_image_4.gif"><div align="center">版权所有&nbsp;<a href="http://www.mingrisoft.com">吉林省明日科技有限公司 </a><br>
        <br></div></td>
  </tr>
</table>
</body>
</html>
