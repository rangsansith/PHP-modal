<?php
	session_start();
	header("Content-type:text/html; charset=gb2312");
	include_once '../conn/conn.php';
?>
<link rel="stylesheet" href="../css/style.css" />
<link rel="stylesheet" href="../css/table.css" />
<script language="javascript" src="../js/choose.js"></script>
<style>
body{
	background-image:url(../images/abg.gif);
	background-position:top;
	background-repeat:repeat-x;
	width:100%;
	height:27px;
}
</style>
<?php include_once 'query.php'; ?>
<p />
<div class="classtop">日志列表</div>
<table border="0" cellpadding="0" cellspacing="0" align="center" class="tbl">
<form id="showmem" name="showmem" method="post" action="log_chk.php?act=del">
	<tr class="top">
		<td width="30" height="25" align="center" valign="middle">&nbsp;</td>
		<td width="100" height="25" align="center" valign="middle"><a href="log.php?fields=id">编号</a></td>
		<td width="100" height="25" align="center" valign="middle"><a href="log.php?fields=uptime">记录时间</a></td>
		<td width="100" height="25" align="center" valign="middle"><a href="log.php?fields=operator">操作员</a></td>
		<td width="300" height="25" align="center" valign="middle"><a href="log.php?fields=content">记录内容</a></td>
	</tr>
<?php
$num = 10;								//每页显示记录数
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
if(!isset($_REQUEST['fields'])){		//排列顺序，默认为id
	$fields = 'id';
}else{
	$fields =  $_REQUEST['fields'];					//依照该字段排列记录
}											
if(!isset($_REQUEST['cont']) && !isset($_REQUEST['querymem'])){
	$sql = "select * from tb_log order by ".$fields." desc";
}else{
	$querymem = $_REQUEST['querymem'];
	$signslt = $_REQUEST['signslt'];
	$cont = $_REQUEST['cont'];
	$sql = 'select * from tb_log ';
	if(in_array($querymem,array('id','uptime'))){
		$sql .= " where ".$querymem." ".$signslt." ".$cont;
	}else if(in_array($querymem,array('operator','content'))){
		if($signslt == 'exac'){
			$sql .= "where ".$querymem." = '".$cont."'";
		}else if($signslt == 'mist'){
			$sql .= "where ".$querymem." like '%".$cont."%'";
		}
	}
	$sql .= " order by ".$fields." desc";
}
$totnum = $conne->getRowsNum($sql);		//记录数
$totpage = ceil($totnum / $num);		//页数
$sql = $sql." limit ".($num *($curpage-1)).",".$num;
$arr = $conne->getRowsArray($sql);
foreach($arr as $value){
?>
		<tr>
		<td align=center valign=middle height=25><input id="chk" name="chk[]" type="checkbox" value="<?php echo $value['id']; ?>" /></td>
		<td align=center valign=middle height=25>&nbsp;<?php echo $value['id']; ?></td>
		<td align=center valign=middle height=25>&nbsp;<?php echo $value['uptime']; ?></td>
		<td align=center valign=middle height=25>&nbsp;<?php echo $value['operator']; ?></td>
		<td align=center valign=middle height=25>&nbsp;<?php echo $value['content']; ?></td>
<?php
	}
if($totnum > 0){
?>
	<tr class="top">
		<td colspan="3" height="30"><a href="#" onclick="return alldel(showmem);">全选</a> <a href="#" onclick="return overdel(showmem);">反选</a>&nbsp;&nbsp;
          <input type="submit" value="删除选择" class="btn" style="border-color: #FFFFFF;" onclick = 'return del(showmem)' /></td>
		  <td colspan="7" align="right" valign="middle"><?php echo ($curpage == 1)?"首页":"<a href=log.php?curpage=1&querymem=".$querymem."&signslt=".urlencode($signslt)."&cont=".urlencode($cont).">首页</a>"; ?>&nbsp;<?php echo ($curpage==1)?"上一页":"<a href=log.php?curpage=".($curpage-1)."&querymem=".$querymem."&signslt=".urlencode($signslt)."&cont=".urlencode($cont).">上一页</a>"; ?>&nbsp;<?php echo ($curpage == $totpage)?'下一页':"<a href=log.php?curpage=".($curpage+1)."&querymem=".$querymem."&signslt=".urlencode($signslt)."&cont=".urlencode($cont).">下一页</a>"; ?> <?php echo ($curpage==$totpage)?"尾页":"<a href=log.php?curpage=".$totpage."&querymem=".$querymem."&signslt=".urlencode($signslt)."&cont=".urlencode($cont).">尾页</a>"; ?> 当前是第<?php echo $curpage; ?>页/共<?php echo $totpage; ?>页<?php echo $totnum; ?>条记录  跳转到：<select id="jump" name="jump" onchange="return jumpmem('log.php','<?php echo urlencode($sql); ?>')">
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
</form>
</table>