<?php
header("Content-Type:text/html;charset=gb2312");	//设置页码编码格式
include('pdf/chinese.php');							//载入中文组件
include('Connections/conn.php');					//载入数据库连接文件
class PDF extends PDF_Chinese{						//继承中文类
	function Header(){								//定义方法设置标题
		$this->SetFont('gb','',10);			//设置字体
		$this->Write(10,'文章');			//输出标题内容
		$this->Ln(20);						//换行
	}
	function Footer(){						//设置页脚
		$this->SetY(-15);
		$this->SetFont('gb','',10);
		$this->Cell(0,10,'第'.$this->PageNo().'页');
	}
}
$colname_rs_id=$_GET['id'];					//获取指定数据的ID
$query_rs_article=sprintf("select * from tb_articles where id=%s",$colname_rs_id);	//定义SQL语句
$rs_article=mysql_query($query_rs_article,$conn) or die(mysql_error());				//执行SQL查询语句
$row_rs_article=mysql_fetch_assoc($rs_article);		//获取查询结果

$pdf=new PDF();								//实例化PDF类
$pdf->AddGBFont();							//设置字体
$pdf->Open();								//打开文件
$pdf->AliasNbPages();						//为每页定义一个别名
$pdf->AddPage();							//分页方法

$pdf->SetFont('gb','B',20);					//设置字体
$pdf->Cell(0,10,iconv("utf-8","gb2312",$row_rs_article['topic']));		//输出一个内容
$pdf->Ln();									//换行

$pdf->SetFont('gb','',10);
$pdf->Cell(0,10,iconv("utf-8","gb2312",$row_rs_article['author']));
$pdf->Ln();

$pdf->SetFont('gb','',10);
$content= iconv('utf-8','gb2312',$row_rs_article['content']);
$pdf->MultiCell(0,5,$content);				//输出内容，并且则行终止
$pdf->Ln();

$pdf->AddPage();							//分页
$pdf->Output(iconv("utf-8","gb2312",$row_rs_article['topic']).'.pdf',true);	//生成PDF文件
?>