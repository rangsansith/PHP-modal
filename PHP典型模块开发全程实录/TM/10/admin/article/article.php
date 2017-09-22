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
	height:28px;

}
</style>
<?php include_once 'query.php'; ?>
<div class="classtop">文章管理</div>

<table border="0" cellspacing="0" cellpadding="0" align="center" class="tbl">
<form id="showmem" name="showmem" method="post" action="article_chk.php?act=del">
  <tr>
    <td width="50" height="25" align="center" valign="middle">&nbsp;</td>
    <td width="50" align="center" valign="middle"><a href="article.php?fields=id">编号</a></td>
    <td width="100" align="center" valign="middle"><a href="article.php?fields=typename">类别</a></td>
    <td width="100" align="center" valign="middle"><a href="article.php?fields=title">标题</a></td>
    <td width="100" align="center" valign="middle"><a href="article.php?fields=author">作者</a></td>
    <td width="200" align="center" valign="middle"><a href="article.php?fields=firsttime">发表时间</a></td>
    <td width="50" align="center" valign="middle"><a href="article.php?fields=hitnum">点击率</a></td>
    <td width="50" align="center" valign="middle"><a href="article.php?fields=renum">回复率</a></td>
    <td width="50" align="center" valign="middle"><a href="article.php?fields=isnominate">推荐</a></td>
	<td width="100" align="center" valign="middle"><a href="article.php?fields=examine">审核</a></td>
    <td width="100" align="center" valign="middle">操作</td>
  </tr>
<?php
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
	
	
	
	if(empty($_REQUEST['cont']) or is_null($_REQUEST['cont'])){
		$sql = "select * from tb_article order by ".$fields." desc";
	}else{
		$querymem = $_REQUEST['querymem'];
		$signslt = $_REQUEST['signslt'];
		$cont = $_REQUEST['cont'];
		$sql = 'select * from tb_article ';       //firsttime
		if(in_array($querymem,array('id','hitnum','renum','examine'))){
			$sql .= " where ".$querymem." ".$signslt." ".$cont;
			
		}else if(in_array($querymem,array('firsttime'))){
			if($signslt=='='){
			$sql.= "where ".$querymem." like '%".$cont."%'";
			}else{
			$sql .= " where ".$querymem." ".$signslt." '".$cont."'";
			}
		}else if(in_array($querymem,array('typename','title','author'))){
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
	$tmpsql = $sql." limit ".($num *($curpage-1)).",".$num;
	$arr = $conne->getRowsArray($tmpsql);
	foreach($arr as $value){
		if($value['artquote'] == ''){
?>
		<tr>
		<td align=center valign=middle height=25><input id="chk" name="chk[]" type="checkbox" value="<?php echo $value['id']; ?>" /></td>
			<td align=center valign=middle height=25>&nbsp;<?php echo $value['id']; ?></td>
			<td align=center valign=middle height=25>&nbsp;<?php echo $value['typename']; ?></td>
			<td align=center valign=middle height=25>&nbsp;<?php echo $value['title']; ?></td>
			<td align=center valign=middle height=25>&nbsp;<?php echo $value['author']; ?></td>
			<td align=center valign=middle height=25>&nbsp;<?php echo $value['firsttime']; ?></td>
			<td align=center valign=middle height=25>&nbsp;<?php echo $value['hitnum']; ?></td>
			<td align=center valign=middle height=25>&nbsp;<?php echo $value['renum']; ?></td>
            <td align=center valign=middle height=25>&nbsp;<a href="article_chk.php?act=nominate&amp;id=<?php echo $value['id']; ?>&amp;isnominate=<?php echo $value['isnominate']; ?>"><?php echo ($value['isnominate']==0?"否":"推荐"); ?></a></td>
			<td align=center valign=middle height=25>&nbsp;<?php echo ($value['examine']==0)?'<a href="article_chk.php?act=pass&id='.$value['id'].'">已通过<a> <a href="article_chk.php?act=stop&id='.$value['id'].'">未通过</a>':(($value['examine']==1?'<a href="article_chk.php?act=stop&id='.$value['id'].'">已通过</a>':'<a href="article_chk.php?act=pass&id='.$value['id'].'">未通过</a>')); ?></td>

		 <td align=center valign=middle height=25><a href="show.php?id=<?php echo $value['id']; ?>" target="_blank">详细资料</a></td>
		</tr>
<?php
		}
	}
		


	if($totnum > 0){
?>
	<tr class="bottom">
		<td colspan="3" height="30"><a href="#" onclick="return alldel(showmem);">全选</a> <a href="#" onclick="return overdel(showmem);">反选</a>&nbsp;&nbsp;
          <input type="submit" value="删除选择" class="btn" onclick = 'return del(showmem)' /></td>
		  <td colspan="8" align="right" valign="middle"><?php echo ($curpage == 1)?"首页":"<a href=article.php?curpage=1&querymem=".$querymem."&signslt=".urlencode($signslt)."&cont=".$cont.">首页</a>"; ?>&nbsp;<?php echo ($curpage==1)?"上一页":"<a href=article.php?curpage=".($curpage-1)."&querymem=".$querymem."&signslt=".urlencode($signslt)."&cont=".$cont.">上一页</a>"; ?>&nbsp;<?php echo ($curpage == $totpage)?'下一页':"<a href=article.php?curpage=".($curpage+1)."&querymem=".$querymem."&signslt=".urlencode($signslt)."&cont=".$cont.">下一页</a>"; ?> <?php echo ($curpage==$totpage)?"尾页":"<a href=article.php?curpage=".$totpage."&querymem=".$querymem."&signslt=".urlencode($signslt)."&cont=".$cont.">尾页</a>"; ?> 当前是第<?php echo $curpage; ?>页/共<?php echo $totpage; ?>页<?php echo $totnum; ?>条记录  跳转到：<select id="jump" name="jump" onchange="return jumpmem('article.php','<?php echo urlencode($sql); ?>')">

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