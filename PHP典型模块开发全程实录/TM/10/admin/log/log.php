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
<div class="classtop">��־�б�</div>
<table border="0" cellpadding="0" cellspacing="0" align="center" class="tbl">
<form id="showmem" name="showmem" method="post" action="log_chk.php?act=del">
	<tr class="top">
		<td width="30" height="25" align="center" valign="middle">&nbsp;</td>
		<td width="100" height="25" align="center" valign="middle"><a href="log.php?fields=id">���</a></td>
		<td width="100" height="25" align="center" valign="middle"><a href="log.php?fields=uptime">��¼ʱ��</a></td>
		<td width="100" height="25" align="center" valign="middle"><a href="log.php?fields=operator">����Ա</a></td>
		<td width="300" height="25" align="center" valign="middle"><a href="log.php?fields=content">��¼����</a></td>
	</tr>
<?php
$num = 10;								//ÿҳ��ʾ��¼��
if(isset($_GET['act'])){	//��ȡ��ǰ�ǵڼ�ҳ
	$act = $_GET['act'];
}else{
	$act = "";				//��ǰҳ	
}
if(isset($_GET['curpage'])){	//��ȡ��ǰ�ǵڼ�ҳ
	$curpage = $_GET['curpage'];				//��ǰҳ	
}else{
	$curpage = 1;
}	
if(!isset($_REQUEST['fields'])){		//����˳��Ĭ��Ϊid
	$fields = 'id';
}else{
	$fields =  $_REQUEST['fields'];					//���ո��ֶ����м�¼
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
$totnum = $conne->getRowsNum($sql);		//��¼��
$totpage = ceil($totnum / $num);		//ҳ��
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
		<td colspan="3" height="30"><a href="#" onclick="return alldel(showmem);">ȫѡ</a> <a href="#" onclick="return overdel(showmem);">��ѡ</a>&nbsp;&nbsp;
          <input type="submit" value="ɾ��ѡ��" class="btn" style="border-color: #FFFFFF;" onclick = 'return del(showmem)' /></td>
		  <td colspan="7" align="right" valign="middle"><?php echo ($curpage == 1)?"��ҳ":"<a href=log.php?curpage=1&querymem=".$querymem."&signslt=".urlencode($signslt)."&cont=".urlencode($cont).">��ҳ</a>"; ?>&nbsp;<?php echo ($curpage==1)?"��һҳ":"<a href=log.php?curpage=".($curpage-1)."&querymem=".$querymem."&signslt=".urlencode($signslt)."&cont=".urlencode($cont).">��һҳ</a>"; ?>&nbsp;<?php echo ($curpage == $totpage)?'��һҳ':"<a href=log.php?curpage=".($curpage+1)."&querymem=".$querymem."&signslt=".urlencode($signslt)."&cont=".urlencode($cont).">��һҳ</a>"; ?> <?php echo ($curpage==$totpage)?"βҳ":"<a href=log.php?curpage=".$totpage."&querymem=".$querymem."&signslt=".urlencode($signslt)."&cont=".urlencode($cont).">βҳ</a>"; ?> ��ǰ�ǵ�<?php echo $curpage; ?>ҳ/��<?php echo $totpage; ?>ҳ<?php echo $totnum; ?>����¼  ��ת����<select id="jump" name="jump" onchange="return jumpmem('log.php','<?php echo urlencode($sql); ?>')">
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