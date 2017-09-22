<?php
session_start();
header('Content-Type:text/html;charset=gb2312');
include_once 'conn/conn.php';
include_once '../config.php';
if(isset($_GET['uid'])){
	$num = 16;								//每页显示记录数
	if(isset($_GET['curpage'])){
		$curpage = $_GET['curpage'];			//当前页	
	}else{
		$curpage = 1;			//当前页
	}
	if(isset($_GET['typename'])){
	
		$sql = "select * from tb_uppics where upauthor = '".$_GET['uid']."' and pictype = '".$_GET['typename']."' order by id desc";
	}else{
		$sql = "select * from tb_uppics where upauthor = '".$_GET['uid']."' order by id desc";
	}
	
	$totnum = $conne->getRowsNum($sql);		//记录数
	$totpage = ceil($totnum / $num);		//页数
	$tmpsql = $sql." limit ".($num *($curpage-1)).",".$num;
	$arr = $conne->getRowsArray($tmpsql);
	$conne->close_rst();
	$rols = 0;
?>
	<table border="0" cellpadding="0" cellspacing="0" align="center" style=" overflow: hidden;">
	<tr><td height="50" colspan="4">&nbsp;</td></tr>
     <tr><td height="15" colspan="4">&nbsp;</td></tr>
	<?php
		foreach($arr as $key => $value){
			if($rols % 3 != 0){
	?>
	<td align="left" valign="middle">
	<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td width="170" align="center" valign="middle"><a href="show.php?picid=<?php echo $value['id']; ?>&amp;path=<?php echo $value['picpath']; ?>" target="_blank"><img src="<?php echo ROOT.PIC.$value['picpath'];  ?>" width="140" height="90" border="5" style="border:5px #999999 soid;"/></a></td>
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
			<td width="170" align="center" valign="middle"><a href="show.php?picid=<?php echo $value['id']; ?>&amp;path=<?php echo $value['picpath']; ?>" target="_blank"><img src="<?php echo ROOT.PIC.$value['picpath'];  ?>" width="140" height="90" border="5" style="border:5px #999999 soid;"/></a></td>
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
			<td colspan="4" height="30" align="right" valign="middle">&nbsp;&nbsp;&nbsp;<?php echo ($curpage == 1)?"首页":"<a  onclick='return artpagination(\"pics.php?uid=".$_GET['uid']."&curpage=1\")'>首页</a>"; ?>&nbsp;<?php echo ($curpage==1)?"上一页":"<a onclick='return artpagination(\"pics.php?uid=".$_GET['uid']."&curpage=".($curpage-1)."\")'>上一页</a>"; ?>&nbsp;<?php echo ($curpage == $totpage)?'下一页':"<a onclick='return artpagination(\"pics.php?uid=".$_GET['uid']."&curpage=".($curpage+1)."\")'>下一页</a>"; ?> <?php echo ($curpage==$totpage)?"尾页":"<a onclick='return artpagination(\"pics.php?uid=".$_GET['uid']."&curpage=".$totpage."\")'>尾页</a>"; ?> 当前是第<?php echo $curpage; ?>页/共<?php echo $totpage; ?>页<?php echo $totnum; ?>条记录  跳转到：
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
	?>
	</table>
	<?php 
	}
	?>