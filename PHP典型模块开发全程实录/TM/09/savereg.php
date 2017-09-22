<?php
session_start();
 include_once("conn.php");
 $usernc=$_POST["usernc"];
 $sql=mysql_query("select usernc from tb_user where usernc='".$usernc."'",$conn);
 $info=mysql_fetch_array($sql);
 if($info){
   echo "<script>alert('对不起，你的昵称已经被占用！');history.back();</script>";
   exit;
 }
 $ip=$_SERVER["REMOTE_ADDR"];
 if(mysql_query("insert into tb_user(usernc,userpwd,truename,email,qq,tel,ip,address,face,regtime,sex,usertype) values('".$usernc."','".md5(trim($_POST["userpwd"]))."','".$_POST["truename"]."','".$_POST["email"]."','".$_POST["qq"]."','".$_POST["tel"]."','".$ip."','".$_POST["address"]."','".$_POST["face"]."','".date("Y-m-d H:i:s")."','".$_POST["sex"]."','0')",$conn)){

   if($_SESSION["unc"]!=""){
    session_unregister("unc");
   }
   session_register("unc");
   $_SESSION["unc"]=$usernc;   
   echo "<script>alert('注册成功！');history.back();</script>";
 }else{
   echo "<script>alert('注册失败！');history.back();</script>";
 }
?>