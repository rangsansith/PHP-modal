// JavaScript Document
//添加文章
function chkart(){
	if($('txt_title').value==""){
		alert("博客主题名称不允许为空！");
		$('txt_title').focus();
		return false;
	}
	if($('file').value==""){
		alert("文章内容不允许为空！");
		$('file').focus();
		return false;
	}
	url = 'article/addart_chk.php?act=add&title='+$('txt_title').value+"&arttype="+$('articletype').value+"&cont="+$('file').value;
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4){
			if(xmlhttp.status == 200){
				msg = xmlhttp.responseText;
				if(msg == '1'){
					alert('文章发表成功');
					xmlhttp.open('get','article/article.php',true);
					xmlhttp.onreadystatechange = function(){
						if(xmlhttp.readystate == 4 && xmlhttp.status == 200){
							$('showmenu').innerHTML = xmlhttp.responseText;
						}
					}
					xmlhttp.send(null);
				}else if(msg == '2'){
					alert('添加失败');
				}else{
					alert(msg);
				}
			}
		}
	}
	xmlhttp.send(null);
}
//删除文章类别
function delarttype(typestr,typename){
	url = 'article/arttype_chk.php?act=del&typestr='+typestr+'&typename='+typename;
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4){
			if(xmlhttp.status == 200){
				msg = xmlhttp.responseText;
				if(msg == '2'){
					alert('删除失败');
				}else if(msg == '3'){
					alert('类别 日记 不可删除');
				}else if(msg == '1'){
					showarttype();
				}else{
					alert(msg);
				}
			}
		}
	}
	xmlhttp.send(null);
}
//添加文章类别
function addarttype(typestr){
	if($('addarttype').value == ''){
		alert('请输入添加类别名称');
		$('addarttype').focus();
		return false;
	}
	url = 'article/arttype_chk.php?act=add&typestr='+typestr+'&typename='+$('addarttype').value ;
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4){
			if(xmlhttp.status == 200){
				msg = xmlhttp.responseText;
				if(msg == '2'){
					alert('添加失败');
				}else if(msg == '3'){
					alert('添加名称重复');
				}else if(msg == '1'){
					showarttype();
				}else{
					alert(msg);
				}
			}
		}
	}
	xmlhttp.send(null);
}
function showarttype(){
	xmlhttp.open('get','article/arttype.php?act=list',true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4){
			if(xmlhttp.status == 200){
				$('showmenu').innerHTML = xmlhttp.responseText;
			}
		}
	}
	xmlhttp.send(null);
}