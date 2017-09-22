// JavaScript Document
function queryrst(form) {
	var name = form.name.value;
	var formid = form.formid.value;
	if(name == '' && formid == ''){
		alert('用户或订单号至少有一个不能为空');
		form.name.focus();
		return false;
	}
	var url = "query.php?vendee="+name+"&formid="+formid;
	xmlhttp.open("GET",url,true);
	xmlhttp.onreadystatechange = showfm;
	xmlhttp.send(null);
}
function showfm(){
	if(xmlhttp.readyState == 4){
		var msg = xmlhttp.responseText;
		if(msg == '0'){
				exam.innerHTML = '';
				alert('没有查询结果');
		}else{
				exam.innerHTML =  msg;
		}
	}
}
// JavaScript Document
function showme(key,wurl){
	var purl = wurl + "?id="+key;
	open(purl,'_blank','width=450 height=200',false);
	return false;
}
