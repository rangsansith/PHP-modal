// JavaScript Document
function enterlogin(form){
	if(event.keyCode==13){
		chklogin(form);
	}
}
//��¼��֤����
function chklogin(form){
	manager = form.manager;
	pwd = form.pwd;
	chk = form.chk;
	hchk = form.chknm.value;
	if(manager.value == ''){
		alert('�������ʺ�!');
		manager.focus();
		return false;
	}
	if(pwd.value==''){
		alert('����������!');
		pwd.focus();
		return false;
	}
	if(chk.value == ''){
		alert('��������֤��!');
		chk.focus();
		return false;
	}
	if(chk.value != hchk){
		alert('��֤���������');
		chk.select();
		return false;
	}
	url = "login_chk.php?manager="+manager.value+"&pwd="+pwd.value;
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = function (){
		if(xmlhttp.readystate == 4){
			msg = xmlhttp.responseText;
			if(msg == '1'){
				alert('��¼�ɹ�');
				location = 'main.html';
			}else if(msg == '2'){
				alert('�Բ������Ĺ���Ա�˺��Ѿ������ᣡ');
				return false;
			}else{
				alert('�û����������������');
			}
		}
	}
	xmlhttp.send(null);
}