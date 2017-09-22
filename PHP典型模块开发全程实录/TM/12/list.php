<?php
session_start();
if(!isset($_SESSION['user'])){
 echo "<script>alert('请不要非法登录本站！');history.back();</script>";
 exit;
}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>邮件收发系统</title>
<link rel="stylesheet" type="text/css" href="css/font.css">
</head>
<script language="JavaScript">
 function chkinput(form)
  {
    if(form.mailfrom.value=="")
	 {
	   alert("请输入发件人地址!");
	   form.mailfrom.select();
	   return(false);
	 }
    if(form.mailto.value=="")
	 {
	   alert("请输入收件人地址!");
	   form.mailto.select();
	   return(false);
	 }
     if(form.mailsubject.value=="")
	 {
	   alert("请输入邮件主题!");
	   form.mailsubject.select();
	   return(false);
	 }
    if(form.mailbody.value=="")
	 {
	   alert("请输入邮件内容!");
	   form.mailbody.select();
	   return(false);
	 }
	 if(form.mailfrom.value.indexOf('@')<0)
	 {
	   alert("发件人E-mail格式输入错误!");
	   form.mailfrom.select();
	   return(false);
	 }
	 if(form.mailto.value.indexOf('@')<0)
	 {
	   alert("收件人E-mail格式输入错误!");
	   form.mailto.select();
	   return(false);
	 }
	 if((form.mailcc.value!="")&&(form.mailcc.value.indexOf('@')<0))
	 {
	   alert("抄送人E-mail格式输入错误!");
	   form.mailcc.select();
	   return(false);
	 }
	if((form.mailbcc.value!="")&&(form.mailbcc.value.indexOf('@')<0))
	 {
	   alert("密送人E-mail格式输入错误!");
	   form.mailbcc.select();
	   return(false);
	 }
	 return(true);
  }

</script>
<body topmargin="0" leftmargin="0" bottommargin="0" class="scrollbar">
<?php
  include("top.php");
?>
<table width="800"  border="00" align="center" cellpadding="0" cellspacing="0">
  
  <tr>
    <td width="140" height="480" valign="top" bgcolor="#0099CC">
	<?php
	include("left.php");
	?>
	</td>
    <td width="660" bgcolor="E9E8E8" valign="top"><table width="660" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="712" height="20" bgcolor="#66CCFF"><div align="center">发件箱</div></td>
      </tr>
      <tr>
        <td  bgcolor="#66CCFF">
		<table width="660" border="0" align="center" cellpadding="0" cellspacing="1">
		<form name="form1" method="post" action="sendmail.php" enctype="multipart/form-data" onSubmit="return chkinput(this)">
          <tr>
            <td width="98" height="25" bgcolor="#cccccc"><div align="center">发件人：</div></td>
            <td width="559" bgcolor="#E9E8E8"><div align="left"><input type="text" name="mailfrom" size="70" class="inputcss" value="<?php echo $_SESSION['user'];?>" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'"></div></td>
          </tr>
          <tr>
            <td height="25" bgcolor="#CCCCCC"><div align="center">收件人：</div></td>
            <td height="25" bgcolor="#E9E8E8"><div align="left"><input type="text" name="mailto" size="70" class="inputcss" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'"></div></td>
          </tr>
          <tr>
            <td height="25" bgcolor="#CCCCCC"><div align="center">抄送：</div></td>
            <td height="25" bgcolor="#E9E8E8"><div align="left"><input type="text" name="mailcc" size="70" class="inputcss" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'"></div></td>
          </tr>
          <tr>
            <td height="25" bgcolor="#CCCCCC"><div align="center">密送：</div></td>
            <td height="25" bgcolor="#E9E8E8"><div align="left"><input type="text" name="mailbcc" size="70" class="inputcss" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'"></div></td>
          </tr>
          <tr>
            <td height="25" bgcolor="#CCCCCC"><div align="center">主题：</div></td>
            <td height="25" bgcolor="#E9E8E8"><div align="left"><input type="text" name="mailsubject" size="70" class="inputcss" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'"></div></td>
          </tr>
         <tr>
            <td height="25" bgcolor="#CCCCCC"><div align="center">附件</div></td>
            <td height="25" bgcolor="#E9E8E8"><div align="left"><input type="file" name="upload_file" size="40" class="inputcss" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'"></div></td>
          </tr>
                <tr>
            <td height="25" bgcolor="#CCCCCC"><div align="center">内容：</div></td>
            <td height="25" bgcolor="#E9E8E8"><div align="left">
              <textarea name="mailbody" class="inputcss" rows="20" cols="70"></textarea>
             </div></td>
          </tr>
          <tr>
            <td height="30" colspan="2" bgcolor="#E9E8E8"><div align="left"></div></td>
          </tr>
          <tr>
            <td height="25" colspan="2" bgcolor="#E9E8E8"><div align="center"><input type="submit" value="发送" class="buttoncss">&nbsp;&nbsp;<input type="reset" value="重置" class="buttoncss"></div></td>
          </tr>
		  </form>
        </table>
		</td>
      </tr>
    </table>      
  </td>
  </tr>
</table>
<?php
 include("bottom.php");
?>
