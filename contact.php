<?php include("connect.php") ?>
<html>
<head>
<title>EnglishPill - İletişim</title>
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
<div class="row LogPanel">
	<div class="col-sm-4" style="padding:0">
	<div class="card" style="border:0">
    <img class="card-img-top" src="image/avatar.png" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">Cesur POLAT</h4>
      <p class="card-text">11ATP 343 İMKB Mehmet Akif Ersoy<br/> Mesleki ve Teknik Anadolu Lisesi</p>
	  <b>E-Mail: </b><a href="mailto:cesurpolat12@gmail.com">cesurpolat12@gmail.com</a>
    </div>
  </div>
  </div>
  <div class="col-sm-8">
	<h2>İletişim</h2>
	<p>Şikayetleriniz ve/veya Önerileriniz için.</p>
	<form  method="POST" class="needs-validation" novalidate>
  <div class="form-group">
    <label for="uname">İsim:</label>
    <input type="text" class="form-control" placeholder="İsim" name="uname" required>
    <div class="valid-feedback">Uygun.</div>
    <div class="invalid-feedback">Lütfen boşluğu doldurunuz.</div>
  </div>
  <div class="form-group">
    <label for="pwd">E-Mail:</label>
    <input type="email" class="form-control" placeholder="E-Mail" name="mail" required>
    <div class="valid-feedback">Uygun.</div>
    <div class="invalid-feedback">Lütfen boşluğu doldurunuz veya geçerli bir E-Mail giriniz.</div>
  </div>
  <div class="form-group">
	  <label for="pwd">Mesaj:</label>
	  <textarea class="form-control"  style="resize: none;" rows="5" placeholder="Mesaj" id="comment" name="message" required></textarea>
      <div class="valid-feedback">Uygun.</div>
      <div class="invalid-feedback">Lütfen boşluğu doldurunuz..</div>
  </div>
  <button type="submit" class="btn btn-primary" name="btn">Gönder</button>
</form>
<?php 
	if(isset($_POST["btn"])){
		$name = $_POST["uname"];
		$mail = $_POST["mail"];
		$message = $_POST["message"];
		$date = date('d.m.Y H:i:s');
		mysqli_query($db, "INSERT INTO messages(name, mail, message, date) VALUES ('$name', '$mail', '$message', '$date')");
		echo '<div class="alert alert-success"><strong>Teşekkürler!</strong> Mesajınız başarılı bir şekilde ulaştı.</div>';
	}
  ?>
<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
  </div>
  
</div>
<div class="row">
<div class="col-sm-12"><h2 style="text-align:center">Kaynaklarımız:</h2></div>
</div>
<div class="row">
<div class="col-sm-3"><a href="https://tureng.com/" target="_blank"><img src="image/tureng-logo.png"></a></div>
<div class="col-sm-3"><a href="https://www.newsinlevels.com/" target="_blank"><img src="image/logo-news.png"></a></div>
<div class="col-sm-3"><a href="https://voscreen.com/" target="_blank"><img src="image/voscreen.jpg"></a></div>
<div class="col-sm-3"><a style="color:orange;" href="https://www.videosinlevels.com/" target="_blank"><h3>Videos in Levels</h3></a></div>
</div>
</div>
<script src="js/Translate.js"></script>
</body>
</html>