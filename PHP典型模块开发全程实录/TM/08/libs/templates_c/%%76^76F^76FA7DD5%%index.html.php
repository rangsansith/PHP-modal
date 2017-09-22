<?php /* Smarty version 2.6.26, created on 2012-12-29 08:28:38
         compiled from 5/index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count_characters', '5/index.html', 9, false),array('modifier', 'nl2br', '5/index.html', 11, false),array('modifier', 'upper', '5/index.html', 11, false),)), $this); ?>
﻿<html>
<head>

<title><?php echo $this->_tpl_vars['title']; ?>
</title>
</head>
<body>
原文：<?php echo $this->_tpl_vars['str']; ?>

<p>
变量中的字符数（包括空格）：<?php echo ((is_array($_tmp=$this->_tpl_vars['str'])) ? $this->_run_mod_handler('count_characters', true, $_tmp, true) : smarty_modifier_count_characters($_tmp, true)); ?>

<br />
使用变量修饰方法后：<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['str'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)))) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>

</body>
</html>