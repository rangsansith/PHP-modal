// JavaScript Document
function chkname(){
if(mkdir.dirname.value==""){
		alert("文件名不能为空！！");mkdir.dirname.focus();return false;
	}
	mkdir.submit();
}

function chkpath(){
if(movefile.path.value==""){
		alert("路径不能为空！！");movefile.path.focus();return false;
	}
	movefile.submit();
}
function chkamend(){
if(form1.news.value==""){
        alert("更改文件名称不能为空");form1.news.focus();return false;
	}
	form1.submit();
}

function chkdown(){
if(download.down.value==""){
	     alert("请填写下载路径");download.down.focus();return false;
	}
	download.submit();

}

function chklogin(){
if(login.ip.value==""){
	     alert("请填写连接IP");login.ip.focus();return false;
	}
if(login.username.value==""){
	     alert("请填写连接用户名");login.username.focus();return false;
	}
if(login.password.value==""){
	     alert("请填写连接密码");login.password.focus();return false;
	}
	login.submit();

}
