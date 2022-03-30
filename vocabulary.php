<?php include("connect.php") ?>
<html>
<head>
<title>EnglishPill - Kelimeler</title>
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
<div class="container-fluid">
  <div class="row">
	<div class="col-sm-12 bg-warning">
	<center>
		<button id="RndBtn" class="btn" onclick="Random()"><img src="image/dice.png" width="200"><h1>Kelime için Tıkla!</h1></button>
		<h1 id="RndTxt"></h1>
		<h1 id="Timer" style="display:none">5</h1>
		<div id="AnsBtn" style="display:none">
		<button type="button" id="B1" onclick="AnsQ(0)" class="btn btn-primary"></button>
		<button type="button" id="B2" onclick="AnsQ(1)" class="btn btn-primary"></button>
		<button type="button" id="B3" onclick="AnsQ(2)" class="btn btn-primary"></button>
		<button type="button" id="B4" onclick="AnsQ(3)" class="btn btn-primary"></button>
		</div
	</center>
	</div>
  </div>
  <div class="row">
	<div class="col-sm-4 bg-danger"><h1 class="display-3">Yaygın kelimeler.</h1></div>
	<div class="col-sm-8 bg-primary"><a href="cards.php" style="text-align:center;color:black;"><img src="image/v-letter.jpg" style="border:5px solid;" width="75px" class="rounded-circle" ><br/>En Yaygın 1000 Fiil</a></div>
  </div>
 </div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<footer>
<div class="row" style="margin-right:0">
<div class="col-sm-4"><h1>EnglishPill</h1></div>
<div class="col-sm-4" style="text-align:center;"><p>© 2021 CESUR POLAT - Bu sitenin tüm içeriği telif hakkı ile korunmaktadır.</p></div>
<div class="col-sm-4"><a href="contact.php">İletişim</a> <a href="about.php">Hakkında</a></div>
</div>
</footer>
<script src="js/RandomWord.js"></script>
<script src="js/Translate.js"></script>
</body>
</html>