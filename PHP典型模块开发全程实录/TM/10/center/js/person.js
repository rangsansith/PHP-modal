// JavaScript Document
//显示修改信息页面
function modperson(){
	xmlhttp.open('get','person/modperson.php',true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4 && xmlhttp.status == 200){
			$('showmenu').innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.send(null);
}
//改变人物头像
function changegif(){
	$('headimg').src=$('headgif').value;
}
//修改信息函数
function chkmodinfo(){
	url = "person/modperson_chk.php?email="+$('email').value+"&homepage="+$('homepage').value+"&qq="+$('qq').value+"&headgif="+$('headgif').value+"&unwrite="+$('unwrite').value+"&realname="+$('realname').value+"&sex="+$('sex').value+"&birthday="+($('year').value+'-'+$('month').value+'-'+$('day').value)+"&tel="+$('tel').value+"&address="+$('address').value;
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4 && xmlhttp.status == 200){
			msg = xmlhttp.responseText;
			if(msg == '1'){
				alert('修改成功');
				showpage();
			}else{
				alert('请确定您已经修改了信息');
			}
		}
	}
	xmlhttp.send(null);
}
//处理修改密码函数
function entermodinfo(){
	if($('oldpwd').value == ''){
		alert('请输入原密码');
		$('oldpwd').focus();
		return false;
	}
	if($('newpwd1').value == ''){
		alert('请输入新密码');
		$('newpwd1').focus();
		return false;
	}
	if($('newpwd2').value != $('newpwd1').value){
		alert('两次密码不一致');
		$('newpwd2').select();
		return false;
	}
	xmlhttp.open('get','person/modpwd_chk.php?act=old&pwd='+$('oldpwd').value,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4 && xmlhttp.status == 200){
			msg = xmlhttp.responsetext;
			if(msg == '1'){
				xmlhttp.open('get','person/modpwd_chk.php?act=new&pwd='+$('newpwd1').value,true);
				xmlhttp.onreadystatechange = function(){
					if(xmlhttp.readystate == 4 && xmlhttp.status == 200){
						msg = xmlhttp.responsetext;
						if(msg == '1'){
							alert('修改成功');
							showpage()
						}else if(msg == '2'){
							alert('新密码必须与原密码不同');
						}
					}
				}
				xmlhttp.send(null);
				
			}else if(msg == '2'){
				alert('原密码输入错误');
			}
		}
	}
	xmlhttp.send(null);
	
	
}
//显示个人信息页面
function showpage(){
	xmlhttp.open('get','person/person.php',true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4 && xmlhttp.status == 200){
			$('showmenu').innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.send(null);
}