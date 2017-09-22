<?php
session_start();
$name=$_SESSION['name'];
header('content-type:text/html;charset=gb2312');
include_once '../conn/conn.php';
$num = 10;								//每页显示记录数
if(empty($_GET['act'])){	//获取当前是第几页
	$act = "";
}else{
	$act = $_GET['act'];				//当前页	
}
if(empty($curpage) or is_null($curpage)){	//获取当前是第几页
	$curpage = 1;
}else{
	$curpage = $_GET['curpage'];				//当前页	
}
if(empty($fields) or is_null($fields)){		//排列顺序，默认为id
	$fields = 'id';
}else{
	$fields = $_GET['fields'];					//依照该字段排列记录
}
if(empty($curpage) or is_null($curpage)){
	$curpage = 1;
}
if($act == 'del'){
	$rd = $_GET['rd'];
	$delsql = "delete from tb_script where id = -1 ";
	if(!empty($rd)){
		$delarr = explode(',',$rd);
		foreach($delarr as $value){
			$delsql .= "or id = ".$value." ";
		}
		$delnum = $conne->uidRst($delsql);
	}
}
if(!empty($name) and !is_null($name)){
	$sql = "select * from tb_script where accept = '".$name."'";
	$totnum = $conne->getRowsNum($sql);		//记录数
	$totpage = ceil($totnum / $num);		//页数
	$tmpsql = $sql." limit ".($num *($curpage-1)).",".$num;
	$arr = $conne->getRowsArray($tmpsql);
	$conne->close_rst();
	if($arr != ''){ 
?>
<div id = 'showarticle'>
<table border="1" cellpadding="0" cellspacing="0" align="center">
 	<tr>
    	<td height="25" colspan="4" align="center" valign="middle"  style="background-color:#f3fde8;">小纸条</td>
	</tr>
    <tr>
    <td align="center" valign="middle" width="30" height="25">&nbsp;</td>
    <td align="center" valign="middle" width="100">发送人</td>
    <td align="center" valign="middle" width="300">内容</td>
    <td align="center" valign="middle" width="150">时间</td>
</tr>
<?php
	foreach($arr as $key => $value){
		$showsql = "select * from tb_script where accept = '".$value['frdname']."' order by isnew,id";
		$showarr = $conne->getRowsArray($showsql);
		$conne->close_rst();
?>
<tr>
    <td align="center" valign="middle" width="30" height="25"><input id="chk[<?php echo $key; ?>]" name="chk[]" type="checkbox" value="<?php echo $value['id']; ?>" /></td>
    <td align="center" valign="middle" width="100">&nbsp;<?php echo $value['sender']; ?></td>
    <td align="center" valign="middle" width="300">&nbsp;<a onclick="return showallcont(<?php echo $value['id']; ?>)"><?php echo $value['content']; ?></a>&nbsp;&nbsp;&nbsp;<?php echo ($value['isnew'] == 0)?'<font color=red>new</font>':' ';?></td>
    <td align="center" valign="middle" width="150">&nbsp;<?php echo $value['sendtime']; ?></td>
</tr>

<?php
	}
?>
		<tr>
			<td colspan="4" height="30" align="right" valign="middle"><a href="#" onclick="return alldel('<?php echo count($arr); ?>')">全选</a> <a href="#" onclick="return overdel('<?php echo count($arr) ?>')">反选</a>&nbsp;&nbsp;<button id="delbtn" name="delbtn" class="btn" onclick="return del('<?php echo $_SERVER['SCRIPT_NAME']; ?>','<?php echo count($arr); ?>',<?php echo $curpage; ?>)">删除选择</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($curpage == 1)?"首页":"<a  onclick='return pagination(\"".$_SERVER['SCRIPT_NAME']."\",1)'>首页</a>"; ?>&nbsp;<?php echo ($curpage==1)?"上一页":"<a onclick='return pagination(\"".$_SERVER['SCRIPT_NAME']."\",".($curpage-1).")'>上一页</a>"; ?>&nbsp;<?php echo ($curpage == $totpage)?'下一页':"<a onclick='return pagination(\"".$_SERVER['SCRIPT_NAME']."\",".($curpage+1).")'>下一页</a>"; ?> <?php echo ($curpage==$totpage)?"尾页":"<a onclick='return pagination(\"".$_SERVER['SCRIPT_NAME']."\",".($totpage).")'>尾页</a>"; ?> 当前是第<?php echo $curpage; ?>页/共<?php echo $totpage; ?>页<?php echo $totnum; ?>条记录  跳转到：<select id="jump" name="jump" onchange="return jumpmem('<?php echo $_SERVER['SCRIPT_NAME']; ?>')">
	
			<?php
				for($i=1;$i<=$totpage;$i++){
					if($i == $curpage){
						echo "<option value=".$i." selected>".$i."</option>";
					}else{
						echo "<option value=".$i.">".$i."</option>";
				}
				}
			
			?>
			  </select> 页</td>
		</tr>
</table>
</div>
<?php
	}else{
	?>
	<div align="center">没有小纸条</div>
	<?php
	}
	
	}
?>