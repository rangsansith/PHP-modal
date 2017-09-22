// JavaScript Document
function $(id){
	return document.getElementById(id);
}
window.onload = function(){
	$('lgname').focus();
	$('lgbtn').onclick = chklg;
	$('lgname').onkeydown = function(){
		if(event.keyCode == 13){
			$('lgpwd').select();
		}
	}
	$('lgpwd').onkeydown = function(){
		if(event.keyCode == 13){
			$('lgchk').select();
		}
	}
	$('lgchk').onkeydown = function(){
		if(event.keyCode == 13){
			 chklg();
		}
	}
	function chklg(){
		if($('lgname').value == 0){
			alert('请输入用户名!');
			$('lgname').focus();
			return false;
		}
		if($('lgpwd').value == 0){
			alert('请输入密码!');
			$('lgpwd').focus();
			return false;
		}
		if($('lgchk').value == ''){
			alert('请输入验证码');
			$('lgchk').select();
			return false;
		}
		if($('lgchk').value != $('chknm').value){
			alert('验证码输入错误');
			$('lgchk').select();
			return false;
		}
		url = 'login_chk.php?name='+$('lgname').value+'&pwd='+$('lgpwd').value;
		xmlhttp.open('get',url,true);
		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readystate == 4){
				if(xmlhttp.status == 200){
					msg = xmlhttp.responseText;
					if(msg == '1'){
						alert('登录成功');
						window.opener.opener=null;
						window.opener.close();
					open('center.php?uid='+$('lgname').value,'manage','',false);
						window.close();
					}else if(msg == '2'){
						alert('用户名或密码错误');
					}else{
						alert(msg);
					}
				}
			}
		}
		xmlhttp.send(null);
	}
	$('reg').onclick = function(){
		open('register.php','regist','',false);
	}
}