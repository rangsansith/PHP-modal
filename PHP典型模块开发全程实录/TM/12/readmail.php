<?php
session_start();					//初始化SESSION变量
if(!isset($_SESSION['user'])){		//判断用户的权限
	echo "<script>alert('请不要非法登录本站！');history.back();</script>";
 	exit;
}
$mailid=$_GET['mailid'];			//获取超级链接传递的邮件ID值
include("mailclass.php");			//载入pop3类
$rec=new pop3($_SESSION['host'],110,10);	//实例化pop3类
$rec->open();								//连接邮件服务器
$rec->login(substr($_SESSION['user'],0,strpos($_SESSION['user'],'@')),$_SESSION['pass']);	//用户登录
$rec->stat();						//验证用户是否正确登录
$rec->listmail();					//读取邮件
$rec->getmail($mailid);				//根据超级链接传递的ID值，获取指定邮件的内容
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
    <td width="660" bgcolor="E9E8E8" valign="top"><table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="20" bgcolor="#66CCFF"><div align="center">查看邮件</div></td>
      </tr>
      <tr>
        <td height="241"  bgcolor="#66CCFF">
<table width="650" border="0" align="center" cellpadding="0" cellspacing="1">
	<tr>
    	<td width="152" height="25" bgcolor="#CCCCCC"><div align="center">发件人:</div></td>
        <td colspan="2" bgcolor="#E9E8E8"><div align="left">
<?php
for($j=0;$j<count($rec->head);$j++){ 
	if(substr($rec->head[$j],0,4)=="From"){
		echo substr(htmlspecialchars($rec->head[$j]),5,strlen(trim(htmlspecialchars($rec->head[$j])))-5)."<br>\n";
	}
}	
?>
		</div></td>
	</tr>
    <tr>
    	<td height="25" bgcolor="#CCCCCC"><div align="center">收件人:</div></td>
        <td height="20" colspan="2" bgcolor="#E9E8E8"><div align="left"><?php echo $_SESSION['user']; ?></div></td>
  	</tr>
    <tr>
    	<td height="25" bgcolor="#CCCCCC"><div align="center">邮件主题:</div></td>
        <td height="20" colspan="2" bgcolor="#E9E8E8"><div align="left">
<?php
for($j=0;$j<count($rec->head);$j++){
	if(substr($rec->head[$j],0,20)=="Subject: =?GB2312?Q?"){
		echo quoted_printable_decode(substr(htmlspecialchars($rec->head[$j]),20,strlen(trim(htmlspecialchars($rec->head[$j])))-22))."<br>\n";							
	}else if(substr($rec->head[$j],0,7)=="Subject"){
		echo base64_decode(substr(htmlspecialchars($rec->head[$j]),8,strlen(trim(htmlspecialchars($rec->head[$j])))-8))."<br>\n";
	}
}	
?>
		</div></td>
	</tr>
    <tr>
    	<td height="25" bgcolor="#CCCCCC"><div align="center">发件时间:</div></td>
        <td height="20" colspan="2" bgcolor="#E9E8E8"><div align="left">
<?php
for($j=0;$j<count($rec->head);$j++){ 
	if(substr($rec->head[$j],0,4)=="Date"){
		echo substr(htmlspecialchars($rec->head[$j]),5,strlen(trim(htmlspecialchars($rec->head[$j])))-10)."<br>\n";
	}
}	
?>
		</div></td>
	</tr>
    <tr>
    	<td height="25" bgcolor="#cccccc"><div align="center">邮件大小:</div></td>
        <td height="20" bgcolor="#E9E8E8"><div align="left">
<?php
			$size=$rec->mail_list[$mailid]['size'];
			if($size>=1024){
				echo ($size/1024)."M";
			}elseif($size>1024*1024){
				echo ($size/(1024*1024))."G";
			}elseif($size<1024){
				echo ($size)."KB";
			}
			if(isset($rec->body[6])){
				$file='';
 			 	$filename=substr(strrchr($rec->body[6],"="),1,200);
			 	for($i=0;$i<count($rec->body);$i++){
					if($i>7 && $i<count($rec->body)-2){
						$file.=base64_decode($rec->body[$i]);
					}
			 	}
			 	file_put_contents("file/".$filename,$file);
			 }
?>
		</div></td>
        <td height="20" bgcolor="#E9E8E8"><div align="center">
        	<input type="button" value="删除" class="buttoncss" onClick="javascript:window.location='deletemail.php?del=<?php echo $mailid;?>&filename=<?php echo $filename;?>'">
      	</div></td>
   	</tr>
<?php
	if(isset($rec->body[6])){
?>
    <tr>
    	<td height="25" bgcolor="#cccccc"><div align="center">附件:</div></td>
        <td width="352" height="20" bgcolor="#E9E8E8"><?php echo '<a href="down.php?filename='.$filename.'" target="_blank">'.$filename.'</a>'; ?>
		</td>
    	<td width="142" bgcolor="#E9E8E8">&nbsp;</td>
	</tr>
<?php
	}
?>
	<tr>
    	<td height="325" colspan="3" bgcolor="#E9E8E8" valign="top">
			<DIV style="BORDER-RIGHT: #aaaaaa 1px solid; BORDER-TOP: #aaaaaa 1px solid; OVERFLOW-Y: scroll; BORDER-LEFT: #aaaaaa 1px solid; WIDTH: 100%; SCROLLBAR-SHADOW-COLOR: #fcced9; SCROLLBAR-ARROW-COLOR: #fcced9; BORDER-BOTTOM: #aaaaaa 1px solid; SCROLLBAR-BASE-COLOR: #fcced9; HEIGHT: 325px; padding-left:5px; padding-right:5px; padding-top:5px; padding-bottom:5px;">
<?php
			if(isset($rec->body[6])){
				echo base64_decode($rec->body[3])."<br>";
			}else{
				if(substr($rec->body[1],0,1)!="="){
					echo base64_decode($rec->body[1]);
				}else{
					echo quoted_printable_decode($rec->body[1]);	
				}
			}
?>
		</div></td>
	</tr>
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
