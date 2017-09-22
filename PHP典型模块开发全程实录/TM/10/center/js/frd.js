// JavaScript Document
function chkaddfrd(name){
	if($('frdname').value == ''){
		alert('请添加好友昵称');
		$('frdname').focus();
		return false;
	}
	if($('frdname').value == name){
		alert('不允许加自己为好友');
		$('frdname').focus();
		return false;
	}
	url = 'frd/frd_chk.php?act=add&frdname='+$('frdname').value;
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4){
			if(xmlhttp.status == 200){
				msg = xmlhttp.responseText;
				if(msg == '1'){
					alert('添加成功，等待对方确认');
					showfrd();
				}else if(msg == '2'){
					alert('您已添加过该好友');
					showfrd();
				}else if(msg == '3'){
					alert('昵称错误，请确定存在该昵称!');
				}else if(msg == '4'){
					alert('该好友已经添加，等待对方确认');
					showfrd();
				}else{
					alert(msg);
				}
			}
		}
	}
	xmlhttp.send(null);
}
function enterfrd(name){
	url='frd/frd_chk.php?act=enter&frdmem='+name;
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4){
			if(xmlhttp.status == 200){
				msg = xmlhttp.responseText;
				if(msg == '1'){
					alert('添加成功');
					 showfrd();
				}else if(msg == '3'){
					alert('该用户已经被删除');
					showfrd();
				}else{
					alert(msg);
					showfrd();
				}
			}
		}
	}
	xmlhttp.send(null);
}
function showfrd(){
	xmlhttp.open('get','frd/frd.php',true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4){
			if(xmlhttp.status == 200){
				$('showmenu').innerHTML = xmlhttp.responseText;
			}
		}
	}
	xmlhttp.send(null);
}
function rescripfrd(sname){
	url = 'frd/rescripfrd.php?sname='+sname;
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4){
			if(xmlhttp.status == 200){
				$('showmenu').innerHTML = xmlhttp.responseText;
			}
		}
	}
	xmlhttp.send(null);
}