<?php
  session_start();
  header('Content-Type:text/html;charset=gb2312');
  include_once 'conn/conn.php';
  if(!empty($_GET['uid']) and !is_null($_GET['uid'])){
	$sql = "select * from tb_mess where messered = '".$_GET['uid']."' order by id desc limit 10";
	$arr = $conne->getRowsArray($sql);
	$conne->close_rst();
?>
<table width="150" border="0" cellspacing="0" cellpadding="0">

<tr>
    <td height="15" align="center" valign="middle">&nbsp;</td>
  </tr>
<tr>
    <td height="25" align="center" valign="middle">&nbsp;留言列表</td>
  </tr>
<?php
	if($arr != ''){ 
		foreach($arr as $value){
?>
  <tr>
    <td height="25" align="left" valign="middle">&nbsp;网友
	<?php
	 echo ($value['messer'] == '匿名')?$value['messer']:'<a onclick="javascript:open(\'?uid='.$value['messer'].'\',\'_parent\',\'\',false)">'.$value['messer'].'</a>';?>
	说：<?php echo $value['content'];  ?></td>
  </tr>
  <tr>
	<td height="15">&nbsp;</td>
  </tr>
<?php
		}
	}else{
?>
	<tr>
		<td height="25" align="left" valign="middle">暂时没有留言</td>
	</tr>
	<tr>
	<td height="15">&nbsp;</td>
  </tr>
<?php
	}
  }
?>
</table>
