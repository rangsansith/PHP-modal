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
<title>FTP����ϵͳ</title>
</head>
<body>
   <div class="content">
      <div class="header"><img src="images/banner.gif" width="998" height="80" /></div>
	  <div class="mainbody">
        <div class="navigation">
          <table border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="180" align="center"><?php
				   $type = ftp_systype($link);                         //��ȡԶ�̷�������ϵͳ����
                   echo "ftp�������Ĳ���ϵͳ�� $type";                 //���Զ�̷�������ϵͳ����
				?>
              </td>
              <td width="180" align="center"> ��ǰʱ�䣺<?php echo date("Y��m��d��")?> </td>
              <td width="200" align="right">>></td>
              <td width="120" align="center"><!--<a href="mkdir.php" target="_blank">����Ŀ¼</a>-->
                  <input name="button" type="button"  class="btn1" onclick="javascript:Wopen=open('mkdir.php','','height=220,width=350,scrollbars=no');"  value=""/>
                  <form id="form1" action="#" method="get">
                    <div id="createDirectory" style="display:"></div>
                  </form></td>
              <td width="120" align="center"><!--<a href="upfile.php" target="_blank">�ϴ��ļ�</a>-->
                  <input name="button2" type="button"  class="btn2" onclick="javascript:Wopen=open('upfile.php','','height=220,width=350,scrollbars=no');"  value=""/>
              </td>
            </tr>
          </table>
        </div>
	    <div class="mainleft">
          <table border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="200" height="30" align="center" class="STYLE1" colspan="4" background="images/bg2.gif"><a href="main.php?up=up&dir=<?php echo $dirname; ?>">�����ϼ�Ŀ¼</a></td>
            </tr>
            <?php
             foreach($sdir as $value)
			 
               echo'<tr>
			     <td height="10" width="30">&nbsp;&nbsp;</td>
                 <td height="25" width="75" align="center" class="STYLE1"><a href="main.php?dir='.$dirname.$value.'">'.substr($value,0,12).'</a> </td>
				 <td width=50><a href="rmkdir.php?dir='.$dirname.$value.'">ɾ��</a></td>
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
            <div style=" margin:10px auto;text-align:left; text-indent:24px;"> ��ǰĿ¼��<?php echo $dirname; ?> </div>
            <table border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#BAE8BC">
              <tr>
                <td height="35"  colspan="6" bgcolor="#FFFFFF"><div style=" margin:auto 20px;text-align:right;" >
                  <!--<a href="path_mkdir.php?dir=<?php echo $dirname; ?>" target="_blank">����Ŀ¼</a>-->
                <input type="button" value="" class="btn3" onclick="javascript:Wopen=open('path_mkdir.php?dir=<?php echo $dirname; ?>','','height=220,width=350,scrollbars=no');"> <input type="button" class="btn4" onclick="javascript:Wopen=open('path_upload.php?dir=<?php echo $dirname; ?>','','height=220,width=350,scrollbars=no');"></div></td>
              </tr>
              <tr>
                <td height="28" align="center" bgcolor="#FFFFFF">�ļ�����</td>
                <td align="center" bgcolor="#FFFFFF">�ļ���С</td>
                <td align="center" bgcolor="#FFFFFF">����޸�ʱ��</td>
                <td align="center" bgcolor="#FFFFFF">��������</td>
                <td align="center" bgcolor="#FFFFFF">ɾ���ļ�</td>
                <td align="center" bgcolor="#FFFFFF">�ƶ��ļ�</td>
              </tr>
              <?php
			   //<td height="30" align="left" width="200"><a href="'.$dirname.$value.'>'.$value.'</a>"</td>
                foreach($sfile as $value){
				?>
              <tr>
                <td width="250" height="30" align="center" bgcolor="#FFFFFF"><a href="#" onclick="javascript:Wopen=open('download.php?dir=<?php echo $dirname; ?>&filename=<?php echo $value;?>','','height=220,width=350,scrollbars=no');"><?php echo $value; ?></a></td>
                <td width="70" height="30" align="center" bgcolor="#FFFFFF"><?php echo round(ftp_size($link,$value)/1024,2);?> K</td>
                <td width="200" height="30" align="center" bgcolor="#FFFFFF"><?php echo date('Y-m-d H:i:s',ftp_mdtm($link,$value)); ?></td>
				<td width="60" height="30" align="center" bgcolor="#FFFFFF"><a href="#" onclick="javascript:Wopen=open('edit.php?file=<?php echo $value; ?>&dir=<?php echo $dirname; ?>','','height=220,width=350,scrollbars=no'); ">����</a></td>
                <td width="60" height="30" align="center" bgcolor="#FFFFFF"><a href="removefile.php?file=<?php echo $value; ?>&dir=<?php echo $dirname;?>">ɾ��</a></td>
                <td width="60" height="30" align="center" bgcolor="#FFFFFF"><a href="#" onclick="javascript:Wopen=open('movefile.php?dir=<?php echo $dirname; ?>&filename=<?php echo $value;?>','','height=220,width=350,scrollbars=no');">�ƶ�</a></td>
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