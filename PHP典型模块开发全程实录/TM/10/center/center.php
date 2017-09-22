<?php
header('Content-Type:text/html;charset=gb2312');	
	session_start();
	include_once '../config.php';
	include_once 'conn/conn.php';
	include_once 'inc/count.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>博客文章页面</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/xmlhttprequest.js"></script>
<script language="javascript" src="js/center.js"></script>
<script language="javascript" src="js/date.js"></script>
<script language="javascript" src="js/personinfo.js"></script>
</head>
<body>
<!-- 最外层  -->
<div id="contain"> 
  <!--  头  -->
  <div id="header"> 
    <?php
	if(!empty($_SESSION['name']) and !is_null($_SESSION['name'])){
?>
    您好，欢迎光临<?php echo $_SESSION['name']; ?>的博客！<a id='blogmain' onclick="javascript:open('../index.php','_blank','',false)">首页</a>&nbsp;&nbsp;<a id='blogmain' onclick="javascript:open('manage.php','_parent','',false)">进入管理页面</a>&nbsp;<a onclick="javascript:open('logout.php','_parent','',false)">退出登录</a>&nbsp; 
    <?php	
	}else{
?>
    <a onclick="javascript:window.open('login.php','login','width=300,height=200',false)">登录</a> 
    <a onclick="javascript:window.open('register.php','register','',false)">注册</a>&nbsp; 
    <?php	
}
?>
  </div>
  <!--  导航  -->
  <div id="nav"> 
    <div id="newscrip">&nbsp; 
      <script>setInterval("shownewmess()",10000);</script>
    </div>
    <div id="rightfloat"> <a onclick='javascript:open("center.php?uid=<?php echo $_GET['uid'] ?>","_parent","",false)'>我的文章</a> 
      | <a onclick='javascript:open("center.php?act=pics&uid=<?php echo $_GET['uid'] ?>","_parent","",false)'>我的相册</a> 
      | <a onclick='javascript:open("center.php?act=person&uid=<?php echo $_GET['uid'] ?>","_parent","",false)'>我的资料</a> 
      | <a onclick='javascript:open("center.php?act=frd&uid=<?php echo $_GET['uid'] ?>","_parent","",false)'>我的好友</a></div>
  </div>
  <!--  内容  -->
  <div id="content"> 
    <!--  左侧  -->
    <div id="leftfloatcont"> 
      <div id="personinfo"> 
        <?php include 'personinfo.php'; ?>
      </div>
      <div id="date"> 
        <?php include_once 'date.html'; ?>
      </div>
      <div id="showmessdiv"> 
        <?php include_once 'mess1.php'; ?>
      </div>
    </div>
    <!--  中间  -->
    <div id="showarticlediv"> 
      <?php 
			if(isset($_GET['act']) and $_GET['act'] == ''){
				include_once 'newart1.php';
			}else if(isset($_GET['act']) and $_GET['act'] == 'see'){
				include_once 'showarticle1.php';
			}else if(isset($_GET['act']) and $_GET['act'] == 'pics'){
				include_once 'pics1.php';
			}else if(isset($_GET['act']) and $_GET['act'] == 'person'){
				include_once 'person.php';
			}else if(isset($_GET['act']) and $_GET['act'] == 'frd'){
				include_once 'frd1.php';
			}else if(isset($_GET['act']) and $_GET['act'] == 'modart'){
				include_once 'modart.php';
			}else{
				include_once 'newart1.php';
			}
		?>
    </div>
    <!--  右侧  -->
    <div id="rightfloatcont"> 
      <div> 
        <?php include_once 'hotart.php'; ?>
      </div>
      <div> 
        <?php include_once 'arttype.php'; ?>
      </div>
      <div> 
        <?php include_once 'pictype.php'; ?>
      </div>
      <div> 
        <?php include_once 'allfrd.php'; ?>
      </div>
    </div>
  </div>
</div>

</body>
</html>
