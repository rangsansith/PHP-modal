<?php
	session_start();
	header('Content-Type:text/html; charset=gb2312');
	include_once 'conn/conn.php';
	/* ��̨��¼��֤ģ�飬��ˢ����֤
	 * ���û������������ʱ������2
	 * �����¼�ɹ���������Ա�ǳƼ�id���浽session�С��������û���¼ʱ�估ip
	 * ���۵�¼�ɹ�����ʧ�ܣ��������ռǱ�tb_log��д����Ϣ��
	 * $reback	= 1 ͨ����֤ 2 �˺ű����� 3 
	 */
	$manager = $_GET['manager'];						//��¼�û�
	$pwd =md5($_GET['pwd']);							//��¼����
	$cont = '�û�'.$manager.'���ʺ�̨����ϵͳ��';		//д��ϵͳ��־����
	$reback = '0';										//���ر���
	$sql = "select id,manager from tb_admin where manager = '".$manager."' and password = '".$pwd."'";
	$rbk = $conne->getRowsNum($sql);					//��֤�û��������������Ƿ���ȷ
	if($rbk == 1){
		$cont .= '�û�������ȷ��';
		$sql .= " and freeze = 0";
		if($conne->getRowsNum($sql) == 1){				//��֤�û��Ƿ񱻶���
			$rst = $conne->getRowsArray($sql);
			$_SESSION['manager'] = $manager;
			$_SESSION['manid'] = $rst[0]['id'];
			$reback = '1';
			if($_SERVER['REMOTE_ADDR'] !=  ''){			//��ȡ��¼IP
				$lastip = $_SERVER['REMOTE_ADDR'];
			}else if($_SERVER['HTTP_HOST']  != ''){
				$lastip = $_SERVER['HTTP_HOST'];
			}else{
				$lastip = 'unknow';
			}
			$cont .= '���û���¼ip��'.$lastip;
			$upsql = "update tb_admin set lastip = '".$lastip."',lasttime=now() where manager = '".$manager."'";
			
			$rbk = $conne->uidRst($upsql);				//�����û���¼ʱ�估ip
		}else{
			$cont .= '��¼���ܾ���ԭ�򣺸��û�������';
			$reback = '2';
		}
	}else{
		$cont .= '�û������������';
		$reback = $conne->msg_error();
	}
	$addsql = "insert into tb_log (content,operator) values ('".$cont."','".$manager."')";
	$rbk = $conne->uidRst($addsql);
	echo $reback;
?>