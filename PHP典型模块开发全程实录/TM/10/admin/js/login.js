// JavaScript Document
function enterlogin(form){
	if(event.keyCode==13){
		chklogin(form);
	}
}
//登录验证函数
function chklogin(form){
	manager = form.manager;
	pwd = form.pwd;
	chk = form.chk;
	hchk = form.chknm.value;
	if(manager.value == ''){
		alert('请输入帐号!');
		manager.focus();
		return false;
	}
	if(pwd.value==''){
		alert('请输入密码!');
		pwd.focus();
		return false;
	}
	if(chk.value == ''){
		alert('请输入验证码!');
		chk.focus();
		return false;
	}
	if(chk.value != hchk){
		alert('验证码输入错误');
		chk.select();
		return false;
	}
	url = "login_chk.php?manager="+manager.value+"&pwd="+pwd.value;
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = function (){
		if(xmlhttp.readystate == 4){
			msg = xmlhttp.responseText;
			if(msg == '1'){
				alert('登录成功');
				location = 'main.html';
			}else if(msg == '2'){
				alert('对不起，您的管理员账号已经被冻结！');
				return false;
			}else{
				alert('用户名或密码输入错误！');
			}
		}
	}
	xmlhttp.send(null);
}