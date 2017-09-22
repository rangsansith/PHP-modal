<?php
	session_start();
	header('Content-Type:text/html;charset=gb2312');
	include_once '../conn/conn.php';
	include_once '../inc/func.php';
	include_once '../../config.php';
?>
<script language="../js/xmlhttprequest.js"></script>
<script language="javascript">
function chkupfile(name){ 
	filepath = document.getElementById('uppath');
	if(filepath.value == ''){
		alert('请选择上传文件路径');
		return false;
	}
}
</script>
<body topmargin="0" leftmargin="0">
<?php
	$filepath = $_FILES['uppath'];
	if(!empty($filepath) and !is_null($filepath)){
		if(!in_array($filepath['type'],$picpostfix)){
?>
<script>alert('上传类型错误！');history.go(-1);</script>
<?php
		}else{
			if($filepath['size'] < MAXSIZEPIC){
				if($filepath[tmp_name]){					
					$filename = time().strrchr($filepath['name'],'.');
					move_uploaded_file($filepath[tmp_name], 'image/'.$filename);
					echo '<font color=green size=4>上传成功</font>';
?>
<script>
top.upfilepath.value = '<?php echo $filename; ?>';
</script>
<?php
				}
			}else{
?>
<script>alert('上传文件太大！');history.go(-1);</script>
<?php
			}
		}
	}else{
?>
<form id="upfm" name="upfm" method="post" action="#" enctype="multipart/form-data">
	<input id="uppath" name="uppath" type="file" class="txt" />&nbsp;<input type="submit" id="upbtn" name="upbtn" class="btn" value="上传" onClick="return chkupfile('<?php echo $_SESSION['name']; ?>') " />
</form>
<?php
	}
?>
</body>