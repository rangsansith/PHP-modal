// JavaScript Document
//�������
function chkart(){
	if($('txt_title').value==""){
		alert("�����������Ʋ�����Ϊ�գ�");
		$('txt_title').focus();
		return false;
	}
	if($('file').value==""){
		alert("�������ݲ�����Ϊ�գ�");
		$('file').focus();
		return false;
	}
	url = 'article/addart_chk.php?act=add&title='+$('txt_title').value+"&arttype="+$('articletype').value+"&cont="+$('file').value;
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4){
			if(xmlhttp.status == 200){
				msg = xmlhttp.responseText;
				if(msg == '1'){
					alert('���·���ɹ�');
					xmlhttp.open('get','article/article.php',true);
					xmlhttp.onreadystatechange = function(){
						if(xmlhttp.readystate == 4 && xmlhttp.status == 200){
							$('showmenu').innerHTML = xmlhttp.responseText;
						}
					}
					xmlhttp.send(null);
				}else if(msg == '2'){
					alert('���ʧ��');
				}else{
					alert(msg);
				}
			}
		}
	}
	xmlhttp.send(null);
}
//ɾ���������
function delarttype(typestr,typename){
	url = 'article/arttype_chk.php?act=del&typestr='+typestr+'&typename='+typename;
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4){
			if(xmlhttp.status == 200){
				msg = xmlhttp.responseText;
				if(msg == '2'){
					alert('ɾ��ʧ��');
				}else if(msg == '3'){
					alert('��� �ռ� ����ɾ��');
				}else if(msg == '1'){
					showarttype();
				}else{
					alert(msg);
				}
			}
		}
	}
	xmlhttp.send(null);
}
//����������
function addarttype(typestr){
	if($('addarttype').value == ''){
		alert('����������������');
		$('addarttype').focus();
		return false;
	}
	url = 'article/arttype_chk.php?act=add&typestr='+typestr+'&typename='+$('addarttype').value ;
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4){
			if(xmlhttp.status == 200){
				msg = xmlhttp.responseText;
				if(msg == '2'){
					alert('���ʧ��');
				}else if(msg == '3'){
					alert('��������ظ�');
				}else if(msg == '1'){
					showarttype();
				}else{
					alert(msg);
				}
			}
		}
	}
	xmlhttp.send(null);
}
function showarttype(){
	xmlhttp.open('get','article/arttype.php?act=list',true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4){
			if(xmlhttp.status == 200){
				$('showmenu').innerHTML = xmlhttp.responseText;
			}
		}
	}
	xmlhttp.send(null);
}