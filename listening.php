<?php include("connect.php") ?>
<html>
<head>
<title>EnglishPill - Dinleme</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="TopMenu input-group" style="padding:.5rem 1rem">
<div class="col-md-3"><h1><a href="index.php">EnglishPill</a></h1></div>
<div class="col-md-6"><div class="input-group mb-3" style="align-items:center;">
  <!-- Tahmin ve Enter-->
  <input type="text" class="form-control" id="WordSrc" placeholder="Çevir">
  <div class="input-group-append">
    <button class="btn btn-success" type="submit" onclick="Search()">Go</button>  
  </div>
</div></div>
<div class="col-md-3">
<?php 
session_start();
if(isset($_SESSION['id'])){
	$phpid = $_SESSION['id'];
	$sqli = mysqli_query($db, "SELECT * FROM `users` WHERE id = '$phpid'");
	$datas = mysqli_fetch_array($sqli);
	echo '<b>'.$datas['username'].'</b> <i id="ScrT">Score: '.$datas['score'].'</i> <a href="logout.php">Çıkış Yap</a>';
}
else{
	echo '<a href="login.php">Giriş Yap</a>';
}
?>
</div>
</div>
<!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h1 class="modal-title" id="TranslateWord">Null</h1>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
		<table class="table table-striped table-hover">
			<thead>
			<tr>
				<th>Kategori</th>
				<th>İngilizce</th>
				<th>Türkçe</th>
			</tr>
			</thead>
			<tbody id="TableBody">
			</tbody>
		</table>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
        </div>
        
      </div>
    </div>
  </div>
  
  <div id="YoutubePanel" style="display:none;" onclick="document.getElementById('YoutubePanel').style='display:none';document.getElementById('YouPlayer').src='';"><center><iframe id="YouPlayer" style="margin-top:200" width="870" height="489" frameborder="0" allowfullscreen src=""></iframe></center></div>
  
<div class="container-fluid">
	<div class="row">
	<div class="col-sm-3"></div>
	<div class="col-sm-6" style="padding:0">
	<button type="button" class="btn" data-toggle="collapse" data-target="#demo">Kategori: Life &#9660;</button>
  <div id="demo" class="collapse">
    <table>
		<tr>
			<th>Seviye</th>
			<th>Gramer Konuları</th>
			<th>Uzunluk</th>
			<th>Çocuk</th>
		</tr>
		<tr>
			<td><a href="#" onclick="ChangeCategory('beginner')">Başlangıç</a></td>
			<td rowspan="5"><div style="height:150px;overflow-y:auto"><a href="#" onclick="ChangeCategory('am_is_are')">Am, Is, Are</a><br/><a href="#" onclick="ChangeCategory('can')">Can</a><br/><a href="#" onclick="ChangeCategory('will')">Will</a><br/><a href="#" onclick="ChangeCategory('what_questions')">What</a><br/><a href="#" onclick="ChangeCategory('imperatives')">Imperatives</a><br/><a href="#" onclick="ChangeCategory('was_were')">Was, Were</a><br/><a href="#" onclick="ChangeCategory('with_without')">With, Without</a><br/><a href="#" onclick="ChangeCategory('if')">If</a><br/><a href="#" onclick="ChangeCategory('in_at_on')">In, At, On</a><br/><a href="#" onclick="ChangeCategory('about_for_from')">About, For ,From</a><br/><a href="#" onclick="ChangeCategory('present_simple')">Present Simple</a><br/><a href="#" onclick="ChangeCategory('past_simple')">Past Simple</a><br/><a href="#" onclick="ChangeCategory('present_continuous')">Present Continuous</a><br/><a href="#" onclick="ChangeCategory('present_perfect')">Present Perfect</a><br/><a href="#" onclick="ChangeCategory('relative_clauses')">Relative Clauses</a><br/><a href="#" onclick="ChangeCategory('comparatives_superlatives')">Comparative, Superlative</a><br/><a href="#" onclick="ChangeCategory('why')">Why</a><br/><a href="#" onclick="ChangeCategory('noun_clauses')">Noun Clauses</a><br/><a href="#" onclick="ChangeCategory('adverb_clauses')">Adverb Clauses</a><br/><a href="#" onclick="ChangeCategory('modals')">Modals</a><br/><a href="#" onclick="ChangeCategory('passives')">Passive Verb Forms</a><br/><a href="#" onclick="ChangeCategory('phrasal_verbs')">Phrasal Verbs</a><br/><a href="#" onclick="ChangeCategory('tenses')">Tenses</a><br/><a href="#" onclick="ChangeCategory('conjunctions')">Conjuctions</a><br/><a href="#" onclick="ChangeCategory('questions_all')">Questions</a><br/><a href="#" onclick="ChangeCategory('singular_plural')">Singular, Plural</a><br/><a href="#" onclick="ChangeCategory('be_going_to')">Be Going To</a></div></td>
			<td><a href="#" onclick="ChangeCategory('1_to_3')">1-3 Kelime</a></td>
			<td><a href="#" onclick="ChangeCategory('red')">Seviye 1</a></td>
		</tr>
		<tr>
			<td><a href="#" onclick="ChangeCategory('elementary')">Temel</a></td>
			<td><a href="#" onclick="ChangeCategory('4_to_6')">4-6 Kelime</a></td>
			<td><a href="#" onclick="ChangeCategory('yellow')">Seviye 2</a></td>
		</tr>
		<tr>
			<td><a href="#" onclick="ChangeCategory('intermediate')">Orta seviye</a></td>
			<td><a href="#" onclick="ChangeCategory('7_to_9')">7-9 Kelime</a></td>
			<td><a href="#" onclick="ChangeCategory('green')">Seviye 3</a></td>
		</tr>
		<tr>
			<td><a href="#" onclick="ChangeCategory('upper')">Yüksek seviye</a></td>
			<td><a href="#" onclick="ChangeCategory('10_to_12')">10-12 Kelime</a></td>
		</tr>
		<tr>
			<td><a href="#" onclick="ChangeCategory('advanced')">Gelişmiş</a></td>
			<td><a href="#" onclick="ChangeCategory('13_and_more')">13 ve daha fazla Kelime</a></td>
		</tr>
	</table>
  </div>
  </div>
  </div>
  <div class="col-sm-3"></div>
  <div class="row">
	<div class="col-sm-3"></div>
	<div class="col-sm-6" style="padding:0"><div style="position:absolute;z-index:1030;left:0;right:0;"><center><button id="fs" style="opacity:0.8;border:1px solid;border-radius:0 0 10px 10px;font-size:20px" onclick="if(!document.fullscreenElement){document.getElementsByClassName('col-sm-6')[1].requestFullscreen();document.getElementById('fs').innerHTML='&#x26F6; Tam Ekrandan Çık'}else{document.exitFullscreen();document.getElementById('fs').innerHTML='&#x26F6; Tam Ekran'}">&#x26F6; Tam Ekran</button></center><img src="image/white.png" style="position:absolute;right:10;top:10;" width="75px" class="rounded-circle" ><h1 class="display-4" style="position:absolute;right:25px;top:10px;" id="Timer">1</h1></img></div><div style="position:absolute;z-index:1030;right:0;top:0;bottom:0;display:flex;flex-wrap:wrap;align-content:center;"><button id="NextButton" style="display:none" onclick="NewVideo()">&#10095;</button></div><div style="position:absolute;z-index:1030;right:0;left: 0;bottom:0;display:flex;justify-content:space-around"><button class="AnswerButtons" style="display:none" onclick="Answered(0)">Alt Yazı Kapat</button><button class="AnswerButtons" style="display:none" onclick="Answered(1)">Alt Yazı Aç</button><p class="SubtitleBox" style="display:none">Subtitle</p></div><video id="VoPlayer" onclick="if(document.getElementById('VoPlayer').paused){document.getElementById('VoPlayer').play()}else{document.getElementById('VoPlayer').pause()}" src="" style="width:100%">Your browser does not support the video tag.</video></div>
	<div class="col-sm-3"></div>
  </div>
