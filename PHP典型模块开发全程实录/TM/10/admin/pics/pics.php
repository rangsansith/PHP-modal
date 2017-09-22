<?php
	session_start();
	header('Content-Type:text/html;charset=gb2312');
	include_once '../conn/conn.php';
	include_once '../../config.php';
?>
<link rel="stylesheet" href="../css/style.css" />
<link rel="stylesheet" href="../css/table.css" />
<script language="javascript" src="../js/choose.js"></script>
<?php
$num = 5;								//每页显示记录数
if(isset($_GET['act'])){	//获取当前是第几页
	$act = $_GET['act'];
}else{
	$act = "";				//当前页	
}
if(isset($_GET['curpage'])){	//获取当前是第几页
	$curpage = $_GET['curpage'];				//当前页	
}else{
	$curpage = 1;
}
if(empty($act) or is_null($act)){
	$sql = "select id,picname,picpath,upauthor,pictype,hitnum,uptime from tb_uppics order by id desc";
}else{
	$querymem = $_POST['querymem'];
	$signslt = $_POST['signslt'];
	$cont = $_POST['cont'];
	$sql = 'select id,picname,picpath,upauthor,pictype,hitnum,uptime from tb_uppics ';
}
$totnum = $conne->getRowsNum($sql);		//记录数
$totpage = ceil($totnum / $num);		//页数
$sql = $sql." limit ".($num *($curpage-1)).",".$num;
$arr = $conne->getRowsArray($sql);
$rols = 0;
?>
<div class="classtop">图片管理</div>
<table border="0" cellpadding="0" cellspacing="0" align="center">
<form id="showmem" name="showmem" method="post" action="pics_chk.php?act=del">
<?php
	
	for($i=0;$i<count($arr);$i++){
		if($rols % 5 != 0){
?>
<td align="left" valign="middle">
<table border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="30" height="100" align="center" valign="middle"><input id="chk" name="chk[]" type="checkbox" value="<?php echo $arr[$i]['id']; ?>" /></td>
	    <td width="170" align="center" valign="middle"><a href="show.php?path=<?php echo $arr[$i]['picpath']; ?>" target="_blank"><img src="<?php echo ROOT.PIC.$arr[$i]['picpath'];  ?>" width="140" height="90" border="5" style="border:5px #999999 soid;"/></a></td>
	</tr>
	<tr>
		<td height="25" colspan="2" align="center" valign="middle">图片名称：<?php echo $arr[$i]['picname']; ?></td>
	</tr>
	<tr>
		<td height="25" colspan="2" align="center" valign="middle">图片类别：<?php echo $arr[$i]['pictype']; ?></td>
	</tr>
	<tr>
		<td height="25" colspan="2" align="center" valign="middle">上传用户：<?php echo $arr[$i][ 'upauthor']; ?></td>
	</tr>
	<tr>
		<td height="25" colspan="2" align="center" valign="middle">上传时间：<?php echo $arr[$i]['uptime'] ?> </td>
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
		<td width="30" height="100" align="center" valign="middle"><input id="chk" name="chk[]" type="checkbox" value="<?php echo $arr[$i]['id']; ?>" /></td>
	    <td width="170" align="center" valign="middle"><a href="show.php?path=<?php echo $arr[$i]['picpath']; ?>" target="_blank"><img src="<?php echo ROOT.PIC.$arr[$i]['picpath'];  ?>" width="140" height="90" border="5" style="border:5px #999999 soid;"/></a></td>
	</tr>
	<tr>
		<td height="25" colspan="2" align="center" valign="middle">图片名称：<?php echo $arr[$i]['picname']; ?></td>
	</tr>
	<tr>
		<td height="25" colspan="2" align="center" valign="middle">图片类别：<?php echo $arr[$i]['pictype']; ?></td>
	</tr>
	<tr>
		<td height="25" colspan="2" align="center" valign="middle">上传用户：<?php echo $arr[$i][ 'upauthor']; ?></td>
	</tr>
	<tr>
		<td height="25" colspan="2" align="center" valign="middle">上传时间：<?php echo $arr[$i]['uptime'] ?> </td>
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
	<tr class="bottom">
		<td colspan="2" height="30"><a href="#" onclick="return alldel(showmem);">全选</a> <a href="#" onclick="return overdel(showmem);">反选</a>&nbsp;&nbsp;
          <input type="submit" value="删除选择" class="btn" onclick = 'return del(showmem)' /></td>
		  <td colspan="3" align="right" valign="middle"><?php echo ($curpage == 1)?"首页":"<a href=pics.php?curpage=1&sql=".urlencode($sql).">首页</a>"; ?>&nbsp;<?php echo ($curpage==1)?"上一页":"<a href=pics.php?curpage=".($curpage-1)."&sql=".urlencode($sql).">上一页</a>"; ?>&nbsp;<?php echo ($curpage == $totpage)?'下一页':"<a href=pics.php?curpage=".($curpage+1)."&sql=".urlencode($sql).">下一页</a>"; ?> <?php echo ($curpage==$totpage)?"尾页":"<a href=pics.php?curpage=".$totpage."&sql=".urlencode($sql).">尾页</a>"; ?> 当前是第<?php echo $curpage; ?>页/共<?php echo $totpage; ?>页<?php echo $totnum; ?>条记录
		  跳转到：<select id="jump" name="jump" onchange="return jumpmem('pics.php','<?php echo $sql; ?>')">

		  	<?php
				for($i=1;$i<=$totpage;$i++){
					if($i == $curpage)
						echo "<option value=".$i." selected>".$i."</option>";
					else
						echo "<option value=".$i.">".$i."</option>";
				}
			?>
		  </select> 页
		  </td>
	</tr>
<?php 
	}
?>
</form>
</table>
