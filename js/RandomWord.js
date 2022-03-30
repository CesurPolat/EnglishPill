var Rnd;
var Time = 5;
var RndQ;
var RndA;
var Timer;
var Ansed = 0;
jQuery.get('document/Words.txt', function(txt){
Rnd = txt;})
//Ayar
//Ses
//İndirme bekleme Font
function Random(){	
	
	RndQ = Math.floor(Math.random() * 994);
	RndA = Math.floor(Math.random() * 4);
	Ansed = 0;
	Time = 5;
	document.getElementById('Timer').innerHTML = 5;
	document.getElementById('RndTxt').innerHTML = window.Rnd.split('[')[1].split(',')[RndQ];
	if(RndA == 0){
		document.getElementById('B1').innerHTML = window.Rnd.split('[')[2].split(',')[RndQ];
	}
	else{
		document.getElementById('B1').innerHTML = window.Rnd.split('[')[2].split(',')[Math.floor(Math.random() * 995)];
	}
	
	if(RndA == 1){
		document.getElementById('B2').innerHTML = window.Rnd.split('[')[2].split(',')[RndQ];
	}
	else{
		document.getElementById('B2').innerHTML = window.Rnd.split('[')[2].split(',')[Math.floor(Math.random() * 995)];
	}
	
	if(RndA == 2){
		document.getElementById('B3').innerHTML = window.Rnd.split('[')[2].split(',')[RndQ];
	}
	else{
		document.getElementById('B3').innerHTML = window.Rnd.split('[')[2].split(',')[Math.floor(Math.random() * 995)];
	}
	
	if(RndA == 3){
		document.getElementById('B4').innerHTML = window.Rnd.split('[')[2].split(',')[RndQ];
	}
	else{
		document.getElementById('B4').innerHTML = window.Rnd.split('[')[2].split(',')[Math.floor(Math.random() * 995)];
	}
	document.getElementById('RndBtn').style = "display:none;";
	Timer = setTimeout(Minus, 1000);
	document.getElementById('Timer').style = "display:block;";
	document.getElementById('AnsBtn').style = "display:block;";
	document.getElementById('B1').className  = "btn btn-primary";
	document.getElementById('B2').className  = "btn btn-primary";
	document.getElementById('B3').className  = "btn btn-primary";
	document.getElementById('B4').className  = "btn btn-primary";
}

function Sch(ScrC){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
	}
		if(document.getElementById('ScrT') != null){
			document.getElementById('ScrT').innerHTML = "Score: "+this.responseText;
		}
		
	};
	xhttp.open("POST", "post.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("sc="+ScrC);
}

function AnsQ(SlcA){
	if(Ansed == 0){
		clearTimeout(Timer);
		Ansed = 1;
		document.getElementById('RndBtn').style = "display:block;";
		if(RndA == SlcA){
			//Puan verme
			Sch(Time*5);
			
			if(RndA == 0){
				document.getElementById('B1').className  = "btn btn-success";
			}
	
			if(RndA == 1){
				document.getElementById('B2').className  = "btn btn-success";
			}
	
			if(RndA == 2){
				document.getElementById('B3').className  = "btn btn-success";
			}
		
			if(RndA == 3){
				document.getElementById('B4').className = "btn btn-success";
			}
		}
		else{
			//Puan kırmak
			//document.getElementsByName('ddata')[0].value = (Time - 5)*5;
			Sch((Time - 5)*5);
			
			if(RndA == 0){
				document.getElementById('B1').className  = "btn btn-success";
			}
			else{
				document.getElementById('B1').className  = "btn btn-danger";
			}
	
			if(RndA == 1){
				document.getElementById('B2').className  = "btn btn-success";
			}
			else{
				document.getElementById('B2').className  = "btn btn-danger";
			}
	
			if(RndA == 2){
				document.getElementById('B3').className  = "btn btn-success";
			}
			else{
				document.getElementById('B3').className = "btn btn-danger";
			}
	
			if(RndA == 3){
				document.getElementById('B4').className = "btn btn-success";
			}
			else{
				document.getElementById('B4').className = "btn btn-danger";
			}
		}
	}
	
}

function Minus(){
	document.getElementById('Timer').innerHTML = window.Time-1;
	if(Time == 0){
		//Puan kırmak
		Sch((Time - 5)*5);
		
		document.getElementById('RndBtn').style = "display:block;";
		Ansed = 1;
		if(RndA == 0){
			document.getElementById('B1').className  = "btn btn-success";
		}
		else{
			document.getElementById('B1').className  = "btn btn-danger";
		}
	
		if(RndA == 1){
			document.getElementById('B2').className  = "btn btn-success";
		}
		else{
			document.getElementById('B2').className  = "btn btn-danger";
		}
	
		if(RndA == 2){
			document.getElementById('B3').className  = "btn btn-success";
		}
		else{
			document.getElementById('B3').className = "btn btn-danger";
		}
	
		if(RndA == 3){
			document.getElementById('B4').className = "btn btn-success";
		}
		else{
			document.getElementById('B4').className = "btn btn-danger";
		}
	}
	else{
		Time -= 1;
		Timer = setTimeout(Minus, 1000);
	}
}