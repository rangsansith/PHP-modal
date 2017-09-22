<?php
class pop3{
	public  $hostname="";	//POP3������
	public $port=110;		//������POP3�˿ںţ�һ��Ϊ110
  	public $timeout=5;		//�������������ʱʱ��
  	public $connection=0;	//����������������
  	public $state="DISCONNECTED";	//�����û���¼״̬
  	public $debug=0;		//��ʶ�Ƿ��ڵ���״̬�����������������Ϣ
  	public $err_str='';		//����������������Ϣ
  	public $err_no='';   	//���������������
  	public $resp;			//��ʱ�������������Ӧ��Ϣ
  	public $apop;			//ָʾ��Ҫʹ�ü��ܷ�ʽ����������֤��һ�����������Ҫ
  	public $messages;		//�����������ʼ�����
  	public $size;			//�������ʼ��ܴ�С 
  	public $mail_list;		//һά���飬��������ʼ��Ĵ�С������POP�������ϵ����
  	public $head=array();	//�����ʼ�ͷ���� 
  	public $body=array();  	//�����ʼ�����
   	function __construct($server,$port=110,$time_out=5){
		$this->hostname=$server;
		$this->port=$port;
	  	$this->timeout=$time_out;
	  	return true;
	}
	function open(){
	  	if($this->hostname==""){ //�жϷ��������Ƿ�Ϊ�գ����������ʾ��Ϣ
	    	$this->err_str="��������������";
		 	return false;
	   	}
	   	if($this->debug)
	    	echo "�������ӷ�������";
			 //����fsockopen()����POP3������
	    if(!$this->connection=@fsockopen($this->hostname,$this->port,&$err_no,&$err_str,$this->timeout)){
		 	$this->err_str="���ӷ�����ʧ�ܣ�������Ϣ��".$err_str."����ţ�".$err_no;
		 	return false;
		}else{
		  	$this->getresp(); //����getresp()��������������˻��͵���Ϣ
		  	if($this->debug) 		//��ʾ������Ϣ
		     	$this->outdebug($this->resp);
		   	if(substr($this->resp,0,3)!="+OK"){  //���������Ϣ��ǰ3���ַ���Ϊ��+OK��˵������������ʧ�ܣ�������������Ϣ
		    	$this->err_str="������������Ч��Ϣ��".$this->resp."����������Ƿ���ȷ!";
				return false;
		   	}
		   	$this->state="AUTHORIZATION";
		   	return true;  
		}
	}
	function getresp(){
		for($this->resp="";;){
		  	if(feof($this->connection))
		    	return false;
		  	$this->resp.=fgets($this->connection,100); //��fgets()������������
		  	$length=strlen($this->resp); //��ȡ������Ϣ�ĳ���
		  	if($length>=2 && substr($this->resp,$length-2,2)=="\r\n"){
			  	$this->resp=strtok($this->resp,"\r\n");//ȥ���س����з�
			  	return true;
			} 
		}
	}
	function outdebug($message){
		echo htmlspecialchars($message)."<br>\n";
	}
	function command($command,$return_length=1,$return_code='+'){
		if($this->connection==0){			 //���$this->connection��ֵΪ0��˵����û�����ӷ�����
		 	$this->err_str="û���������κη�������������������!";
		 	return false;
		}
		if($this->debug)			 //������ڵ���״̬�������������Ϣ
	    	$this->outdebug(">>> $command");
		if(!fputs($this->connection,"$command\r\n")){		 //�����������ʧ���������Ϣ
			$this->err_str="�޷���������".$command;
		   	return false;
		 }else{
		   	$this->getresp();		//�����������ɹ�����getresp()���������շ��ص���Ϣ
		   	if($this->debug)
		    	$this->outdebug($this->resp);
			if(substr($this->resp,0,$return_length)!=$return_code){	 //������ص���Ϣ�����ԡ�+����ͷ��˵�����ص���Ϣ��Ч
				$this->err_str=$command."���������������Ч��".$this->resp;
			   	return false;
			}else
			 	return true;  
		 	} 
	 	}
	function login($user,$password){
		if($this->state!="AUTHORIZATION"){	 //�����־״̬��ֵ��ΪAUTHORIZATION˵����û�������Ϸ�����
		   	$this->err_str="��û�����ӵ���������״̬����!";
		   	return false;
		}
		if(!$this->apop){ //����Ҫ���ܷ�ʽ����������֤
			if(!$this->command("USER $user",3,"+OK")) //�����������USER������÷�����Ϣ��ǰ3���ַ��Ƿ�Ϊ��+OK������֤�����Ƿ��ͳɹ�
				return false;
			if(!$this->command("PASS $password",3,"+OK")) //�����������PASS������÷�����Ϣ��ǰ3���ַ��Ƿ�Ϊ��+OK������֤�����Ƿ��ͳɹ�
			   return false;
		  	}else{		//��Ҫ���ܷ�ʽ����������֤
				if(!$this->command("APOP $user".md5($this->greeting.$password),3,"+OK")) //�����������APOP����Լ��ܵķ�ʽ���������֤
		        	return false;           
		  	} 
		  	$this->state="TRANSACTION";  //�����֤ͨ����ʹ��¼״̬�����ݳ�Ա$state��ֵΪTRANSACTION
		  	return true;  
	   }
	function stat(){
		if($this->state!="TRANSACTION"){	//�ж��û��Ƿ��Ѿ��ɹ���¼
			$this->err_str="��û�����ӵ���������û�е�¼�ɹ���";
			return false;
		}
	    if(!$this->command("STAT",3,"+OK")) //����������͡�STAT������
			return false;
		else{
			$this->resp=strtok($this->resp," "); //ȡ�á�+OK��
			$this->messages=strtok(" ");  //ȡ���ʼ�����
			$this->size=strtok(" ");  //ȡ���ʼ����ֽ���
			return true;
		}	 
	}   
	function listmail($mess=NULL,$uni_id=NULL){
		if($this->state!="TRANSACTION"){ //�ж��û��Ƿ��Ѿ��ɹ���¼
			$this->err_str="��û�����ӵ���������û�е�¼�ɹ�!";
		   	return false;
		}
		if($uni_id) //���ָ��$uni_id��ʹ�á�UIDL������
			$command="UIDL";
		else
			$command="LIST";  //���ûָ��$uni_id��ʹ�á�LIST������
		if($mess)
			$command.=$mess;  //���ָ��$mess����ʹ��$mess��ָ��������
		if(!$this->command($command,3,"+OK")){ //����command()������������
			return false;
		}else{
		    $i=0;
			$this->mail_list=array();   //�����ά���飬��������ÿ���ʼ��Ĵ�С
			$this->getresp();   //��ȡ���������ص���Ϣ
			while($this->resp!="."){   //.Ϊ�ʼ������ı�־
			 	$i++;
			 	if($this->debug){
			    	$this->outdebug($this->resp);
			  	}
			 	if($uni_id){
			  		$this->mail_list[$i]['num']=strtok($this->resp," ");
			  		$this->mail_list[$i]['size']=strtok(" ");//��ȡĳ���ʼ��Ĵ�С
			 	}else{
			   		$this->mail_list[$i]["num"]=intval(strtok($this->resp," "));
			   		$this->mail_list[$i]["size"]=intval(strtok(" "));
			  	}
			 	$this->getresp(); 
			}
			return true;
		}
	}
	function getmail($num=1,$line=-1){
		if($this->state!="TRANSACTION"){ //�ж��û��Ƿ��Ѿ��ɹ���¼
			$this->err_str="�������ʼ�����û�����ӷ��������¼�ɹ���";
		    return false;
		}
	    if($line<0) //���$line<0�򷵻����е��ʼ�����
			$command="RETR $num";
	  	else		 //���$line>=0�򷵻��ʼ�ǰ$num������
			$command="TOP $num $line";
		if(!$this->command("$command",3,"+OK")) //���������������
			return false;
		else{
		 	$this->getresp();//�������ͳɹ������ȡ������Ϣ
			$is_head=true;
			while($this->resp!="."){
				if($this->debug)
			    	$this->outdebug($this->resp);
			   	if(substr($this->resp,0,1)==".")//.��Ϊ�ʼ������ı�־
			    	$this->resp=substr($this->resp,1,strlen($this->resp)-1);	
			   	if(trim($this->resp)=="")  //�ʼ�ͷ���ʼ������Կ��зָ�
					$is_head=false;
			   	if($is_head)
					$this->head[]=$this->resp; //���ʼ�ͷÿһ�е����ݷŵ�head[]������
			   	else
			    	$this->body[]=$this->resp; //���ʼ����ݵ�ÿһ�зŵ�body[]������
					$this->getresp();	 
			}
		 	return true;
		 }	
	}
	function dele($num){
		if($this->state!="TRANSACTION"){//�ж��û��Ƿ��Ѿ��ɹ���¼
			$this->err_str="����ɾ���ʼ�";
		   return false;
		}
		if(!$num){
			$this->err_str="ɾ�����ʼ��������ԣ�";
			return false;
		} 
		if($this->command("DELE $num",3,"+OK"))//ɾ��$numָ�����ʼ�
			return true;
		else 
			return false;	
	}
	function close(){					  //����dele()��������ɾ��$numָ�����ʼ�
		if($this->connection!=0){
			if($this->state=="TRANSACTION")
		   		$this->command("QUIT",3,"+OK"); //�����������QUIT����Ӷ��Ͽ�������������Ӻ�ִ�С�DELE������
		   		fclose($this->connection);
		   		$this->connection=NULL;
		   		$this->state="DISCONNECTED";
		 	}
		} 
	}
?>
