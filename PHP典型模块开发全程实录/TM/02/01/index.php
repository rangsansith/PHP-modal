<?php 
session_start();	//��ʼ��һ��session����  
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�򵥼�����</title>
<style type="text/css">
<!--
.STYLE1 {
	font-size: 12px;
	font-weight: bold;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.STYLE2 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style>
</head>
<body>
<?php 
//ʹ���ı��洢����

if(!isset($_SESSION['temp'])){  //�ж�$_SESSION[temp]==""��ֵ�Ƿ�Ϊ��,���е�tempΪ�Զ���ı��� 
	if(($fp=fopen("counter.txt","r"))==false){ 
		echo "���ļ�ʧ��!";
	}else{ 
		$counter=fgets($fp,1024);				//��ȡ�ļ�������
		fclose($fp);                        	//�ر��ı��ļ�
		$counter++;                         	//����������1
		$fp=fopen("counter.txt","w");       	//��д�ķ�ʽ���ı��ļ�<!---->
		fputs($fp,$counter);                	//���µ�ͳ����������1
		fclose($fp);    
	}                   	//�ر���	
		$_SESSION['temp']=1; //��������ֵ���Ӻ�,Ϊ$_SESSION[temp]��ֵ1
} 
//���ı��ļ��ж�ȡͳ������
if(($fp=fopen("counter.txt","r"))==false){
	echo "���ļ�ʧ��!";
}else{
	$counter=fgets($fp,1024);
	fclose($fp);
}  	
?>
<TABLE WIDTH=1003 BORDER=0 CELLPADDING=0 CELLSPACING=0>
	<TR>
		<TD background="images/bg3.jpg"><div align="center"><img src="images/bg.jpg" width="778" height="93"></div></TD>
	</TR>
	<TR>
		<TD height="32" background="images/bg1.jpg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="STYLE1">��ʱ��:
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
	date_times+=getSeconds();  	//��ȡ��ǰ����
	document.write(date_times);				//������
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
            <td width="671" height="420"><p>&nbsp;&nbsp;<span class="STYLE1">����ʡ���տƼ����޹�˾��һ���Լ�����������Ϊ���ĵĸ߿Ƽ�����ҵ����˾������2000��12�£���רҵ��Ӧ</span></p>
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
              <p class="STYLE1"><strong>���ļ�ֵ��</strong>�����ᴴҵ���顢ÿһ�춼�ڽ���������ʧ�ܣ��������¡�������Ρ�ƽ�Ƚ�����</p></td>
            <td width="167">&nbsp;</td>
          </tr>
          <tr>
            <td height="20">&nbsp;</td>
            <td height="40" align="center"><span class="STYLE2">��վ��ǰ��������<?php echo $counter;?></span></td>
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