// JavaScript Document
function $(id){
	return document.getElementById(id);
}
function addfrd(uid){
  url = 'personinfo_chk.php?act=add&uid='+uid;
  xmlhttp.open('get',url,true);
  xmlhttp.onreadystatechange = function(){
	if(xmlhttp.readystate == 4 && xmlhttp.status == 200){
	  msg = xmlhttp.responseText;
	  if (msg == '1'){
		alert('添加好友成功，等待对方确认');
	  }else if(msg == '2'){
		alert('请先登录，然后再加好友');
	  }else if(msg == '4'){
		alert('对不起，不能加自己为好友');
	  }else if(msg == '3'){
		alert('非法登录');
	  }else if(msg == '5'){
		alert('该用户已经是您的好友');  
	  }else if(msg == '6'){
		alert('您已经加过该好友，正等待对方确认');
	  }else if(msg == '7'){
		 alert('系统错误');
	  }else{
		alert('严重错误');
	  }
	}
  }
  xmlhttp.send(null);
}
function sendscrip(uid){
	url = 'personinfo_chk.php?act=send&uid='+uid;
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4 && xmlhttp.status == 200){
			msg = xmlhttp.responseText;
			 if (msg == '1'){
				open('sendscrip.php?acpt='+uid,'send','width=270,height=200',false);
			  }else if(msg == '2'){
				alert('对不起，如果没有登录，则只能给博主留言');
			  }else if(msg == '4'){
				alert('对不起，不能给自己发信息');
			  }else if(msg == '3'){
				alert('非法登录');
			  }else{
				 alert(msg); 
			  }
		}
	}
	xmlhttp.send(null);
}
function enterscrip(){
	if($('sendtoacpt').value == ''){
		alert('非法链接');
		return false;
	}
	if($('sendcont').value  == ''){
		alert('发言内容不能为空');
		return false;
	}
	url = 'sendscrip_chk.php?acpt='+$('sendtoacpt').value+'&sendcont='+$('sendcont').value;
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4){
			if(xmlhttp.status == 200){
				msg = xmlhttp.responseText;
				if(msg == '1'){
					alert('发送成功');
					window.close();
				}
			}
		}
	}
	xmlhttp.send(null);
}