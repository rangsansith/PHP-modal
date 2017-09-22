<?php 
session_start(); 
include("conn/conn.php"); 
$data1=date("Y-m-d");   		//获取当前访问时间
$data2=substr(date("Y-m-d"),0,7);
$ip=getenv('REMOTE_ADDR'); 
if(!isset($_SESSION['temp'])){ 		//判断$_SESSION[temp]==""的值是否为空,其中的temp为自定义的变量
//使用数据库存储数据
	$select=mysql_query("select * from tb_count10 where data1='$data1' and ip='$ip'",$id);
	$res=mysql_num_rows($select);
	if($res>0){
		$query1="update tb_count10 set counts=counts+1 where data1='$data1' and ip='$ip'";	
		$result1=mysql_query($query1);
	}else{
		$query="insert into tb_count10(counts,data1,data2,ip)values('1','$data1','$data2','$ip')";
        $result=mysql_query($query,$id); 
	}
 	$_SESSION['temp']=1; 			//登录以后,$_SESSION[temp]的值不为空,给$_SESSION[temp]赋一个值1
}
?>
<HTML>
<HEAD>
<TITLE>通过图形输出网站访问量</TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=gb2312">
<style type="text/css">
<!--
.STYLE1 {font-size: 12px}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
-->
</style>
</HEAD>
<BODY BGCOLOR=#FFFFFF LEFTMARGIN=0 TOPMARGIN=0 MARGINWIDTH=0 MARGINHEIGHT=0>
<TABLE WIDTH=1003 BORDER=0 CELLPADDING=0 CELLSPACING=0>
	<TR>
		<TD background="images/bg3.jpg"><div align="center"><img src="images/bg.jpg" width="773" height="154"></div></TD>
	</TR>
	<TR>
		<TD height="32" background="images/bg1.jpg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="STYLE1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<script language = "JavaScript" type = "text/javascript">
var date_time=new Date();			//创建一个Date对象
with(date_time){
	//定义变量,并为其赋值为当前年份,后加中文"年"字标识
	var date_times=getYear()+"年";
	//获取当前月份.注意月份从0开始,所以需加1,后加中文"月"标识
	date_times+=getMonth()+1+"月";
	date_times+=getDate()+"日"; 	//取当前日期,后加中文"日"标识
	date_times+=getHours()+":"; 	//获取当前小时
	date_times+=getMinutes()+":"; 	//获取当前分钟	
	date_times+=getSeconds();  		//获取当前秒数
	document.write(date_times);		//输出结果
}
</script>
 </span></TD>
	</TR>
	<TR>
		<TD height="122" align="center" valign="top" background="images/bg3.jpg"><table width="1003" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="20">&nbsp;</td>
            <td height="20">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="165" height="110">&nbsp;</td>
            <td width="671" height="420"><p>&nbsp;<span class="STYLE1">&nbsp;吉林省明日科技有限公司是一家以计算机软件技术为核心的高科技型企业，公司创建于2000年12月，是专业的应</span></p>
              <p class="STYLE1">用软件开发商和服务提供商。多年来始终致力于行业管理软件开发、数字化出版物开发制作、计算机网络系统综合</p>
              <p class="STYLE1">应用、行业电子商务网站开发等领域，涉及生产、管理、控制、仓贮、物流、营销、服务等行业。公司拥有软件开</p>
              <p class="STYLE1">发和项目实施方面的资深专家和学习型技术团队，公司的开发团队不仅是开拓进取的技术实践者，更致力于成为技</p>
              <p class="STYLE1">术的普及和传播者，并以软件工程为指导思想建立了软件研发和销售服务体系。公司基于长期研发投入和丰富的行</p>
              <p class="STYLE1">业经验，本着   “ 让客户轻松工作，同客户共同成功 ” 的奋斗目标，努力发挥“ 专业、易用、高效 ” 的产品</p>
              <p class="STYLE1">优势，竭诚为广大用户提供优质的产品和服务。</p>
              <p class="STYLE1"><strong>企业宗旨</strong>：为企业服务，打造企业智能管理平台，改善企业的管理与运作过程，提高企业效率，降低管理成本，增</p>
              <p class="STYLE1">强企业核心竞争力。为企业快速发展提供源动力。</p>
              <p class="STYLE1"><strong>企业精神</strong>：博学、创新、求实、笃行</p>
              <p class="STYLE1"><strong>公司理念</strong>：以高新技术为依托，战略性地开发具有巨大市场潜力的高价值的产品。</p>
              <p class="STYLE1"><strong>公司远景</strong>：成为拥有核心技术和核心产品的高科技公司，在某些领域具有领先的市场地位。</p>
              <p class="STYLE1"><strong>核心价值观</strong>：永葆创业激情、每一天都在进步、容忍失败，鼓励创新、充分信任、平等交流。</p>            </td>
            <td width="167">&nbsp;</td>
          </tr>
          <tr>
            <td height="20">&nbsp;</td>
            <td height="50" align="center">
	<?php 
	//以图形的形式输出数据库中的记录数
    $querys="select sum(counts) as ll from tb_count10 ";//查询数据库中总的访问量
    $results=mysql_query($querys,$id);
    $fwl=mysql_result($results,0,'ll');
	echo "----------";
	//对补位数字0的处理
	$len=strlen($fwl);   							//获取字符串的长度
	$str=str_repeat("0",6-$len);    				//获取6-$len个数字0
	for($i=0;$i<strlen($str);$i++){   				//获取变量$str的字符串长度
		$resultes=$str[$i];
		$resultes='<img src=images/0.gif>';
		echo $resultes;   							//循环输出$result的结果
	}
	//对数据库中数据的处理
	for($i=0;$i<strlen($fwl);$i++){  				//获取字符串的长度
		$result=$fwl[$i];
	    switch($result){
			//如果值为"0",则输出0.gif图片
	    	case "0"; $ret[$i]="0.gif";break;  
		    case "1"; $ret[$i]="1.gif";break; 
		    case "2"; $ret[$i]="2.gif";break;
		    case "3"; $ret[$i]="3.gif";break;
		    case "4"; $ret[$i]="4.gif";break;
		    case "5"; $ret[$i]="5.gif";break;
		    case "6"; $ret[$i]="6.gif";break;
		    case "7"; $ret[$i]="7.gif";break;
		    case "8"; $ret[$i]="8.gif";break;
		    case "9"; $ret[$i]="9.gif";break;    
		} 
		echo "<img src=images/".$ret[$i].".>";	//输出访问次数	
	}
?>
          <a href="indexs.php" class="STYLE1">网站访问量统计分析</a>              </td>
            <td>&nbsp;</td>
          </tr>
        </table></TD>
	</TR>
	<TR>
		<TD><img src="images/bg2.jpg" width=1003 height=48 ></TD>
	</TR>
</TABLE>
</BODY>
</HTML>