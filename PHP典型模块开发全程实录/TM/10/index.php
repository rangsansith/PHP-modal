<?php
session_start();
include_once 'center/conn/conn.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>明日博客</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="contain"> 
  <div id="header"> 
    <div id="login">  
      <div> <a onclick="javascript:window.open('center/login.php','login','width=300,height=200',false)">登录</a> 
        |&nbsp; <a onclick="javascript:window.open('center/register.php','register','',false)">注册</a>	
      </div>
    </div>
  </div>
  <div id="content"> 
    <div id="left"> 
      <div id="nomblog"> 
        <ul style=" padding-top:50px; list-style-type:none;">
          <?php
		$nommembersql = "select * from tb_member where isnominate = 1 order by id desc limit 4";
		$nommemberarr = $conne->getRowsArray($nommembersql);
		$conne->close_rst();
		if($nommemberarr != ''){
			foreach($nommemberarr as $value){
				echo '<li style="height:20px; line-weight:20px;"><a href="center/center.php?uid='.$value['name'].'" target="_blank">'.$value['blogname'].'</a></li>';
				
			}
		}
	?>
        </ul>
        <div class="more"><a onclick="open('moreinfo.php?act=nominateblog','_blank','',false)">更多>>></a></div>
      </div>
      <div id="nomart"> 
        <ul style=" padding-top:50px; list-style-type:none;">
          <?php
		$nommembersql = "select * from tb_member where isnominate = 1 order by id desc limit 4";
		$nommemberarr = $conne->getRowsArray($nommembersql);
		$conne->close_rst();
		if($nommemberarr != ''){
			foreach($nommemberarr as $value){
				echo '<li style="height:20px; line-weight:20px;"><a href="center/center.php?uid='.$value['name'].'" target="_blank">'.$value['blogname'].'</a></li>';
				
			}
		}
	?>
        </ul>
        <div class="more"><a onclick="open('moreinfo.php?act=nominatearticle','_blank','',false)">更多>>></a></div>
      </div>
    </div>
    <div id="right"> 
      <div id="left"> 
        <div id="center"></div>
      </div>
      <div id="right"> 
        <div id="hotblog"> 
          <ul style=" padding-top:50px; list-style-type:none;">
            <?php
		$hotmembersql = "select * from tb_member order by hitnum desc limit 4";
		$hotmemberarr = $conne->getRowsArray($hotmembersql);
		$conne->close_rst();
		if($hotmemberarr != ''){
			foreach($hotmemberarr as $value){
				echo '<li style=" height:20px; line-weight:20px;"><a href="center/center.php?uid='.$value['name'].'" target="_blank">'.$value['blogname'].'</a></li>';
				
			}
		}
	?>
          </ul>
          <div class="more"><a onclick="open('moreinfo.php?act=hotblog','_blank','',false)">更多>>></a></div>
        </div>
        <div id="hotart"> 
          <ul style=" padding-top:50px; list-style-type:none;">
            <?php
		$hotmembersql = "select * from tb_member order by hitnum desc limit 4";
		$hotmemberarr = $conne->getRowsArray($hotmembersql);
		$conne->close_rst();
		if($hotmemberarr != ''){
			foreach($hotmemberarr as $value){
				echo '<li style=" height:20px; line-weight:20px;"><a href="center/center.php?uid='.$value['name'].'" target="_blank">'.$value['blogname'].'</a></li>';
				
			}
		}
	?>
          </ul>
          <div class="more"><a onclick="open('moreinfo.php?act=hotarticle','_blank','',false)">更多>>></a></div>
        </div>
      </div>
    </div>
  </div>
  <div id="bottom"></div>
</div>
</body>
</html>
