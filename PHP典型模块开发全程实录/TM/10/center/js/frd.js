// JavaScript Document
function chkaddfrd(name){
	if($('frdname').value == ''){
		alert('����Ӻ����ǳ�');
		$('frdname').focus();
		return false;
	}
	if($('frdname').value == name){
		alert('��������Լ�Ϊ����');
		$('frdname').focus();
		return false;
	}
	url = 'frd/frd_chk.php?act=add&frdname='+$('frdname').value;
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4){
			if(xmlhttp.status == 200){
				msg = xmlhttp.responseText;
				if(msg == '1'){
					alert('��ӳɹ����ȴ��Է�ȷ��');
					showfrd();
				}else if(msg == '2'){
					alert('������ӹ��ú���');
					showfrd();
				}else if(msg == '3'){
					alert('�ǳƴ�����ȷ�����ڸ��ǳ�!');
				}else if(msg == '4'){
					alert('�ú����Ѿ���ӣ��ȴ��Է�ȷ��');
					showfrd();
				}else{
					alert(msg);
				}
			}
		}
	}
	xmlhttp.send(null);
}
function enterfrd(name){
	url='frd/frd_chk.php?act=enter&frdmem='+name;
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4){
			if(xmlhttp.status == 200){
				msg = xmlhttp.responseText;
				if(msg == '1'){
					alert('��ӳɹ�');
					 showfrd();
				}else if(msg == '3'){
					alert('���û��Ѿ���ɾ��');
					showfrd();
				}else{
					alert(msg);
					showfrd();
				}
			}
		}
	}
	xmlhttp.send(null);
}
function showfrd(){
	xmlhttp.open('get','frd/frd.php',true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4){
			if(xmlhttp.status == 200){
				$('showmenu').innerHTML = xmlhttp.responseText;
			}
		}
	}
	xmlhttp.send(null);
}
function rescripfrd(sname){
	url = 'frd/rescripfrd.php?sname='+sname;
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4){
			if(xmlhttp.status == 200){
				$('showmenu').innerHTML = xmlhttp.responseText;
			}
		}
	}
	xmlhttp.send(null);
}