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
function pagination($sql){
	$arr = $conne->getRowsArray($sql);
	var_dump($arr);
}
?>