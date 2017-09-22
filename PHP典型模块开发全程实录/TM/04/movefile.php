<?php
session_start();
include_once("config/config.php");
$filename=$_GET['dir'].$_GET['filename'];
$fname=$_GET["filename"];
if(empty($_POST['movepath'])){
?>
<form id="movefile" action="#" method="post" onSubmit="return chkpath();">
将<?php echo $filename; ?>移动到：
<p>
  <center>
    <input class="inpt1" id="path" type="text" name="movepath">
  </center>
<p>
  <center>
    <span class="notice">*请填写正确的路径。"如/Appserv/"</span>
  </center>
<p>
  <center>
    <input class="btn2" type="submit" value="移动文件">
  </center>
</form>
<?php 
}else{	
	$newpath=$_POST["movepath"].$fname;              	//如果存在则执行移动操作
	if(ftp_put($link,$newpath,'E:/wamp/www/'.$filename,FTP_BINARY)){    	//将文件移动到指定文件目录
		ftp_delete($link, $filename);					//删除原来位置的文件
	    echo '<script>alert("移动'.$file.'\n到'.$_POST['movepath'].'成功！");window.close();</script>';
	}else{                                          	//提示移动成功
	    echo '<script>alert("移动'.$file.'\n到'.$_POST['movepath'].'失败！");history.back();</script>';
	}                                               	//提示移动失败
	ftp_close($link);                                  	//关闭FTP连接*/
}
?>
<link href="css/mkdir.css" type="text/css" rel="stylesheet" />
<script src="js/check.js"></script>
