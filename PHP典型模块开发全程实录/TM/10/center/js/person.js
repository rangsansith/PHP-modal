// JavaScript Document
//��ʾ�޸���Ϣҳ��
function modperson(){
	xmlhttp.open('get','person/modperson.php',true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4 && xmlhttp.status == 200){
			$('showmenu').innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.send(null);
}
//�ı�����ͷ��
function changegif(){
	$('headimg').src=$('headgif').value;
}
//�޸���Ϣ����
function chkmodinfo(){
	url = "person/modperson_chk.php?email="+$('email').value+"&homepage="+$('homepage').value+"&qq="+$('qq').value+"&headgif="+$('headgif').value+"&unwrite="+$('unwrite').value+"&realname="+$('realname').value+"&sex="+$('sex').value+"&birthday="+($('year').value+'-'+$('month').value+'-'+$('day').value)+"&tel="+$('tel').value+"&address="+$('address').value;
	xmlhttp.open('get',url,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4 && xmlhttp.status == 200){
			msg = xmlhttp.responseText;
			if(msg == '1'){
				alert('�޸ĳɹ�');
				showpage();
			}else{
				alert('��ȷ�����Ѿ��޸�����Ϣ');
			}
		}
	}
	xmlhttp.send(null);
}
//�����޸����뺯��
function entermodinfo(){
	if($('oldpwd').value == ''){
		alert('������ԭ����');
		$('oldpwd').focus();
		return false;
	}
	if($('newpwd1').value == ''){
		alert('������������');
		$('newpwd1').focus();
		return false;
	}
	if($('newpwd2').value != $('newpwd1').value){
		alert('�������벻һ��');
		$('newpwd2').select();
		return false;
	}
	xmlhttp.open('get','person/modpwd_chk.php?act=old&pwd='+$('oldpwd').value,true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4 && xmlhttp.status == 200){
			msg = xmlhttp.responsetext;
			if(msg == '1'){
				xmlhttp.open('get','person/modpwd_chk.php?act=new&pwd='+$('newpwd1').value,true);
				xmlhttp.onreadystatechange = function(){
					if(xmlhttp.readystate == 4 && xmlhttp.status == 200){
						msg = xmlhttp.responsetext;
						if(msg == '1'){
							alert('�޸ĳɹ�');
							showpage()
						}else if(msg == '2'){
							alert('�����������ԭ���벻ͬ');
						}
					}
				}
				xmlhttp.send(null);
				
			}else if(msg == '2'){
				alert('ԭ�����������');
			}
		}
	}
	xmlhttp.send(null);
	
	
}
//��ʾ������Ϣҳ��
function showpage(){
	xmlhttp.open('get','person/person.php',true);
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readystate == 4 && xmlhttp.status == 200){
			$('showmenu').innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.send(null);
}