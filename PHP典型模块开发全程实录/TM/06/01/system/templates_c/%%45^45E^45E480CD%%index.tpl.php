<?php /* Smarty version 2.6.26, created on 2013-01-14 01:52:01
         compiled from index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'unhtml', 'index.tpl', 46, false),)), $this); ?>
﻿<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>分页模块设计</title>
</head>
<link rel="stylesheet" href="css/css.css"/>
<body>
<table width="1002" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="images/sy_1.jpg" width="1002" height="154"></td>
  </tr>
  <tr>
    <td><img src="images/sy_3.jpg" width="1002" height="65" border="0" usemap="#Map"></td>
  </tr>
</table>
<table width="1002" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="89">&nbsp;</td>
    <td width="825" align="center"><table width="825" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#D0D0D0">
      <tr>
        <td align="center" bgcolor="#FFFFFF">
		
 <?php if ($this->_tpl_vars['isbbs'] == 'T'): ?>
<table width="96%" height="5" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF"></td>
  </tr>
</table>
<table width="96%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#349ED8">
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
      <tr>
        <td width="10%" class="STYLE4" height="22" bgcolor="#58BAE9" >&nbsp;&nbsp;<font color="#FFFFFF">图书名称</font></td>
		<td width="60%" class="STYLE4" bgcolor="#58BAE9" ><div align="center"><font color="#FFFFFF">图书介绍</font></div></td>
        <td width="8%" class="STYLE4" height="22" bgcolor="#58BAE9" ><div align="center"><font color="#FFFFFF">出版时间</font></div>         </td>
		<td width="17%" class="STYLE4" bgcolor="#58BAE9" ><div align="center"><font color="#FFFFFF">作者</font></div></td>
      </tr>
      <?php 
      $i=1; 
       ?>
      <?php unset($this->_sections['bbsid']);
$this->_sections['bbsid']['name'] = 'bbsid';
$this->_sections['bbsid']['loop'] = is_array($_loop=$this->_tpl_vars['arraybbs']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['bbsid']['show'] = true;
$this->_sections['bbsid']['max'] = $this->_sections['bbsid']['loop'];
$this->_sections['bbsid']['step'] = 1;
$this->_sections['bbsid']['start'] = $this->_sections['bbsid']['step'] > 0 ? 0 : $this->_sections['bbsid']['loop']-1;
if ($this->_sections['bbsid']['show']) {
    $this->_sections['bbsid']['total'] = $this->_sections['bbsid']['loop'];
    if ($this->_sections['bbsid']['total'] == 0)
        $this->_sections['bbsid']['show'] = false;
} else
    $this->_sections['bbsid']['total'] = 0;
if ($this->_sections['bbsid']['show']):

            for ($this->_sections['bbsid']['index'] = $this->_sections['bbsid']['start'], $this->_sections['bbsid']['iteration'] = 1;
                 $this->_sections['bbsid']['iteration'] <= $this->_sections['bbsid']['total'];
                 $this->_sections['bbsid']['index'] += $this->_sections['bbsid']['step'], $this->_sections['bbsid']['iteration']++):
$this->_sections['bbsid']['rownum'] = $this->_sections['bbsid']['iteration'];
$this->_sections['bbsid']['index_prev'] = $this->_sections['bbsid']['index'] - $this->_sections['bbsid']['step'];
$this->_sections['bbsid']['index_next'] = $this->_sections['bbsid']['index'] + $this->_sections['bbsid']['step'];
$this->_sections['bbsid']['first']      = ($this->_sections['bbsid']['iteration'] == 1);
$this->_sections['bbsid']['last']       = ($this->_sections['bbsid']['iteration'] == $this->_sections['bbsid']['total']);
?>
      <tr>
        <td height="22" colspan="4" bgcolor='#F5F5F5'></td>
        </tr>
      <tr>
        <td height="22" class="STYLE4" style="padding-left:5px; padding-right:5px; padding-top:5px; padding-bottom:5px;" <?php  if($i%2==0){ echo "bgcolor='#F5F5F5'";} ?>>&nbsp;<a href="index.php?id=<?php echo $this->_tpl_vars['arraybbs'][$this->_sections['bbsid']['index']]['tb_book_id']; ?>
" target="_blank"><?php echo unhtml(array('content' => $this->_tpl_vars['arraybbs'][$this->_sections['bbsid']['index']]['tb_book_name']), $this);?>
</a></td>
        <td class="STYLE4" style="padding-left:5px; padding-right:5px; padding-top:5px; padding-bottom:5px;" <?php  if($i%2==0){ echo "bgcolor='#F5F5F5'";} ?>><div align="center"><?php echo $this->_tpl_vars['arraybbs'][$this->_sections['bbsid']['index']]['tb_book_synopsis']; ?>
</div></td>
        <td height="22" class="STYLE4" style="padding-left:5px; padding-right:5px; padding-top:5px; padding-bottom:5px;"  <?php  if($i%2==0){ echo"bgcolor='#F5F5F5'";} ?>><div align="center"><?php echo $this->_tpl_vars['arraybbs'][$this->_sections['bbsid']['index']]['tb_print_date']; ?>
</div></td>
        <td height="22" style="padding-left:5px; padding-right:5px; padding-top:5px; padding-bottom:5px;" class="STYLE4" <?php  if($i%2==0){ echo "bgcolor='#F5F5F5'";} ?>><div align="center"><?php echo $this->_tpl_vars['arraybbs'][$this->_sections['bbsid']['index']]['tb_book_author']; ?>
</div></td>
      </tr>
	    
	  
	  
      <?php 
      $i++; 
       ?>
      <?php endfor; endif; ?>
    </table></td>
  </tr>
</table>
 <table width="96%" height="5" border="0" align="center" cellpadding="0" cellspacing="0">
   <tr>
     <td bgcolor="#FFFFFF"></td>
   </tr>
 </table>
 <table width="96%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
   <tr>
     <td bgcolor="#FFFFFF"><table width="100%" height="23" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
         <tr>
           <td bgcolor="#E9EBEB"><table width="100%" height="22" border="0" align="center" cellpadding="0" cellspacing="0">
               <tr>
                 <td class="STYLE4">&nbsp;<?php echo $this->_tpl_vars['showpage']; ?>
</td>
               </tr>
           </table></td>
         </tr>
     </table></td>
   </tr>
 </table>
 <?php endif; ?>
 <?php if ($this->_tpl_vars['isbbstell'] == 'F' && $this->_tpl_vars['isbbs'] == 'F'): ?>
 <table width="96%" height="30" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#58BAE9">
  <tr>
    <td bgcolor="#FFFFFF"><div align="center"><font color="#FF0000">{该分类暂无论坛公告或帖子}</font></div></td>
  </tr>
</table>
<?php endif; ?>
 


		</td>
      </tr>
    </table>    </td>
    <td width="88">&nbsp;</td>
  </tr>
</table>
<img src="images/sy_21.jpg" width="1003" height="45">
</body>
</html>