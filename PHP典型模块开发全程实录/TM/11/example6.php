<?php
include('pdf/chinese.php');		//载入中文插件
class PDF extends PDF_Chinese{	//继承中文插件类
	function Header(){ 			//设置页眉
		$this->SetFont('GB','',10);		//设置字体
		$this->Write(10,'FPDF 中文测试');		//设置页眉的内容
		$this->Ln(20);						//执行换行操作
	}
	function Footer(){ 					//设定页脚
		$this->SetY(-15);				//设置页脚的输出坐标
		$this->SetFont('GB','',10);		//设置字体
		$this->Cell(0,10,'第'.$this->PageNo().'页');		//设置页脚输出的内容
	}
}
$pdf=new PDF(); 	//创建PDF 文档
$pdf->AddGBFont();	//添加字体
$pdf->Open();					//开启文档
$pdf->AliasNbPages();		//为每个页面定义一个别名
$pdf->AddPage();				//添加页
$pdf->SetFont('GB','I',20);		//设置字体
$str='山不在高，有仙则名。水不在深，有龙则灵。斯是陋室，惟吾德馨。苔痕上阶绿，草色入廉青。谈笑有鸿儒，往来无白丁。可以调素琴，阅金经。无丝竹之乱耳，无案牍之劳形。南阳诸葛庐，西蜀子云亭。孔子云：“何陋之有？” ';
$pdf->Write(10,$str); 	//输出中文
$pdf->Output('程序测试.pdf',true);
?>

