// JavaScript Document
function $(id){
	return document.getElementById(id);
}
function addfrd(uid){
  url = 'personinfo_chk.php?act=add&uid='+uid;
  xmlhttp.open('get',url,true);
  xmlhttp.onreadystatechange = function(){
	if(xmlhttp.readystate == 4 && xmlhttp.status == 200){
	  msg = xmlhttp.responseText;
	  if (msg == '1'){
		alert('��Ӻ��ѳɹ����ȴ��Է�ȷ��');
	  }else if(msg == '2'){
		alert('���ȵ�¼��Ȼ���ټӺ���');
	  }else if(msg == '4'){
		alert('�Բ��𣬲��ܼ��Լ�Ϊ����');
	  }else if(msg == '3'){
		alert('�Ƿ���¼');
	  }else if(msg == '5'){
		alert('���û��Ѿ������ĺ���');  
	  }else if(msg == '6'){
		alert('���Ѿ��ӹ��ú��ѣ����ȴ��Է�ȷ��');
	  }else if(msg == '7'){
		 alert('ϵͳ����');
	  }else{
		alert('���ش���');
	  }
	}
  }
  xmlhttp.send(null);
}
function sendscrip(uid){
	url = 'personinfo_chk.php?act=send&uid='+uid;
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4 && xmlhttp.status == 200){
			msg = xmlhttp.responseText;
			 if (msg == '1'){
				open('sendscrip.php?acpt='+uid,'send','width=270,height=200',false);
			  }else if(msg == '2'){
				alert('�Բ������û�е�¼����ֻ�ܸ���������');
			  }else if(msg == '4'){
				alert('�Բ��𣬲��ܸ��Լ�����Ϣ');
			  }else if(msg == '3'){
				alert('�Ƿ���¼');
			  }else{
				 alert(msg); 
			  }
		}
	}
	xmlhttp.send(null);
}
function enterscrip(){
	if($('sendtoacpt').value == ''){
		alert('�Ƿ�����');
		return false;
	}
	if($('sendcont').value  == ''){
		alert('�������ݲ���Ϊ��');
		return false;
	}
	url = 'sendscrip_chk.php?acpt='+$('sendtoacpt').value+'&sendcont='+$('sendcont').value;
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4){
			if(xmlhttp.status == 200){
				msg = xmlhttp.responseText;
				if(msg == '1'){
					alert('���ͳɹ�');
					window.close();
				}
			}
		}
	}
	xmlhttp.send(null);
}