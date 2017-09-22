<?php
	session_start();
	header('content-type:text/html;charset=gb2312');
	include_once '../conn/conn.php';
	include_once '../../config.php';
if(isset($_GET['act'])){
	$act = $_GET['act'];
}else{
	$act="";
}

	$name = $_SESSION['name'];
	$num = 6;								//每页显示记录数
if(isset($_GET['curpage'])){
	$curpage = $_GET['curpage'];			//当前页
}else{
	$curpage="";
}
	if(empty($curpage) or is_null($curpage)){
		$curpage = 1;
	}
	if($act == 'del'){
		$rd = $_GET['rd'];
		$delsql = "delete from tb_frd where id = -1 ";
		if(!empty($rd)){
			$delarr = explode(',',$rd);
			foreach($delarr as $value){
				$delsql .= "or id = ".$value." ";
			}
			$delnum = $conne->uidRst($delsql);
		}
	}
	if(!empty($name) and !is_null($name)){
		$sql = "select * from tb_frd where frdmem = '".$name."'";
		$totnum = $conne->getRowsNum($sql);		//记录数
		$totpage = ceil($totnum / $num);		//页数
		$tmpsql = $sql." limit ".($num *($curpage-1)).",".$num;
		$arr = $conne->getRowsArray($tmpsql);
		$conne->close_rst();
		if(count($arr) > 0){ 
?>
<div id = 'showarticle'>
<table border="1" cellpadding="0" cellspacing="0" align="center">
 	<tr>
    	<td height="25" colspan="3" align="center" valign="middle" style="background-color:#f3fde8;">好友列表</td>
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
            	<td width="100" rowspan="5"  align="center" valign="middle"><img src="<?php echo ROOT.HEADGIF.$showarr[0]['headgif']; ?>" border="0" width="60" height="60" /></td>
          </tr>
            <tr>
            	<td height="25" width="300">好友昵称：<?php echo $showarr[0]['name']; ?>&nbsp;性别：<?php echo $showarr[0]['sex']; ?></td>
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
            	<td height="25" align="center" valign="middle"><input id="chk[<?php echo $key; ?>]" name="chk[]" type="checkbox" value="<?php echo $value['id']; ?>" /></td>
            	<td height="25"><a href='<?php echo $showarr[0]['homepage']; ?>'>进入好友博客</a>&nbsp;<a onclick="return rescripfrd('<?php echo $showarr[0]['name']; ?>')">发送小纸条</a>&nbsp;<?php echo ($value['frdlevel'] == 0)?"<a onclick='return enterfrd(\"".$value['frdname']."\")'>加为好友</a>":' '; ?></td>
            </tr>
        </table>
    </td>
<?php
	$rdnum++;
	}
?>
	</tr>
<?php
		}else{
?>
	<tr><td align="center" valign="middle" height="25">还没有添加好友</td></tr>
<?php
		}
	}
if($totnum > 0){
	?>
		<tr>
			<td colspan="4" height="30" align="right" valign="middle"><a href="#" onclick="return alldel('<?php echo count($arr); ?>')">全选</a> <a href="#" onclick="return overdel('<?php echo count($arr) ?>')">反选</a>&nbsp;&nbsp;<button id="delbtn" name="delbtn" class="btn" onclick="return del('<?php echo $_SERVER['SCRIPT_NAME']; ?>','<?php echo count($arr); ?>',<?php echo $curpage; ?>)">删除选择</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($curpage == 1)?"首页":"<a  onclick='return pagination(\"".$_SERVER['SCRIPT_NAME']."\",1)'>首页</a>"; ?>&nbsp;<?php echo ($curpage==1)?"上一页":"<a onclick='return pagination(\"".$_SERVER['SCRIPT_NAME']."\",".($curpage-1).")'>上一页</a>"; ?>&nbsp;<?php echo ($curpage == $totpage)?'下一页':"<a onclick='return pagination(\"".$_SERVER['SCRIPT_NAME']."\",".($curpage+1).")'>下一页</a>"; ?> <?php echo ($curpage==$totpage)?"尾页":"<a onclick='return pagination(\"".$_SERVER['SCRIPT_NAME']."\",".($totpage).")'>尾页</a>"; ?> 当前是第<?php echo $curpage; ?>页/共<?php echo $totpage; ?>页<?php echo $totnum; ?>条记录  跳转到：<select id="jump" name="jump" onchange="return jumpmem('<?php echo $_SERVER['SCRIPT_NAME']; ?>')">
	
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

	<?php
		}
?>
</table>
</div>
