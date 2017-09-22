// JavaScript Document
function checkregtel(regtel){
	var str=regtel;
	var Expression=/^13(\d{9})$|^15(\d{9})$/; 
	var objExp=new RegExp(Expression);
	if(objExp.test(str)==true){
		return true;
	}else{
		return false;
	}
}
function chkreginfo(form,mark,edit){
	if(mark==0 || mark=="all"){
   		if(form.taker.value==""){
	   		chknew_taker.innerHTML="请输入收货人！";
	   		form.taker.style.backgroundColor="#FF0000";
	   		return false;
   	 	}else{
   	   		chknew_taker.innerHTML="";
	   		form.taker.style.backgroundColor="#FFFFFF";
   	 	}
   	}
   	if(mark==1 || mark=="all"){
   		if(form.code.value==""){
	   		chknew_code.innerHTML="请输入邮编！";
	   		form.code.style.backgroundColor="#FF0000";
	   		return false;
   	 	}else if(isNaN(form.code.value)){
   	   		chknew_code.innerHTML="邮编由数字组成！";
	   		form.code.style.backgroundColor="#FF0000";
	   		return false;
	 	}else if(form.code.value.length!=6){
   	   		chknew_code.innerHTML="邮编由6位数字组成！";
	   		form.code.style.backgroundColor="#FF0000";
	   		return false;
   	 	}else{	
   	   		chknew_code.innerHTML="";
	   		form.code.style.backgroundColor="#FFFFFF";
   	 	}
   	}
 	if(mark==2 || mark=="all"){
		if(form.tel.value==""){
	   		chknew_tel.innerHTML="请输入电话号码！";
	   		form.tel.style.backgroundColor="#FF0000";
	   		return false;
   	 	}else if(!checkregtel(form.tel.value)){
	   		chknew_tel.innerHTML="电话号码的格式不正确！";
	   		form.tel.style.backgroundColor="#FF0000";
	   		return false;
   	 	}else if(isNaN(form.tel.value)){
   	   		chknew_tel.innerHTML="电话号由数字组成！";
	   		form.tel.style.backgroundColor="#FF0000";
	   		return false;
   	 	}else{	
   	   		chknew_tel.innerHTML="";
	   		form.tel.style.backgroundColor="#FFFFFF";
   	 	}
   	}
  	if(mark==3 || mark=="all"){
   		if(form.address.value==""){
	   		chknew_address.innerHTML="请输入联系地址！";
	   		form.address.style.backgroundColor="#FF0000";
	   		return false;
   	 	}else{
   	   		chknew_address.innerHTML="";
	   		form.address.style.backgroundColor="#FFFFFF";
   	 	}
   	}
}


   
   
  




 