</div>
<br/><br/><br/>
<h2 class="display-4">Yeniler: </h2>
<div id="NewVideos" style="overflow-x:hidden;overflow-y:hidden;width:100%;display:grid;grid-template-columns: repeat(1000000000,auto);"><button style="position:sticky;height:200px;left:0;opacity:0.8;border:1px solid;border-radius:0 10px 10px 0;font-size:50px" onclick="" onmousedown="toggleOn();change(-1)" onmouseup="toggleOff()">&#10094;</button><button style="position:absolute;height:200px;right:0;opacity:0.8;border:1px solid;border-radius:10px 0 0 10px;font-size:50px" onclick="" onmousedown="toggleOn();change(1)" onmouseup="toggleOff()">&#10095;</button><div class="spinner-grow text-primary"></div></div>
<!--
<div class="clearfix">
  <button class="float-right" onclick="" onmousedown="toggleOn();change(1)" onmouseup="toggleOff()">›</button>
</div>-->
<br/><br/><br/>

<script>
var direction = 0;

function change(nw){
	direction = nw;
}

var LastP = 1;
var tid = 0;
var speed = 10;

function toggleOn(){
    if(tid==0){
        tid=setInterval('ThingToDo()',speed);
    }
}
function toggleOff(){
    if(tid!=0){
        clearInterval(tid);
        tid=0;
    }
}
function ThingToDo(){
	document.getElementById("NewVideos").scrollBy(25*direction,0);
	if(document.getElementById("NewVideos").scrollLeft/(document.getElementById("NewVideos").scrollWidth - document.getElementById("NewVideos").clientWidth) == 1 && Ready){
		ReLoad(LastP+1);
		LastP += 1;
		Ready = false;
	}
}

</script>
<footer>
<div class="row" style="margin-right:0">
<div class="col-sm-4"><h1>EnglishPill</h1></div>
<div class="col-sm-4" style="text-align:center;"><p>© 2021 CESUR POLAT - Bu sitenin tüm içeriği telif hakkı ile korunmaktadır.</p></div>
<div class="col-sm-4"><a href="contact.php">İletişim</a> <a href="about.php">Hakkında</a></div>
</div>
</footer>
<script src="js/Listen.js"></script>
<script src="js/Videos.js"></script>
<script src="js/Translate.js"></script>
</body>
</html>