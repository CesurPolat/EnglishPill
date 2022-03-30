Search();
Read();

function Search(){
		function onReceive() {
			//console.log(this.responseText.split('<tr>')[2].split('<a href="/tr/turkce-ingilizce/')[1].split(">")[1].split("</a")[0]);
			//console.log(this.responseText);
			//console.log(this.responseText.split('<tr>')[2]);
			
			//TranslateTd1.innerHTML = this.responseText.split('<div class="news-block highlighted">')[1].split('<td class="hidden-xs">')[1].split("</td>")[0];
			
			/*var ATitle = document.createElement("h1");
			ATitle.innerHTML = this.responseText.split('<div class="news-block highlighted">')[1].split('<div class="news-block">')[0].split('<div class="title">')[1].split('</div>')[0].replace('href="','href="?a=');
			document.getElementById('home').appendChild(ATitle);*/
			
			for(i=1;i<this.responseText.split('<div class="news-block">').length;i++){
				var ATitle = document.createElement("h1");
				ATitle.innerHTML = this.responseText.split('<div class="news-block">')[i].split('<div class="news-block">')[0].split('<div class="title">')[1].split('</div>')[0].replace('href="','href="?a=');
				document.getElementById('home').appendChild(ATitle);
				document.getElementById('home').appendChild(document.createElement("hr"));
				
			}
			
			var pag = document.createElement("ul");
			pag.className = "pagination justify-content-end";
			pag.style = "margin:20px 0";
			document.getElementById('home').appendChild(pag);
			
			for(i=1;i<this.responseText.split("<ul class='pagination'>")[1].split('</ul>')[0].split('<li').length;i++){
				if(this.responseText.split("<ul class='pagination'>")[1].split('</ul>')[0].split('<li')[i].indexOf("class='active'") != -1){
					var pagItem = document.createElement("li");
					pagItem.className = "pagItem page-item active";
					var pagLink = document.createElement("a");
					pagLink.className = "page-link";
					pagLink.innerHTML = this.responseText.split("<ul class='pagination'>")[1].split('</ul>')[0].split('<li')[i].split("class='current'>")[1].split('<')[0];
					//console.log(this.responseText.split("<ul class='pagination'>")[1].split('</ul>')[0].split('<li')[i].split("class='current'>")[1].split('<')[0]);
					document.getElementsByClassName('pagination')[0].appendChild(pagItem);
					document.getElementsByClassName('pagItem')[document.getElementsByClassName('pagItem').length-1].appendChild(pagLink);
				}
				else{
					var pagItem = document.createElement("li");
					pagItem.className = "pagItem"; 
					var pagLink = document.createElement("a");
					pagLink.className = "page-link";
					//pagLink.href = "?page="+this.responseText.split("<ul class='pagination'>")[1].split('</ul>')[0].split('<li')[i].split("href='")[1].split("'")[0];
					if(typeof(this.responseText.split("<ul class='pagination'>")[1].split('</ul>')[0].split('<li')[i].split("href='")[1].split("/'")[0].split('page/')[1]) == "undefined"){
						pagLink.href = "?page="+1;
					}
					else{
						pagLink.href = "?page="+this.responseText.split("<ul class='pagination'>")[1].split('</ul>')[0].split('<li')[i].split("href='")[1].split("/'")[0].split('page/')[1];
					}
					if(this.responseText.split("<ul class='pagination'>")[1].split('</ul>')[0].split('<li')[i].indexOf("'>") != -1){
						pagLink.innerHTML = this.responseText.split("<ul class='pagination'>")[1].split('</ul>')[0].split('<li')[i].split("'>")[1].split("</")[0];
						//console.log(this.responseText.split("<ul class='pagination'>")[1].split('</ul>')[0].split('<li')[i].split("'>")[1].split("</")[0]);
					}
					else{
						pagLink.innerHTML = this.responseText.split("<ul class='pagination'>")[1].split('</ul>')[0].split('<li')[i].split(' >')[1].split("</")[0];
						//console.log(this.responseText.split("<ul class='pagination'>")[1].split('</ul>')[0].split('<li')[i].split(' >')[1].split("</")[0]);
					}
					document.getElementsByClassName('pagination')[0].appendChild(pagItem);
					document.getElementsByClassName('pagItem')[document.getElementsByClassName('pagItem').length-1].appendChild(pagLink);
				}
				/*document.getElementsByClassName('pagination')[0].appendChild(pagItem);
				document.getElementsByClassName('pagItem')[document.getElementsByClassName('pagItem').length-i].appendChild(pagLink);*/
				
			}
			
			//console.log(this.responseText.split("<ul class='pagination'>")[1].split('</ul>')[0]);
			//console.log(this.responseText.split("<ul class='pagination'>")[1].split('</ul>')[0].split('<li')[7]);
			//console.log(this.responseText.split("<ul class='pagination'>")[1].split('</ul>')[0].split('<li')[6].split("'>")[1].split("</")[0]);
			
			document.getElementsByClassName('spinner-grow')[0].style="display:none;"
		}

		const req = new XMLHttpRequest();
		req.addEventListener("load", onReceive);
		if(window.location.search.indexOf('?page') != -1){
			const urlParams = new URLSearchParams(window.location.search);
			const data = urlParams.get('page');
			
			req.open("GET", "get.php/?a=https://www.newsinlevels.com/level/level-1/page/"+data);
		}
		else{
			req.open("GET", "get.php/?a=https://www.newsinlevels.com/level/level-1/");
		}
		
		req.send();
	
}

function Read(){
	//document.getElementsByClassName('container')[0].style="display:none;";
	
	if(window.location.search.indexOf('?a') != -1){
		document.getElementsByClassName('nav-tabs')[0].style="display:none;";
		document.getElementsByClassName('tab-content')[0].style="display:none;";
		document.getElementsByClassName('container')[3].style="border:1px solid #dee2e6;border-radius: 10px;display:block;";
		const urlParams = new URLSearchParams(window.location.search);
		const data = urlParams.get('a');
		
		function onReceive() {
			//console.log(this.responseText);
			document.getElementById('Title').innerHTML = this.responseText.split('<h2>')[1].split('</h2>')[0];
			document.getElementsByClassName('page-link')[0].href = this.responseText.split('<div class="level fancy-buttons">')[1].split('<a href="')[1].split('">')[0].replace('https','?a=https');
			document.getElementsByClassName('page-link')[1].href = this.responseText.split('<div class="level fancy-buttons">')[1].split('<a href="')[2].split('">')[0].replace('https','?a=https');
			document.getElementsByClassName('page-link')[2].href = this.responseText.split('<div class="level fancy-buttons">')[1].split('<a href="')[3].split('">')[0].replace('https','?a=https');
			document.getElementById('Content').innerHTML = this.responseText.split('<div id="nContent">')[1].split('</div>')[0];
			
		}
		
		const req = new XMLHttpRequest();
		req.addEventListener("load", onReceive);
		req.open("GET", "get.php/?a="+data);
		req.send();
	}
	
}