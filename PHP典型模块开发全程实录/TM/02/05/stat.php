<?php
include ("src/jpgraph.php");						//��������ļ�
include ("src/jpgraph_bar.php");
$lmbs=$_GET['lmbs'];								//��ȡ�������Ӵ��ݵĲ���ֵ
$das=$_GET['das'];
$datay=explode(",",$lmbs);     							//����","�ָ��ַ��� $dataΪ��ȡ�����ݱ���
$datax=explode(",",$das);     							//����","�ָ��ַ��� $dataΪ��ȡ�����ݱ���
$graph = new Graph(800,200,"auto");		//����ͼ��	
$graph->img->SetMargin(60,20,30,50);	//����ͼ��߿���
$graph->SetScale("textlin");			//��������̶�����
$graph->SetMarginColor("lightblue");	//����ͼ����ɫ
$graph->title->Set('counter');		//�������
$graph->title->SetFont(FF_SIMSUN, FS_BOLD);     //���ñ�������
$graph->xaxis->SetFont(FF_VERDANA,FS_NORMAL,10);	//����X�������
$graph->yaxis->SetFont(FF_VERDANA,FS_NORMAL,10);	//����Y�������
$graph->xaxis->SetTickLabels($datax);		//����X�����������
$graph->xaxis->SetLabelAngle(50);			//����������ִ�С
$bplot = new BarPlot($datay);		//ʵ����ͼ�񴴽���
$bplot->SetWidth(0.6);			//��������ͼ�������С
$bplot->SetFillGradient("navy","#FFFF00",GRAD_LEFT_REFLECTION);	//����ͼ������ͺ������ɫ
$bplot->SetColor("white");	//����ͼ��߿���ɫ
$graph->Add($bplot);		//�������
$graph->Stroke();			//����ͼ��
?>
