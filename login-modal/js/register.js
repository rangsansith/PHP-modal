function $(idValue){
	return document.getElementById(idValue);
}

window.onload = function(){
	$('regname').focus();
	var cname1,cname2,cpwd1,cpwd2,cemail;

	xmlhttp = new XMLHttpRequest();

	// 填写数据后调用
	function chkreg(){
		if ((cname1 == 'yes') && (cname2 == 'yes') && (cpwd1 == 'yes') && (cpwd2 == 'yes') && (cemail == 'yes')) {
			$('regbtn').disabled = false;
		}
		else{
			$('regbtn').disabled = true;
		}
	}

	// 验证用户名
	$('regname').onkeyup = function(){
		name = $('regname').value;
		cname2 = "";
		if (name.match(/^[a-zA-Z_]*/) == "") {
			$('namediv').innerHTML = '必须以字母或下划线开头';
			cname1 = "";
		}
		else if (name.length <= 3) {
			$('namediv').innerHTML = '注册名称必须大于3位';
			cname1 = "";
		}
		else{
			$('namediv').innerHTML = '符合标准';
			cname1 = "yes";
		}
		chkreg();
	};

	// 检测用户名
	$('regname').onblur = function(){
		name = $('regname').value;
		if (cname1 == 'yes') {
			xmlhttp.open('get','chkname.php?name='+name,true);
			xmlhttp.onreadystatechange = function(){
				if (xmlhttp.readyState == 4) {
					if (xmlhttp.status == 200) {
						var msg = xmlhttp.responseText;
						if (msg == '1') {
							$('namediv').innerHTML = "恭喜你该用户名可用";
							cname2 = 'yes';
						}
						else if (msg == '2') {
							$('namediv').innerHTML = "用户名已被用";
							cname2 = '';
						}
						else{
							$('namediv').innerHTML = msg;
							cname2 = '';
						}
					}
				}
				chkreg();
			};
			xmlhttp.send(null);
		}
	};

	// 验证密码
	$('regpwd1').onkeyup = function(){
		pwd = $('regpwd1').value;
		pwd2 = $('regpwd2').value;
		if (pwd.length<6) {
			$('pwddiv1').innerHTML = "密码长度小于六位";
			cpwd1 = "";
		}
		else if (pwd.length>=6 && pwd.length<12) {
			$('pwddiv1').innerHTML = "符合要求，强度：低";
			cpwd1 = "yes";
		}
		else if ((pwd.match(/^[0-9]*$/) != null) || (pwd.match(/^[a-zA-Z]*$/) != null)) {
			$('pwddiv1').innerHTML = "符合要求，强度：中";
			cpwd1 = "yes";
		}
		else{
			$('pwddiv1').innerHTML = "符合要求，强度：高";
			cpwd1 = "yes";
		}
		if (pwd2 != "" && pwd != pwd2) {
			$('pwddiv2').innerHTML = "两次密码不一致";
			cpwd2 = "";
		}
		else if (pwd2 != "" && pwd == pwd2) {
			$('pwddiv2').innerHTML = "密码输入正确";
			cpwd2 = "yes";
		}
		chkreg();
	};

	// 验证二次密码
	$('regpwd2').onkeyup = function(){
		pwd1 = $('regpwd1').value;
		pwd2 = $('regpwd2').value;
		if (pwd1 != pwd2) {
			$('pwddiv2').innerHTML = "密码不一致";
			cpwd2 = "";
		}
		else{
			$('pwddiv2').innerHTML = "密码输入正确";
			cpwd2 = "yes";			
		}
		chkreg();
	};

	// 验证EMAIL
	$('email').onkeyup = function(){
		emialreg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
		$('email').value.match(emialreg);
		if ($('email').value.match(emialreg) == null) {
			$('emaildiv').innerHTML = "错误的Email格式";
			cemail = "";
		}
		else{
			$('emaildiv').innerHTML = "输入正确";
			cemail = "yes";
		}
		chkreg();
	};

	// 注册
	$('regbtn').onclick = function(){
		$('imgdiv').style.visibility = 'visible';
		url = 'register_chk.php?name='+$('regname').value+'&pwd='+$('regpwd1').value+'&email='+$('email').value;
		url += '&question='+$('question').value+'&answer='+$('answer').value;
		url += '&realname='+$('realname').value+'&birthday='+$('birthday').value;
		url += '&telephone='+$('telephone').value+'&qq='+$('qq').value;
		// alert(url);
		// return false;
		xmlhttp.open('get',url,true);
		xmlhttp.onreadystatechange = function(){
			if (xmlhttp.readyState == 4){
				if (xmlhttp.status == 200){
					msg = xmlhttp.responseText;
					if (msg == '1'){
						alert("注册成功");
						location = 'main.php';
					}
					else if (msg == '-1'){
						alert("你的服务器不支持pop3");
					}
					else{
						alert(msg);
					}
				}
				$('imgdiv').style.visibility = 'hidden';
			}
		};
		xmlhttp.send(null);
	};
};