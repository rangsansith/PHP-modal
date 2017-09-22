<?php

	include_once 'conn/conn.php';
	include_once '../config.php';
	if(!empty($_GET['uid']) and !is_null($_GET['uid']) and isset($_GET['curpage'])){
		$num = 16;								//每页显示记录数
		$curpage = $_GET['curpage'];			//当前页
		if(empty($curpage) or is_null($curpage)){
			$curpage = 1;
		}
		$sql = "select * from tb_uppics where upauthor = '".$_GET['uid']."' order by id desc";
		$totnum = $conne->getRowsNum($sql);		//记录数
		$totpage = ceil($totnum / $num);		//页数
		$tmpsql = $sql." limit ".($num *($curpage-1)).",".$num;
		$arr = $conne->getRowsArray($tmpsql);
		$rols = 0;
	?>
	<div style="background-image:url(images/header10.gif); background-position:left; background-repeat:no-repeat; height:25px; line-height:25px; text-indent:12px; text-align:left; color:#f79100; border-bottom: 1px #CCCCCC dashed;">我的相册</div>
	<table border="0" cellpadding="0" cellspacing="0" align="center">
		<tr>
			<td height="15px">&nbsp;</td>
		</tr>
	<?php
	  if($arr != ''){
		foreach($arr as $key => $value){
			if($rols % 3 != 0){
	?>
	<td align="left" valign="middle">
	<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td width="170" align="center" valign="middle"><a href="show.php?picid=<?php echo $value['id']; ?>&amp;path=<?php echo $value['picpath']; ?>" target="_blank"><img src="<?php echo ROOT.PIC.$value['picpath'];  ?>" width="140" height="90" border="0" style="border:1px #CCCCCC solid;"/></a></td>
		</tr>
		<tr>
			<td height="25" colspan="2" align="center" valign="middle">图片名称：<?php echo $value['picname']; ?></td>
		</tr>
		<tr>
			<td height="25" colspan="2" align="center" valign="middle">图片类别：<?php echo $value['pictype']; ?></td>
		</tr>
		<tr>
			<td height="25" colspan="2" align="center" valign="middle">上传时间：<?php echo $value['uptime'] ?> </td>
		</tr>
	</table>
	</td>
	<?php	
			}else{
	?>
	<tr>
	<td align="left" valign="middle">
	<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td width="170" align="center" valign="middle"><a href="show.php?picid=<?php echo $value['id']; ?>&amp;path=<?php echo $value['picpath']; ?>" target="_blank"><img src="<?php echo ROOT.PIC.$value['picpath'];  ?>" width="140" height="90" border="0" style="border:1px #CCCCCC solid;"/></a></td>
		</tr>
		<tr>
			<td height="25" colspan="2" align="center" valign="middle">图片名称：<?php echo $value['picname']; ?></td>
		</tr>
		<tr>
			<td height="25" colspan="2" align="center" valign="middle">图片类别：<?php echo $value['pictype']; ?></td>
		</tr>
		<tr>
			<td height="25" colspan="2" align="center" valign="middle">上传时间：<?php echo $value['uptime'] ?> </td>
		</tr>
	</table>
	</td>
	<?php	
			}
			$rols++;
		}
	?>
	  </tr>
		<?php 
		if($totnum > 0){
		?>
			<tr>
			<td colspan="4" height="30" align="right" valign="middle">&nbsp;&nbsp;&nbsp;<?php echo ($curpage == 1)?"首页":"<a  onclick='return artpagination(\"pics.php?act=&uid=".$_GET['uid']."&curpage=1\")'>首页</a>"; ?>&nbsp;<?php echo ($curpage==1)?"上一页":"<a onclick='return artpagination(\"pics.php?act=&uid=".$_GET['uid']."&curpage=".($curpage-1)."\")'>上一页</a>"; ?>&nbsp;<?php echo ($curpage == $totpage)?'下一页':"<a onclick='return artpagination(\"pics.php?act=&uid=".$_GET['uid']."&curpage=".($curpage+1)."\")'>下一页</a>"; ?> <?php echo ($curpage==$totpage)?"尾页":"<a onclick='return artpagination(\"pics.php?act=&uid=".$_GET['uid']."&curpage=".$totpage."\")'>尾页</a>"; ?> 当前是第<?php echo $curpage; ?>页/共<?php echo $totpage; ?>页<?php echo $totnum; ?>条记录  跳转到：
			  <select id="jump" name="jump" onchange="return jumpmem('pics.php?uid=<?php echo $_GET['uid']; ?>')">
	
			<?php
				for($i=1;$i<=$totpage;$i++){
					if($i == $curpage)
						echo "<option value=".$i." selected>".$i."</option>";
					else
						echo "<option value=".$i.">".$i."</option>";
				}
			?>
		  </select> 页</td>
		</tr>
		<?php
			}
		  }else{
		 ?>
		 <tr><td align="center" valign="middle" headers="25">暂时没有上传照片</tr>
	<?php 
		  }
	?>
	</table>
<?php
	}
?>