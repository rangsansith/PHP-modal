<?php session_start();  
if(!isset($_SESSION['temp'])){ 				//�ж�$_SESSION[temp]==""��ֵ�Ƿ�Ϊ��,���е�tempΪ�Զ���ı���
	if(($fp=fopen("counter.txt","r"))==false){ 
		echo "���ļ�ʧ��!";
	}else{ 
		$counter=fgets($fp,1024);		//��ȡ�ļ�������
		fclose($fp);                    //�ر��ı��ļ�
		$counter++;                     //����������1
		$fp=fopen("counter.txt","w");   //��д�ķ�ʽ���ı��ļ�
		fputs($fp,$counter);            //���µ�ͳ����������1
		fclose($fp);    
	}                   				//�ر���	
 	$_SESSION['temp']=1; 					//Ϊ$_SESSION[temp]��һ��ֵ
}
?>
<HTML>
<HEAD>
<TITLE>ͼ�����ּ�����</TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=gb2312">
<style type="text/css">
<!--
.STYLE1 {font-size: 12px}
.STYLE2 {color: #FF0000}
-->
</style>
</HEAD>
<BODY BGCOLOR=#FFFFFF LEFTMARGIN=0 TOPMARGIN=0 MARGINWIDTH=0 MARGINHEIGHT=0>
<!-- ImageReady Slices (ͼ�����ϵͳ���Ŀ¼�޸�.jpg) -->
<TABLE WIDTH=1003 BORDER=0 CELLPADDING=0 CELLSPACING=0>
	<TR>
		<TD><img src="images/bg.jpg" width="1003" height="119"></TD>
	</TR>
	<TR>
		<TD height="32" background="images/bg1.jpg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="STYLE1">����<span class="STYLE2">��<?php //��ͼ�ε���ʽ����ı��ļ��е�����
if(($fp=fopen("counter.txt","r"))==false){
	echo "���ļ�ʧ��!";
}else{
	$counter=fgets($fp,1024);
	fclose($fp);
    $len=strlen($counter);   			//��ȡ�ַ����ĳ���
	$str=str_repeat("0",6-$len);    	//��ȡ6-$len������0
	for($i=0;$i<strlen($str);$i++){   	//��ȡ����$str���ַ�������
		$result=$str[$i];
		$result='<img src=images/0.gif>';
		echo $result;   				//ѭ�����$result�Ľ��
	}
	for($i=0;$i<strlen($counter);$i++){ //��ȡ�ַ����ĳ���
		$result=$counter[$i];
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
		echo "<img src=images/".$ret[$i].".>";		//����ı��ļ��д洢������
	}
}?>λ</span>���ʱ�ϵͳ����!</span></TD>
     
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
            <td height="20" align="center"></td>
            <td>&nbsp;</td>
          </tr>
        </table></TD>
	</TR>
	<TR>
		<TD><img src="images/bg2.jpg" width=1003 height=48 alt=""></TD>
	</TR>
</TABLE>
<!-- End ImageReady Slices -->
</BODY>
</HTML>
