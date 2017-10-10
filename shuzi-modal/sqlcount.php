<?php
session_start();
date_default_timezone_set("PRC");
$id = mysql_connect("localhost", "root", "root");
mysql_select_db("db_counter", $id);
mysql_query("set names GBK");
$data1 = date("Y-m-d h:m:s");
$data2 = date("Y-m-d");
$ip = getenv('REMOTE_ADDR');
if (!isset($_SESSION['aa'])) {
	$query = mysql_query("select * from tb_count where ip='" . $ip . "'");
	$result = mysql_num_rows($query);
	if ($result > 0) {
		$query_1 = mysql_query("update tb_count set counts=counts+1,data1='$data1',data2='$data2' where ip='$ip'");
	}
	else{
		$query="insert into tb_count(counts,data1,data2,ip)values('1', '$data1', '$data2', '$ip')";
		$result = mysql_query($query);
	}
	$_SESSION['aa'] = 1;
}
?>