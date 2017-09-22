<?php
	session_start();
	header('Content-Type:text/html;charset=gb2312');
	include_once '../conn/conn.php';
	include_once '../../config.php';
if(isset($_GET['act'])){
	$act = $_GET['act'];
}else{
	$act="";
}

	$name = $_SESSION['name'];
	$num = 8;								//每页显示记录数
if(isset($_GET['curpage'])){
	$curpage = $_GET['curpage'];			//当前页
}else{
	$curpage="";
}

	if($act == 'del'){
		$rd = $_GET['rd'];
		$delsql = "delete from tb_uppics where id = -1 ";
		if(!empty($rd)){
			$delarr = explode(',',$rd);
			foreach($delarr as $value){
				$delsql .= "or picpath = '".$value."' ";
				@unlink(PATH.ROOT.PIC.$value);
			}
			$delnum = $conne->uidRst($delsql);
		}
	}
	if(empty($curpage) or is_null($curpage)){
		$curpage = 1;
	}
	if(empty($sql) or is_null($sql)){
			$sql = "select * from tb_uppics where upauthor = '".$name."' order by id desc";
	}
	$totnum = $conne->getRowsNum($sql);		//记录数
	$totpage = ceil($totnum / $num);		//页数
	$tmpsql = $sql." limit ".($num *($curpage-1)).",".$num;
	$arr = $conne->getRowsArray($tmpsql);
	$rols = 0;
?>
<div id = 'showarticle'>
<table border="0" cellpadding="0" cellspacing="0">
<tr>
	<td height="50" colspan="4">&nbsp;</td>
</tr>
<?php
	if(count($arr) > 0){
	foreach($arr as $key => $value){
		if($rols % 4 != 0){
?>
<td align="left" valign="middle">
<table border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td align="center" valign="middle" height="25"><input id="chk[<?php echo $key; ?>]" name="chk[]" type="checkbox" value="<?php echo $value['picpath']; ?>" /></td>
	    <td width="170" align="center" valign="middle"><?php //echo $value['picpath']; ?><a href="show.php?path=<?php echo $value['picpath']; ?>" target="_blank"><img src="pics/image/<?php echo $value['picpath']; ?>" width="140" height="90" border="5" style="border:5px #999999 soid;"/></a></td>
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
		<td align="center" valign="middle" height="25"><input id="chk[<?php echo $key; ?>]" name="chk[]" type="checkbox" value="<?php echo $value['picpath']; ?>" /></td>
	    <td width="170" align="center" valign="middle"><a href="show.php?path=<?php echo $value['picpath']; ?>" target="_blank"><img src="pics/image/<?php echo $value['picpath'];  ?>" width="140" height="90" border="5" style="border:5px #999999 soid;"/></a></td>
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
	
		<tr>
			<td colspan="4" height="30" align="right" valign="middle"><a href="#" onclick="return alldel('<?php echo count($arr); ?>')">全选</a> <a href="#" onclick="return overdel('<?php echo count($arr) ?>')">反选</a>&nbsp;&nbsp;<button id="delbtn" name="delbtn" class="btn" onclick="return del('<?php echo $_SERVER['SCRIPT_NAME']; ?>','<?php echo count($arr); ?>',<?php echo $curpage; ?>)">删除选择</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($curpage == 1)?"首页":"<a  onclick='return pagination(\"".$_SERVER['SCRIPT_NAME']."\",1)'>首页</a>"; ?>&nbsp;<?php echo ($curpage==1)?"上一页":"<a onclick='return pagination(\"".$_SERVER['SCRIPT_NAME']."\",".($curpage-1).")'>上一页</a>"; ?>&nbsp;<?php echo ($curpage == $totpage)?'下一页':"<a onclick='return pagination(\"".$_SERVER['SCRIPT_NAME']."\",".($curpage+1).")'>下一页</a>"; ?> <?php echo ($curpage==$totpage)?"尾页":"<a onclick='return pagination(\"".$_SERVER['SCRIPT_NAME']."\",".($totpage).")'>尾页</a>"; ?> 当前是第<?php echo $curpage; ?>页/共<?php echo $totpage; ?>页<?php echo $totnum; ?>条记录  跳转到：<select id="jump" name="jump" onchange="return jumpmem('<?php echo $_SERVER['SCRIPT_NAME']; ?>')">
	
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
	}else{
?>
	<tr><td align="center" valign="middle" headers="25">暂时没有上传图片</td></tr>
<?php	
	}
?>
</table>
</div>