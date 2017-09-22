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
			<td colspan="4" height="25" align="left" valign="middle">&nbsp;[引用]&nbsp;标题:<?php echo $artarr1[0]['title']; ?></td>
			<td width="200">发表时间：<?php echo $artarr[0]['firsttime']; ?></td>
		</tr>
		<tr>
			<td width="100">文章类别：<?php echo $artarr[0]['typename']; ?></td>
			<td width="100" height="25">点击：<?php echo $artarr[0]['hitnum']; ?>&nbsp;次</td>
			<td width="100">回复：<?php echo $artarr[0]['renum']; ?>&nbsp;次</td>
			<td colspan="4" align="center" valign="middle">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="5" height="30">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="5" height="50"><?php echo $artarr1[0]['content']; ?></td>
		</tr>
		<tr>
			<td colspan="5" height="25" align="center" valign="middle">您可以通过点击下面的地址来引用该文章，也可以直接点击&nbsp;[<a onclick="return artquote('<?php echo $_GET['uid']; ?>','<?php echo $_GET['artid']; ?>')" style="color:#FF6600;">引用</a>]&nbsp;来自动添加到您的博客空间<br /><input id="copyadd" onclick="copyaddress()" type="text" size="50" value="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" readonly="readonly" style="border: 1px #FFFFFF solid;"  />&nbsp;</td>
		</tr>
	</table>
	<?php
		}else{
	?>
	<table width="100%" border="1" cellpadding="0" cellspacing="0" align="center">
		<tr>
			<td colspan="4" height="25" align="left" valign="middle">&nbsp;标题:<?php echo $artarr[0]['title']; ?></td>
			<td width="200">发表时间：<?php echo $artarr[0]['firsttime']; ?></td>
		</tr>
		<tr>
			<td width="100">文章类别：<?php echo $artarr[0]['typename']; ?></td>
			<td width="100" height="25">点击：<?php echo $artarr[0]['hitnum']; ?>&nbsp;次</td>
			<td width="100">回复：<?php echo $artarr[0]['renum']; ?>&nbsp;次</td>
			<td colspan="4" align="center" valign="middle">&nbsp;<?php echo ($_SESSION['name'] == $_GET['uid']?'<a onclick="javascript:window.open(\'modart.php?artid='.$_GET['artid'].'\',\'modify\',\'width=660,height=550\',false)">修改</a>':'');?></td>
		</tr>
		<tr>
			<td colspan="5" height="30">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="5" height="50"><?php echo $artarr[0]['content']; ?></td>
		</tr>
		<tr>
			<td colspan="5" height="25" align="center" valign="middle">您可以通过点击下面的地址来引用该文章，也可以直接点击&nbsp;[<a onclick="return artquote('<?php echo $_GET['uid'] ?>','<?php echo $_GET['artid']; ?>')" style="color:#FF6600;">引用</a>]&nbsp;来自动添加到您的博客空间<br /><input id="copyadd" onclick="copyaddress()" type="text" size="50" value="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" readonly="readonly" style="border: 1px #FFFFFF solid;"  />&nbsp;</td>
		</tr>
	</table>
    <p />&nbsp;&nbsp;
	<?php
		}
		$reviewsql = "select * from tb_review where artid = ".$_GET['artid']." order by id desc";
		
		$num = 10;								//每页显示记录数
		$curpage = $_GET['curpage'];			//当前页
		if(empty($curpage) or is_null($curpage)){
			$curpage = 1;
		}
		$reviewsql = "select * from tb_review where artid = ".$_GET['artid']." order by id desc";
		$totnum = $conne->getRowsNum($reviewsql);		//记录数
		$totpage = ceil($totnum / $num);		//页数
		$tmpsql = $reviewsql." limit ".($num *($curpage-1)).",".$num;
		$reviewarr = $conne->getRowsArray($tmpsql);
		$conne->close_rst();
		if($reviewarr != ''){
	?>
	<table width="600" border="1" cellpadding="0" cellspacing="0" align="center">
    	<tr>
        	<td height="25" align="center" valign="middle" colspan="2">留言列表</td>
        </tr>
     <?php
	 	foreach($reviewarr as $value){
	 ?>
        <tr>
        	<td width="200" height="25" align="left" valign="middle">&nbsp;评论人：<?php echo $value['man']; ?></td>
            <td width="394" align="right" valign="middle">评论时间：<?php echo $value['firsttime']; ?>&nbsp;</td>
		</tr>
		<tr>
      		<td height="50" colspan="2" align="left" valign="middle"><div style="margin:12px;"><?php echo $value['content']; ?></div></td>
        </tr>
		
     <?php
	 	}
	 ?>
	 <tr>
			<td colspan="4" height="30" align="right" valign="middle">&nbsp;&nbsp;&nbsp;<?php echo ($curpage == 1)?"首页":"<a  onclick='return artpagination(\"showarticle.php?act=see&uid=".$_GET['uid']."&artid=".$_GET['artid']."&curpage=1\")'>首页</a>"; ?>&nbsp;<?php echo ($curpage==1)?"上一页":"<a onclick='return artpagination(\"showarticle.php?act=&uid=".$_GET['uid']."&artid=".$_GET['artid']."&curpage=".($curpage-1)."\")'>上一页</a>"; ?>&nbsp;<?php echo ($curpage == $totpage)?'下一页':"<a onclick='return artpagination(\"showarticle.php?act=&uid=".$_GET['uid']."&artid=".$_GET['artid']."&curpage=".($curpage+1)."\")'>下一页</a>"; ?> <?php echo ($curpage==$totpage)?"尾页":"<a onclick='return artpagination(\"showarticle.php?act=&uid=".$_GET['uid']."&artid=".$_GET['artid']."&curpage=".$totpage."\")'>尾页</a>"; ?> 当前是第<?php echo $curpage; ?>页/共<?php echo $totpage; ?>页<?php echo $totnum; ?>条记录  跳转到：
			  <select id="jump" name="jump" onchange="return jumpmem('showarticle.php?act=see&uid=<?php echo $_GET['uid']; ?>&artid=<?php echo $_GET['artid']; ?>')">
	
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
    </table>
    <?php
		}else{
	?>
		<div align="center">暂无评论</div>
	<?php
    	}
	?>
    <p />&nbsp;&nbsp;
    <table width="300" border="0" cellpadding="0" cellspacing="0" align="center">
	<tr>
		<td height="25" align="center" valign="middle">发表评论(如果没有登录，则评论人一栏显示“匿名”)</td>
	</tr>
	<tr>
		<td align="center" valign="middle"><textarea id="wordcont" name="wordcont" rows="5" cols="40"></textarea></td>
	</tr>
	
	<tr>
		<td height="25" align="center" valign="middle"><button id="levelword" onClick="return jsreview('<?php echo $_GET['uid']; ?>','<?php echo $_GET['artid']; ?>')" class="btn">留言</button></td>
	</tr>
</table>