<?php /* Smarty version 2.6.19, created on 2011-02-25 16:12:33
         compiled from forminfo.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->_tpl_vars['title']; ?>
</title>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/table.css" />
</head>
<body>
<table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" colspan="4" align="center" valign="middle" class="first">订单查看 </td>
  </tr>
  <tr>
    <td width="80" height="25" align="right" valign="middle" class="left">订单号：</td>
    <td width="90" height="25" align="left" valign="middle" class="right"><font color="red">&nbsp;<?php echo $this->_tpl_vars['formarr']['formid']; ?>
</font></td>
    <td width="70" height="25" align="right" valign="middle" class="right">订单时间：</td>
    <td width="160" height="25" align="left" valign="middle" class="right">&nbsp;<?php echo $this->_tpl_vars['formarr']['formtime']; ?>
</td>
  </tr>
  
  <tr>
    <td height="25" align="right" valign="middle" class="left">下单人：</td>
    <td height="25" class="center">&nbsp;<?php echo $this->_tpl_vars['formarr']['vendee']; ?>
</td>
    <td height="25" align="right" valign="middle" class="center">收货人：</td>
    <td height="25" class="right">&nbsp;<?php echo $this->_tpl_vars['formarr']['taker']; ?>
</td>
  </tr>
  <tr align="center" valign="middle">
    <td height="25" align="right" class="left">邮编：</td>
    <td height="25" align="left" class="center">&nbsp;<?php echo $this->_tpl_vars['formarr']['code']; ?>
</td>
    <td height="25" align="right" valign="middle" class="center">电话：</td>
    <td height="25" align="left" class="right">&nbsp;<?php echo $this->_tpl_vars['formarr']['tel']; ?>
</td>
  </tr>
  <tr align="center" valign="middle">
    <td height="25" align="right" class="left">地址：</td>
    <td height="25" colspan="3" align="left" class="right">&nbsp;<?php echo $this->_tpl_vars['formarr']['address']; ?>
</td>
  </tr>
  <tr align="center" valign="middle">
    <td height="25" align="right" class="left">送货方式：</td>
    <td height="25" align="left" class="center">&nbsp;<?php echo $this->_tpl_vars['formarr']['del_method']; ?>
</td>
    <td height="25" align="center" valign="middle" class="center">付款方式：</td>
    <td height="25" align="left" class="right">&nbsp;<?php echo $this->_tpl_vars['formarr']['pay_method']; ?>
</td>
  </tr>
</table>
<table width="777" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="20">&nbsp;</td>
  </tr>
</table>
<table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" colspan="5" align="center" valign="middle" class="first">订单内容</td>
  </tr>
  <tr>
    <td width="100" height="25" align="center" valign="middle" class="left">商品名</td>
    <td width="100" height="25" align="center" valign="middle" class="center">数量</td>
    <td width="100" height="25" align="center" valign="middle" class="center">价格</td>
    <td width="100" height="25" align="center" valign="middle" class="center">价格折率</td>
    <td width="100" height="25" align="center" valign="middle" class="right">合计</td>
  </tr>
<?php $_from = $this->_tpl_vars['commname']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
  <tr>
    <td height="25" align="center" valign="middle" class="left"><?php echo $this->_tpl_vars['item']; ?>
</td>
    <td height="25" align="center" valign="middle" class="center"><?php echo $this->_tpl_vars['commnumber'][$this->_tpl_vars['key']]; ?>
</td>
    <td height="25" align="center" valign="middle" class="center"><?php echo $this->_tpl_vars['commagoprice'][$this->_tpl_vars['key']]; ?>
&nbsp;元</td>
    <td align="center" valign="middle" class="center"><?php echo $this->_tpl_vars['commfold'][$this->_tpl_vars['key']]; ?>
&nbsp;折</td>
    <td align="center" valign="middle" class="right"><?php echo $this->_tpl_vars['commagoprice'][$this->_tpl_vars['key']]*$this->_tpl_vars['commnumber'][$this->_tpl_vars['key']]; ?>
&nbsp;元</td>
  </tr>
<?php endforeach; endif; unset($_from); ?>
<tr>
	<td colspan="5" height="25" align="right" valign="middle">总消费：<?php echo $this->_tpl_vars['formarr']['total']; ?>
&nbsp;元</td>
</tr>
</table>
<p align="center">恭喜您！订单提交成功。<br />请您在一周内按您的支付方式进行汇款,汇款时注明您的<font color="red">订单号</font>!汇款后请及时通知我们。<br />注意：</font>请记住<font color="red">订单号</font>。以便日后查询及有疑问时使用。</p>

<p align="center"><input type="button" value="我要打印" onclick="window.print()" class="btn" />
<!--支付宝支付的接口操作，提交的数据-->
     <a href="<?php echo $this->_tpl_vars['link']; ?>
">支付宝支付</a>
<!--——————————————————-->
</p>
</body>
</html>