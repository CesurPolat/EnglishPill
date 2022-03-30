var Words;
var Number = 0;
var Language = 1;
/*function onReceive() {
	console.log(this.responseText);
}
const req = new XMLHttpRequest();
req.addEventListener("load", onReceive);
req.open("GET", "");
req.send();*/

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		Words = xhttp.responseText.split('[');
		Refresh();
        //console.log(xhttp.responseText);
        //console.log("Ready");
    }
};
xhttp.open("GET", "document/Words.txt", true);
xhttp.send();

function Change(rate){
	Number += rate;
	Refresh();
}
function ChangeL(){
	if(Language == 1){
		Language = 2
	}
	else{
		Language = 1;
	}
	Refresh();
}

function Refresh(){
	document.getElementById('Word').innerHTML = window.Words[Language].split(',')[Number];
	document.getElementById('Word').className = "fade show";
}