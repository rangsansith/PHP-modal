<?php
	session_start();
	header('content-type:text/html;charset=gb2312');
	include_once '../conn/conn.php';
if(isset($_GET['act'])){
	$act = $_GET['act'];
}else{
	$act="";
}

	$name = $_SESSION['name'];
	$num = 10;								//ÿҳ��ʾ��¼��
if(isset($_GET['curpage'])){
	$curpage = $_GET['curpage'];			//��ǰҳ
}else{
	$curpage="";
}
	if(empty($curpage) or is_null($curpage)){
		$curpage = 1;
	}
	if($act == 'del'){
		$rd = $_GET['rd'];
		$delsql = "delete from tb_mess where id = -1 ";
		if(!empty($rd)){
			$delarr = explode(',',$rd);
			foreach($delarr as $value){
				$delsql .= "or id = ".$value." ";
			}
			$delnum = $conne->uidRst($delsql);
		}
	}
	if(!empty($name) and !is_null($name)){
		$sql = "select * from tb_mess where messered = '".$name."'";
		$totnum = $conne->getRowsNum($sql);		//��¼��
		$totpage = ceil($totnum / $num);		//ҳ��
		$tmpsql = $sql." limit ".($num *($curpage-1)).",".$num;
		$arr = $conne->getRowsArray($tmpsql);
		$conne->close_rst();
		if(count($arr) > 0){ 
?>
<div id = 'showarticle'>
<table border="1" cellpadding="0" cellspacing="0" align="center">
 	<tr>
    	<td height="25" colspan="4" align="center" valign="middle" style="background-color:#f3fde8;">�����б�</td>
	</tr>
    <tr>
    <td align="center" valign="middle" width="30" height="25">&nbsp;</td>
    <td align="center" valign="middle" width="100">������</td>
    <td align="center" valign="middle" width="300">��������</td>
    <td align="center" valign="middle" width="150">����ʱ��</td>
</tr>
<?php
	foreach($arr as $key => $value){
		$showsql = "select * from tb_member where name = '".$value['frdname']."'";
		$showarr = $conne->getRowsArray($showsql);
			$conne->close_rst();
?>
<tr>
    <td align="center" valign="middle" width="30" height="25"><input id="chk[<?php echo $key; ?>]" name="chk[]" type="checkbox" value="<?php echo $value['id']; ?>" /></td>
    <td align="center" valign="middle" width="100">&nbsp;<?php echo $value['messer']; ?></td>
    <td align="center" valign="middle" width="300">&nbsp;<?php echo $value['content']; ?></td>
    <td align="center" valign="middle" width="150">&nbsp;<?php echo $value['messtime']; ?></td>
</tr>

<?php
	}
	?>
		<tr>
			<td colspan="4" height="30" align="right" valign="middle"><a href="#" onclick="return alldel('<?php echo count($arr); ?>')">ȫѡ</a> <a href="#" onclick="return overdel('<?php echo count($arr) ?>')">��ѡ</a>&nbsp;&nbsp;<button id="delbtn" name="delbtn" class="btn" onclick="return del('<?php echo $_SERVER['SCRIPT_NAME']; ?>','<?php echo count($arr); ?>',<?php echo $curpage; ?>)">ɾ��ѡ��</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($curpage == 1)?"��ҳ":"<a  onclick='return pagination(\"".$_SERVER['SCRIPT_NAME']."\",1)'>��ҳ</a>"; ?>&nbsp;<?php echo ($curpage==1)?"��һҳ":"<a onclick='return pagination(\"".$_SERVER['SCRIPT_NAME']."\",".($curpage-1).")'>��һҳ</a>"; ?>&nbsp;<?php echo ($curpage == $totpage)?'��һҳ':"<a onclick='return pagination(\"".$_SERVER['SCRIPT_NAME']."\",".($curpage+1).")'>��һҳ</a>"; ?> <?php echo ($curpage==$totpage)?"βҳ":"<a onclick='return pagination(\"".$_SERVER['SCRIPT_NAME']."\",".($totpage).")'>βҳ</a>"; ?> ��ǰ�ǵ�<?php echo $curpage; ?>ҳ/��<?php echo $totpage; ?>ҳ<?php echo $totnum; ?>����¼  ��ת����<select id="jump" name="jump" onchange="return jumpmem('<?php echo $_SERVER['SCRIPT_NAME']; ?>')">
	
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
			}else{
		?>
		<tr>
			<td colspan="4" align="center" valign="middle">��ʱû������</td>
		</tr>
		<?php	
			}
		?>
</table>
</div>
<?php
	
	}
?>
