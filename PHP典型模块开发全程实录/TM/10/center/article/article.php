<?php
	session_start();	//����Session
	header('content-type:text/html;charset=gb2312');	//���ñ���
	include_once '../conn/conn.php';
if(isset($_GET['act'])){	//�ж�act����
	$act = $_GET['act'];
}else{
	$act="";
}
	$name = $_SESSION['name'];	//��ȡ��ǰ�û�
	$num = 10;								//ÿҳ��ʾ��¼��
if(isset($_GET['curpage'])){	//�ж��Ƿ�Ϊ��ǰҳ
	$curpage = $_GET['curpage'];
}else{
	$curpage ="";
}	
	if($act == 'del'){		//�����ɾ������
		$rd = $_GET['rd'];	//�õ�Ҫɾ����ID����
		$delsql = "delete from tb_article where id = -1 ";		//��ʼ��ɾ�����
		if(!empty($rd)){		//���ɾ�����в�Ϊ��
			$delarr = explode(',',$rd);		//�������תΪ����
			foreach($delarr as $value){		//ѭ������
				$delsql .= "or id = ".$value." ";  //����ɾ�����
			}
			$delnum = $conne->uidRst($delsql);		//ִ��ɾ�����
		}
	}
		if(empty($curpage) or is_null($curpage)){		//����ǵ�һ�δ򿪸�ҳ
			$curpage = 1;			//����ǰҳ������Ϊ1
		}
		if(empty($sql) or is_null($sql)){		//���SQL��ѯ���Ϊ�� 
			$sql = "select id,typename,title,hitnum,renum from tb_article where author = '".$name."' order by id desc";	//�����µĲ�ѯ���
		}
		$totnum = $conne->getRowsNum($sql);		//�ܼ�¼��
		$totpage = ceil($totnum / $num);		//��ҳ��
		$tmpsql = $sql." limit ".($num *($curpage-1)).",".$num;	//��ҳ
		$arr = $conne->getRowsArray($tmpsql);  //�õ���¼����
?>
<div id = 'showarticle'>
<table width="600" border="1" cellpadding="0" cellspacing="0" align="center">
	<tr>
		<td colspan="4" height="25px" align="center" valign="middle"  style="background-color:#f3fde8;"> �����б� </td>
	</tr>
	<tr>
		<td height="25" width="30" align="center" valign="middle">&nbsp;</td>
		<td height="25" width="100" align="center" valign="middle">���</td>
		<td height="25" width="370" align="center" valign="middle">����</td>
		<td height="25" width="100" align="center" valign="middle">�����</td>
	</tr>
<?php
	foreach($arr as $key => $value){
?>
		<tr>
		<td align="center" valign="middle" height="25"><input id="chk[<?php echo $key; ?>]" name="chk[]" type="checkbox" value="<?php echo $value['id']; ?>" /></td>
		<td align="center" valign="middle" height=25>&nbsp;<?php echo $value['typename']; ?></td>
		<td align="left" valign="middle" height=25>&nbsp;<?php echo $value['title']; ?></td>
		<td align="center" valign="middle" height=25>&nbsp;<?php echo $value['hitnum']; ?></td></tr>
<?php
}
if($totnum > 0){
	?>
		<tr>
			<td colspan="4" height="30" align="right" valign="middle">
			<a href="#" onclick="return alldel('<?php echo count($arr); ?>')">ȫѡ</a> 
			<a href="#" onclick="return overdel('<?php echo count($arr) ?>')">��ѡ</a>
			&nbsp;&nbsp;
			<button id="delbtn" name="delbtn" class="btn" onclick="return del('<?php echo $_SERVER['SCRIPT_NAME']; ?>','<?php echo count($arr); ?>',<?php echo $curpage; ?>)">ɾ��ѡ��</button>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php echo ($curpage == 1)?"��ҳ":"<a  onclick='return pagination(\"".$_SERVER['SCRIPT_NAME']."\",1)'>��ҳ</a>"; ?>
			&nbsp;
			<?php echo ($curpage==1)?"��һҳ":"<a onclick='return pagination(\"".$_SERVER['SCRIPT_NAME']."\",".($curpage-1).")'>��һҳ</a>"; ?>
			&nbsp;
			<?php echo ($curpage == $totpage)?'��һҳ':"<a onclick='return pagination(\"".$_SERVER['SCRIPT_NAME']."\",".($curpage+1).")'>��һҳ</a>"; ?> 
			<?php echo ($curpage==$totpage)?"βҳ":"<a onclick='return pagination(\"".$_SERVER['SCRIPT_NAME']."\",".($totpage).")'>βҳ</a>"; ?> 
			��ǰ�ǵ�<?php echo $curpage; ?>ҳ/��<?php echo $totpage; ?>ҳ<?php echo $totnum; ?>����¼  ��ת����<select id="jump" name="jump" onchange="return jumpmem('<?php echo $_SERVER['SCRIPT_NAME']; ?>')">
	
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
</table>
</div>