<?php /* Smarty version 2.6.26, created on 2012-12-29 08:26:31
         compiled from 4/index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', '4/index.html', 1, false),)), $this); ?>
﻿<?php echo smarty_function_config_load(array('file' => "4/4.conf"), $this);?>

<html>
<head>

<title><?php echo $this->_config[0]['vars']['title']; ?>
</title>
</head>
<body bgcolor="<?php echo $this->_config[0]['vars']['bgcolor']; ?>
">
<table border="<?php echo $this->_config[0]['vars']['border']; ?>
">
<tr>
	<td><?php echo $this->_config[0]['vars']['type']; ?>
</td>
	<td><?php echo $this->_config[0]['vars']['name']; ?>
</td>
</tr>
</table>
</body>
</html>