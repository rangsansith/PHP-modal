<?php

  include_once 'conn/conn.php';
  if(!empty($_GET['uid']) and !is_null($_GET['uid'])){
	$sql = "select * from tb_mess where messered = '".$_GET['uid']."' order by id desc limit 10";
	$arr = $conne->getRowsArray($sql);
	$conne->close_rst();
?>
<table width="205px" border="0" cellspacing="0" cellpadding="0">

<tr>
    <td height="15" align="center" valign="middle">&nbsp;</td>
  </tr>
<tr>
    <td height="25" align="left" valign="middle" style=" text-indent: 8px; color:#f79100; font-weight:bolder; "><img src="images/header4.gif" border="0" width="13" height="14" />&nbsp;留言列表</td>
  </tr>
<?php
	if(count($arr)>1){ 
		foreach($arr as $value){
?>
  <tr>
    <td height="25" align="left" valign="middle">&nbsp;<font color="#cef490">&rarr;</font>&nbsp;网友
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
