<?php
define('FPDF_FONTPATH','font/'); 	//定义font 文件夹所在路径
require_once('pdf/fpdf.php'); 		//包含fpdf 类库文件
class PDF extends FPDF{
	function Header(){ //设置页眉
		$this->SetFont('Arial','B',15); //设置页眉字体
		$this->Cell(80); //移动单元格
		$this->Cell(30,10,'Title'); //写入页眉文字
		$this->Ln(20); //换行
	}
	function Footer(){		 //设置页脚
		$this->SetY(-15); //设置页脚所在位置
		$this->SetFont('Arial','I',8); //设置页脚字体
		$this->Cell(0,10,'Page - '.$this->PageNo()); //输出当前页码作为页脚内容
	}
}
$pdf=new FPDF('P', 'mm', 'A4'); 	//创建新的FPDF 对象，竖向放纸，单位为毫米，纸张大小A4
$pdf->Open(); 						//创建PDF
$pdf->AddPage(); 					//增加一页
$pdf->SetFont('Courier','I',20); 	//设置字体样式
$pdf->Cell(10,10,'MRSOFT!'); 			//增加一个单元格
$pdf->Image('images/as.jpg',10,30,80,80); //增加图片
$pdf->Output(); //输出PDF 到浏览器
?>
