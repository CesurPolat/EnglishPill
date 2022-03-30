<?php include("connect.php") ?>
<html>
<head>
<title>EnglishPill - Hakkında</title>
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
<div class="container">
  <h2>Ders Konuları</h2>
  <div class="list-group">
    <a href="https://www.englisch-hilfen.de/en/grammar/adjectives.htm" target="_blank" class="list-group-item list-group-item-action">Sıfatlar</a>
    <a href="https://www.englisch-hilfen.de/en/grammar_list/artikel.htm" target="_blank" class="list-group-item list-group-item-action">Tanımlık</a>
    <a href="https://www.englisch-hilfen.de/en/grammar_list/substantiv.htm" target="_blank" class="list-group-item list-group-item-action">İsimler</a>
    <a href="https://www.englisch-hilfen.de/en/grammar/english_tenses.htm" target="_blank" class="list-group-item list-group-item-action">Zamanlar</a>
  </div>
</div>
<script src="js/Translate.js"></script>
</body>
</html>