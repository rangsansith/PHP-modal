// JavaScript Document
//ȫ��ѡ��/ȡ��
function alldel(tot){
	for(i=0;i<tot;i++){
		if(!$('chk['+i+']').checked){
			$('chk['+i+']').checked = true;
		}
	}
	return false;
}
// ��ѡ
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
//ɾ����ѡ
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
		alert('��ѡȡҪɾ������!');
		return false;
	}
	url = chkurl+"?act=del&rd="+rd+'&curpage='+curpage;
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = rerst;
	xmlhttp.send(null);
	return false;
}
//��ҳ
function pagination(chkurl,curpage){
	url = chkurl+'?act=next&curpage='+curpage;
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = rerst;
	xmlhttp.send(null);
	return false;
}
//��ת
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