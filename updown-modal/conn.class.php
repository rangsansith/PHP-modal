<?php
header("Content-Type:text/html; charset=utf8");
	// 自定義數據庫類
class filesql{
	private $host = 'localhost';
	private $name = 'root';
	private $pwd = 'root';
	private $dbase = 'db_netu';
	private $conn = "";
	private $result = "";
	private $msg = "";
	private $fields;
	private $fieldsNum = 0;
	private $rowsNum = 0;
	private $rowsRst = "";
	private $filesArray = array();
	private $rowsArray = array();

	// 構造函數
	function __construct($host="", $name="", $pwd="", $dbase=""){
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

	// 鏈接數據庫
	function init_conn(){
		$this->conn = @mysql_connect($this->host, $this->name, $this->pwd);
		@mysql_select_db($this->dbase, $this->conn);
		mysql_query("set names utf-8");
	}

	// 查詢數據庫
	function mysql_query_rst($sql){
		if ($this->conn == "") {
			$this->init_conn();
		}
		$this->result = @mysql_query($sql, $this->conn);
	}

	// 返回查詢記錄
	function getRowsNum($sql){
		$this->mysql_query_rst($sql);
		if (mysql_errno() == 0) {
			return @mysql_num_rows($this->result);
		}
		else{
			return "";
		}
	}

	// 返回單條記錄
	function getRowsRst($sql){
		$this->mysql_query_rst($sql);
		if (mysql_error() == 0) {
			$this->rowsRst = mysql_fetch_array($this->result, MYSQL_ASSOC);
			return $this->rowsRst;
		}
		else{
			return "";
		}
	}

	// 返回多條記錄
	function getRowsArray($sql){
		$this->mysql_query_rst($sql);
		if (mysql_errno() == 0) {
			while ($row = mysql_fetch_array($this->result, MYSQL_ASSOC)) {
				$this->rowsArray[] = $row;
			}
			return $this->rowsArray;
		}
		else{
			return "";
		}
	}

	// 返回更新、刪除、添加紀錄
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

	function getFieldsNum($sql){
		$this->mysql_query_rst($sql);
		$this->fieldsNum = @mysql_num_fields($this->result);
	}

	function getFields($sql,$fields){
		$this->mysql_query_rst($sql);
		if(mysql_errno() == 0){
			if(mysql_num_rows($this->result) > 0){
				$tmpfld = @mysql_fetch_row($this->result);
				$this->fields = $tmpfld[$fields];
				
			}
			return $this->fields;
		}else{
			return '';
		}
	}

	function msg_error(){
		if(mysql_errno() != 0) {
			$this->msg = mysql_error();
		}
		return $this->msg;
	}

	// 釋放内存
	function close_rst(){
		mysql_free_result($this->result);
		$this->msg = "";
		$this->fieldsNum = 0;
		$this->rowsNum = 0;
		$this->filesArray = "";
		$this->rowsArray = "";
	}

	// 關閉數據庫
	function close_conn(){
		$this->close_rst();
		mysql_close($this->conn);
		$this->conn = "";
	}
}

$conne = new filesql();

?>