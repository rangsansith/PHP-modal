// JavaScript Document
var date,year,month,day,weekday;
var yearmenu,monthmenu,daymenu;
date = new Date();
year = date.getYear();					//年
month = date.getMonth() + 1;			//月
day = date.getDate();					//日
weekday = date.getDay();				//星期
function changeDate(){
	year = document.getElementById('yearnum').value;
	month = document.getElementById('monthnum').value;
	day = document.getElementById('daynum').innerText;
}
function getYearmenu(){
	yearmenu = "<select id = 'yearnum' name='yearnum' onchange='return changeDate("+year+","+month+","+day+")'>";
	for (i=1970;i <= 2020; i++){
		if (i == year)
			yearmenu += "<option value="+i+" selected>"+i+"</option>";
		else
			yearmenu += "<option value="+i+">"+i+"</option>";
	}
	yearmenu += "</select>";
	document.write(yearmenu);
}
function getMonthmenu(){
	monthmenu = "<select id = 'monthnum' name = 'monthnum' onchange='return changeDate()'>";
	for (i = 1; i <= 12; i++){
		if (i == month)
			monthmenu += "<option value="+i+" selected>"+i+"</option>";
		else
			monthmenu += "<option value="+i+">"+i+"</option>";
	}
	monthmenu += "</select>";
	document.write(monthmenu);
}
function getlist(){
	var fontlist = weekday;
	var behindlist = weekday;
	if (weekday == 0){
		daymenu = "<tr><td align=center valign=middle bgcolor=#ffd48f><div id=daynum name=daynum>"+day+"</div></td>";
		fontlist = 6
		behindlist = 1
	}else if (weekday == 6){
		daymenu = "<td align=center valign=middle bgcolor=#ffd48f><div id=daynum name=daynum>"+day+"</div></td></tr>";
		fontlist = 5;
		behindlist = 0; 
	}else{
		daymenu = "<td align=center valign=middle bgcolor=#ffd48f><div id=daynum name=daynum>"+day+"</div></td>";
		fontlist--;
		behindlist++;
	}
	thisday = day - 1;
	for (i = thisday; i >= 1; i--){
		if (fontlist == 0){
			daymenu = "<tr><td align=center valign=middle style='color:#92ca35;'>"+i+"</td>" + daymenu;
			fontlist = 6;
		}else if (fontlist == 6){
			daymenu = "<td align=center valign=middle style='color:#92ca35;'>"+i+"</td></tr>" + daymenu;
			fontlist--;
		}else{
			daymenu = "<td align=center valign=middle>"+i+"</td>" + daymenu;
			fontlist--;
		}
	}
	for (i = fontlist; i>=0; i--){
		daymenu = "<td align=center valign=middle>&nbsp;</td>"+daymenu;
	}
	thatday = day + 1;
	for (i = thatday; i <= 31; i++){
		if(behindlist == 0){
		  	daymenu += "<tr><td align=center valign=middle style='color:#92ca35;'>"+i+"</td>";
			behindlist++;
		}else if (behindlist == 6){
			daymenu += "<td align=center valign=middle style='color:#92ca35;'>"+i+"</td></tr>";
			behindlist = 0;
		}else{
			daymenu += "<td align=center valign=middle>"+i+"</td>";
			behindlist++;
		}
	}
	for (i = behindlist; i<= 6;i++){
		daymenu += "<td align=center valign=middle>&nbsp;</td>";
	}
	document.write(daymenu);
}