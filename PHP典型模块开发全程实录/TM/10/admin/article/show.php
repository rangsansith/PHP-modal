<?php
	session_start();
	$id = $_GET['id'];
	if(!empty($id) and !is_null($id)){
		echo $id;
	}
?>