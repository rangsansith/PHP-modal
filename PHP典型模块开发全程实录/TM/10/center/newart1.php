<?php
  include_once 'conn/conn.php';
  if(isset($_GET['uid'])){
	$num = 7;					//ÿҳ��ʾ��¼��
	if(!isset($_GET['curpage']) ){
		$curpage = 1;
	}else{
		$curpage = $_GET['curpage'];			//��ǰҳ	
	}
	$sql = "select * from tb_article where author = '".$_GET['uid']."' order by id desc ";
	$totnum = $conne->getRowsNum($sql);		//��¼��
	$totpage = ceil($totnum / $num);		//ҳ��
	$tmpsql = $sql." limit ".($num *($curpage-1)).",".$num;	//SQL��ѯ���
	$arr = $conne->getRowsArray($tmpsql);   //��ȡ����
	$conne->close_rst();	
?>
<div style=" width: 95%; height:30px; line-height:30px; text-indent: 8px; text-align: left; color: #f79100; border-bottom:1px #acacac dashed; background-image:url(images/header10.gif); background-position: left; background-repeat:no-repeat; ">&nbsp;�����б�</div>
<table width="95%" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF">
   <tr>
    <td height="15" colspan="2" align="left">&nbsp;</td>
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
    <td width="225" height="25" align="left" valign="middle" style="color:#8cac7b;">[����]&nbsp;���±��⣺<span style=" color:#FF0000; text-decoration:underline;"><?php echo $artarr1[0]['title']; ?></span></td>
    <td width="231" align="right" valign="middle" style="color:#999999;">����ʱ�䣺<span><?php echo $value['firsttime']; ?></span>&nbsp;</td>
  </tr>
  <tr>
  	<td height="50" colspan="2" align="left" valign="top">&nbsp;<?php echo substr($artarr1[0]['content'],0,200); ?>����</td>
  </tr>
  <tr>
  	<td height="25" colspan="2" align="right" valign="middle" style=" border-bottom: 1px #CCCCCC dashed;"><a onclick="javascript:window.open('center.php?act=see&uid=<?php echo $_GET['uid']; ?>&artid=<?php echo $value['id']; ?>','showarticle','',false)"><span  style="color:#ca4d26;">| �Ķ�ȫ�� |</span></a>&nbsp;</td>
  </tr>
   <tr>
    <td height="15" colspan="2">&nbsp;</td>
  </tr>
<?php
			}else{
?>
 <tr>
    <td width="225" height="25" align="left" style=" text-indent: 8px; color:#8cac7b;">&nbsp;���±��⣺<span style=" color:#FF0000; text-decoration:underline;"><?php echo $value['title']; ?><span></td>
    <td width="231" align="right" valign="middle" style="color:#999999;" >����ʱ�䣺<span><?php echo $value['firsttime']; ?></span>&nbsp;</td>
  </tr>
  <tr>
  	<td height="50" colspan="2" align="left" valign="top">&nbsp;<?php echo substr($value['content'],0,200); ?>����</td>
  </tr>
  <tr>
  	<td height="25" colspan="2" align="right" valign="middle"   style=" border-bottom: 1px #CCCCCC dashed;"><a onclick="javascript:window.open('center.php?act=see&uid=<?php echo $_GET['uid']; ?>&artid=<?php echo $value['id']; ?>','showarticle','',false)"><span  style="color:#ca4d26;">| �Ķ�ȫ�� |</span></a>&nbsp;</td>
  </tr>
   <tr>
    <td height="15" colspan="2">&nbsp;</td>
  </tr>
<?php			
			}
		}
?>
		<tr>
			<td colspan="4" height="30" align="right" valign="middle">&nbsp;&nbsp;&nbsp;<?php echo ($curpage == 1)?"��ҳ":"<a  onclick='return artpagination(\"newart.php?act=&uid=".$_GET['uid']."&curpage=1\")'>��ҳ</a>"; ?>&nbsp;<?php echo ($curpage==1)?"��һҳ":"<a onclick='return artpagination(\"newart.php?act=&uid=".$_GET['uid']."&curpage=".($curpage-1)."\")'>��һҳ</a>"; ?>&nbsp;<?php echo ($curpage == $totpage)?'��һҳ':"<a onclick='return artpagination(\"newart.php?act=&uid=".$_GET['uid']."&curpage=".($curpage+1)."\")'>��һҳ</a>"; ?> <?php echo ($curpage==$totpage)?"βҳ":"<a onclick='return artpagination(\"newart.php?act=&uid=".$_GET['uid']."&curpage=".$totpage."\")'>βҳ</a>"; ?> ��ǰ�ǵ�<?php echo $curpage; ?>ҳ/��<?php echo $totpage; ?>ҳ<?php echo $totnum; ?>����¼  ��ת����
			  <select id="jump" name="jump" onchange="return jumpmem('newart.php?uid=<?php echo $_GET['uid']; ?>')">
	
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
    <td height="25" colspan="2">&nbsp;��ʱû������</td>
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