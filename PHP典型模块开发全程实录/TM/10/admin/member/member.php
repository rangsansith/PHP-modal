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
$num = 10;									//ÿҳ��ʾ��¼��
if(empty($_GET['act'])){	//��ȡ��ǰ�ǵڼ�ҳ
	$act = "";
}else{
		$act = $_GET['act'];				//��ǰҳ	
	}
		$sql = "";						//sql���
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
	 //�Ƿ��в�ѯ���ݣ����û��
	if(!isset($_REQUEST['cont'])){
	 //ֱ������SQL��ѯ��䣬ʹ��$fields�ֶ���Ϊ��������
		$sql = "select id,name,email,realname,sex,birthday,hitnum,freeze,isnominate from tb_member order by ".$fields." desc";
		//����в�ѯ���ݣ��ͻ�ȡҪ��ѯ���ֶΡ���ѯ��ʽ�Ͳ�ѯ����
	}else{
		$querymem = $_REQUEST['querymem'];
		$signslt = $_REQUEST['signslt'];
		$cont = $_REQUEST['cont'];
		 	//��ʼ������$sqlΪһ���������Ĳ�ѯ���
		$sql = 'select id,name,email,realname,sex,birthday,hitnum,freeze,isnominate from tb_member ';
		 	//���ݲ�ѯ�ֶ����ڵ��飬���ɲ�ͬ��where�Ӿ�
		if(in_array($querymem,array('id','upfile','uppics','hitnum','birthday'))){
			$sql .= " where ".$querymem." ".$signslt." ".$cont;
		}else if(in_array($querymem,array('name','realname','qq','email'))){
			if($signslt == 'exac'){
				$sql .= "where ".$querymem." = '".$cont."'";
			}else if($signslt == 'mist'){
				$sql .= "where ".$querymem." like '%".$cont."%'";
			}
		}
		 	//���order by�Ӿ�
		$sql .= " order by ".$fields." desc";
	}

	$totnum = $conne->getRowsNum($sql);		//��¼��
	$totpage = ceil($totnum / $num);		//ҳ��
	$tmpsql = $sql." limit ".($num *($curpage-1)).",".$num;
	$arr = $conne->getRowsArray($tmpsql);
	
?>
<?php include_once 'query.php' ?>
<p />&nbsp;&nbsp;&nbsp;
<div class="classtop">�˺Ź�������</div>
<table border="0" cellpadding="0" cellspacing="0" align="center" class="tbl">
<form id="showmem" name="showmem" method="post" action="member_chk.php?act=del">
	<tr class="top">
		<td width="50" height="25" align="center" valign="middle">&nbsp;</td>
		<td width="50" height="25" align="center" valign="middle"><a href="member.php?fields=id">���</a></td>
		<td width="100" height="25" align="center" valign="middle"><a href="member.php?fields=name">�û��˺�</td>
		<td width="100" height="25" align="center" valign="middle"><a href="member.php?fields=email">email</td>
		<td width="100" height="25" align="center" valign="middle"><a href="member.php?fields=realname">��ʵ����</a></td>
		<td width="100" height="25" align="center" valign="middle"><a href="member.php?fields=realname">�Ա�</a></td>
		<td width="150" height="25" align="center" valign="middle"><a href="member.php?fields=birthday">����</a></td>
		<td width="100" height="25" align="center" valign="middle"><a href="member.php?fields=hitnum">���͵����</a></td>
        <td width="100" height="25" align="center" valign="middle"><a href="member.php?fields=isnominate">�Ƽ�</a></td>
		<td width="100" height="25" align="center" valign="middle"><a href="member.php?fields=freeze">����/�ⶳ</a></td>
		<td width="100" height="25" align="center" valign="middle">��ϸ����</td>
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
            <td align=center valign=middle height=25>&nbsp;<a href="member_chk.php?act=nominate&amp;id=<?php echo $value['id']; ?>&amp;isnominate=<?php echo $value['isnominate']; ?>"><?php echo ($value['isnominate']==0?"��":"�Ƽ�"); ?></a></td>
			<td align=center valign=middle height=25>&nbsp;<a href="member_chk.php?act=freeze&amp;id=<?php echo $value['id']; ?>&amp;fz=<?php echo $value['freeze']; ?>"><?php echo ($value['freeze']==0?"����":"�ⶳ"); ?></a></td>
			<td align=center valign=middle height=25>&nbsp;<a href="show.php?id=<?php echo $value['id']; ?>" target="_blank">��ϸ����</a></td>
			</tr>
<?php 
	
	}
	if($totnum > 0){
?>
	<tr class="bottom">
		<td colspan="5" height="30">
		<a href="#" onclick="return alldel(showmem);">ȫѡ</a> <a href="#" onclick="return overdel(showmem);">��ѡ</a>&nbsp;&nbsp;
          <input type="submit" value="ɾ��ѡ��" class="btn" onclick = '' /></td>
		  <td colspan="6" align="right" valign="middle"><?php echo ($curpage == 1)?"��ҳ":"<a href=member.php?curpage=1&querymem=".$querymem."&signslt=".urlencode($signslt)."&cont=".$cont.">��ҳ</a>"; ?>&nbsp;<?php echo ($curpage==1)?"��һҳ":"<a href=member.php?curpage=".($curpage-1)."&querymem=".$querymem."&signslt=".urlencode($signslt)."&cont=".$cont.">��һҳ</a>"; ?>&nbsp;<?php echo ($curpage == $totpage)?'��һҳ':"<a href=member.php?curpage=".($curpage+1)."&querymem=".$querymem."&signslt=".urlencode($signslt)."&cont=".$cont.">��һҳ</a>"; ?> <?php echo ($curpage==$totpage)?"βҳ":"<a href=member.php?curpage=".$totpage."&querymem=".$querymem."&signslt=".urlencode($signslt)."&cont=".$cont.">βҳ</a>"; ?> ��ǰ�ǵ�<?php echo $curpage; ?>ҳ/��<?php echo $totpage; ?>ҳ<?php echo $totnum; ?>����¼
		  <?php if($_REQUEST["signslt"]!='exac'){;?>
		  ��ת����<select id="jump" name="jump" onchange="return jumpmem('member.php','<?php echo $sql; ?>')">
		<!--  ��ת����<select id="jump" name="jump" onchange="return add()">-->

		  	<?php
				for($i=1;$i<=$totpage;$i++){
					if($i == $curpage)
						echo "<option value=".$i." selected>".$i."</option>";
					else
						echo "<option value=".$i.">".$i."</option>";
				}
			?>
		  </select> ҳ
		  <?php }?>
		  </td>
	</tr>
<?php 
	}
	
?>
</form>
</table>