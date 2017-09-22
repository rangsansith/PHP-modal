<?php /* Smarty version 2.6.26, created on 2012-12-04 06:33:28
         compiled from 9/index.html */ ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $this->_tpl_vars['title']; ?>
</title>
<link rel="stylesheet" href="../css/style.css" />
</head>
<body>
<!--应用php标签通过include语句调用包含文件调用-->
<?php 
include("top.php");
 ?>
<table width="99" border="0" cellpadding="0" cellspacing="0">
<tr>
     	<td height="20"><span class="STYLE1"><?php echo $this->_tpl_vars['arr1']['object']; ?>
</span></td>
   	</tr>
     <tr><td height="27">市场价：<?php echo $this->_tpl_vars['arr1']['price']; ?>
￥</td></tr>
     <tr><td height="22">热卖价：<?php echo $this->_tpl_vars['arr1']['t_price']; ?>
￥</td></tr>
</table>
<!--通过include标签包含html文件-->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "9/bottom.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>