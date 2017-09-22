// JavaScript Document
//全部选择/取消

function add(){
	alert('111');
	}
	
function alldel(form){
	var leng = form.chk.length;
	if(leng==undefined){
	   if(!form.chk.checked)
	   		form.chk.checked=true;
	 }else{  
       for( var i = 0; i < leng; i++)
	    {
			if(!form.chk[i].checked)
	      		form.chk[i].checked = true;
	    }
	 } 
	return false;
}
// 反选
function overdel(form){
	 var leng = form.chk.length;
	 if(leng==undefined){
	   if(!form.chk.checked)
	   		form.chk.checked=true;
		else
			form.chk.checked=false;
	 }else{  
       for( var i = 0; i < leng; i++)
	    {
			if(!form.chk[i].checked)
	      		form.chk[i].checked = true;
			else
				form.chk[i].checked = false;
	    }
	 } 
	return false;
}
function del(form){
	var leng = form.chk.length;
	if(!confirm('确定要进行删除吗？一旦删除，将不可恢复!')){
		return false;
	}else{
		if(leng==undefined){
	   		if(!form.chk.checked){
	   			alert('请选取删除对象');
				return false;
	 		}
		}else{
			var rd=new Array();
			var j = 0;
			for( var i = 0; i < leng; i++){
				if(form.chk[i].checked){
					rd[j++] = form.chk[i].value;
				}
			}
			if(rd == ''){
				alert('请选取要删除数据!');
				return false;
			}
		}
	}
}
function jumpmem(page,sql){
	jumppage = document.getElementById('jump').value;
	location=page+'?curpage='+jumppage+'&sql='+sql;
}