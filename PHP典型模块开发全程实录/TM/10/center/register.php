<?php
	session_start();
	header('Content-Type:text/html;charset=gb2312');
	include_once '../config.php';
	include_once 'inc/func.php';
?>
<script language="javascript" src="js/xmlhttprequest.js"></script>
<script language="javascript" src="js/register.js"></script>
<table id="regfm" width="700" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td height="25" colspan="4" align="center" valign="middle">博客注册页面</td>
    </tr>
  <tr>
    <td width="200" height="75" rowspan="3" align="center" valign="middle">&nbsp;</td>
    <td width="100" height="25" align="right" valign="middle">注册名称：</td>
    <td width="200" height="25" align="left" valign="middle">&nbsp;<input id="regname" name="regname" type="text" class="txt" /></td>
    <td height="25"><div id="namediv" class="regdiv">名称由英文字母和数字及下划线组成</div></td>
    </tr>
  <tr>
    <td width="100" height="25" align="right" valign="middle">注册密码：</td>
    <td width="200" height="25" align="left" valign="middle">&nbsp;<input id="regpwd1" name="regpwd1" type="password" class="txt" /></td>
    <td height="25"><div id="pwddiv1" class="regdiv">请输入密码</div></td>
    </tr>
  <tr>
    <td width="100" height="25" align="right" valign="middle">确认密码：</td>
    <td width="200" height="25" align="left" valign="middle">&nbsp;<input id="regpwd2" name="regpwd2" type="password" class="txt" /></td>
    <td height="25"><div id="pwddiv2" class="regdiv">确认密码</div></td>
    </tr>
</table>
<div id="morediv" style="display:none;">
<hr />
	<table id="regfm" width="700" border="0" cellspacing="0" cellpadding="0" align="center">
		<tr>
    <td width="200" height="25" align="center" valign="middle">&nbsp;</td>
    <td width="100" height="25" align="right" valign="middle">密保问题：</td>
    <td width="200" height="25" align="left" valign="middle">&nbsp;<input id="question" name="question" type="text" class="txt" /></td>
    <td height="25">&nbsp;</td>
		</tr>
		<tr>
    <td width="200" height="25" align="center" valign="middle">&nbsp;</td>
    <td width="100" height="25" align="right" valign="middle"> 密保答案：</td>
    <td width="200" height="25" align="left" valign="middle">&nbsp;<input id="answer" name="answer" type="text" class="txt" /></td>
    <td height="25">&nbsp;</td>
		</tr>
		<tr>
    <td width="200" height="25" align="center" valign="middle">&nbsp;</td>
    <td width="100" height="25" align="right" valign="middle">Email：</td>
    <td width="200" height="25" align="left" valign="middle">&nbsp;<input id="email" name="email" type="text" class="txt" /></td>
    <td height="25">&nbsp;</td>
		</tr>
		<tr>
    <td width="200" height="25" align="center" valign="middle">&nbsp;</td>
    <td width="100" height="25" align="right" valign="middle">个人主页：</td>
    <td width="200" height="25" align="left" valign="middle">&nbsp;<input id="homepage" name="homepage" type="text" class="txt" value="http://" /></td>
    <td height="25">&nbsp;</td>
		</tr>
		<tr>
    <td width="200" height="25" align="center" valign="middle">&nbsp;</td>
    <td width="100" height="25" align="right" valign="middle">联系QQ：</td>
    <td width="200" height="25" align="left" valign="middle">&nbsp;<input id="qq" name="qq" type="text" class="txt" /></td>
    <td height="25">&nbsp;</td>
		</tr>
		<tr>
    <td width="200" height="100" align="center" valign="middle">&nbsp;</td>
    <td width="100" align="right" valign="middle">人物头像：</td>
    <td width="200" align="center" valign="middle">&nbsp;
	<img id="headimg" src="<?php echo ROOT.HEADGIF.'null.jpg'; ?>" width="60" height="60" border="0" /><br />
	<select id="headgif" name="headgif">
		<option value="<?php echo ROOT.HEADGIF.'null.jpg'; ?>" selected="selected">默认头像</option>
<?php
	$arr = show_file(PATH.ROOT.HEADGIF);
	for($i=0;$i<count($arr);$i++){
		if(in_array(strrchr($arr[$i],'.'),array('.gif','.jpg'))){
?>
		<option value="<?php echo ROOT.HEADGIF.$arr[$i]; ?>"><?php echo $arr[$i]; ?></option>
<?php
		}
	}
?>
	</select>
	</td>
    <td height="25">&nbsp;</td>
		</tr>
		<tr>
    <td width="200" height="75" align="center" valign="middle">&nbsp;</td>
    <td width="100" align="right" valign="middle">个人签名：</td>
    <td width="200" align="left" valign="middle">&nbsp;<textarea id="unwrite" name="unwrite" rows="4" cols="25"  ></textarea></td>
    <td height="25">&nbsp;</td>
		</tr>
		<tr>
    <td width="200" height="25" align="center" valign="middle">&nbsp;</td>
    <td width="100" height="25" align="right" valign="middle">真实姓名：</td>
    <td width="200" height="25" align="left" valign="middle">&nbsp;<input id="realname" name="realname" type="text" class="txt" /></td>
    <td height="25">&nbsp;</td>
		</tr>
		<tr>
    <td width="200" height="25" align="center" valign="middle">&nbsp;</td>
    <td width="100" height="25" align="right" valign="middle">性别：</td>
    <td width="200" height="25" align="left" valign="middle">&nbsp;
	<select id="sex" name="sex">
		<option value='男' selected="selected">男</option>
		<option value='女'>女</option>
	</select>
    <td height="25">&nbsp;</td>
		</tr>
		<tr>
    <td width="200" height="25" align="center" valign="middle">&nbsp;</td>
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
	</select>日
	</td>
    <td height="25">&nbsp;</td>
		</tr>
		<tr>
    <td width="200" height="25" align="center" valign="middle">&nbsp;</td>
    <td width="100" height="25" align="right" valign="middle">联系电话：</td>
    <td width="200" height="25" align="left" valign="middle">&nbsp;<input id="tel" name="tel" type="text" class="txt" /></td>
    <td height="25">&nbsp;</td>
		</tr>
		<tr>
    <td width="200" height="25" align="center" valign="middle">&nbsp;</td>
    <td width="100" height="25" align="right" valign="middle">联系地址：</td>
    <td width="200" height="25" align="left" valign="middle">&nbsp;<input id="address" name="address" type="text" class="txt" /></td>
    <td height="25">&nbsp;</td>
		</tr>
	</table>
</div>
<div style="text-align:center;"><button id="regbtn" class="btn" disabled="disabled">注册</button>&nbsp;<button id="morebtn" class="btn">详细信息</button></div>
