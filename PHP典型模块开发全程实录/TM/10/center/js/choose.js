// JavaScript Document
//全部选择/取消
function alldel(tot){
	for(i=0;i<tot;i++){
		if(!$('chk['+i+']').checked){
			$('chk['+i+']').checked = true;
		}
	}
	return false;
}
// 反选
function overdel(tot){
	for(i=0;i<tot;i++){
		if(!$('chk['+i+']').checked){
			$('chk['+i+']').checked = true;
		}else{
			$('chk['+i+']').checked = false;
		}
	}
	return false;
}
//删除所选
function del(chkurl,tot,curpage){
	var rd=new Array();
	for(i=0,j=0;i<tot;i++){
		if(!$('chk['+i+']').checked){
		}else{
			rd[j] = $('chk['+i+']').value;
			j++;
		}
	}
	if(rd == ''){
		alert('请选取要删除数据!');
		return false;
	}
	url = chkurl+"?act=del&rd="+rd+'&curpage='+curpage;
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = rerst;
	xmlhttp.send(null);
	return false;
}
//分页
function pagination(chkurl,curpage){
	url = chkurl+'?act=next&curpage='+curpage;
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = rerst;
	xmlhttp.send(null);
	return false;
}
//跳转
function jumpmem(chkurl){
	jumppage = $('jump').value;
	url = chkurl+'?curpage='+jumppage;
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = rerst;
	xmlhttp.send(null);
	return false;
}
function rerst(){
	if(xmlhttp.readystate == 4){
		if(xmlhttp.status == 200){
			$('showarticle').innerHTML = xmlhttp.responseText;
		}
	}
}