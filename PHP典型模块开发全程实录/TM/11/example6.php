<?php
include('pdf/chinese.php');		//�������Ĳ��
class PDF extends PDF_Chinese{	//�̳����Ĳ����
	function Header(){ 			//����ҳü
		$this->SetFont('GB','',10);		//��������
		$this->Write(10,'FPDF ���Ĳ���');		//����ҳü������
		$this->Ln(20);						//ִ�л��в���
	}
	function Footer(){ 					//�趨ҳ��
		$this->SetY(-15);				//����ҳ�ŵ��������
		$this->SetFont('GB','',10);		//��������
		$this->Cell(0,10,'��'.$this->PageNo().'ҳ');		//����ҳ�����������
	}
}
$pdf=new PDF(); 	//����PDF �ĵ�
$pdf->AddGBFont();	//�������
$pdf->Open();					//�����ĵ�
$pdf->AliasNbPages();		//Ϊÿ��ҳ�涨��һ������
$pdf->AddPage();				//���ҳ
$pdf->SetFont('GB','I',20);		//��������
$str='ɽ���ڸߣ�����������ˮ������������顣˹��ª�ң�Ω���ܰ��̦���Ͻ��̣���ɫ�����ࡣ̸Ц�к��壬�����ް׶������Ե����٣��Ľ𾭡���˿��֮�Ҷ����ް��֮���Ρ��������®����������ͤ�������ƣ�����ª֮�У��� ';
$pdf->Write(10,$str); 	//�������
$pdf->Output('�������.pdf',true);
?>

