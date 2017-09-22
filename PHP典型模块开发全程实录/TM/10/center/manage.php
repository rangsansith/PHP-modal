<?php
	session_start();
	header('Content-Type:text/html;charset=gb2312');
	include_once '../config.php';
	include_once 'conn/conn.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>博客文章管理页面</title>
<script language="javascript" src="js/xmlhttprequest.js"></script>
<script language="javascript" src="js/center.js"></script>
<script language="javascript" src="js/manage.js"></script>
<script language="javascript" src="js/choose.js"></script>
<script language="javascript" src="js/article.js"></script>
<script language="javascript" src="js/frd.js"></script>
<script language="javascript" src="js/scrip.js"></script>
<script language="javascript" src="js/person.js"></script>
<script language="javascript" src="js/pics.js"></script>
<script src="js/UBBCode.JS"></script>
<link href="css/manage.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
	if(!empty($_SESSION['name']) and !is_null($_SESSION['name'])){
		$sql = "select * from tb_member where name = '".$_SESSION['name']."'";
	}
?>
<div id="contain"> 
  <div id="header"></div>
  <div id="left"> 
    <div id="fir"><a onclick="javascript:open('center.php?uid=<?php echo $_SESSION['name']; ?>','_parent','',false)">&nbsp;</a>/<a onclick="javascript:open('logout.php','_parent','',false)">&nbsp;</a></div>
    <div id="hidediv" class="blankdiv">&nbsp;</div>
    <div id="persondiv" class="bigclass">个人管理</div>
    <div id="zero" class="hiddendiv" style="display:none;"> 
      <div class="smallclass"><a id="showinfo">详细资料</a></div>
      <div class="smallclass"><a id="modinfo">修改密码</a></div>
    </div>
    <div id="artdiv" class="bigclass">文章管理</div>
    <div id="one" class="hiddendiv" style="display:none;"> 
      <div class="smallclass"><a id="addart">添加文章</a></div>
      <div class="smallclass"><a id="showart">文章列表</a></div>
      <div class="smallclass"><a id="arttype">文章类别</a></div>
    </div>
    <div id="picdiv" class="bigclass">相册管理</div>
    <div id="two" class="hiddendiv" style="display:none;"> 
      <div class="smallclass"><a id="addpic">添加相册</a></div>
      <div class="smallclass"><a id="showpic">浏览相册</a></div>
      <div class="smallclass"><a id="pictype">相册类别</a></div>
    </div>
    <div id="frddiv" class="bigclass">好友管理</div>
    <div id="four" class="hiddendiv" style="display:none;"> 
      <div class="smallclass"><a id="addfrd">添加好友</a></div>
      <div class="smallclass"><a id="showfrd">查看好友</a></div>
    </div>
    <div id="messdiv" class="bigclass">留言管理</div>
    <div id="five" class="hiddendiv" style="display:none;"> 
      <div class="smallclass"><a id="showmess">查看留言</a></div>
    </div>
    <div id="scripdiv" class="bigclass">小纸条</div>
    <div id="six" class="hiddendiv" style="display:none;"> 
      <div class="smallclass"><a id="showscrip">查看纸条</a></div>
    </div>
  </div>
  <div id="right"> 
    <div id="showmenu"></div>
  </div>
</div>
</body>
</html>