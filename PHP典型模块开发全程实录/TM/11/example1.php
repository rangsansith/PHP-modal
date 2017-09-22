<?php
define('FPDF_FONTPATH','font/'); 	//定义font 文件夹所在路径
require_once('pdf/fpdf.php'); 		//包含fpdf 类库文件
$pdf=new FPDF('P', 'mm', 'A4'); 	//创建新的FPDF 对象，竖向放纸，单位为毫米，纸张大小A4
$pdf->Open(); 						//开始创建PDF
$pdf->AddPage(); 					//增加一页
$pdf->SetFont('Courier','I',20); 	//设置字体样式
$pdf->Cell(0,0,'mrsoft!'); 			//增加一个单元格
$pdf->Output(); //输出PDF 到浏览器
?>
