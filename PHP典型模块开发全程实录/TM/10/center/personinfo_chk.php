<?php
  session_start();
  header('content-type:text/html;charset=gb2312');
  include_once 'conn/conn.php';
  $reback = '0';
  $act = $_GET['act'];
  $uid = $_GET['uid'];
  $name = $_SESSION['name'];
  
  /*
	1:�ɹ� 2:û�е�¼ 3:�Ƿ���¼ 4:���Լ����� 5:�Ѿ��ӹ����û� 6:���û���û�����ȷ�� 7:ϵͳ����
  */
  
  //�ж��û��Ƿ��¼
  if(!empty($name) and !is_null($name)){
	//�ж��Ƿ�Ƿ�����
	if(!empty($uid) and !is_null(!$uid)){
		//�ж��Ƿ���Լ�����
		if($name != $uid){
			//�������Ӻ���
			if($act == 'add'){
				//�жϸ��û��Ƿ��Ѿ��Ǻ���
				$sql = "select * from tb_frd where frdname = '".$uid."' and frdmem = '".$name."'";
				$num = $conne->getRowsNum($sql);
					if($twonum == 0){
						//�ж��Ƿ��Ѿ��ӹ��ú���
						$threesql = "select * from tb_frd where frdname = '".$name."' and frdmem = '".$uid."'";
						//�Ѿ��ӹ������Է���û��ȷ��
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