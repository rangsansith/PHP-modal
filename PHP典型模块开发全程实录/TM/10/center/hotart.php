<?php

  include_once 'conn/conn.php';
  if(!empty($_GET['uid']) and !is_null($_GET['uid'])){
  	$conne->close_rst();
	$sql = "select * from tb_article where author = '".$_GET['uid']."' order by hitnum desc limit 10";
	$arr = $conne->getRowsArray($sql);
	$conne->close_rst();
?>
<div style=" width:204px; height:20px; text-align:left; background-image:url(images/bbg.gif); background-position:left; background-repeat:repeat-x; text-indent: 8px; padding:2px;"><img src="images/header5.gif" border="0" width="12" height="12"/>&nbsp;<a onclick="return artpagination('newart.php?uid=<?php echo $_GET['uid']; ?>&order=hotart')">热门文章</a></div>
<ul style="list-style-type: none;">
<?php
	if($arr != ''){

		foreach($arr as $value){
			if(!empty($value['artquote']) and !is_null($value['artquote'])){
				$tmparr = explode(',',$value['artquote']);
				$sql1 = "select * from tb_article where id = ".$tmparr[0];
				$artarr1 = $conne->getRowsArray($sql1);
				$conne->close_rst();
			
?>
	<li style="  text-align:left; height:25px; line-height:25px;"><img src="images/header6.gif" width="5" height="5" border="0" />&nbsp;<a onclick="javascript:window.open('center.php?act=see&uid=<?php echo $_GET['uid']; ?>&artid=<?php echo $value['id']; ?>','showarticle','',false)"><?php echo $artarr1[0]['title']; ?></a></li>

<?php
			}else{
?>
<li style="text-align:left;  height:25px; line-height:25px;"><img src="images/header6.gif" width="5" height="5" border="0" />&nbsp;<a onclick="javascript:window.open('center.php?act=see&uid=<?php echo $_GET['uid']; ?>&artid=<?php echo $value['id']; ?>','showarticle','',false)"><?php echo $value['title']; ?></a></li>
<?php
			}
		}
	}else{
?>
<li >暂时没有文章</li>
<?php
	}
?>
</ul>
<?php
}
?>