<?php /* Smarty version 2.6.26, created on 2012-12-29 08:30:10
         compiled from 6/index.html */ ?>
﻿<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $this->_tpl_vars['title']; ?>
</title>
</head>

<body>
<p>
<?php if ($_GET['type'] == 'tm'): ?>
欢迎光临，<?php echo $_GET['type']; ?>

<?php else: ?>
对不起，您不是本站VIP，无权访问此栏目。
<?php endif; ?>
</body>
</html>