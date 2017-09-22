<?php
class opmysqli{
	private $host = '127.0.0.1';			//��������ַ
	private $name = 'root';					//��¼�˺�
	private $pwd = '111';					//��¼����
	private $dBase = 'db_blog';				//���ݿ�����
	private $conn = '';						//���ݿ�������Դ
	private $result = '';					//�����
	private $msg = '';						//���ؽ��
	private $fields;						//�����ֶ�
	private $fieldsNum = 0;					//�����ֶ���
	private $rowsNum = 0;					//���ؽ����
	private $filesArray = array();			//�����ֶ�����
	private $rowsArray = array();			//���ؽ������
	//��ʼ����
	function __construct($host='',$name='',$pwd='',$dBase=''){
		if($host != '')
			$this->host = $host;
		if($name != '')
			$this->name = $name;
		if($pwd != '')
			$this->pwd = $pwd;
		if($dBase != '')
			$this->dBase = $dBase;
		$this->init_conn();
	}
	//�������ݿ�
	function init_conn(){
		$this->conn=mysqli_connect($this->host,$this->name,$this->pwd,$this->dBase);
		mysqli_query($this->conn,"set names gb2312");
	}
	//��ѯ���
	function mysqli_query_rst($sql){
		if($this->conn == ''){
			$this->init_conn();
		}
		$this->result = @mysqli_query($this->conn,$sql);
	}
	//ȡ���ֶ��� 
	function getFieldsNum($sql){
		$this->mysqli_query_rst($sql);
		$this->fieldsNum = @mysqli_num_fields($this->result);
	}
	//ȡ�ò�ѯ�����
	function getRowsNum($sql){
		$this->mysqli_query_rst($sql);
		$this->rowsNum = @mysqli_num_rows($this->result);
		return $this->rowsNum;
	}
	//ȡ�ü�¼���飨������¼��
	function getRowsArray($sql){
		$this->mysqli_query_rst($sql);
		while($row = mysqli_fetch_array($this->result,MYSQLI_ASSOC)) {
    		$this->rowsArray[] = $row;
   		}
		return $this->rowsArray;
	}
	//���¡�ɾ������Ӽ�¼��
	function uidRst($sql){
		if($this->conn == ''){
			$this->init_conn();
		}
		@mysqli_query($this->conn,$sql);
		$this->rowsNum = @mysqli_affected_rows($this->conn);
		return $this->rowsNum;
	}
	//��ȡ��Ӧ���ֶ�ֵ
	function getFields($sql,$fields){
		$this->mysqli_query_rst($sql);
		if(mysqli_num_rows($this->result) > 0){
			$tmpfld = mysqli_fetch_row($this->result);
			$this->fields = $tmpfld[$fields];
		}
		return $this->fields;
	}
	
	//������Ϣ
	function msg_error(){
		if(mysqli_errno() != 0) {
			$this->msg = mysqli_error();
		}
		return $this->msg;
	}
	//�ͷŽ����
	function close_rst(){
		//mysqli_free_result($this->result);
		$this->msg = '';
		$this->fieldsNum = 0;
		$this->rowsNum = 0;
		$this->filesArray = '';
		$this->rowsArray = '';
	}
	//�ر����ݿ�
	function close_conn(){
		$this->close_rst();
		mysqli_close($this->conn);
		$this->conn = '';
	}
}
$conne = new opmysqli();
?>