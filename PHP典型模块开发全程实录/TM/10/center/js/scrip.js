// JavaScript Document
//显示纸条内容
function showallcont(id){
	url = 'scrip/showscrip.php?id='+id;
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4){
			if(xmlhttp.status == 200){
				$('showmenu').innerHTML = xmlhttp.responseText;
				shownewmess();
			}
		}
	}
	xmlhttp.send(null);
}
//显示回复表单
function rescrip(){
	$('showscripdiv').style.display = 'none';
	$('rescripdiv').style.display = '';
}
//发送
function enterscrip(){
	url = 'scrip/scrip_chk.php?acpt='+$('sendtoacpt').value+'&sendcont='+$('sendcont').value;
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4){
			if(xmlhttp.status == 200){
				msg = xmlhttp.responseText;
				if(msg == '1'){
					alert('发送成功');
					showscriplist();
				}
			}
		}
	}
	xmlhttp.send(null);
}
function showscriplist(){
	url = "scrip/scrip.php";
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
function shownewmess(){
	url = 'newscrip.php';
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4){
			if(xmlhttp.status == 200){
				$('newscrip').innerHTML = xmlhttp.responseText;
			}
		}
	}
	xmlhttp.send(null);
}