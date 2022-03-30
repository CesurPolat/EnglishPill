var Category = "yellow";
var t = 0;

var Subtitle;
var Answer;
var distractor;
var countdown;

var Time;
var Rnd;

NewVideo();

function NewVideo(){
t=0;
document.getElementById('Timer').innerHTML = countdown;
document.getElementsByClassName('AnswerButtons')[0].style="display:none";
document.getElementsByClassName('AnswerButtons')[1].style="display:none";
document.getElementsByClassName('SubtitleBox')[0].style="display:none";
document.getElementById('NextButton').style="display:none";
document.getElementsByClassName('AnswerButtons')[0].innerHTML="Alt Yazı Kapat";
document.getElementsByClassName('AnswerButtons')[1].innerHTML="Alt Yazı Aç";

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
	//console.log(this.responseText);
	//console.log(JSON.parse(this.responseText));
	Subtitle = JSON.parse(this.responseText).question.video.subtitle;
	Answer = JSON.parse(this.responseText).question.choices.answer;
	//console.log(this.responseText.split('"answer":"')[1].split('"')[0].replace('\u00C7','Ç').replace('\u00E7','ç').replace('\u011E','Ğ').replace('\u011F','ğ').replace('\u0049','İ').replace('\u0131','ı').replace('\u00D6','Ö').replace('\u00F6','ö').replace('\u015E','Ş').replace('\u015F','ş').replace('\u00DC','Ü').replace('\u00FC','ü'));
	distractor = JSON.parse(this.responseText).question.choices.distractor;
	countdown = JSON.parse(this.responseText).question.countdown;
	Time = JSON.parse(this.responseText).question.countdown;
    document.getElementById("VoPlayer").src = this.responseText.split('"mp4":"')[1].split('"')[0];
	document.getElementById("VoPlayer").play();
  }
};

xhttp.open("POST", "get.php/?a=https://www.voscreen.com/api/v3/game/question/",true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send('group_name='+Category);
}

function ChangeCategory(categ){
	Category = categ;
	document.getElementsByTagName('button')[3].innerHTML = "Kategori: "+categ+" &#9660;";
	NewVideo();
}

document.getElementById('VoPlayer').onended=function(){
	document.getElementsByClassName('AnswerButtons')[0].style="display:block";
	document.getElementsByClassName('AnswerButtons')[1].style="display:block";
	
};


function Answered(YAns){
	if(t == 0){
		Rnd = Math.floor(Math.random() * 2);
		if(YAns == 0){
			
			if(Rnd == 0){
				document.getElementsByClassName('AnswerButtons')[0].innerHTML=Answer;
				document.getElementsByClassName('AnswerButtons')[1].innerHTML=distractor;
			}
			else{
				document.getElementsByClassName('AnswerButtons')[1].innerHTML=Answer;
				document.getElementsByClassName('AnswerButtons')[0].innerHTML=distractor;
			}
			t = 1;
		}
		else{
			document.getElementsByClassName('SubtitleBox')[0].style="display:block";
			document.getElementsByClassName('SubtitleBox')[0].innerHTML=Subtitle;
			if(Rnd == 0){
				document.getElementsByClassName('AnswerButtons')[0].innerHTML=Answer;
				document.getElementsByClassName('AnswerButtons')[1].innerHTML=distractor;
			}
			else{
				document.getElementsByClassName('AnswerButtons')[1].innerHTML=Answer;
				document.getElementsByClassName('AnswerButtons')[0].innerHTML=distractor;
			}
			t = 1;
		}
		Timer = setTimeout(Minus, 1000);
	}
	else if(t == 1){
		if(document.getElementsByClassName('AnswerButtons')[YAns].innerHTML == Answer){
			Sch(Time*3);
			document.getElementsByClassName('AnswerButtons')[YAns].style = "display:block;background-color:lightgreen";
		}
		else{
			Sch((Time - countdown)*3);
			document.getElementsByClassName('AnswerButtons')[Rnd].style = "display:block;background-color:lightgreen";
			if(Rnd == 0){
				document.getElementsByClassName('AnswerButtons')[1].style = "display:block;background-color:red";
			}
			else{
				document.getElementsByClassName('AnswerButtons')[0].style = "display:block;background-color:red";
			}
			
		}
		document.getElementById('NextButton').style="display:block";
		document.getElementsByClassName('SubtitleBox')[0].style="display:block";
		document.getElementsByClassName('SubtitleBox')[0].innerHTML=Subtitle;
		clearTimeout(Timer);
		t=2;
	}
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

function Minus(){
	document.getElementById('Timer').innerHTML = window.Time-1;
	if(Time == 0){
		//Puan kırmak
		Sch((Time - countdown)*3);
		document.getElementById('NextButton').style="display:block";
		document.getElementsByClassName('AnswerButtons')[Rnd].style = "display:block;background-color:lightgreen";
		if(window.Rnd == 0){
			document.getElementsByClassName('AnswerButtons')[1].style = "display:block;background-color:red";
		}
		else{
			document.getElementsByClassName('AnswerButtons')[0].style = "display:block;background-color:red";
		}
		t=2;
		
	}
	else{
		Time -= 1;
		Timer = setTimeout(Minus, 1000);
	}
}