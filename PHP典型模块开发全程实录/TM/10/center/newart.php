<?php
  session_start();
  header('Content-Type:text/html;charset=gb2312');
  include_once 'conn/conn.php';
  
  
  if(isset($_GET['uid'])){
	$num = 10;								//每页显示记录数

	$sql = "select * from tb_article where author = '".$_GET['uid']."'";
	
	
	if(empty($curpage) or is_null($curpage)){
		$curpage = 1;
	}else{
	$curpage = $_GET['curpage'];			//当前页	
	}
	
	
	if(!empty($_GET['act']) and !is_null($_GET['act'])){
		$sql .= " and typename = '".$_GET['act']."'";
	}
	if(isset($_GET['order']) and $_GET['order'] == 'hotart'){
		$sql .= " order by hitnum desc ";
	}else{
		$sql .= " order by id desc ";
	}
	$totnum = $conne->getRowsNum($sql);		//记录数
	$totpage = ceil($totnum / $num);		//页数
	$tmpsql = $sql." limit ".($num *($curpage-1)).",".$num;
	$arr = $conne->getRowsArray($tmpsql);
	$conne->close_rst();
?>
<table border="0" cellpadding="0" cellspacing="0" align="center">
   <tr>
    <td height="15" colspan="2">&nbsp;</td>
  </tr>
<?php
	if($arr != ''){
		foreach($arr as $value){
		if(!empty($value['artquote']) and !is_null($value['artquote'])){
				$tmparr = explode(',',$value['artquote']);
				$sql1 = "select * from tb_article where id = ".$tmparr[0];
				$artarr1 = $conne->getRowsArray($sql1);
				$conne->close_rst();	
?>
  <tr>
    <td width="225" height="25">&nbsp;[引用]&nbsp;文章标题：<a><?php echo $artarr1[0]['title']; ?></a></td>
    <td width="231" align="right" valign="middle">发布时间：<?php echo $value['firsttime']; ?>&nbsp;</td>
  </tr>
  <tr>
  	<td height="50" colspan="2" align="left" valign="top">&nbsp;<?php echo substr($artarr1[0]['content'],0,200); ?>……</td>
  </tr>
  <tr>
  	<td height="25" colspan="2" align="right" valign="middle"><a onclick="javascript:window.open('center.php?act=see&uid=<?php echo $_GET['uid']; ?>&artid=<?php echo $value['id']; ?>','showarticle','',false)">阅读全文&nbsp;</a></td>
  </tr>
   <tr>
    <td height="15" colspan="2">&nbsp;</td>
  </tr>
<?php
			}else{
?>
  <tr>
    <td width="225" height="25">&nbsp;文章标题：<a><?php echo $value['title']; ?></a></td>
    <td width="231" align="right" valign="middle">发布时间：<?php echo $value['firsttime']; ?>&nbsp;</td>
  </tr>
  <tr>
  	<td height="50" colspan="2" align="left" valign="top">&nbsp;<?php echo substr($value['content'],0,200); ?>……</td>
  </tr>
  <tr>
  	<td height="25" colspan="2" align="right" valign="middle"><a onclick="javascript:window.open('center.php?act=see&uid=<?php echo $_GET['uid']; ?>&artid=<?php echo $value['id']; ?>','showarticle','',false)">阅读全文</a>&nbsp;</td>
  </tr>
   <tr>
    <td height="15" colspan="2">&nbsp;</td>
  </tr>
<?php
			}
		}
?>
		<tr>
			<td colspan="4" height="30" align="right" valign="middle">&nbsp;&nbsp;&nbsp;<?php echo ($curpage == 1)?"首页":"<a  onclick='return artpagination(\"newart.php?act=".$_GET['act']."&uid=".$_GET['uid']."&curpage=1\")'>首页</a>"; ?>&nbsp;<?php echo ($curpage==1)?"上一页":"<a onclick='return artpagination(\"newart.php?act=".$_GET['act']."&uid=".$_GET['uid']."&curpage=".($curpage-1)."\")'>上一页</a>"; ?>&nbsp;<?php echo ($curpage == $totpage)?'下一页':"<a onclick='return artpagination(\"newart.php?act=".$_GET['act']."&uid=".$_GET['uid']."&curpage=".($curpage+1)."\")'>下一页</a>"; ?> <?php echo ($curpage==$totpage)?"尾页":"<a onclick='return artpagination(\"newart.php?act=".$_GET['act']."&uid=".$_GET['uid']."&curpage=".$totpage."\")'>尾页</a>"; ?> 当前是第<?php echo $curpage; ?>页/共<?php echo $totpage; ?>页<?php echo $totnum; ?>条记录  跳转到：
			  <select id="jump" name="jump" onchange="return jumpmem('newart.php?act=<?php echo $_GET['act']; ?>&uid=<?php echo $_GET['uid']; ?>')">
	
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
<tr>
    <td height="25" colspan="2">&nbsp;暂时没有文章</td>
  </tr>
   <tr>
    <td height="15" colspan="2">&nbsp;</td>
  </tr>
<?php
	}
?>
</table>
<?php
}
?>
	<div id="lyb"><?php include 'lyb.php'; ?></div>