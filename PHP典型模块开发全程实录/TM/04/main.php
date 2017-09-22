<?php
header("Content-type:text/html;charset=gb2312");
session_start();
include_once("config/config.php");
if(isset($_GET['dir'])){
	ftp_chdir($link, $_GET['dir']);
}
if(isset($_GET['up'])){
	ftp_cdup($link);
}
if(isset($_GET['down'])){
	ftp_get($link, $_GET['down'], $_GET['down'], FTP_BINARY);
}



$dirname = ftp_pwd($link);
if($dirname != '/'){
	$dirname .= '/';
}
$sfile = ftp_nlist($link, $dirname);
if(!$sfile){
	$sfile = array();
}
$flist = ftp_rawlist($link, $dirname);
$sdir = array();
foreach($flist as $value){
	$array = explode(' ', rtrim($value));
	$alen = count($array);
	$p = substr($array[0], 0, 1);
	if($p == 'd'){
		if($array[$alen-1] != '.' && $array[$alen-1] != '..'){
			$sdir[] = $array[$alen-1];
		}
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><br />
<link rel="stylesheet" type="text/css" href="css/main.css">
<script src="js/XmlHttpRequest.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>FTP管理系统</title>
</head>
<body>
   <div class="content">
      <div class="header"><img src="images/banner.gif" width="998" height="80" /></div>
	  <div class="mainbody">
        <div class="navigation">
          <table border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="180" align="center"><?php
				   $type = ftp_systype($link);                         //获取远程服务器的系统类型
                   echo "ftp服务器的操作系统是 $type";                 //输出远程服务器的系统类型
				?>
              </td>
              <td width="180" align="center"> 当前时间：<?php echo date("Y年m月d日")?> </td>
              <td width="200" align="right">>></td>
              <td width="120" align="center"><!--<a href="mkdir.php" target="_blank">创建目录</a>-->
                  <input name="button" type="button"  class="btn1" onclick="javascript:Wopen=open('mkdir.php','','height=220,width=350,scrollbars=no');"  value=""/>
                  <form id="form1" action="#" method="get">
                    <div id="createDirectory" style="display:"></div>
                  </form></td>
              <td width="120" align="center"><!--<a href="upfile.php" target="_blank">上传文件</a>-->
                  <input name="button2" type="button"  class="btn2" onclick="javascript:Wopen=open('upfile.php','','height=220,width=350,scrollbars=no');"  value=""/>
              </td>
            </tr>
          </table>
        </div>
	    <div class="mainleft">
          <table border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="200" height="30" align="center" class="STYLE1" colspan="4" background="images/bg2.gif"><a href="main.php?up=up&dir=<?php echo $dirname; ?>">返回上级目录</a></td>
            </tr>
            <?php
             foreach($sdir as $value)
			 
               echo'<tr>
			     <td height="10" width="30">&nbsp;&nbsp;</td>
                 <td height="25" width="75" align="center" class="STYLE1"><a href="main.php?dir='.$dirname.$value.'">'.substr($value,0,12).'</a> </td>
				 <td width=50><a href="rmkdir.php?dir='.$dirname.$value.'">删除</a></td>
				 <td height="5" width="30">&nbsp;&nbsp;</td>
                   </tr>';
            ?>
          </table>
        </div>
	    <div class="mainright">
          <div class="mainrightcontent">
            <?php 
			if(empty($_GET["dir"])){
			?>
           <center><img src="images/imgback.jpg" /></center>
            <?php
			}else{
			?>
            <div style=" margin:10px auto;text-align:left; text-indent:24px;"> 当前目录：<?php echo $dirname; ?> </div>
            <table border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#BAE8BC">
              <tr>
                <td height="35"  colspan="6" bgcolor="#FFFFFF"><div style=" margin:auto 20px;text-align:right;" >
                  <!--<a href="path_mkdir.php?dir=<?php echo $dirname; ?>" target="_blank">创建目录</a>-->
                <input type="button" value="" class="btn3" onclick="javascript:Wopen=open('path_mkdir.php?dir=<?php echo $dirname; ?>','','height=220,width=350,scrollbars=no');"> <input type="button" class="btn4" onclick="javascript:Wopen=open('path_upload.php?dir=<?php echo $dirname; ?>','','height=220,width=350,scrollbars=no');"></div></td>
              </tr>
              <tr>
                <td height="28" align="center" bgcolor="#FFFFFF">文件名称</td>
                <td align="center" bgcolor="#FFFFFF">文件大小</td>
                <td align="center" bgcolor="#FFFFFF">最后修改时间</td>
                <td align="center" bgcolor="#FFFFFF">更改名称</td>
                <td align="center" bgcolor="#FFFFFF">删除文件</td>
                <td align="center" bgcolor="#FFFFFF">移动文件</td>
              </tr>
              <?php
			   //<td height="30" align="left" width="200"><a href="'.$dirname.$value.'>'.$value.'</a>"</td>
                foreach($sfile as $value){
				?>
              <tr>
                <td width="250" height="30" align="center" bgcolor="#FFFFFF"><a href="#" onclick="javascript:Wopen=open('download.php?dir=<?php echo $dirname; ?>&filename=<?php echo $value;?>','','height=220,width=350,scrollbars=no');"><?php echo $value; ?></a></td>
                <td width="70" height="30" align="center" bgcolor="#FFFFFF"><?php echo round(ftp_size($link,$value)/1024,2);?> K</td>
                <td width="200" height="30" align="center" bgcolor="#FFFFFF"><?php echo date('Y-m-d H:i:s',ftp_mdtm($link,$value)); ?></td>
				<td width="60" height="30" align="center" bgcolor="#FFFFFF"><a href="#" onclick="javascript:Wopen=open('edit.php?file=<?php echo $value; ?>&dir=<?php echo $dirname; ?>','','height=220,width=350,scrollbars=no'); ">更改</a></td>
                <td width="60" height="30" align="center" bgcolor="#FFFFFF"><a href="removefile.php?file=<?php echo $value; ?>&dir=<?php echo $dirname;?>">删除</a></td>
                <td width="60" height="30" align="center" bgcolor="#FFFFFF"><a href="#" onclick="javascript:Wopen=open('movefile.php?dir=<?php echo $dirname; ?>&filename=<?php echo $value;?>','','height=220,width=350,scrollbars=no');">移动</a></td>
              </tr>
              <?php  
			       } 
             ?>
            </table>
            <div style="height:12px; margin:2px;"></div>
            <?php } ?>
          </div>
        </div>
     </div>
	  <div class="footer">
	    <table>
		 <tr><td height="2"></td></tr>
		  <tr>
		    <td>
	          CopyRight &copy;2011
			 </td>
		  </tr>
		 <tr><td headers="5"></td></tr>
		</table>
	  </div>
   </div>

</body>
</html>