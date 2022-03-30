var Ready = false;
var i;
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    //console.log(this.responseText);
    //console.log(this.responseText.split('<article')[1]);
	/*if(typeof(document.getElementsByClassName('spinner-grow')[0]) =="undefined"){
		
	}*/
	document.getElementsByClassName('spinner-grow')[0].remove();
	
	for(i=1;i<this.responseText.split('<article').length;i++){
		var mdiv= document.createElement("div");
		mdiv.className = "MDivS LogPanel";
		document.getElementById('NewVideos').appendChild(mdiv);
		/*var dimg = document.createElement("img");
		dimg.style = "width: 100%;height: 75%;";
		dimg.src = this.responseText.split('<article')[i].split('src="')[1].split('"')[0];
		document.getElementsByClassName('MDivS')[document.getElementsByClassName('MDivS').length-1].appendChild(dimg);*/
		//document.getElementById('NewVideos').appendChild(mdiv);
		var dTitle = document.createElement("a");
		//dTitle.className = "btn";
		//var ll = "/"+this.responseText.split('<article')[i].split('<a href="')[1].split('"')[0].split("/")[3];
		dTitle.href = "javascript:YouVideo('/"+this.responseText.split('<article')[i].split('<a href="')[1].split('"')[0].split("/")[3]+"')";//.split("/")[3]//"?video="+
		dTitle.innerHTML = '<img src="'+this.responseText.split('<article')[i].split('src="')[1].split('"')[0]+'" style="width: 100%;height: 75%;">'+this.responseText.split('<article')[i].split('<a href="')[1].split('>')[1].split("<")[0];
		document.getElementsByClassName('MDivS')[document.getElementsByClassName('MDivS').length-1].appendChild(dTitle);
		var dTags = document.createElement("p");
		dTags.innerHTML = this.responseText.split('<article')[i].split('<time')[1].split('</time>')[0].split('">')[1]+" /";
		for(var a=1;a<this.responseText.split('<article')[i].split('"> ').length;a++){
			if(a == this.responseText.split('<article')[i].split('"> ').length-1){
				dTags.innerHTML += this.responseText.split('<article')[i].split('"> ')[a].split('</a>')[0];
			}
			else{
				dTags.innerHTML += this.responseText.split('<article')[i].split('"> ')[a].split('</a>')[0]+",";
			}
		}
				document.getElementsByClassName('MDivS')[document.getElementsByClassName('MDivS').length-1].appendChild(dTags);
	}
	//<div class="spinner-grow text-primary"></div>
	var spner= document.createElement("div");
	spner.className = "spinner-grow text-primary";
	document.getElementById('NewVideos').appendChild(spner);
	Ready = true;
	
    //console.log(this.responseText.split('<article')[1].split('src="')[1].split('"')[0]);
	//console.log("?video="+this.responseText.split('<article')[1].split('<a href="')[1].split('"')[0].split("/")[3]);
	//console.log(this.responseText.split('<article')[1].split('<a href="')[1].split('>')[1].split("<")[0]);
	//console.log(this.responseText.split('<article')[1].split('<time')[1].split('</time>')[0].split('">')[1]);
	
	/*
	console.log(this.responseText.split('<article')[1].split('"> ')[1].split('</a>')[0]);
	console.log(this.responseText.split('<article')[1].split('"> ')[2].split('</a>')[0]);
	console.log(this.responseText.split('<article')[1].split('"> ')[3].split('</a>')[0]);
	console.log(this.responseText.split('<article')[1].split('"> ')[4].split('</a>')[0]);
	*/
	// 300 200
  }
};
xhttp.open("GET", "get.php/?a=https://www.videosinlevels.com/page/", true);
xhttp.send();

function ReLoad(PageN){
	xhttp.open("GET", "get.php/?a=https://www.videosinlevels.com/page/"+PageN, true);
	xhttp.send();
}

function YouVideo(Youlink){
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById('YouPlayer').src=this.responseText.split('<iframe width="870" height="489" src="')[1].split('"')[0];
			//<iframe width="870" height="489" src="
		}
	};
	xhttp.open("GET", "get.php/?a=https://www.videosinlevels.com/"+Youlink, true);
	xhttp.send();
	document.getElementById('YoutubePanel').style ="display:block;";
	document.getElementById('VoPlayer').pause();
	
}
