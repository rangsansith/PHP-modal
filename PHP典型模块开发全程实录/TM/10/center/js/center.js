// JavaScript Document
function $(id){
	return document.getElementById(id);
}
//��ʾ����ֽ��
function shownewmess(){
	url = 'newscrip.php';
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4){
			if(xmlhttp.status == 200){
				$('newscrip').innerHTML = xmlhttp.responseText;
			}
		}
	}
	xmlhttp.send(null);
}
//��������
function jslevelword(uid){
	if($('wordcont').value == ''){
		alert('���Բ���Ϊ��');
		return false;
	}
	url = "lyb.php?act=lyb&uid="+uid+"&cont="+$('wordcont').value;
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4 && xmlhttp.status == 200){
			msg = xmlhttp.responseText;
			if(msg == 1){
				alert('���Գɹ�');
				xmlhttp.open('get','mess.php?uid='+uid,true);
				xmlhttp.onreadystatechange = function(){
					if(xmlhttp.readystate == 4 && xmlhttp.status == 200){
						$('showmessdiv').innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.send(null);
				$('wordcont').innerHTML = '';
			}else{
				alert(msg);
			}
		}
	}
	xmlhttp.send(null);
	
}
//��������
function jsreview(uid,artid){
	if($('wordcont').value == ''){
		alert('���۲���Ϊ��');
		return false;
	}
	url = "showarticle_chk.php?act=&uid="+uid+"&artid="+artid+"&cont="+$('wordcont').value;
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4 && xmlhttp.status == 200){
			msg = xmlhttp.responseText;
			if(msg == 1){
				alert('���۷���ɹ�');
				location.reload();	
			}else{
				alert(msg);
			}
		}
	}
	xmlhttp.send(null);
	
}
//���·�ҳ
function artpagination(url){
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4 && xmlhttp.status == 200){
			$('showarticlediv').innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.send(null);
}
//��ת
function jumpmem(chkurl){
	jumppage = $('jump').value;
	url = chkurl+'&curpage='+jumppage;
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4 && xmlhttp.status == 200){
			$('showarticlediv').innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.send(null);
}
//�Զ�������ַ
function copyaddress(){
	$('copyadd').select();
	document.execCommand('COPY');
	alert('�ɹ����Ʊ���ַ');
}
//����
function artquote(uid,quoteid){
	xmlhttp.open('get','showarticle_chk.php?act=quote&uid='+uid+'&quoteid='+quoteid,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4 && xmlhttp.status == 200){
			msg = xmlhttp.responseText;
			if(msg == '1'){
				alert('���óɹ�');
			}else if(msg == '2'){
				alert('����û�е�¼');
			}else if(msg == '3'){
				alert('����ʧ��');
			}else if(msg == '4'){
				alert('�����������Լ�������');
			}else if(msg == '5'){
				alert('�������Ѿ�������');
			}else{
				alert(msg);
			}
		}
	}
	xmlhttp.send(null);
}
//ɾ����������
function delonereview(rid){
	xmlhttp.open('get','showarticle_chk.php?act=delone&rid='+rid,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4 && xmlhttp.status == 200){
			msg = xmlhttp.responseText;
			location.reload();
		}
	}
	xmlhttp.send(null);
}
function delallreview(aid){
	if(!confirm('��ȷ��ɾ�������µ�����������')){
	}else{
		xmlhttp.open('get','showarticle_chk.php?act=delall&aid='+aid,true);
		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readystate == 4 && xmlhttp.status == 200){
				msg = xmlhttp.responseText;
				location.reload();
			}
		}
		xmlhttp.send(null);
	}
}
function seeall(){
	if(xmlhttp.readystate == 4 && xlhttp.status == 200){
		$('seeall').innerHTML = xmlhttp.responseText;
	}
}
