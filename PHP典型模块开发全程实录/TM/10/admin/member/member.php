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
	
	}
</style>
<?php
$num = 10;									//每页显示记录数
if(empty($_GET['act'])){	//获取当前是第几页
	$act = "";
}else{
		$act = $_GET['act'];				//当前页	
	}
		$sql = "";						//sql语句
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
	 //是否有查询内容，如果没有
	if(!isset($_REQUEST['cont'])){
	 //直接生成SQL查询语句，使用$fields字段作为排序依据
		$sql = "select id,name,email,realname,sex,birthday,hitnum,freeze,isnominate from tb_member order by ".$fields." desc";
		//如果有查询内容，就获取要查询的字段、查询方式和查询内容
	}else{
		$querymem = $_REQUEST['querymem'];
		$signslt = $_REQUEST['signslt'];
		$cont = $_REQUEST['cont'];
		 	//初始化变量$sql为一个无条件的查询语句
		$sql = 'select id,name,email,realname,sex,birthday,hitnum,freeze,isnominate from tb_member ';
		 	//根据查询字段所在的组，生成不同的where子句
		if(in_array($querymem,array('id','upfile','uppics','hitnum','birthday'))){
			$sql .= " where ".$querymem." ".$signslt." ".$cont;
		}else if(in_array($querymem,array('name','realname','qq','email'))){
			if($signslt == 'exac'){
				$sql .= "where ".$querymem." = '".$cont."'";
			}else if($signslt == 'mist'){
				$sql .= "where ".$querymem." like '%".$cont."%'";
			}
		}
		 	//添加order by子句
		$sql .= " order by ".$fields." desc";
	}

	$totnum = $conne->getRowsNum($sql);		//记录数
	$totpage = ceil($totnum / $num);		//页数
	$tmpsql = $sql." limit ".($num *($curpage-1)).",".$num;
	$arr = $conne->getRowsArray($tmpsql);
	
?>
<?php include_once 'query.php' ?>
<p />&nbsp;&nbsp;&nbsp;
<div class="classtop">账号管理中心</div>
<table border="0" cellpadding="0" cellspacing="0" align="center" class="tbl">
<form id="showmem" name="showmem" method="post" action="member_chk.php?act=del">
	<tr class="top">
		<td width="50" height="25" align="center" valign="middle">&nbsp;</td>
		<td width="50" height="25" align="center" valign="middle"><a href="member.php?fields=id">编号</a></td>
		<td width="100" height="25" align="center" valign="middle"><a href="member.php?fields=name">用户账号</td>
		<td width="100" height="25" align="center" valign="middle"><a href="member.php?fields=email">email</td>
		<td width="100" height="25" align="center" valign="middle"><a href="member.php?fields=realname">真实姓名</a></td>
		<td width="100" height="25" align="center" valign="middle"><a href="member.php?fields=realname">性别</a></td>
		<td width="150" height="25" align="center" valign="middle"><a href="member.php?fields=birthday">生日</a></td>
		<td width="100" height="25" align="center" valign="middle"><a href="member.php?fields=hitnum">博客点击率</a></td>
        <td width="100" height="25" align="center" valign="middle"><a href="member.php?fields=isnominate">推荐</a></td>
		<td width="100" height="25" align="center" valign="middle"><a href="member.php?fields=freeze">冻结/解冻</a></td>
		<td width="100" height="25" align="center" valign="middle">详细资料</td>
	</tr>
<?php
	foreach($arr as $value){
?>
		<tr>
		<td align=center valign=middle height=25><input id="chk" name="chk[]" type="checkbox" value="<?php echo $value['id']; ?>" /></td>
			<td align=center valign=middle height=25>&nbsp;<?php echo $value['id']; ?></td>
			<td align=center valign=middle height=25>&nbsp;<?php echo $value['name']; ?></td>
			<td align=center valign=middle height=25>&nbsp;<?php echo $value['email']; ?></td>
			<td align=center valign=middle height=25>&nbsp;<?php echo $value['realname']; ?></td>
			<td align=center valign=middle height=25>&nbsp;<?php echo $value['sex']; ?></td>
			<td align=center valign=middle height=25>&nbsp;<?php echo $value['birthday']; ?></td>
			<td align=center valign=middle height=25>&nbsp;<?php echo $value['hitnum']; ?></td>
            <td align=center valign=middle height=25>&nbsp;<a href="member_chk.php?act=nominate&amp;id=<?php echo $value['id']; ?>&amp;isnominate=<?php echo $value['isnominate']; ?>"><?php echo ($value['isnominate']==0?"否":"推荐"); ?></a></td>
			<td align=center valign=middle height=25>&nbsp;<a href="member_chk.php?act=freeze&amp;id=<?php echo $value['id']; ?>&amp;fz=<?php echo $value['freeze']; ?>"><?php echo ($value['freeze']==0?"冻结":"解冻"); ?></a></td>
			<td align=center valign=middle height=25>&nbsp;<a href="show.php?id=<?php echo $value['id']; ?>" target="_blank">详细资料</a></td>
			</tr>
<?php 
	
	}
	if($totnum > 0){
?>
	<tr class="bottom">
		<td colspan="5" height="30">
		<a href="#" onclick="return alldel(showmem);">全选</a> <a href="#" onclick="return overdel(showmem);">反选</a>&nbsp;&nbsp;
          <input type="submit" value="删除选择" class="btn" onclick = '' /></td>
		  <td colspan="6" align="right" valign="middle"><?php echo ($curpage == 1)?"首页":"<a href=member.php?curpage=1&querymem=".$querymem."&signslt=".urlencode($signslt)."&cont=".$cont.">首页</a>"; ?>&nbsp;<?php echo ($curpage==1)?"上一页":"<a href=member.php?curpage=".($curpage-1)."&querymem=".$querymem."&signslt=".urlencode($signslt)."&cont=".$cont.">上一页</a>"; ?>&nbsp;<?php echo ($curpage == $totpage)?'下一页':"<a href=member.php?curpage=".($curpage+1)."&querymem=".$querymem."&signslt=".urlencode($signslt)."&cont=".$cont.">下一页</a>"; ?> <?php echo ($curpage==$totpage)?"尾页":"<a href=member.php?curpage=".$totpage."&querymem=".$querymem."&signslt=".urlencode($signslt)."&cont=".$cont.">尾页</a>"; ?> 当前是第<?php echo $curpage; ?>页/共<?php echo $totpage; ?>页<?php echo $totnum; ?>条记录
		  <?php if($_REQUEST["signslt"]!='exac'){;?>
		  跳转到：<select id="jump" name="jump" onchange="return jumpmem('member.php','<?php echo $sql; ?>')">
		<!--  跳转到：<select id="jump" name="jump" onchange="return add()">-->

		  	<?php
				for($i=1;$i<=$totpage;$i++){
					if($i == $curpage)
						echo "<option value=".$i." selected>".$i."</option>";
					else
						echo "<option value=".$i.">".$i."</option>";
				}
			?>
		  </select> 页
		  <?php }?>
		  </td>
	</tr>
<?php 
	}
	
?>
</form>
</table>