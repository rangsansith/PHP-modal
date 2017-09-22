<?php
class pop3{
	public  $hostname="";	//POP3主机名
	public $port=110;		//主机的POP3端口号，一般为110
  	public $timeout=5;		//连接主机的最大超时时间
  	public $connection=0;	//保存与主机的连接
  	public $state="DISCONNECTED";	//保存用户登录状态
  	public $debug=0;		//标识是否处于调试状态，如是则输出调试信息
  	public $err_str='';		//如果出错，保存错误信息
  	public $err_no='';   	//如果出错，保存错误号
  	public $resp;			//临时保存服务器的响应信息
  	public $apop;			//指示需要使用加密方式进行密码验证，一般服务器不需要
  	public $messages;		//保存邮箱中邮件总数
  	public $size;			//邮箱中邮件总大小 
  	public $mail_list;		//一维数组，保存各个邮件的大小及其在POP服务器上的序号
  	public $head=array();	//保存邮件头内容 
  	public $body=array();  	//保存邮件内容
   	function __construct($server,$port=110,$time_out=5){
		$this->hostname=$server;
		$this->port=$port;
	  	$this->timeout=$time_out;
	  	return true;
	}
	function open(){
	  	if($this->hostname==""){ //判断服务器名是否为空，是则给出提示信息
	    	$this->err_str="请输入主机名！";
		 	return false;
	   	}
	   	if($this->debug)
	    	echo "正在连接服务器！";
			 //利用fsockopen()连接POP3服务器
	    if(!$this->connection=@fsockopen($this->hostname,$this->port,&$err_no,&$err_str,$this->timeout)){
		 	$this->err_str="连接服务器失败，错误信息：".$err_str."错误号：".$err_no;
		 	return false;
		}else{
		  	$this->getresp(); //利用getresp()方法处理服务器端回送的信息
		  	if($this->debug) 		//显示返回信息
		     	$this->outdebug($this->resp);
		   	if(substr($this->resp,0,3)!="+OK"){  //如果返回信息的前3个字符不为“+OK”说明服务器连接失败，并给出错误信息
		    	$this->err_str="服务器回送无效信息；".$this->resp."请检查服务器是否正确!";
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
		  	$this->resp.=fgets($this->connection,100); //用fgets()函数接受命令
		  	$length=strlen($this->resp); //获取返回信息的长度
		  	if($length>=2 && substr($this->resp,$length-2,2)=="\r\n"){
			  	$this->resp=strtok($this->resp,"\r\n");//去掉回车换行符
			  	return true;
			} 
		}
	}
	function outdebug($message){
		echo htmlspecialchars($message)."<br>\n";
	}
	function command($command,$return_length=1,$return_code='+'){
		if($this->connection==0){			 //如果$this->connection的值为0，说明还没有连接服务器
		 	$this->err_str="没有连接上任何服务器，请检查网络连接!";
		 	return false;
		}
		if($this->debug)			 //如果处于调试状态，则给出调试信息
	    	$this->outdebug(">>> $command");
		if(!fputs($this->connection,"$command\r\n")){		 //如果发送命令失败则给出信息
			$this->err_str="无法发送命令".$command;
		   	return false;
		 }else{
		   	$this->getresp();		//如果发送命令成功则用getresp()方法来接收返回的信息
		   	if($this->debug)
		    	$this->outdebug($this->resp);
			if(substr($this->resp,0,$return_length)!=$return_code){	 //如果返回的信息不是以“+”开头，说明返回的信息无效
				$this->err_str=$command."命令，服务器返回无效：".$this->resp;
			   	return false;
			}else
			 	return true;  
		 	} 
	 	}
	function login($user,$password){
		if($this->state!="AUTHORIZATION"){	 //如果标志状态的值不为AUTHORIZATION说明还没有连接上服务器
		   	$this->err_str="还没有连接到服务器或状态不对!";
		   	return false;
		}
		if(!$this->apop){ //不需要加密方式进行密码验证
			if(!$this->command("USER $user",3,"+OK")) //向服务器发送USER命令，并用返回信息的前3个字符是否为“+OK”来验证命令是否发送成功
				return false;
			if(!$this->command("PASS $password",3,"+OK")) //向服务器发送PASS命令，并用返回信息的前3个字符是否为“+OK”来验证命令是否发送成功
			   return false;
		  	}else{		//需要加密方式进行密码验证
				if(!$this->command("APOP $user".md5($this->greeting.$password),3,"+OK")) //向服务器发送APOP命令，以加密的方式进行身份验证
		        	return false;           
		  	} 
		  	$this->state="TRANSACTION";  //如果验证通过则使记录状态的数据成员$state的值为TRANSACTION
		  	return true;  
	   }
	function stat(){
		if($this->state!="TRANSACTION"){	//判断用户是否已经成功登录
			$this->err_str="还没有连接到服务器或没有登录成功！";
			return false;
		}
	    if(!$this->command("STAT",3,"+OK")) //向服务器发送“STAT”命令
			return false;
		else{
			$this->resp=strtok($this->resp," "); //取得“+OK”
			$this->messages=strtok(" ");  //取得邮件总数
			$this->size=strtok(" ");  //取得邮件总字节数
			return true;
		}	 
	}   
	function listmail($mess=NULL,$uni_id=NULL){
		if($this->state!="TRANSACTION"){ //判断用户是否已经成功登录
			$this->err_str="还没有连接到服务器或没有登录成功!";
		   	return false;
		}
		if($uni_id) //如果指定$uni_id则使用“UIDL”命令
			$command="UIDL";
		else
			$command="LIST";  //如果没指定$uni_id则使用“LIST”命令
		if($mess)
			$command.=$mess;  //如果指定$mess，则使用$mess所指定的命令
		if(!$this->command($command,3,"+OK")){ //利用command()方法发送命令
			return false;
		}else{
		    $i=0;
			$this->mail_list=array();   //定义二维数组，用来保存每个邮件的大小
			$this->getresp();   //获取服务器返回的信息
			while($this->resp!="."){   //.为邮件结束的标志
			 	$i++;
			 	if($this->debug){
			    	$this->outdebug($this->resp);
			  	}
			 	if($uni_id){
			  		$this->mail_list[$i]['num']=strtok($this->resp," ");
			  		$this->mail_list[$i]['size']=strtok(" ");//获取某个邮件的大小
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
		if($this->state!="TRANSACTION"){ //判断用户是否已经成功登录
			$this->err_str="不能收邮件，还没有连接服务器或登录成功！";
		    return false;
		}
	    if($line<0) //如果$line<0则返回所有的邮件内容
			$command="RETR $num";
	  	else		 //如果$line>=0则返回邮件前$num行内容
			$command="TOP $num $line";
		if(!$this->command("$command",3,"+OK")) //向服务器发送命令
			return false;
		else{
		 	$this->getresp();//如果命令发送成功，则获取返回信息
			$is_head=true;
			while($this->resp!="."){
				if($this->debug)
			    	$this->outdebug($this->resp);
			   	if(substr($this->resp,0,1)==".")//.号为邮件结束的标志
			    	$this->resp=substr($this->resp,1,strlen($this->resp)-1);	
			   	if(trim($this->resp)=="")  //邮件头与邮件内容以空行分割
					$is_head=false;
			   	if($is_head)
					$this->head[]=$this->resp; //将邮件头每一行的内容放到head[]数组中
			   	else
			    	$this->body[]=$this->resp; //将邮件内容的每一行放到body[]数组中
					$this->getresp();	 
			}
		 	return true;
		 }	
	}
	function dele($num){
		if($this->state!="TRANSACTION"){//判断用户是否已经成功登录
			$this->err_str="不能删除邮件";
		   return false;
		}
		if(!$num){
			$this->err_str="删除的邮件参数不对！";
			return false;
		} 
		if($this->command("DELE $num",3,"+OK"))//删除$num指定的邮件
			return true;
		else 
			return false;	
	}
	function close(){					  //方法dele()的作用是删除$num指定的邮件
		if($this->connection!=0){
			if($this->state=="TRANSACTION")
		   		$this->command("QUIT",3,"+OK"); //向服务器发送QUIT命令，从而断开与服务器的连接和执行“DELE”命令
		   		fclose($this->connection);
		   		$this->connection=NULL;
		   		$this->state="DISCONNECTED";
		 	}
		} 
	}
?>
