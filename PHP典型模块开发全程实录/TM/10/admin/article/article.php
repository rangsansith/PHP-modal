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
<div class="classtop">���¹���</div>

<table border="0" cellspacing="0" cellpadding="0" align="center" class="tbl">
<form id="showmem" name="showmem" method="post" action="article_chk.php?act=del">
  <tr>
    <td width="50" height="25" align="center" valign="middle">&nbsp;</td>
    <td width="50" align="center" valign="middle"><a href="article.php?fields=id">���</a></td>
    <td width="100" align="center" valign="middle"><a href="article.php?fields=typename">���</a></td>
    <td width="100" align="center" valign="middle"><a href="article.php?fields=title">����</a></td>
    <td width="100" align="center" valign="middle"><a href="article.php?fields=author">����</a></td>
    <td width="200" align="center" valign="middle"><a href="article.php?fields=firsttime">����ʱ��</a></td>
    <td width="50" align="center" valign="middle"><a href="article.php?fields=hitnum">�����</a></td>
    <td width="50" align="center" valign="middle"><a href="article.php?fields=renum">�ظ���</a></td>
    <td width="50" align="center" valign="middle"><a href="article.php?fields=isnominate">�Ƽ�</a></td>
	<td width="100" align="center" valign="middle"><a href="article.php?fields=examine">���</a></td>
    <td width="100" align="center" valign="middle">����</td>
  </tr>
<?php
	$num = 10;								//ÿҳ��ʾ��¼��

	
	if(empty($_GET['act'])){	//��ȡ��ǰ�ǵڼ�ҳ
		$act = "";
	}else{
		$act = $_GET['act'];				//��ǰҳ	
	}
	
	
	
	if(empty($curpage) or is_null($curpage)){	//��ȡ��ǰ�ǵڼ�ҳ
		$curpage = 1;
	}else{
		$curpage = $_GET['curpage'];				//��ǰҳ	
	}
	if(empty($fields) or is_null($fields)){		//����˳��Ĭ��Ϊid
		$fields = 'id';
	}else{
		$fields = $_GET['fields'];					//���ո��ֶ����м�¼
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
	$totnum = $conne->getRowsNum($sql);		//��¼��
	$totpage = ceil($totnum / $num);		//ҳ��
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
            <td align=center valign=middle height=25>&nbsp;<a href="article_chk.php?act=nominate&amp;id=<?php echo $value['id']; ?>&amp;isnominate=<?php echo $value['isnominate']; ?>"><?php echo ($value['isnominate']==0?"��":"�Ƽ�"); ?></a></td>
			<td align=center valign=middle height=25>&nbsp;<?php echo ($value['examine']==0)?'<a href="article_chk.php?act=pass&id='.$value['id'].'">��ͨ��<a> <a href="article_chk.php?act=stop&id='.$value['id'].'">δͨ��</a>':(($value['examine']==1?'<a href="article_chk.php?act=stop&id='.$value['id'].'">��ͨ��</a>':'<a href="article_chk.php?act=pass&id='.$value['id'].'">δͨ��</a>')); ?></td>

		 <td align=center valign=middle height=25><a href="show.php?id=<?php echo $value['id']; ?>" target="_blank">��ϸ����</a></td>
		</tr>
<?php
		}
	}
		


	if($totnum > 0){
?>
	<tr class="bottom">
		<td colspan="3" height="30"><a href="#" onclick="return alldel(showmem);">ȫѡ</a> <a href="#" onclick="return overdel(showmem);">��ѡ</a>&nbsp;&nbsp;
          <input type="submit" value="ɾ��ѡ��" class="btn" onclick = 'return del(showmem)' /></td>
		  <td colspan="8" align="right" valign="middle"><?php echo ($curpage == 1)?"��ҳ":"<a href=article.php?curpage=1&querymem=".$querymem."&signslt=".urlencode($signslt)."&cont=".$cont.">��ҳ</a>"; ?>&nbsp;<?php echo ($curpage==1)?"��һҳ":"<a href=article.php?curpage=".($curpage-1)."&querymem=".$querymem."&signslt=".urlencode($signslt)."&cont=".$cont.">��һҳ</a>"; ?>&nbsp;<?php echo ($curpage == $totpage)?'��һҳ':"<a href=article.php?curpage=".($curpage+1)."&querymem=".$querymem."&signslt=".urlencode($signslt)."&cont=".$cont.">��һҳ</a>"; ?> <?php echo ($curpage==$totpage)?"βҳ":"<a href=article.php?curpage=".$totpage."&querymem=".$querymem."&signslt=".urlencode($signslt)."&cont=".$cont.">βҳ</a>"; ?> ��ǰ�ǵ�<?php echo $curpage; ?>ҳ/��<?php echo $totpage; ?>ҳ<?php echo $totnum; ?>����¼  ��ת����<select id="jump" name="jump" onchange="return jumpmem('article.php','<?php echo urlencode($sql); ?>')">

		  	<?php
				for($i=1;$i<=$totpage;$i++){
					if($i == $curpage)
						echo "<option value=".$i." selected>".$i."</option>";
					else
						echo "<option value=".$i.">".$i."</option>";
				}
			?>
		  </select> ҳ</td>
	</tr>
<?php
	}
	
?>
</form>
</table>