<?php
//�����ļ����µ��ļ��б�
function show_file($f_name){
	$d_open = opendir($f_name);
	$num = 0;
	while($file = readdir($d_open)){
		$filename[$num] = $file;
		$num++; 
	}
	closedir($d_open);
	return $filename;
}
/*
 *�ж��ļ���׺
 *$f_type�������ļ��ĺ�׺����
 *$f_upfiles���ϴ��ļ���
 */
function f_postfix($f_type,$f_upfiles){
	$is_pass = false;
	$tmp_upfiles = split("\.",$f_upfiles);
	$tmp_num = count($tmp_upfiles);
	if(in_array(strtolower($tmp_upfiles[$tmp_num - 1]),$f_type))
		$is_pass = $tmp_upfiles[$tmp_num - 1];
	return $is_pass;
}
?>