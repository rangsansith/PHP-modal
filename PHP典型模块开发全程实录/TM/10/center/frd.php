<?php
	session_start();
	header('Content-Type:text/html;charset=gb2312');
	include_once '../conn/conn.php';
	inclcde_once '../config.php';
	if(!empty($_GET['uid']) and !is_null($_GET['uid'])){
		$num = 6;								//ÿҳ��ʾ��¼��
		$curpage = $_GET['curpage'];			//��ǰҳ
		if(empty($curpage) or is_null($curpage)){
			$curpage = 1;
		}
			$sql = "select * from tb_frd where frdmem = '".$_GET['uid']."'";
			$totnum = $conne->getRowsNum($sql);		//��¼��
			$totpage = ceil($totnum / $num);		//ҳ��
			$tmpsql = $sql." limit ".($num *($curpage-1)).",".$num;
			$arr = $conne->getRowsArray($tmpsql);
			$conne->close_rst();
			if($arr != ''){ 
?>
<table border="1" cellpadding="0" cellspacing="0" align="center">
 	<tr>
    	<td height="25" colspan="3" align="center" valign="middle">�����б�</td>
<?php
				$rdnum=0;
				foreach($arr as $key => $value){
					$showsql = "select * from tb_member where name = '".$value['frdname']."'";
					$showarr = $conne->getRowsArray($showsql);
						$conne->close_rst();
						if($rdnum % 2 == 0){
?>
</tr><tr>
<?php
						}
?>
    <td align="center" valign="middle">
    	<table border="0" cellpadding="0" cellspacing="0">
        	<tr>
            	<td width="100" rowspan="5"  align="center" valign="middle"><img src="<?php echo PATH.ROOT.HEADGIF.$showarr[0]['headgif']; ?>" border="0" width="60" height="60" /></td>
          </tr>
            <tr>
            	<td width="300" height="25">�����ǳƣ�<?php echo $showarr[0]['name']; ?>&nbsp;�Ա�<?php echo $showarr[0]['sex']; ?></td>
            </tr>
            <tr>
            	<td height="25">&nbsp;Email:<?php echo $showarr[0]['email'] ?></td>
            </tr>
            <tr>
            	<td height="25">����ʣ�<?php echo $showarr[0]['hitnum']; ?>&nbsp;qq:<?php echo $showarr[0]['qq']; ?></td>
            </tr>
            <tr>
            	<td height="25">����¼ʱ�䣺<?php echo $showarr[0]['lasttime']; ?></td>
            </tr>
            <tr>
            	<td height="25" align="center" valign="middle">&nbsp;</td>
            	<td height="25" align="left" valign="middle"><a href='<?php echo 'center.php?uid='.$showarr[0]['name']; ?>'>���벩��</a>&nbsp;</td>
            </tr>
      </table>
    </td>
<?
						$rdnum++;
					}
?>
	</tr>
<?php
	?>
		<tr>
			<td colspan="4" height="30" align="right" valign="middle">&nbsp;&nbsp;&nbsp;<?php echo ($curpage == 1)?"��ҳ":"<a  onclick='return artpagination(\"frd.php?uid=".$_GET['uid']."&curpage=1\")'>��ҳ</a>"; ?>&nbsp;<?php echo ($curpage==1)?"��һҳ":"<a onclick='return artpagination(\"frd.php?uid=".$_GET['uid']."&curpage=".($curpage-1)."\")'>��һҳ</a>"; ?>&nbsp;<?php echo ($curpage == $totpage)?'��һҳ':"<a onclick='return artpagination(\"frd.php?uid=".$_GET['uid']."&curpage=".($curpage+1)."\")'>��һҳ</a>"; ?> <?php echo ($curpage==$totpage)?"βҳ":"<a onclick='return artpagination(\"frd.php?uid=".$_GET['uid']."&curpage=".$totpage."\")'>βҳ</a>"; ?> ��ǰ�ǵ�<?php echo $curpage; ?>ҳ/��<?php echo $totpage; ?>ҳ<?php echo $totnum; ?>����¼  ��ת����
			  <select id="jump" name="jump" onchange="return jumpmem('frd.php?uid=<?php echo $_GET['uid']; ?>')">
	
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
    <div align="center">��û����Ӻ���</div>
    <?php
		}
	}
?>
