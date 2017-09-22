<?php
	header('Content-Type:text/html;charset=gb2312');
	include_once '../config.php';
	include_once 'conn/conn.php';
	$num="";
	for($i=0;$i<4;$i++){
		$num .= dechex(rand(0,15));
	}
?>
<link type="text/css" rel="stylesheet" href="css/style.css" />
<script language="javascript" src="js/login.js"></script>
<script language="javascript" src="js/xmlhttprequest.js"></script>
<style type="text/css">
<!--
#Layer1 {
	position:absolute;
	left:75px;
	top:51px;
	width:150px;
	height:16px;
	z-index:1;
}
#Layer2 {
	position:absolute;
	left:75px;
	top:77px;
	width:150px;
	height:18px;
	z-index:2;
}
#Layer3 {
	position:absolute;
	left:75px;
	top:106px;
	width:180px;
	height:19px;
	z-index:3;
}
#Layer4 {
	position:absolute;
	left:75px;
	top:136px;
	width:170px;
	height:29px;
	z-index:4;
}
-->
</style>
<div style=" width:300px; height:200px; background-image:url(images/login.gif); background-position:left; background-repeat:no-repeat;">
<div id="Layer1">用户名：<input id="lgname" name="lgname" type="text" class="txt" style="width:100px;" />
</div>
<div id="Layer2">密&nbsp;&nbsp;码：<input id="lgpwd" name="lgpwd" type="password" class="txt" style="width:100px;" />
</div>
<div id="Layer3">
  <div style=" float:left;">验证码：<input id="lgchk" name="lgchk" type="text" style=" width:75px;" />
  </div>
  <div style="float: right; clear: none;"><img src="inc/valcode.php?num=<?php echo $num; ?>" width="55" height="18" /></div>
</div>
<div id="Layer4"><input id="chknm" name="chknm" type="hidden" value="<?php echo $num; ?>"  /><input id="lgbtn" name="lgbtn" type="button" class="btn" value="登录" />&nbsp;&nbsp;<a id="reg">注册</a></div>
</div>
