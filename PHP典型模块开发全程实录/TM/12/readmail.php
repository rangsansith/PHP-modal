<?php
session_start();					//��ʼ��SESSION����
if(!isset($_SESSION['user'])){		//�ж��û���Ȩ��
	echo "<script>alert('�벻Ҫ�Ƿ���¼��վ��');history.back();</script>";
 	exit;
}
$mailid=$_GET['mailid'];			//��ȡ�������Ӵ��ݵ��ʼ�IDֵ
include("mailclass.php");			//����pop3��
$rec=new pop3($_SESSION['host'],110,10);	//ʵ����pop3��
$rec->open();								//�����ʼ�������
$rec->login(substr($_SESSION['user'],0,strpos($_SESSION['user'],'@')),$_SESSION['pass']);	//�û���¼
$rec->stat();						//��֤�û��Ƿ���ȷ��¼
$rec->listmail();					//��ȡ�ʼ�
$rec->getmail($mailid);				//���ݳ������Ӵ��ݵ�IDֵ����ȡָ���ʼ�������
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ʼ��շ�ϵͳ</title>
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
        <td height="20" bgcolor="#66CCFF"><div align="center">�鿴�ʼ�</div></td>
      </tr>
      <tr>
        <td height="241"  bgcolor="#66CCFF">
<table width="650" border="0" align="center" cellpadding="0" cellspacing="1">
	<tr>
    	<td width="152" height="25" bgcolor="#CCCCCC"><div align="center">������:</div></td>
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
    	<td height="25" bgcolor="#CCCCCC"><div align="center">�ռ���:</div></td>
        <td height="20" colspan="2" bgcolor="#E9E8E8"><div align="left"><?php echo $_SESSION['user']; ?></div></td>
  	</tr>
    <tr>
    	<td height="25" bgcolor="#CCCCCC"><div align="center">�ʼ�����:</div></td>
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
    	<td height="25" bgcolor="#CCCCCC"><div align="center">����ʱ��:</div></td>
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
    	<td height="25" bgcolor="#cccccc"><div align="center">�ʼ���С:</div></td>
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
        	<input type="button" value="ɾ��" class="buttoncss" onClick="javascript:window.location='deletemail.php?del=<?php echo $mailid;?>&filename=<?php echo $filename;?>'">
      	</div></td>
   	</tr>
<?php
	if(isset($rec->body[6])){
?>
    <tr>
    	<td height="25" bgcolor="#cccccc"><div align="center">����:</div></td>
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
