<?php
	session_start();
	header('Content-Type:text/html;charset=gb2312');
	include_once '../conn/conn.php';
	inclcde_once '../config.php';
	if(!empty($_GET['uid']) and !is_null($_GET['uid'])){
		$num = 6;								//每页显示记录数
		$curpage = $_GET['curpage'];			//当前页
		if(empty($curpage) or is_null($curpage)){
			$curpage = 1;
		}
			$sql = "select * from tb_frd where frdmem = '".$_GET['uid']."'";
			$totnum = $conne->getRowsNum($sql);		//记录数
			$totpage = ceil($totnum / $num);		//页数
			$tmpsql = $sql." limit ".($num *($curpage-1)).",".$num;
			$arr = $conne->getRowsArray($tmpsql);
			$conne->close_rst();
			if($arr != ''){ 
?>
<table border="1" cellpadding="0" cellspacing="0" align="center">
 	<tr>
    	<td height="25" colspan="3" align="center" valign="middle">好友列表</td>
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
            	<td width="300" height="25">好友昵称：<?php echo $showarr[0]['name']; ?>&nbsp;性别：<?php echo $showarr[0]['sex']; ?></td>
            </tr>
            <tr>
            	<td height="25">&nbsp;Email:<?php echo $showarr[0]['email'] ?></td>
            </tr>
            <tr>
            	<td height="25">点击率：<?php echo $showarr[0]['hitnum']; ?>&nbsp;qq:<?php echo $showarr[0]['qq']; ?></td>
            </tr>
            <tr>
            	<td height="25">最后登录时间：<?php echo $showarr[0]['lasttime']; ?></td>
            </tr>
            <tr>
            	<td height="25" align="center" valign="middle">&nbsp;</td>
            	<td height="25" align="left" valign="middle"><a href='<?php echo 'center.php?uid='.$showarr[0]['name']; ?>'>进入博客</a>&nbsp;</td>
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
			<td colspan="4" height="30" align="right" valign="middle">&nbsp;&nbsp;&nbsp;<?php echo ($curpage == 1)?"首页":"<a  onclick='return artpagination(\"frd.php?uid=".$_GET['uid']."&curpage=1\")'>首页</a>"; ?>&nbsp;<?php echo ($curpage==1)?"上一页":"<a onclick='return artpagination(\"frd.php?uid=".$_GET['uid']."&curpage=".($curpage-1)."\")'>上一页</a>"; ?>&nbsp;<?php echo ($curpage == $totpage)?'下一页':"<a onclick='return artpagination(\"frd.php?uid=".$_GET['uid']."&curpage=".($curpage+1)."\")'>下一页</a>"; ?> <?php echo ($curpage==$totpage)?"尾页":"<a onclick='return artpagination(\"frd.php?uid=".$_GET['uid']."&curpage=".$totpage."\")'>尾页</a>"; ?> 当前是第<?php echo $curpage; ?>页/共<?php echo $totpage; ?>页<?php echo $totnum; ?>条记录  跳转到：
			  <select id="jump" name="jump" onchange="return jumpmem('frd.php?uid=<?php echo $_GET['uid']; ?>')">
	
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
    <div align="center">还没有添加好友</div>
    <?php
		}
	}
?>
