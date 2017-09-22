<?php
define('FPDF_FONTPATH','font/'); 	//定义font 文件夹所在路径
require_once('pdf/fpdf.php'); 		//包含fpdf 类库文件
class PDF extends FPDF{
	function Header(){ 						//设置页眉
		$this->SetFont('Arial','B',15); 	//设置页眉字体
		$this->Write(10,'Title'); 			//写入页眉文字
		$this->Ln(20); 						//换行
	}
	function Footer(){		 				//设置页脚
		$this->SetY(-15); 					//设置页脚所在位置
		$this->SetFont('Arial','I',8); 		//设置页脚字体
		$this->Cell(0,10,'Page - '.$this->PageNo()); 	//输出当前页码作为页脚内容
	}
}
$pdf=new PDF('P', 'mm', 'A4'); 	//创建新的FPDF 对象，竖向放纸，单位为毫米，纸张大小A4
$pdf->Open(); 						//开始创建PDF
$pdf->AddPage(); 					//增加一页
$pdf->SetFont('Arial','',14); 		//设置字体样式
$header=array('Name','Age','Sex','Salary'); 	//设置表头
$data=array(); 									//设置表体
$data[0] = array('Simon','24','Male','5,000.00');
$data[1] = array('Elaine','25','Female','6,000.00');
$data[2] = array('Susan','25','Female','7,000.00');
$data[3] = array('David','26','Male','8,000.00');
$width=array(40,40,40,40); 						//设置每列宽度
for($i=0;$i<count($header);$i++) 				//循环输出表头
$pdf->Cell($width[$i],60,$header[$i],1);
$pdf->Ln();
foreach($data as $row){ 						//循环输出表体
	$pdf->Cell($width[0],60,$row[0],1);
	$pdf->Cell($width[1],60,$row[1],1);
	$pdf->Cell($width[2],60,$row[2],1);
	$pdf->Cell($width[3],60,$row[3],1);
	$pdf->Ln();
}
$pdf->Output(); 								//输出PDF 到浏览器
?>
