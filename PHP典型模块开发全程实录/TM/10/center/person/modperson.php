<?php
	session_start();
	header('Content-Type:text/html;charset=gb2312');
	include_once '../conn/conn.php';
	include_once '../../config.php';
	include_once '../inc/func.php';
	$name = $_SESSION['name'];
	if(!empty($name) and !is_null($name)){
		$sql = "select * from tb_member where name = '".$name."'";
		$arr = $conne->getRowsArray($sql);
	}
?>
<table id="regfm" width="637" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td height="25" colspan="4" align="center" valign="middle"  style="background-color:#f3fde8;">修改信息</td>
    </tr>
		<tr>
    <td width="137" height="25" align="center" valign="middle">&nbsp;</td>
    <td width="100" height="25" align="right" valign="middle">Email：</td>
    <td width="200" height="25" align="left" valign="middle">&nbsp;<input id="email" name="email" type="text" class="txt" value="<?php echo $arr[0]['email']; ?>" /></td>
    <td height="25">&nbsp;</td>
		</tr>
		<tr>
    <td width="137" height="25" align="center" valign="middle">&nbsp;</td>
    <td width="100" height="25" align="right" valign="middle">个人主页：</td>
    <td width="200" height="25" align="left" valign="middle">&nbsp;<input id="homepage" name="homepage" type="text" class="txt" value="<?php echo $arr[0]['homepage']; ?>" /></td>
    <td height="25">&nbsp;</td>
		</tr>
		<tr>
    <td width="137" height="25" align="center" valign="middle">&nbsp;</td>
    <td width="100" height="25" align="right" valign="middle">联系QQ：</td>
    <td width="200" height="25" align="left" valign="middle">&nbsp;<input id="qq" name="qq" type="text" class="txt" value="<?php echo $arr[0]['qq']; ?>" /></td>
    <td height="25">&nbsp;</td>
		</tr>
		<tr>
    <td width="137" height="100" align="center" valign="middle">&nbsp;</td>
    <td width="100" align="right" valign="middle">人物头像：</td>
    <td width="200" align="center" valign="middle">&nbsp;
	<img id="headimg" src="<?php echo PATH.ROOT.HEADGIF.$arr[0]['headgif']; ?>" width="60" height="60" border="0" /><br />
	<select id="headgif" name="headgif" onChange="return changegif()">
		<option value="<?php echo $arr[0]['headgif']; ?>">&nbsp;</option>
<?php
	$filearr = show_file(PATH.ROOT.HEADGIF);
	for($i=0;$i<count($filearr);$i++){
		if(in_array(strrchr($filearr[$i],'.'),array('.gif','.jpg'))){
?>
		<option value="<?php echo ROOT.HEADGIF.$filearr[$i]; ?>"><?php echo $filearr[$i]; ?></option>
<?php
		}
	}
?>
	</select>
	</td>
    <td height="25">&nbsp;</td>
		</tr>
		<tr>
    <td width="137" height="75" align="center" valign="middle">&nbsp;</td>
    <td width="100" align="right" valign="middle">个人签名：</td>
    <td width="200" align="left" valign="middle">&nbsp;<textarea id="unwrite" name="unwrite" rows="4" cols="25" ><?php echo $arr[0]['unwrite']; ?></textarea></td>
    <td height="25">&nbsp;</td>
		</tr>
		<tr>
    <td width="137" height="25" align="center" valign="middle">&nbsp;</td>
    <td width="100" height="25" align="right" valign="middle">真实姓名：</td>
    <td width="200" height="25" align="left" valign="middle">&nbsp;<input id="realname" name="realname" type="text" class="txt" value="<?php echo $arr[0]['realname']; ?>" /></td>
    <td height="25">&nbsp;</td>
		</tr>
		<tr>
    <td width="137" height="25" align="center" valign="middle">&nbsp;</td>
    <td width="100" height="25" align="right" valign="middle">性别：</td>
    <td width="200" height="25" align="left" valign="middle">&nbsp;
	<select id="sex" name="sex">
		<option value='男' <?php echo (($arr[0]['sex'] == '男')?'selected':''); ?>>男</option>
		<option value='女' <?php echo (($arr[0]['sex'] == '女')?'selected':''); ?>>女</option>
	</select>
    <td height="25">&nbsp;</td>
		</tr>
		<tr>
    <td width="137" height="25" align="center" valign="middle">&nbsp;</td>
    <td width="100" height="25" align="right" valign="middle">生日：</td>
    <td width="200" height="25" align="left" valign="middle">&nbsp;
	<select id='year' name='year'>
		<option value="<?php echo date('Y'); ?>" selected="selected"><?php echo date('Y'); ?></option>
	<?php
	for($i=1900;$i<2024;$i++){
	?>
		<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
	<?php
	}
	?>
	</select>年<select id="month" name="month">
	<?php
	for($i=1;$i<=12;$i++){
	?>
		<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
	<?php
	}
	?>
	</select>月<select id="day" name="day">
	<?php
	for($i=1;$i<=31;$i++){
	?>
		<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
	<?php
	}
	?>
	</select>日	</td>
    <td height="25">&nbsp;</td>
		</tr>
		<tr>
    <td width="137" height="25" align="center" valign="middle">&nbsp;</td>
    <td width="100" height="25" align="right" valign="middle">联系电话：</td>
    <td width="200" height="25" align="left" valign="middle">&nbsp;<input id="tel" name="tel" type="text" class="txt" value="<?php echo $arr[0]['tel']; ?>" /></td>
    <td height="25">&nbsp;</td>
		</tr>
		<tr>
    <td width="137" height="25" align="center" valign="middle">&nbsp;</td>
    <td width="100" height="25" align="right" valign="middle">联系地址：</td>
    <td width="200" height="25" align="left" valign="middle">&nbsp;<input id="address" name="address" type="text" class="txt" value="<?php echo $arr[0]['address']; ?>" /></td>
    <td height="25">&nbsp;</td>
		</tr>
	</table>
<div style="text-align:center;"><button id="modbtn" class="btn" onClick="return chkmodinfo()">修改</button></div>
