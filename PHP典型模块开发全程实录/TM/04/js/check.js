// JavaScript Document
function chkname(){
if(mkdir.dirname.value==""){
		alert("�ļ�������Ϊ�գ���");mkdir.dirname.focus();return false;
	}
	mkdir.submit();
}

function chkpath(){
if(movefile.path.value==""){
		alert("·������Ϊ�գ���");movefile.path.focus();return false;
	}
	movefile.submit();
}
function chkamend(){
if(form1.news.value==""){
        alert("�����ļ����Ʋ���Ϊ��");form1.news.focus();return false;
	}
	form1.submit();
}

function chkdown(){
if(download.down.value==""){
	     alert("����д����·��");download.down.focus();return false;
	}
	download.submit();

}

function chklogin(){
if(login.ip.value==""){
	     alert("����д����IP");login.ip.focus();return false;
	}
if(login.username.value==""){
	     alert("����д�����û���");login.username.focus();return false;
	}
if(login.password.value==""){
	     alert("����д��������");login.password.focus();return false;
	}
	login.submit();

}
