<?php
	session_start();
	header('Content-Type:text/html;charset=gb2312');
	include_once '../config.php';
	include_once 'conn/conn.php';
	$showartsql = "select * from tb_article where id = ".$_GET['artid'];
	$artarr = $conne->getRowsArray($showartsql);
	$conne->close_rst();
		if(!empty($artarr[0]['artquote']) and !is_null($artarr[0]['artquote'])){
			$tmparr = explode(',',$artarr[0]['artquote']);
			$sql1 = "select * from tb_article where id = ".$tmparr[0];
			$artarr1 = $conne->getRowsArray($sql1);
			$conne->close_rst();
?>
	<table width="100%" border="1" cellpadding="0" cellspacing="0" align="center">
		<tr>
			<td colspan="4" height="25" align="left" valign="middle">&nbsp;[����]&nbsp;����:<?php echo $artarr1[0]['title']; ?></td>
			<td width="200">����ʱ�䣺<?php echo $artarr[0]['firsttime']; ?></td>
		</tr>
		<tr>
			<td width="100">�������<?php echo $artarr[0]['typename']; ?></td>
			<td width="100" height="25">�����<?php echo $artarr[0]['hitnum']; ?>&nbsp;��</td>
			<td width="100">�ظ���<?php echo $artarr[0]['renum']; ?>&nbsp;��</td>
			<td colspan="4" align="center" valign="middle">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="5" height="30">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="5" height="50"><?php echo $artarr1[0]['content']; ?></td>
		</tr>
		<tr>
			<td colspan="5" height="25" align="center" valign="middle">������ͨ���������ĵ�ַ�����ø����£�Ҳ����ֱ�ӵ��&nbsp;[<a onclick="return artquote('<?php echo $_GET['uid']; ?>','<?php echo $_GET['artid']; ?>')" style="color:#FF6600;">����</a>]&nbsp;���Զ���ӵ����Ĳ��Ϳռ�<br /><input id="copyadd" onclick="copyaddress()" type="text" size="50" value="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" readonly="readonly" style="border: 1px #FFFFFF solid;"  />&nbsp;</td>
		</tr>
	</table>
	<?php
		}else{
	?>
	<table width="100%" border="1" cellpadding="0" cellspacing="0" align="center">
		<tr>
			<td colspan="4" height="25" align="left" valign="middle">&nbsp;����:<?php echo $artarr[0]['title']; ?></td>
			<td width="200">����ʱ�䣺<?php echo $artarr[0]['firsttime']; ?></td>
		</tr>
		<tr>
			<td width="100">�������<?php echo $artarr[0]['typename']; ?></td>
			<td width="100" height="25">�����<?php echo $artarr[0]['hitnum']; ?>&nbsp;��</td>
			<td width="100">�ظ���<?php echo $artarr[0]['renum']; ?>&nbsp;��</td>
			<td colspan="4" align="center" valign="middle">&nbsp;<?php echo ($_SESSION['name'] == $_GET['uid']?'<a onclick="javascript:window.open(\'modart.php?artid='.$_GET['artid'].'\',\'modify\',\'width=660,height=550\',false)">�޸�</a>':'');?></td>
		</tr>
		<tr>
			<td colspan="5" height="30">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="5" height="50"><?php echo $artarr[0]['content']; ?></td>
		</tr>
		<tr>
			<td colspan="5" height="25" align="center" valign="middle">������ͨ���������ĵ�ַ�����ø����£�Ҳ����ֱ�ӵ��&nbsp;[<a onclick="return artquote('<?php echo $_GET['uid'] ?>','<?php echo $_GET['artid']; ?>')" style="color:#FF6600;">����</a>]&nbsp;���Զ���ӵ����Ĳ��Ϳռ�<br /><input id="copyadd" onclick="copyaddress()" type="text" size="50" value="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" readonly="readonly" style="border: 1px #FFFFFF solid;"  />&nbsp;</td>
		</tr>
	</table>
    <p />&nbsp;&nbsp;
	<?php
		}
		$reviewsql = "select * from tb_review where artid = ".$_GET['artid']." order by id desc";
		
		$num = 10;								//ÿҳ��ʾ��¼��
		$curpage = $_GET['curpage'];			//��ǰҳ
		if(empty($curpage) or is_null($curpage)){
			$curpage = 1;
		}
		$reviewsql = "select * from tb_review where artid = ".$_GET['artid']." order by id desc";
		$totnum = $conne->getRowsNum($reviewsql);		//��¼��
		$totpage = ceil($totnum / $num);		//ҳ��
		$tmpsql = $reviewsql." limit ".($num *($curpage-1)).",".$num;
		$reviewarr = $conne->getRowsArray($tmpsql);
		$conne->close_rst();
		if($reviewarr != ''){
	?>
	<table width="600" border="1" cellpadding="0" cellspacing="0" align="center">
    	<tr>
        	<td height="25" align="center" valign="middle" colspan="2">�����б�</td>
        </tr>
     <?php
	 	foreach($reviewarr as $value){
	 ?>
        <tr>
        	<td width="200" height="25" align="left" valign="middle">&nbsp;�����ˣ�<?php echo $value['man']; ?></td>
            <td width="394" align="right" valign="middle">����ʱ�䣺<?php echo $value['firsttime']; ?>&nbsp;</td>
		</tr>
		<tr>
      		<td height="50" colspan="2" align="left" valign="middle"><div style="margin:12px;"><?php echo $value['content']; ?></div></td>
        </tr>
		
     <?php
	 	}
	 ?>
	 <tr>
			<td colspan="4" height="30" align="right" valign="middle">&nbsp;&nbsp;&nbsp;<?php echo ($curpage == 1)?"��ҳ":"<a  onclick='return artpagination(\"showarticle.php?act=see&uid=".$_GET['uid']."&artid=".$_GET['artid']."&curpage=1\")'>��ҳ</a>"; ?>&nbsp;<?php echo ($curpage==1)?"��һҳ":"<a onclick='return artpagination(\"showarticle.php?act=&uid=".$_GET['uid']."&artid=".$_GET['artid']."&curpage=".($curpage-1)."\")'>��һҳ</a>"; ?>&nbsp;<?php echo ($curpage == $totpage)?'��һҳ':"<a onclick='return artpagination(\"showarticle.php?act=&uid=".$_GET['uid']."&artid=".$_GET['artid']."&curpage=".($curpage+1)."\")'>��һҳ</a>"; ?> <?php echo ($curpage==$totpage)?"βҳ":"<a onclick='return artpagination(\"showarticle.php?act=&uid=".$_GET['uid']."&artid=".$_GET['artid']."&curpage=".$totpage."\")'>βҳ</a>"; ?> ��ǰ�ǵ�<?php echo $curpage; ?>ҳ/��<?php echo $totpage; ?>ҳ<?php echo $totnum; ?>����¼  ��ת����
			  <select id="jump" name="jump" onchange="return jumpmem('showarticle.php?act=see&uid=<?php echo $_GET['uid']; ?>&artid=<?php echo $_GET['artid']; ?>')">
	
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
    </table>
    <?php
		}else{
	?>
		<div align="center">��������</div>
	<?php
    	}
	?>
    <p />&nbsp;&nbsp;
    <table width="300" border="0" cellpadding="0" cellspacing="0" align="center">
	<tr>
		<td height="25" align="center" valign="middle">��������(���û�е�¼����������һ����ʾ��������)</td>
	</tr>
	<tr>
		<td align="center" valign="middle"><textarea id="wordcont" name="wordcont" rows="5" cols="40"></textarea></td>
	</tr>
	
	<tr>
		<td height="25" align="center" valign="middle"><button id="levelword" onClick="return jsreview('<?php echo $_GET['uid']; ?>','<?php echo $_GET['artid']; ?>')" class="btn">����</button></td>
	</tr>
</table>