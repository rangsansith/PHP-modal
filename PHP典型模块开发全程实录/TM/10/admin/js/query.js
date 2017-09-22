// JavaScript Document
function changequery(){
	key = document.getElementById('querymem').value;
	switch(key){
		case 'id':
		case 'upfile':
		case 'uppics':
		case 'hitnum':
			document.getElementById('sign').innerHTML = '<select id="signslt" name="signslt"> <Option value="&gt;">����</Option><option value="=">����</option><option value="&lt;">С��</option></select>';
			document.getElementById('cont').value='';
			break;
		case 'name':
		case 'realname':
		case 'email':
		case 'qq':
		case 'title':
		case 'author':
		case 'typename':
		case 'upname':
		case 'upauthor':
		case 'operator':
			document.getElementById('sign').innerHTML = '<select id="signslt" name="signslt"> <Option value="exac">��ȷ</Option><option value="mist">ģ��</option></select>';
			document.getElementById('cont').value='';
			break;
		case 'birthday':
		case 'firsttime':
		case 'uptime':
			document.getElementById('sign').innerHTML = '<select id="signslt" name="signslt"> <Option value="&gt;">����</Option><option value="=">����</option><option value="&lt;">С��</option></select>';
			document.getElementById('cont').value='��ѯ��ʽ��YYYY-MM-DD';
			break;
		case 'examine':
			document.getElementById('sign').innerHTML = '<select id="signslt" name="signslt"><option value="=">����</option></select>';
			document.getElementById('cont').value='1=ͨ�� 2=δ���';
			break;
		case 'content':
			document.getElementById('sign').innerHTML = '<select id="signslt" name="signslt"><option value="mist">ģ��</option></select>';
			document.getElementById('cont').value='';
			break;
	}
	document.getElementById('cont').focus();
	document.getElementById('cont').select();
}
function chkquery(){
	cont = document.getElementById('cont');
	birth = document.getElementById('querymem');
	if(cont.value == ''){
		alert('�������ѯ����');
		cont.focus();
		return false;
	}
	if(birth.value=='id'||birth.value=='upfile'||birth.value=='uppics'||birth.value=='upaud'||birth.value=='hitnum'||birth.value=='renum'){
		if(isNaN(cont.value)){
			alert('����������');
			cont.select();
			return false;
		}
		
	}
	if(birth.value == 'birthday'){
		reg = /^[12][0-9]{3}[-][01]?[0-9][-][0123]?[0-9]$/;
		if(cont.value.match(reg) == null){
			alert('��������ȷ�Ĳ�ѯ��ʽ');
			cont.focus();
			cont.select();
			return false;
		}
	}
}