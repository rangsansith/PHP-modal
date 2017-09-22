// JavaScript Document
function $(id){
	return document.getElementById(id);
}
window.onload = function (){
	$('persondiv').onclick = function(){
		if($('zero').style.display == ''){
			$('zero').style.display ='none';
		}else{
			$('zero').style.display = '';
			$('one').style.display = 'none';
			$('two').style.display = 'none';
			$('four').style.display = 'none';
			$('five').style.display = 'none';
			$('six').style.display = 'none';
		}
	}
	$('artdiv').onclick = function(){
		if($('one').style.display == ''){
			$('one').style.display ='none';
		}else{
			$('zero').style.display = 'none';
			$('one').style.display = '';
			$('two').style.display = 'none';
			$('four').style.display = 'none';
			$('five').style.display = 'none';
			$('six').style.display = 'none';
		}
	}
	$('picdiv').onclick = function(){
		if($('two').style.display == ''){
			$('two').style.display ='none';
		}else{
			$('zero').style.display = 'none';
			$('one').style.display = 'none';
			$('two').style.display = '';
			$('four').style.display = 'none';
			$('five').style.display = 'none';
			$('six').style.display = 'none';
		}
	}
	$('frddiv').onclick = function(){
		if($('four').style.display == ''){
			$('four').style.display ='none';
		}else{
			$('zero').style.display = 'none';
			$('one').style.display = 'none';
			$('two').style.display = 'none';
			$('four').style.display = '';
			$('five').style.display = 'none';
			$('six').style.display = 'none';
		}
	}
	$('messdiv').onclick = function(){
		if($('five').style.display == ''){
			$('five').style.display ='none';
		}else{
			$('zero').style.display = 'none';
			$('one').style.display = 'none';
			$('two').style.display = 'none';
			$('four').style.display = 'none';
			$('five').style.display = '';
			$('six').style.display = 'none';
		}
	}
	$('scripdiv').onclick = function(){
		if($('six').style.display == ''){
			$('six').style.display ='none';
		}else{
			$('zero').style.display = 'none';
			$('one').style.display = 'none';
			$('two').style.display = 'none';
			$('four').style.display = 'none';
			$('five').style.display = 'none';
			$('six').style.display = '';
		}
	}
	$('showinfo').onclick = function(){
		xmlhttp.open('get','person/person.php',true);
		xmlhttp.onreadystatechange = showclass;
		xmlhttp.send(null);
	}
	$('modinfo').onclick = function(){
		xmlhttp.open('get','person/modpwd.php',true);
		xmlhttp.onreadystatechange = showclass;
		xmlhttp.send(null);
	}
	
	$('addart').onclick = function(){
		xmlhttp.open('get','article/addart.php?act=list',true);
		xmlhttp.onreadystatechange = showclass;
		xmlhttp.send(null);
	}
	$('showart').onclick = function(){
		xmlhttp.open('get','article/article.php?act=list',true);
		xmlhttp.onreadystatechange = showclass;
		xmlhttp.send(null);
	}
	$('arttype').onclick = function(){
		xmlhttp.open('get','article/arttype.php?act=list',true);
		xmlhttp.onreadystatechange = showclass;
		xmlhttp.send(null);
	}
	$('addpic').onclick = function(){
		xmlhttp.open('get','pics/addpics.php',true);
		xmlhttp.onreadystatechange = showclass;
		xmlhttp.send(null);
	}
	$('showpic').onclick = function(){
		xmlhttp.open('get','pics/pics.php',true);
		xmlhttp.onreadystatechange = showclass;
		xmlhttp.send(null);
	}
	$('pictype').onclick = function(){
		xmlhttp.open('get','pics/pictype.php',true);
		xmlhttp.onreadystatechange = showclass;
		xmlhttp.send(null);
	}
	$('addfrd').onclick = function(){
		xmlhttp.open('get','frd/addfrd.php',true);
		xmlhttp.onreadystatechange = showclass;
		xmlhttp.send(null);
	}
	$('showfrd').onclick = function(){
		xmlhttp.open('get','frd/frd.php',true);
		xmlhttp.onreadystatechange = showclass;
		xmlhttp.send(null);
	}
	$('showmess').onclick = function(){
		xmlhttp.open('get','mess/mess.php',true);
		xmlhttp.onreadystatechange = showclass;
		xmlhttp.send(null);
	}
	$('showscrip').onclick = function(){
		xmlhttp.open('get','scrip/scrip.php',true);
		xmlhttp.onreadystatechange = showclass;
		xmlhttp.send(null);
	}
	function showclass(){
		if(xmlhttp.readystate == 4){
			if(xmlhttp.status == 200){
				$('showmenu').innerHTML = xmlhttp.responseText;
			}
		}
	}
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
}