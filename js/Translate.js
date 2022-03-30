function Search(){
	if(document.getElementById("WordSrc").value.length ){
		var RemoveFor = document.getElementsByClassName('TranslateRow').length;
		for(i=0; i<RemoveFor;i++){
			document.getElementsByClassName('TranslateRow')[0].remove();
		}
		$("#myModal").modal("toggle");
		document.getElementById('TranslateWord').innerHTML = document.getElementById("WordSrc").value;
		
		/*var Test = document.createElement("tr");
		document.getElementById('TableBody').appendChild(Test);*/
		//<td class="hidden-xs">Yaygın
		//<a href="/tr/turkce-ingilizce/go">
		//<td class="tr ts" lang="tr">
		function onReceive() {
			//console.log(this.responseText.split('<tr>')[2].split('<a href="/tr/turkce-ingilizce/')[1].split(">")[1].split("</a")[0]);
			//console.log(this.responseText);
			//console.log(this.responseText.split('<tr>')[2]);
			for(i=2;i<this.responseText.split('<tr>').length-1;i++){
				/*console.log(this.responseText.split('<tr>')[i].split('<td class="hidden-xs">')[1].split("</td>")[0]);
				console.log(this.responseText.split('<tr>')[i].split('<td class="en tm" lang="en">')[1].split("</td>")[0]);
				console.log(this.responseText.split('<tr>')[i].split('<td class="tr ts" lang="tr">')[1].split("</td>")[0]);*/
				var TranslateRow = document.createElement("tr");
				TranslateRow.className = 'TranslateRow';
				document.getElementById('TableBody').appendChild(TranslateRow);
				var TranslateTd1 = document.createElement("td");
				TranslateTd1.innerHTML = this.responseText.split('<tr>')[i].split('<td class="hidden-xs">')[1].split("</td>")[0];
				var TranslateTd2 = document.createElement("td");
				TranslateTd2.innerHTML = this.responseText.split('<tr>')[i].split('<td class="en tm" lang="en">')[1].split("</td>")[0];
				var TranslateTd3 = document.createElement("td");
				TranslateTd3.innerHTML = this.responseText.split('<tr>')[i].split('<td class="tr ts" lang="tr">')[1].split("</td>")[0];
				document.getElementsByClassName('TranslateRow')[i-2].appendChild(TranslateTd1);
				document.getElementsByClassName('TranslateRow')[i-2].appendChild(TranslateTd2);
				document.getElementsByClassName('TranslateRow')[i-2].appendChild(TranslateTd3);
				
			}
			
		}

		const req = new XMLHttpRequest();
		req.addEventListener("load", onReceive);
		req.open("GET", "https://tureng.com/tr/turkce-ingilizce/"+document.getElementById("WordSrc").value);
		req.send();
	}
	
}