<?php

	header('Content-Type:text/html;charset=gb2312');
	if(isset($_SESSION['name']) and isset($_GET['uid']) and isset($_SESSION['allow']) and isset($_SESSION['read']) and isset($_SESSION['look']) and isset($_GET['artid']) and isset($_GET['picid'])){

	$name = $_SESSION['name'];
	$uid = $_GET['uid'];
	$allow = $_SESSION['allow'];				//博客访问
	$read = $_SESSION['read'];					//文章访问
	$look = $_SESSION['look'];					//图片访问
	$artid = $_GET['artid'];
	$picid = $_GET['picid'];
		if($name != $uid){
			//博客访问
		  if($uid != ''){
			if(empty($allow) or is_null($allow)){
				$sql = "select hitnum from tb_member where name = '".$uid."'";
				$num = $conne->getFields($sql,0);
				$upsql = "update tb_member set hitnum = ".($num+1)." where name = '".$uid."'";
				$num = $conne->uidRst($upsql);
				$allow = array();
				$allow[] = $uid;
				$_SESSION['allow'] = $allow;
			}else{
				if(!in_array($uid,$allow)){
					$sql = "select hitnum from tb_member where name = '".$uid."'";
					$num = $conne->getFields($sql,0);
					$upsql = "update tb_member set hitnum = ".($num+1)." where name = '".$uid."'";
					$num = $conne->uidRst($upsql);
					$allow[] = $uid;
					$_SESSION['allow'] = $allow;
				}
			}
		  }
		  	}
		  //文章访问
		  if($artid != ''){
			if(empty($read) or is_null($read)){
				$sql = "select hitnum from tb_article where id = ".$artid;
				$num = $conne->getFields($sql,0);
				$upsql = "update tb_article set hitnum = ".($num+1)." where id = ".$artid;
				$num = $conne->uidRst($upsql);
				$read = array();
				$read[] = $artid;
				$_SESSION['read'] = $read;
			}else{
				if(!in_array($artid,$read)){
					$sql = "select hitnum from tb_article where id = ".$artid;
					$num = $conne->getFields($sql,0);
					$upsql = "update tb_article set hitnum = ".($num+1)." where id = ".$artid;
					$num = $conne->uidRst($upsql);
					$read[] = $artid;
					$_SESSION['read'] = $read;
				}
			}
		  }
			//图片访问
		  if($picid != ''){
			if(empty($look) or is_null($look)){
				$sql = "select hitnum from tb_uppics where id = ".$picid;
				$num = $conne->getFields($sql,0);
				$upsql = "update tb_uppics set hitnum = ".($num+1)." where id = ".$picid;
				$num = $conne->uidRst($upsql);
				$look = array();
				$look[] = $picid;
				$_SESSION['look'] = $look;
			}else{
				if(!in_array($picid,$look)){
					$sql = "select hitnum from tb_uppics where id = ".$picid;
					$num = $conne->getFields($sql,0);
					$upsql = "update tb_uppics set hitnum = ".($num+1)." where id = ".$picid;
					$num = $conne->uidRst($upsql);
					$look[] = $picid;
					$_SESSION['look'] = $look;
				}
			}
		  }
		}
?>