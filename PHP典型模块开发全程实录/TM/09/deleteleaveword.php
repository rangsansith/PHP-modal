<?php
include_once("conn.php");
if(mysql_query("delete from tb_leaveword where id='".$_GET["id"]."'",$conn)){
  echo "<script>alert('����ɾ���ɹ���');history.back();</script>";
}else{
  echo "<script>alert('����ɾ��ʧ�ܣ�');history.back();</script>";
}
?>