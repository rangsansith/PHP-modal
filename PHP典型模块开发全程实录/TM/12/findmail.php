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
<script language="javascript">
 function chkinput(form)
  {
    if(form.info.value=="")
	 {
	   alert("请输入发件人或邮件主题!");
	   form.info.select();
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
    <td width="660" height="20" valign="top" bgcolor="E9E8E8"><table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="20" bgcolor="#66CCFF"><div align="center">查找邮件</div></td>
      </tr>
      <tr>
        <td   bgcolor="#66CCFF"><table width="650" border="0" align="center" cellpadding="0" cellspacing="1">
          <tr>
            <td height="25" colspan="4" bgcolor="#E9E8E8"><div align="center">
<table width="650" height="25" border="0" cellpadding="0" cellspacing="0">
<form name="form1" method="post" action="<?php echo $PHP_SELF;?>" onSubmit="return chkinput(this)">
	<tr>
    	<td width="143"><div align="right">查找邮件:</div></td>
        <td width="92"><div align="center">
        	<select name="findtype" class="inputcss">
            	<option selected value=1>邮件主题</option>
                <option value=0>发件人</option>
          	</select>
       	</div></td>
        <td width="191"><div align="center">
			<input type="text" name="info" size="30" class="inputcss" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'">
		</div></td>
        <td width="224"><div align="left">
			&nbsp;&nbsp;<input type="submit" value="开始" class="buttoncss" name="submit">
		</div></td>
   	</tr>
</form>
</table>
		</div></td>
	</tr>	 
<?php
if(isset($_POST['submit'])){				//判断提交按钮值是否被设置
?>
	<tr>
    	<td width="188" height="20" bgcolor="#E9E8E8"><div align="center">主题</div></td>
        <td width="153" height="20" bgcolor="#E9E8E8"><div align="center">发件人</div></td>
        <td width="209" height="20" bgcolor="#E9E8E8"><div align="center">时间</div></td>
        <td width="97" height="20" bgcolor="#E9E8E8"><div align="center">大小</div></td>
   </tr>
<?php
include("mailclass.php");						//载入类文件
$rec=new pop3($_SESSION['host'],110,10);		//实例化类
$rec->open();									//连接服务器
$rec->login(substr($_SESSION['user'],0,strpos($_SESSION['user'],'@')),$_SESSION['pass']);	//用户登录
$rec->stat();									//调用POP3类的stat()方法取得总邮件数和总邮件大小
$rec->listmail();								//调用POP3类的listmail()方法取得每个邮件的大小及序号
if($_POST['findtype']==1){						//判断查询的类型，1表示根据邮件主题查询
	$sum=0; //用$sum记录查找到邮件的总个数
	for($i=1;$i<=$rec->messages;$i++){//通过循环遍历所有邮件
		$rec->getmail($i);  //取得第$i封邮件头及邮件内容
		for($j=0;$j<count($rec->head);$j++){ //通过循环获取邮件头所有内容
				if(substr($rec->head[$j],0,20)=="Subject: =?GB2312?Q?"){	//获取邮件主题
				$head1 = quoted_printable_decode(substr(htmlspecialchars($rec->head[$j]),20,strlen(trim(htmlspecialchars($rec->head[$j])))-22))."<br>\n";							
			}else if(substr($rec->head[$j],0,7)=="Subject"){	//去掉邮件主题的提示文字“Subject：”
				$head1 = base64_decode(substr(htmlspecialchars($rec->head[$j]),8,strlen(trim(htmlspecialchars($rec->head[$j])))-8))."<br>\n";
			}
		}
		
		
		
		
		if(preg_match("/$_POST[info]/i",trim($head1))){   //利用正则表达式进行匹配查找
			$sum++; //如果查找到匹配的主题，则使sum值加1
?>
	<tr>
    	<td height="20" bgcolor="#E9E8E8"><div align="left">
			<a href="readmail.php?mailid=<?php echo $i;?>">
<?php				
for($j=0;$j<count($rec->head);$j++){  //显示邮件主题
	if(substr($rec->head[$j],0,20)=="Subject: =?GB2312?Q?"){	//获取邮件主题
				echo quoted_printable_decode(substr(htmlspecialchars($rec->head[$j]),20,strlen(trim(htmlspecialchars($rec->head[$j])))-22))."<br>\n";							
			}else if(substr($rec->head[$j],0,7)=="Subject"){	//去掉邮件主题的提示文字“Subject：”
				echo base64_decode(substr(htmlspecialchars($rec->head[$j]),8,strlen(trim(htmlspecialchars($rec->head[$j])))-8))."<br>\n";
			}
}	
?>
			</a>
     	</div></td>
        <td height="20" bgcolor="#E9E8E8"><div align="center">
<?php
for($j=0;$j<count($rec->head);$j++){   //显示发件人地址
	if(substr($rec->head[$j],0,4)=="From"){
		echo substr(htmlspecialchars($rec->head[$j]),5,strlen(trim(htmlspecialchars($rec->head[$j])))-5)."<br>\n";
	}
}	
?>
		</div></td>
        <td height="20" bgcolor="#E9E8E8"><div align="center">
<?php
for($j=0;$j<count($rec->head);$j++){   //显示发件时间
	if(substr($rec->head[$j],0,4)=="Date"){
		echo substr(htmlspecialchars($rec->head[$j]),5,strlen(trim(htmlspecialchars($rec->head[$j])))-10)."<br>\n";
	}
}	
?>
		</div></td>
        <td height="20" bgcolor="#E9E8E8"><div align="center">
<?php				
			$size=$rec->mail_list[$i]['size'];  //显示邮件大小
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
		}
		$rec->head=NULL;
	}
	if($sum==0){  //如果$sum的值最终还为0，则说名没有查找到匹配的邮件主题，这时给出提示
?>
	<tr>
    	<td height="20" colspan="4" bgcolor="#E9E8E8"><div align="center">对不起,没有查找到您要找的邮件!</div></td>
  	</tr>
<?php  
	}   
}elseif($_POST['findtype']==0){ //如果$_POST['findtype']的值为0则按发件人地址进行查找
	$sum=0;
	for($i=1;$i<=$rec->messages;$i++){
		$rec->getmail($i);
		for($j=0;$j<count($rec->head);$j++){ 
			if(substr($rec->head[$j],0,4)=="From"){
				$head1=substr(htmlspecialchars($rec->head[$j]),5,strlen(trim(htmlspecialchars($rec->head[$j])))-5);
			}
		}	
		if(trim($head1)==trim($_POST['info'])){  
			$sum++;
?>
	<tr>
    	<td height="20" bgcolor="#E9E8E8"><div align="left"><a href="readmail.php?mailid=<?php echo $i;?>">
<?php
for($j=0;$j<count($rec->head);$j++){ 
	if(substr($rec->head[$j],0,7)=="Subject"){
		echo substr(htmlspecialchars($rec->head[$j]),8,strlen(trim(htmlspecialchars($rec->head[$j])))-8)."<br>\n";
	}
}	
?>
		</a></div></td>
       	<td height="20" bgcolor="#E9E8E8"><div align="center">
<?php
for($j=0;$j<count($rec->head);$j++){ 
	if(substr($rec->head[$j],0,4)=="From"){
		echo substr(htmlspecialchars($rec->head[$j]),5,strlen(trim(htmlspecialchars($rec->head[$j])))-5)."<br>\n";
	}
}	
?>
		</div></td>
        <td height="20" bgcolor="#E9E8E8"><div align="center">
<?php
for($j=0;$j<count($rec->head);$j++){ 
	if(substr($rec->head[$j],0,4)=="Date"){
		echo substr(htmlspecialchars($rec->head[$j]),5,strlen(trim(htmlspecialchars($rec->head[$j])))-10)."<br>\n";
	}
}	
?>
		</div></td>
        <td height="2" bgcolor="#E9E8E8"><div align="center">
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
		}
		$rec->head=NULL;
	}
	if($sum==0){
?>
	<tr>
    	<td height="20" colspan="4" bgcolor="#E9E8E8"><div align="center">对不起,没有查找到您要找的邮件!</div></td>
  	</tr>
<?php  
	}   
}
}
?>
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
