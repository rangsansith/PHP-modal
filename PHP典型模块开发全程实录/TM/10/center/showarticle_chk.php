<?php
	session_start();	//����Session
	header('Content-Type:text/html;charset=gb2312');	//���ñ���
	include_once 'conn/conn.php';	//�������ݿ���
	$artid = $_GET['artid'];	//����ID
	$quoteid = $_GET['quoteid'];	//����ID
	$name = $_SESSION['name'];	//��ǰ�û�
	$uid = $_GET['uid'];	//ԭ�����û�
	$act = $_GET['act'];	//���ֲ���
	$reback = '0';
	if(empty($act)){
	  if($name != $uid){
		$selectsql = "select renum from tb_article where id = ".$artid;
		$renum = $conne->getFields($selectsql,0);
		$upsql = "update tb_article set renum = ".(++$renum)." where id = ".$artid;
		$num = $conne->uidRst($upsql);
	  }
		$content = $_GET['cont'];
		$sql = "insert into tb_review (artid,content,man) values('".$artid."','".$content."','".($name == ''?'����':$name)."')";
		$num = $conne->uidRst($sql);
		$reback = '1';
	}else if($act == 'quote'){	//��������ò���
		if(!empty($name) and !is_null($name)){
			if($_GET['uid'] == $name){	//������������Լ�������
				$reback = '4';
			}else{
				$chkquote = $conne->getRowsNum("select artquote from tb_article where author = '".$name."'");
				if($chkquote >= 1){
					$reback = '5';
				}else{
					$selectsql = "select renum from tb_article where id = ".$quoteid;
					$renum = $conne->getFields($selectsql,0);
					$upsql = "update tb_article set renum = ".++$renum." where id = ".$quoteid;
					$num = $conne->uidRst($upsql);
					$oldid = $conne->getFields("select artquote from tb_article where id = ".$quoteid,0);
					if(!empty($oldid) and !is_null($oldid)){
						$saveid = $oldid.','.$quoteid;
					}else{
						$saveid = $quoteid;
					}
					$sql = "insert into tb_article (typename,author,artquote) values('�ռ�','".$name."','".$saveid."')";
					$num = $conne->uidRst($sql);
					if($num == 1){
						$reback = '1';
					}else{
						$reback = '3';
					}
				}
			}
		}else{
			$reback = '2';
		}
	}else if($act == 'delone'){
		$delonesql = "delete from tb_review where id= ".$_GET['rid'];
		$num = $conne->uidRst($delonesql);
		$reback = '1';
	}else if($act == 'delall'){
		$delallsql = "delete from tb_review where artid = ".$_GET['aid'];
		$num = $conne->uidRst($delallsql);
		$reback = '1';
	}
	echo $reback;
?>