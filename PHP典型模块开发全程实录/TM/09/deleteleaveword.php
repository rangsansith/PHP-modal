<?php
include_once("conn.php");
if(mysql_query("delete from tb_leaveword where id='".$_GET["id"]."'",$conn)){
  echo "<script>alert('ÁôÑÔÉ¾³ı³É¹¦£¡');history.back();</script>";
}else{
  echo "<script>alert('ÁôÑÔÉ¾³ıÊ§°Ü£¡');history.back();</script>";
}
?>