<?php
	session_start();
	header('Content-Type:text/html; charset=gb2312');
	include_once 'conn/conn.php';
	/* 后台登录验证模块，无刷新验证
	 * 当用户名或密码错误时，返回2
	 * 如果登录成功，将管理员昵称及id保存到session中。并更新用户登录时间及ip
	 * 无论登录成功还是失败，都将向日记表tb_log中写入信息。
	 * $reback	= 1 通过验证 2 账号被冻结 3 
	 */
	$manager = $_GET['manager'];						//登录用户
	$pwd =md5($_GET['pwd']);							//登录密码
	$cont = '用户'.$manager.'访问后台管理系统，';		//写入系统日志内容
	$reback = '0';										//返回变量
	$sql = "select id,manager from tb_admin where manager = '".$manager."' and password = '".$pwd."'";
	$rbk = $conne->getRowsNum($sql);					//验证用户名或密码输入是否正确
	if($rbk == 1){
		$cont .= '用户输入正确，';
		$sql .= " and freeze = 0";
		if($conne->getRowsNum($sql) == 1){				//验证用户是否被冻结
			$rst = $conne->getRowsArray($sql);
			$_SESSION['manager'] = $manager;
			$_SESSION['manid'] = $rst[0]['id'];
			$reback = '1';
			if($_SERVER['REMOTE_ADDR'] !=  ''){			//获取登录IP
				$lastip = $_SERVER['REMOTE_ADDR'];
			}else if($_SERVER['HTTP_HOST']  != ''){
				$lastip = $_SERVER['HTTP_HOST'];
			}else{
				$lastip = 'unknow';
			}
			$cont .= '，用户登录ip：'.$lastip;
			$upsql = "update tb_admin set lastip = '".$lastip."',lasttime=now() where manager = '".$manager."'";
			
			$rbk = $conne->uidRst($upsql);				//更新用户登录时间及ip
		}else{
			$cont .= '登录被拒绝。原因：该用户被冻结';
			$reback = '2';
		}
	}else{
		$cont .= '用户名或密码错误。';
		$reback = $conne->msg_error();
	}
	$addsql = "insert into tb_log (content,operator) values ('".$cont."','".$manager."')";
	$rbk = $conne->uidRst($addsql);
	echo $reback;
?>