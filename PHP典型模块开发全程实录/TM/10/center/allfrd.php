<?php

	include_once 'conn/conn.php';
	$sql = "select frdname from tb_frd where frdmem = '".$_GET['uid']."'";
	$namearr = $conne->getRowsArray($sql);

?>
<div style=" width:204px; height:20px; text-align:left; background-image:url(images/bbg.gif); background-position:left; background-repeat:repeat-x; text-indent: 8px; padding:2px;"><img src="images/header9.gif" border="0" width="11" height="12" />&nbsp;<a onclick='javascript:open("center.php?act=frd&uid=<?php echo $_GET['uid'] ?>","_parent","",false)'>好友链接</a></div>
<ul style="list-style-type: none;">
<?php
if($namearr != ""){

			$selectsql = "select name,blogname from tb_member where name = '".$namearr[0]['frdname']."'";
			$arr = $conne->getRowsArray($selectsql);
	foreach($arr as $value){
?>
<li style="text-align:left; height:25px; line-height:25px;"><img src="images/header6.gif" width="5" height="5" border="0" />&nbsp;
<a href="center.php?uid=<?php echo $arr[1]['name']; ?>" target="_blank"><?php echo $arr[1]['blogname']; ?></a></li>

<?php
	}
}else{
?>
<li style=" text-align:left; height:25px; line-height:25px;">还没有添加好友</li>
<?php
}
$conne->close_rst();
?>
</ul>