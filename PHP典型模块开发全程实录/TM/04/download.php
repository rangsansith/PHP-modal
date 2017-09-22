<?php
session_start();
include_once("config/config.php");
if(!empty($_POST["savepath"])){
$absopath=$_POST["savepath"];
$dir=$_GET["dir"];
$dwname=$_GET["filename"];
$file=$dir.$dwname;
$down=$absopath.$dwname;
if(ftp_get($link,$down,$file,FTP_BINARY)) {        //判断是否从FTP服务器中下载文件
    echo '<script>alert("文件'.$file.'\n下载成功！");window.close();</script>';
}else {
    echo '<script>alert("文件'.$file.'\n下载！");history.back();</script>';
}
ftp_close($link);  
}else{         
?>
<script src="js/check.js"></script>
<style type="text/css">
*{font-size:12px; text-align:center}
.ipt1{ border:1px solid #CCCCCC; wi;dth:120px; height:18px; line-height:16px; text-align:left;}
.btn{ border:1px solid #0099FF; background:#FFFFCC; color:#0033FF;}
</style>
<form id="download" action="#" method="post" onsubmit="return chkdown();">
<input id="down" class="ipt1" type="text" name="savepath" />
<p><span style=" color:#FF0000;">*请填写有效路径（如C:\Leon\Appserv\)</span></p>
<input class="btn" type="submit" value="下载" />&nbsp;&nbsp;<input class="btn" type="reset" value="重置" />
</form>
<?php } ?>