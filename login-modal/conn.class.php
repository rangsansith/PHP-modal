<?php
	// 自定义数据库类
	class opmysql{
		private $host = 'localhost';
		private $name = 'root';
		private $pwd = 'root';
		private $dbase = 'db_reglog';
		private $conn = "";
		private $result = "";
		private $msg = "";
		private $fields;
		private $fieldsNum = 0;
		private $rowsNum = 0;
		private $rowsRst = "";
		private $filesArray = array();
		private $rowsArray = array();
	

	// 构造函数
	function __construct($host="",$name="",$pwd="",$dbase=""){
		if ($host != "") {
			$this->host = $host;
		}
		if ($name != "") {
			$this->name = $name;
		}
		if ($pwd != "") {
			$this->pwd = $pwd;
		}
		if ($dbase != "") {
			$this->dbase = $dbase;
		}
		$this->init_conn();
	}

	// 连接数据库
	function init_conn(){
		$this->conn = @mysql_connect($this->host,$this->name,$this->pwd);
		@mysql_select_db($this->dbase,$this->conn);
		mysql_query("set names utf-8");
	}

	// 查询数据库
	function mysql_query_rst($sql){
		if ($this->conn =="") {
			$this->init_conn();
		}
		$this->result = @mysql_query($sql,$this->conn);
	}

	// 返回查询记录
	function getRowsNum($sql){
		$this->mysql_query_rst($sql);
		if (mysql_errno() == 0) {
			return @mysql_num_rows($this->result);
		}
		else{
			return "";
		}
	}

	// 返回单条记录
	function getRowsRst($sql){
		$this->mysql_query_rst($sql);
		if (mysql_error() == 0) {
			$this->rowsRst = mysql_fetch_array($this->result,MYSQL_ASSOC);
			return $this->rowsRst;
		}
		else{
			return "";
		}
	}

	// 返回多条记录
	function getRowsArray($sql){
		$this->mysql_query_rst($sql);
		if (mysql_errno() == 0) {
			while ($row = mysql_fetch_array($this->result,MYSQL_ASSOC)) {
				$this->rowsArray[] = $row;
			}
			return $this->rowsArray;
		}
		else{
			return "";
		}
	}

	// 返回更新、删除、添加纪录
	function uidRst($sql){
		if ($this->conn == "") {
			$this->init_conn();
		}
		@mysql_query($sql);
		$this->rowsNum = @mysql_affected_rows();
		if (mysql_errno() == 0) {
			return $this->rowsNum;
		}
		else{
			return "";
		}
	}

	// 释放内存
	function close_rst(){
		mysql_free_result($this->result);
		$this->msg = "";
		$this->fieldsNum = 0;
		$this->rowsNum = 0;
		$this->filesArray = "";
		$this->rowsArray = "";
	}

	// 关闭数据库
	function close_conn(){
		$this->close_rst();
		mysql_close($this->conn);
		$this->conn = "";
	}
}

	$conne = new opmysql();

?>