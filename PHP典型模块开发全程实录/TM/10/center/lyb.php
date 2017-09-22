<?php
session_start();
if(isset($_GET['act']) and $_GET['act'] == 'lyb'){
	include_once 'conn/conn.php';
	$cont = $_GET['cont'];
	$uid = $_GET['uid'];
	if(isset($_SESSION['name'])){
		$name=$_SESSION['name'];
	}else{
		$name="匿名";
	}
	$reback = '0';
	$sql = "insert into tb_mess(messer,content,messered) values('".$name."','".$cont."','".$uid."')";
	$num = $conne->uidRst($sql);
	if($num == 1){
		$reback = '1';
	}else{
		$reback = '2';
	}
	echo $reback;
}else{
?>
<table width="300" border="0" cellpadding="0" cellspacing="0" align="center">
	<tr>
		<td height="25" align="center" valign="middle">给我留言(如果没有登录，则显示“匿名”留言)</td>
	</tr>
	<tr>
		<td align="center" valign="middle"><textarea id="wordcont" name="wordcont" rows="5" cols="40"></textarea></td>
	</tr>
	
	<tr>
		<td height="25" align="center" valign="middle"><button id="levelword" onClick="return jslevelword('<?php echo $_GET['uid']; ?>')" class="btn">留言</button></td>
	</tr>
</table>
<?php
	}
?>