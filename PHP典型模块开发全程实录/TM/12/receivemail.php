<?php
session_start();
if(!isset($_SESSION['user'])){
	echo "<script>alert('请不要非法登录本站！');history.back();</script>";
 	exit;
}                      //以上代码通过判断session变量user的值是否为空来判断用户是否非法登录
include("mailclass.php");                   //包含发邮件类
$rec=new pop3($_SESSION['host'],110,10);    //对邮件类实例化
$rec->open();                             	//调用邮件类的open()方法来与POP3服务器建立连接
//调用邮件类的login()方法来验证用户身份
$rec-> login(substr($_SESSION['user'],0,strpos($_SESSION['user'],'@')),$_SESSION['pass']);	
$rec->stat();                              	//调用邮件类的stat()方法来获得邮件总数和邮件总字节数
$rec->listmail();                           //调用邮件类的listmail()方法获得每个邮件的大小及序号
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>邮件收发系统</title>
<link rel="stylesheet" type="text/css" href="css/font.css">
</head>
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
    <td width="660" bgcolor="E9E8E8" valign="top">
<?php
if($rec->messages<=0){
?>
<table width="650" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
    	<td bgcolor="#66CCFF"><div align="center">您的收件箱内无邮件！</div></td>
	</tr>
</table>
<?php
}else{
?> 
<table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
    	<td height="20" bgcolor="#66CCFF"><div align="center">收件箱</div></td>
	</tr>
    <tr>
    	<td height="40"  bgcolor="#66CCFF">
<table width="650" height="40" border="0" cellpadding="0" cellspacing="1">
  	<tr> 
    	<td height="20" colspan="2" bgcolor="E9E8E8"><div align="center">主题</div></td>
        <td width="136" bgcolor="E9E8E8"><div align="center">发件人</div></td>
        <td width="183" bgcolor="E9E8E8"><div align="center">时间</div></td>
        <td width="95" bgcolor="E9E8E8"><div align="center">大小</div></td>
   	</tr>
<?php
	for($i=1;$i<=$rec->messages;$i++){ 
		$rec->getmail($i);
?> 
	<tr> 
		<td width="43" height="20" bgcolor="E9E8E8"><div align="center">
			<a href="deletemail.php?del=<?php echo $i;?>"><img src="images/drop.png" border="0"></a>  
		</div></td>
		<td width="187" bgcolor="E9E8E8"><div align="left">
			<a href="readmail.php?mailid=<?php echo $i;?>">
<?php
		for($j=0;$j<count($rec->head);$j++){ //通过循环提取所有保存在head数组中的邮件头的信息
			if(substr($rec->head[$j],0,20)=="Subject: =?GB2312?Q?"){	//获取邮件主题
				echo quoted_printable_decode(substr(htmlspecialchars($rec->head[$j]),20,strlen(trim(htmlspecialchars($rec->head[$j])))-22))."<br>\n";							
			}else if(substr($rec->head[$j],0,7)=="Subject"){	//去掉邮件主题的提示文字“Subject：”
				echo base64_decode(substr(htmlspecialchars($rec->head[$j]),8,strlen(trim(htmlspecialchars($rec->head[$j])))-8))."<br>\n";
			}
		}
?>
			</a>
    	</div></td>
        <td height="20" bgcolor="E9E8E8"><div align="center">
<?php
		for($j=0;$j<count($rec->head);$j++){ 
			if(substr($rec->head[$j],0,4)=="From"){	//获取发件人地址
				echo substr(htmlspecialchars($rec->head[$j]),5,strlen(trim(htmlspecialchars($rec->head[$j])))-5)."<br>\n";		//去掉发件人地址的提示文字“From:”
			}
		}	
?>
		</div></td>
        <td height="20" bgcolor="E9E8E8"><div align="center">
<?php
		for($j=0;$j<count($rec->head);$j++){
			if(substr($rec->head[$j],0,4)=="Date"){
				echo substr(htmlspecialchars($rec->head[$j]),5,strlen(trim(htmlspecialchars($rec->head[$j])))-10)."<br>\n";
			}
		}	
?>
		</div></td>
        <td height="20" bgcolor="E9E8E8"><div align="center">
<?php
			$size=$rec->mail_list[$i]['size'];
			if($size>=1024){
				echo substr(($size/1024),0,4)."M";	  
			}elseif($size>1024*1024){
				echo substr(($size/(1024*1024)),0,4)."G";
			}elseif($size<1024){
				echo ($size)."KB";
			}
?>
		</div></td>
	</tr>
<?php
		$rec->head=NULL;
	}
?>
</table>
		</td>
	</tr>
</table>      
<table width="650" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
  		<td width="114"></td>
        <td width="536"><div align="right">您的邮箱中共有邮件:&nbsp;<?php echo $rec->messages;?>&nbsp;封占用空间:
<?php
$totalsize=$rec->size;
if($totalsize>=1024){
	echo substr(($totalsize/1024),0,4)."M";
}elseif($totalsize>1024*1024){
	echo substr(($totalsize/(1024*1024)),0,4)."G";
}elseif($totalsize<1024){
	echo ($totalsize)."KB";
}
?>
		&nbsp;</div></td>
	</tr>
</table>
<?php
$rec->close();
}
?>
		</td>
  	</tr>
</table>
<?php
include("bottom.php");
?>