<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$title}</title>
<link rel="stylesheet" href="css/table.css" />
<link rel="stylesheet" href="css/style.css" />
</head>
<script language="javascript" src="js/settle.js"></script>
<body>
<p>&nbsp;</p>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
<form name="form_reg" method="post" action="settle_chk.php" onSubmit="return chkreginfo(form_reg,'all')">
  <tr>
    <td height="25" colspan="4" align="center" valign="middle" class="first">订单信息</td>
  </tr>
  <tr>
    <td height="25" align="right" valign="middle" class="left">收货人：</td>
    <td width="221" height="25" align="left" valign="middle" class="center">&nbsp;<input type="text" name="taker" size="20" onBlur="chkreginfo(form_reg,0)"><div id="chknew_taker" style="color:#FF0000"></div>
	</td>
    <td width="56" align="right" valign="middle" class="center">邮编：</td>
    <td width="207" align="left" valign="middle" class="right">&nbsp;<input type="text" name="code" size="20" onBlur="chkreginfo(form_reg,1)"><div id="chknew_code" style="color:#FF0000"></div></td>
  </tr>
  <tr>
    <td width="116" height="25" align="right" valign="middle" class="left">联系电话：</td>
    <td height="25" align="left" valign="middle" class="center">&nbsp;<input type="text" name="tel" size="20" onBlur="chkreginfo(form_reg,2)"><div id="chknew_tel" style="color:#FF0000"></div>
      </td>
    <td height="25" colspan="2" align="left" valign="middle" class="center">&nbsp;</td>
    </tr>
  <tr>
    <td width="116" height="25" align="right" valign="middle" class="left">地址：</td>
    <td height="25" colspan="3" align="left" valign="middle" class="right">&nbsp;<input type="text" name="address" size="60" onBlur="chkreginfo(form_reg,3)"><div id="chknew_address" style="color:#FF0000"></div>
	</td>
  </tr>
  <tr>
    <td width="116" height="25" align="right" valign="middle" class="left">送货方式：</td>
    <td height="25" colspan="3" align="left" valign="middle" class="right">&nbsp;<select id="del" name="del">
    	<option value="平邮">平邮</option>
        <option value="快递">快递</option>
        <option value="送货上门">送货上门</option>
    </select>    </td>
  </tr>
  <tr>
    <td width="116" height="25" align="right" valign="middle" class="left"> 付款方式：</td>
    <td height="25" colspan="3" align="left" valign="middle" class="right">&nbsp;<select id="pay" name="pay">
    	<option value="银行转账">银行转账</option>
        <option value="邮局汇款">邮局汇款</option>
        <option value="支付宝">支付宝</option>
    </select>    </td>
  </tr>
  <tr>
    <td height="30" colspan="4" align="center" valign="middle"><input id="enter" name="enter" type="submit" value="提交订单" class="btn" /><input id="fst" name="fst" type="hidden" value="{$fst}" /><input id="snd" name="snd" type="hidden" value="{$snd}" /><input id="uid" name="uid" type="hidden" value="{$uid}" ></td>
  </tr>
</form>
</table>

</body>
</html>
