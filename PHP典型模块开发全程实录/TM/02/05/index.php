<?php 
session_start(); 
include("conn/conn.php"); 
$data1=date("Y-m-d");   		//��ȡ��ǰ����ʱ��
$data2=substr(date("Y-m-d"),0,7);
$ip=getenv('REMOTE_ADDR'); 
if(!isset($_SESSION['temp'])){ 		//�ж�$_SESSION[temp]==""��ֵ�Ƿ�Ϊ��,���е�tempΪ�Զ���ı���
//ʹ�����ݿ�洢����
	$select=mysql_query("select * from tb_count10 where data1='$data1' and ip='$ip'",$id);
	$res=mysql_num_rows($select);
	if($res>0){
		$query1="update tb_count10 set counts=counts+1 where data1='$data1' and ip='$ip'";	
		$result1=mysql_query($query1);
	}else{
		$query="insert into tb_count10(counts,data1,data2,ip)values('1','$data1','$data2','$ip')";
        $result=mysql_query($query,$id); 
	}
 	$_SESSION['temp']=1; 			//��¼�Ժ�,$_SESSION[temp]��ֵ��Ϊ��,��$_SESSION[temp]��һ��ֵ1
}
?>
<HTML>
<HEAD>
<TITLE>ͨ��ͼ�������վ������</TITLE>
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
var date_time=new Date();			//����һ��Date����
with(date_time){
	//�������,��Ϊ�丳ֵΪ��ǰ���,�������"��"�ֱ�ʶ
	var date_times=getYear()+"��";
	//��ȡ��ǰ�·�.ע���·ݴ�0��ʼ,�������1,�������"��"��ʶ
	date_times+=getMonth()+1+"��";
	date_times+=getDate()+"��"; 	//ȡ��ǰ����,�������"��"��ʶ
	date_times+=getHours()+":"; 	//��ȡ��ǰСʱ
	date_times+=getMinutes()+":"; 	//��ȡ��ǰ����	
	date_times+=getSeconds();  		//��ȡ��ǰ����
	document.write(date_times);		//������
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
            <td width="671" height="420"><p>&nbsp;<span class="STYLE1">&nbsp;����ʡ���տƼ����޹�˾��һ���Լ�����������Ϊ���ĵĸ߿Ƽ�����ҵ����˾������2000��12�£���רҵ��Ӧ</span></p>
              <p class="STYLE1">����������̺ͷ����ṩ�̡�������ʼ����������ҵ����������������ֻ������￪�����������������ϵͳ�ۺ�</p>
              <p class="STYLE1">Ӧ�á���ҵ����������վ�����������漰�������������ơ�������������Ӫ�����������ҵ����˾ӵ�������</p>
              <p class="STYLE1">������Ŀʵʩ���������ר�Һ�ѧϰ�ͼ����Ŷӣ���˾�Ŀ����ŶӲ����ǿ��ؽ�ȡ�ļ���ʵ���ߣ��������ڳ�Ϊ��</p>
              <p class="STYLE1">�����ռ��ʹ����ߣ������������Ϊָ��˼�뽨��������з������۷�����ϵ����˾���ڳ����з�Ͷ��ͷḻ����</p>
              <p class="STYLE1">ҵ���飬����   �� �ÿͻ����ɹ�����ͬ�ͻ���ͬ�ɹ� �� �ķܶ�Ŀ�꣬Ŭ�����ӡ� רҵ�����á���Ч �� �Ĳ�Ʒ</p>
              <p class="STYLE1">���ƣ��߳�Ϊ����û��ṩ���ʵĲ�Ʒ�ͷ���</p>
              <p class="STYLE1"><strong>��ҵ��ּ</strong>��Ϊ��ҵ���񣬴�����ҵ���ܹ���ƽ̨��������ҵ�Ĺ������������̣������ҵЧ�ʣ����͹���ɱ�����</p>
              <p class="STYLE1">ǿ��ҵ���ľ�������Ϊ��ҵ���ٷ�չ�ṩԴ������</p>
              <p class="STYLE1"><strong>��ҵ����</strong>����ѧ�����¡���ʵ������</p>
              <p class="STYLE1"><strong>��˾����</strong>���Ը��¼���Ϊ���У�ս���Եؿ������о޴��г�Ǳ���ĸ߼�ֵ�Ĳ�Ʒ��</p>
              <p class="STYLE1"><strong>��˾Զ��</strong>����Ϊӵ�к��ļ����ͺ��Ĳ�Ʒ�ĸ߿Ƽ���˾����ĳЩ����������ȵ��г���λ��</p>
              <p class="STYLE1"><strong>���ļ�ֵ��</strong>�����ᴴҵ���顢ÿһ�춼�ڽ���������ʧ�ܣ��������¡�������Ρ�ƽ�Ƚ�����</p>            </td>
            <td width="167">&nbsp;</td>
          </tr>
          <tr>
            <td height="20">&nbsp;</td>
            <td height="50" align="center">
	<?php 
	//��ͼ�ε���ʽ������ݿ��еļ�¼��
    $querys="select sum(counts) as ll from tb_count10 ";//��ѯ���ݿ����ܵķ�����
    $results=mysql_query($querys,$id);
    $fwl=mysql_result($results,0,'ll');
	echo "----------";
	//�Բ�λ����0�Ĵ���
	$len=strlen($fwl);   							//��ȡ�ַ����ĳ���
	$str=str_repeat("0",6-$len);    				//��ȡ6-$len������0
	for($i=0;$i<strlen($str);$i++){   				//��ȡ����$str���ַ�������
		$resultes=$str[$i];
		$resultes='<img src=images/0.gif>';
		echo $resultes;   							//ѭ�����$result�Ľ��
	}
	//�����ݿ������ݵĴ���
	for($i=0;$i<strlen($fwl);$i++){  				//��ȡ�ַ����ĳ���
		$result=$fwl[$i];
	    switch($result){
			//���ֵΪ"0",�����0.gifͼƬ
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
		echo "<img src=images/".$ret[$i].".>";	//������ʴ���	
	}
?>
          <a href="indexs.php" class="STYLE1">��վ������ͳ�Ʒ���</a>              </td>
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