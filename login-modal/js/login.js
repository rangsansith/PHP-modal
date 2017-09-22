function $(id){
	return document.getElementById(id);
}

window.onload = function(){
$('lgname').focus();
$('lgname').onkeydown = function(){
	if (event.keyCode == 13) {
		$('lgpwd').select();
	}
};
xmlhttp = new XMLHttpRequest();

$('lgpwd').onkeydown = function(){
	if (event.keyCode == 13) {
		$('lgchk').select();
	}
};

$('lgchk').onkeydown = function(){
	if (event.keyCode == 13) {
		chklg();
	}
};
$('lgbtn').onclick = chklg;

function chklg(){
	if ($('lgname').value.match(/^[a-zA-Z_]\w*$/) == null) {
		alert("请输入合法名称");
		$('lgname').select();
		return false;
	}
	if ($('lgname').value == "") {
		alert("请输入用户名");
		$('lgname').focus();
		return false;
	}
	if ($('lgpwd').value == "") {
		alert("请输入密码");
		$('lgpwd').focus();
		return false;
	}
	if ($('lgchk').value == "") {
		alert("请输入验证码");
		$('lgchk').select();
		return false;
	}
	if ($('lgchk').value != $('chknm').value) {
		alert("验证码输入错误");
		$('lgchk').select();
		return false;
	}

	count = document.cookie.split(';')[0];
	if (count.split('=')[1] >= 3) {
		alert("因为你的非法操作，你将无法再执行登录操作");
		return false;
	}

	url = 'login_chk.php?act='+(Math.random())+'&name='+$('lgname').value+'&pwd='+$('lgpwd').value;
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = function(){
		if (xmlhttp.readystate == 4) {
			if (xmlhttp.status == 200) {
				msg = xmlhttp.responseText;
				if (msg == '0') {
					alert('您没有激活，请登录邮箱进行激活操作');
				}
				else if (msg == '1') {
					alert('用户名与密码输入错误，您还有2次机会');
					$('lgpwd').select();
				}
				else if (msg == '2') {
					alert('用户名与密码输入错误，您还有1次机会');
					$('lgpwd').select();
				}
				else if (msg == '3') {
					alert('用户名与密码输入错误，您还有0次机会');
					$('lgpwd').select();
				}
				else if (msg == '4') {
					alert('用户名输入错误');
					$('lgpwd').select();
				}
				else if (msg == '-1') {
					alert('登陆成功');
					location = 'main.php';
				}
				else{
					alert(msg);
				}
			}
		}
	};
	xmlhttp.send(null);
}

};