<?php /* Smarty version 2.6.26, created on 2012-12-29 07:14:25
         compiled from 2/index.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php echo $this->_tpl_vars['title']; ?>
</title>

    <link rel="stylesheet" href="../css/style.css" />
</head>
<body>
购书信息：<br>
图书类别：<?php echo $this->_tpl_vars['arr'][0]; ?>
<br />
图书名称：<?php echo $this->_tpl_vars['arr']['name']; ?>
<br />
图书单价：<?php echo $this->_tpl_vars['arr']['unit_price']['price']; ?>
/<?php echo $this->_tpl_vars['arr']['unit_price']['unit']; ?>

</body>
</html>