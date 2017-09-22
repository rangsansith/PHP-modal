// JavaScript Document
function $(id){
	return document.getElementById(id);
}
//显示最新纸条
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
//发表留言
function jslevelword(uid){
	if($('wordcont').value == ''){
		alert('留言不能为空');
		return false;
	}
	url = "lyb.php?act=lyb&uid="+uid+"&cont="+$('wordcont').value;
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4 && xmlhttp.status == 200){
			msg = xmlhttp.responseText;
			if(msg == 1){
				alert('留言成功');
				xmlhttp.open('get','mess.php?uid='+uid,true);
				xmlhttp.onreadystatechange = function(){
					if(xmlhttp.readystate == 4 && xmlhttp.status == 200){
						$('showmessdiv').innerHTML = xmlhttp.responseText;
					}
				}
				xmlhttp.send(null);
				$('wordcont').innerHTML = '';
			}else{
				alert(msg);
			}
		}
	}
	xmlhttp.send(null);
	
}
//发表评论
function jsreview(uid,artid){
	if($('wordcont').value == ''){
		alert('评论不能为空');
		return false;
	}
	url = "showarticle_chk.php?act=&uid="+uid+"&artid="+artid+"&cont="+$('wordcont').value;
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4 && xmlhttp.status == 200){
			msg = xmlhttp.responseText;
			if(msg == 1){
				alert('评论发表成功');
				location.reload();	
			}else{
				alert(msg);
			}
		}
	}
	xmlhttp.send(null);
	
}
//文章分页
function artpagination(url){
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4 && xmlhttp.status == 200){
			$('showarticlediv').innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.send(null);
}
//跳转
function jumpmem(chkurl){
	jumppage = $('jump').value;
	url = chkurl+'&curpage='+jumppage;
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4 && xmlhttp.status == 200){
			$('showarticlediv').innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.send(null);
}
//自动复制网址
function copyaddress(){
	$('copyadd').select();
	document.execCommand('COPY');
	alert('成功复制本地址');
}
//引用
function artquote(uid,quoteid){
	xmlhttp.open('get','showarticle_chk.php?act=quote&uid='+uid+'&quoteid='+quoteid,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4 && xmlhttp.status == 200){
			msg = xmlhttp.responseText;
			if(msg == '1'){
				alert('引用成功');
			}else if(msg == '2'){
				alert('您还没有登录');
			}else if(msg == '3'){
				alert('引用失败');
			}else if(msg == '4'){
				alert('不允许引用自己的文章');
			}else if(msg == '5'){
				alert('该文章已经被引用');
			}else{
				alert(msg);
			}
		}
	}
	xmlhttp.send(null);
}
//删除单条评论
function delonereview(rid){
	xmlhttp.open('get','showarticle_chk.php?act=delone&rid='+rid,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4 && xmlhttp.status == 200){
			msg = xmlhttp.responseText;
			location.reload();
		}
	}
	xmlhttp.send(null);
}
function delallreview(aid){
	if(!confirm('您确定删除该文章的所有评论吗？')){
	}else{
		xmlhttp.open('get','showarticle_chk.php?act=delall&aid='+aid,true);
		xmlhttp.onreadystatechange = function(){
			if(xmlhttp.readystate == 4 && xmlhttp.status == 200){
				msg = xmlhttp.responseText;
				location.reload();
			}
		}
		xmlhttp.send(null);
	}
}
function seeall(){
	if(xmlhttp.readystate == 4 && xlhttp.status == 200){
		$('seeall').innerHTML = xmlhttp.responseText;
	}
}
