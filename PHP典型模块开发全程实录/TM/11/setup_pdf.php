<?php
header("Content-Type:text/html;charset=gb2312");	//����ҳ������ʽ
include('pdf/chinese.php');							//�����������
include('Connections/conn.php');					//�������ݿ������ļ�
class PDF extends PDF_Chinese{						//�̳�������
	function Header(){								//���巽�����ñ���
		$this->SetFont('gb','',10);			//��������
		$this->Write(10,'����');			//�����������
		$this->Ln(20);						//����
	}
	function Footer(){						//����ҳ��
		$this->SetY(-15);
		$this->SetFont('gb','',10);
		$this->Cell(0,10,'��'.$this->PageNo().'ҳ');
	}
}
$colname_rs_id=$_GET['id'];					//��ȡָ�����ݵ�ID
$query_rs_article=sprintf("select * from tb_articles where id=%s",$colname_rs_id);	//����SQL���
$rs_article=mysql_query($query_rs_article,$conn) or die(mysql_error());				//ִ��SQL��ѯ���
$row_rs_article=mysql_fetch_assoc($rs_article);		//��ȡ��ѯ���

$pdf=new PDF();								//ʵ����PDF��
$pdf->AddGBFont();							//��������
$pdf->Open();								//���ļ�
$pdf->AliasNbPages();						//Ϊÿҳ����һ������
$pdf->AddPage();							//��ҳ����

$pdf->SetFont('gb','B',20);					//��������
$pdf->Cell(0,10,iconv("utf-8","gb2312",$row_rs_article['topic']));		//���һ������
$pdf->Ln();									//����

$pdf->SetFont('gb','',10);
$pdf->Cell(0,10,iconv("utf-8","gb2312",$row_rs_article['author']));
$pdf->Ln();

$pdf->SetFont('gb','',10);
$content= iconv('utf-8','gb2312',$row_rs_article['content']);
$pdf->MultiCell(0,5,$content);				//������ݣ�����������ֹ
$pdf->Ln();

$pdf->AddPage();							//��ҳ
$pdf->Output(iconv("utf-8","gb2312",$row_rs_article['topic']).'.pdf',true);	//����PDF�ļ�
?>