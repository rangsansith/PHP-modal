<table width="800" height="93" border="0" align="center" cellpadding="0" cellspacing="0" background="images/top.jpg">
  <tr>
    <td width="274" rowspan="2">&nbsp;</td>
    <td height="25" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="353" height="68">&nbsp;</td>
    <td width="173" valign="bottom"  bordercolor=""><div align="center">
	<script language=JavaScript>
 today=new Date();
 function initArray(){
   this.length=initArray.arguments.length
   for(var i=0;i<this.length;i++)
   this[i+1]=initArray.arguments[i]  }
   var d=new initArray(
     " 星期日",
     " 星期一",
     " 星期二",
     " 星期三",
     " 星期四",
     " 星期五",
     " 星期六");
document.write(
     "<font color=#003399 style='font-size:9pt;font-family: 宋体'> ",
     today.getYear(),"年",
     today.getMonth()+1,"月",
     today.getDate(),"日",
     d[today.getDay()+1],
     "</font>" ); 
</script>
	</div></td>
  </tr>
</table>
