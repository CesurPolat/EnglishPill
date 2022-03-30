<?php include("connect.php") ?>
<html>
<head>
<title>EnglishPill</title>
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
  <!-- Menu-->
  <div class="row">
	<div class="col-lg-3 MenuPanel"><a href="lessons.php"><img src="image/lessons.png" width="256" height="256"><h1 class="display-4">Dersler</h1></a></div>
	<div class="col-lg-3 MenuPanel"><a href="vocabulary.php"><img src="image/vocabulary.png" width="256" height="256"><h1 class="display-4">Kelimeler</h1></a></div>
	<div class="col-lg-3 MenuPanel"><a href="reading.php"><img src="image/BookReading.png" width="256" height="256"><h1 class="display-4">Okuma</h1></a></div>
	<div class="col-lg-3 MenuPanel"><a href="listening.php"><img src="image/listening.png" width="256" height="256"><h1 class="display-4">Dinleme</h1></a></div>
  </div>
  <!-- Bildirim-->
  <!-- İkinci Table Ekle-->
  <!-- Lessons-->
  <div class="row">
  <div class="col-lg-3"></div>
	<div class="col-lg-3"><center><img src="image/İngilizce.jpg" width="250"></center></div>
	<div class="col-lg-3"><h1 class="display-4">İngilizce biliyor musun?</h1><p>1.3 Milyar insan ingilizceyi anadili veya ikinci dil olarak kullanıyor.</p><p>İnternetin %56,6'sı ingilizce.</p><h5>Peki Sen İngilizce Biliyor Musun?<br/><a class="btn btn-success" href="login.php?a=signup">Kaydol!</a></h5></div>
	<div class="col-lg-3"></div>
  </div>
  <div class="row">
	<div class="col-lg-3"></div>
	<div class="col-lg-3"><center><img src="image/gallery.png"></center></div>
	<div class="col-lg-3"><h1 class="display-4">Galeri</h1><p>Galerimizde ingilizce öğrenmenize yardım edecek materyalleri bulabilirsiniz.</p><a class="btn btn-success" href="gallery.php">Galeriye Git!</a></div>
	<div class="col-lg-3"></div>
  </div>
</div>
<footer>
<div class="row" style="margin-right:0">
<div class="col-sm-4"><h1>EnglishPill</h1></div>
<div class="col-sm-4" style="text-align:center;"><p>© 2021 CESUR POLAT - Bu sitenin tüm içeriği telif hakkı ile korunmaktadır.</p></div>
<div class="col-sm-4"><a href="contact.php">İletişim</a> <a href="about.php">Hakkında</a></div>
</div>
</footer>
<script src="js/Translate.js"></script>
</body>
</html>