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
$num = 5;								//ÿҳ��ʾ��¼��
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
if(empty($act) or is_null($act)){
	$sql = "select id,picname,picpath,upauthor,pictype,hitnum,uptime from tb_uppics order by id desc";
}else{
	$querymem = $_POST['querymem'];
	$signslt = $_POST['signslt'];
	$cont = $_POST['cont'];
	$sql = 'select id,picname,picpath,upauthor,pictype,hitnum,uptime from tb_uppics ';
}
$totnum = $conne->getRowsNum($sql);		//��¼��
$totpage = ceil($totnum / $num);		//ҳ��
$sql = $sql." limit ".($num *($curpage-1)).",".$num;
$arr = $conne->getRowsArray($sql);
$rols = 0;
?>
<div class="classtop">ͼƬ����</div>
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
		<td height="25" colspan="2" align="center" valign="middle">ͼƬ���ƣ�<?php echo $arr[$i]['picname']; ?></td>
	</tr>
	<tr>
		<td height="25" colspan="2" align="center" valign="middle">ͼƬ���<?php echo $arr[$i]['pictype']; ?></td>
	</tr>
	<tr>
		<td height="25" colspan="2" align="center" valign="middle">�ϴ��û���<?php echo $arr[$i][ 'upauthor']; ?></td>
	</tr>
	<tr>
		<td height="25" colspan="2" align="center" valign="middle">�ϴ�ʱ�䣺<?php echo $arr[$i]['uptime'] ?> </td>
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
		<td height="25" colspan="2" align="center" valign="middle">ͼƬ���ƣ�<?php echo $arr[$i]['picname']; ?></td>
	</tr>
	<tr>
		<td height="25" colspan="2" align="center" valign="middle">ͼƬ���<?php echo $arr[$i]['pictype']; ?></td>
	</tr>
	<tr>
		<td height="25" colspan="2" align="center" valign="middle">�ϴ��û���<?php echo $arr[$i][ 'upauthor']; ?></td>
	</tr>
	<tr>
		<td height="25" colspan="2" align="center" valign="middle">�ϴ�ʱ�䣺<?php echo $arr[$i]['uptime'] ?> </td>
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
		<td colspan="2" height="30"><a href="#" onclick="return alldel(showmem);">ȫѡ</a> <a href="#" onclick="return overdel(showmem);">��ѡ</a>&nbsp;&nbsp;
          <input type="submit" value="ɾ��ѡ��" class="btn" onclick = 'return del(showmem)' /></td>
		  <td colspan="3" align="right" valign="middle"><?php echo ($curpage == 1)?"��ҳ":"<a href=pics.php?curpage=1&sql=".urlencode($sql).">��ҳ</a>"; ?>&nbsp;<?php echo ($curpage==1)?"��һҳ":"<a href=pics.php?curpage=".($curpage-1)."&sql=".urlencode($sql).">��һҳ</a>"; ?>&nbsp;<?php echo ($curpage == $totpage)?'��һҳ':"<a href=pics.php?curpage=".($curpage+1)."&sql=".urlencode($sql).">��һҳ</a>"; ?> <?php echo ($curpage==$totpage)?"βҳ":"<a href=pics.php?curpage=".$totpage."&sql=".urlencode($sql).">βҳ</a>"; ?> ��ǰ�ǵ�<?php echo $curpage; ?>ҳ/��<?php echo $totpage; ?>ҳ<?php echo $totnum; ?>����¼
		  ��ת����<select id="jump" name="jump" onchange="return jumpmem('pics.php','<?php echo $sql; ?>')">

		  	<?php
				for($i=1;$i<=$totpage;$i++){
					if($i == $curpage)
						echo "<option value=".$i." selected>".$i."</option>";
					else
						echo "<option value=".$i.">".$i."</option>";
				}
			?>
		  </select> ҳ
		  </td>
	</tr>
<?php 
	}
?>
</form>
</table>
