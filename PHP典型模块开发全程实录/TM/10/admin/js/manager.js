// JavaScript Document
function showmod(id,manager){
	if(document.getElementById('moddiv').style.display == ''){
		if(document.getElementById('modid').value == id){
			document.getElementById('moddiv').style.display = 'none';
		}else{
			document.getElementById('adddiv').style.display = 'none';
			document.getElementById('modman').value = manager;
			document.getElementById('modid').value = id;
			document.getElementById('modpwd1').focus();
			document.getElementById('modpwd1').value='';
			document.getElementById('modpwd2').value='';
		}
	}else{
		document.getElementById('adddiv').style.display = 'none';
		document.getElementById('moddiv').style.display = '';
		document.getElementById('modman').value = manager;
		document.getElementById('modid').value = id;
		document.getElementById('modpwd1').focus();
		document.getElementById('modpwd1').value='';
		document.getElementById('modpwd2').value='';
	}
	return false;
}
function showadd(){
	if(document.getElementById('adddiv').style.display == ''){
		document.getElementById('adddiv').style.display = 'none';
	}else{
		document.getElementById('adddiv').style.display = '';
		document.getElementById('moddiv').style.display = 'none';
		document.getElementById('addman').value='';
		document.getElementById('addpwd1').value='';
		document.getElementById('addpwd2').value='';
		document.getElementById('addman').focus();
	}
	return false;
}
function chkaddfm(){
	user = document.getElementById('addman');
	pwd1 = document.getElementById('addpwd1');
	pwd2 = document.getElementById('addpwd2');
	if(user.value == ''){
		alert('������Ҫ��ӵĹ���Ա�˺�');
		user.focus();
		return false;
	}
	if(pwd1.value == ''){
		alert('���������Ա����');
		pwd1.focus();
		return false;
	}
	if(pwd1.value != pwd2.value){
		alert('�����������벻��!');
		pwd2.select();
		return false;
	}
}
function chkmodfm(){
	id = document.getElementById('modid');
	pwd1 = document.getElementById('modpwd1');
	pwd2 = document.getElementById('modpwd2');
	if(pwd1.value == ''){
		alert('����������');
		pwd1.focus();
		return false;
	}
	if(pwd1.value != pwd2.value){
		alert('������������벻��!');
		pwd2.select();
		return false;
	}
}