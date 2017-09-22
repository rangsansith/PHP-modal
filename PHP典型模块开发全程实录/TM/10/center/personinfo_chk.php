<?php
  session_start();
  header('content-type:text/html;charset=gb2312');
  include_once 'conn/conn.php';
  $reback = '0';
  $act = $_GET['act'];
  $uid = $_GET['uid'];
  $name = $_SESSION['name'];
  
  /*
	1:成功 2:没有登录 3:非法登录 4:对自己操作 5:已经加过该用户 6:该用户还没有最后确认 7:系统错误
  */
  
  //判断用户是否登录
  if(!empty($name) and !is_null($name)){
	//判断是否非法访问
	if(!empty($uid) and !is_null(!$uid)){
		//判断是否对自己操作
		if($name != $uid){
			//如果是添加好友
			if($act == 'add'){
				//判断该用户是否已经是好友
				$sql = "select * from tb_frd where frdname = '".$uid."' and frdmem = '".$name."'";
				$num = $conne->getRowsNum($sql);
					if($twonum == 0){
						//判断是否已经加过该好友
						$threesql = "select * from tb_frd where frdname = '".$name."' and frdmem = '".$uid."'";
						//已经加过，但对方还没有确认
						if($conne->getRowsNum($threesql) == 1){
							$reback = '6';
						}else{
							$addsql = "insert into tb_frd (frdname,frdmem,frdlevel) values('".$name."','".$uid."',0)";
							$addnum = $conne->uidRst($addsql);
							$reback = '1';
						}
					}else if($twonum == 1){
						$reback = '5';
					}else{
						$reback = '7';
					}
			}else if($act == 'send'){
				$reback = '1';
			}
		}else{
			$reback = '4';
		}
	}else{
		$reback = '3'; 
	}
  }else{
	$reback = '2';
  }
  $conne->close_rst();
  echo $reback;
?>