<?php 
session_start(); 
include("conn/conn.php"); 
$data1=date("Y-m-d h:m:s");   	//��ȡ��ǰ����ʱ��
$data2=date("Y-m-d");  			//��ȡ��ǰ����ʱ��
$ip=getenv('REMOTE_ADDR');
if($_SESSION['temp']==""){ 		//�ж�$_SESSION[temp]==""��ֵ�Ƿ�Ϊ��,���е�tempΪ�Զ���ı���
	//ʹ�����ݿ�洢����
	$query=mysql_query("select * from tb_count04 where ip='$ip'");
	$result=mysql_num_rows($query);
	if($result>0){
		$query_1=mysql_query("update tb_count04 set counts=counts+1,data1='$data1',data2='$data2' where ip='$ip'");
	}else{
		$query="insert into tb_count04(counts,data1,data2,ip)values('1','$data1','$data2','$ip')";
        $result=mysql_query($query); 
	}
	$_SESSION['temp']=1; 			//��¼�Ժ�,$_SESSION[temp]��ֵ��Ϊ��,��$_SESSION[temp]��һ��ֵ1
}
?>
<HTML>
<HEAD>
<TITLE>���ݿ����ּ�����</TITLE>
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
		<TD height="32" background="images/bg1.jpg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php 
	//��ͼ�ε���ʽ������ݿ��еļ�¼��
    $query="select sum(counts) as counts from tb_count04 ";//��ѯ���ݿ����ܵķ�����
    $result=mysql_query($query);
    $visitor=mysql_result($result,0,'counts');
	echo "----------";
	echo "<strong>��վ�ķ�����: </strong>";    							//��ͼ�εķ�ʽ��ʾ���ʴ���
	//�Բ�λ����0�Ĵ���
	$len=strlen($visitor);   								//��ȡ�ַ����ĳ���
	$str=str_repeat("0",6-$len);    					//��ȡ6-$len������0
	for($i=0;$i<strlen($str);$i++){   					//��ȡ����$str���ַ�������
		$result=$str[$i];
		$result='<img src=images/0.gif>';
		echo $result;   								//ѭ�����$result�Ľ��
	}
	//�����ݿ������ݵĴ���
	for($i=0;$i<strlen($visitor);$i++){  					//��ȡ�ַ����ĳ���
		$result=$visitor[$i];
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
		echo "<img src=images/".$ret[$i].".>";			//������ʴ���
	}
?>
</TD>
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
            <td height="20" align="center">&nbsp;<?php 
echo "<img src='picture.php'>";
?></td>
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