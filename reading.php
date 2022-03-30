<?php include("connect.php") ?>
<html>
<head>
<title>EnglishPill - Okuma</title>
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
  <input type="text" class="form-control" id="WordSrc" placeholder="Search">
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
  <br>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">Haberler</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" data-toggle="tab" href="#menu1">Çok Yakında</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active ReadPanel"><br>
      <div class="spinner-grow text-primary"></div>
	  
    </div>
    <div id="menu1" class="container tab-pane fade ReadPanel"><br>
      <h3>Çok Yakında</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
  </div>
  <div class="container LogPanel" style="display:none;">
	<div class="row">
	<div class="col-sm-8"><h3 id="Title">Title</h3></div>
	<ul class="pagination justify-content-end col-sm-4">
    <li class="page-item"><a class="page-link" href="">Seviye 1</a></li>
    <li class="page-item"><a class="page-link" href="">Seviye 2</a></li>
    <li class="page-item"><a class="page-link" href="">Seviye 3</a></li>
  </ul>
  </div>
  <hr/>
  <p id="Content">Lorem Ipsum</p>
  </div>
</div>
<footer>
<div class="row" style="margin-right:0">
<div class="col-sm-4"><h1>EnglishPill</h1></div>
<div class="col-sm-4" style="text-align:center;"><p>© 2021 CESUR POLAT - Bu sitenin tüm içeriği telif hakkı ile korunmaktadır.</p></div>
<div class="col-sm-4"><a href="contact.php">İletişim</a> <a href="about.php">Hakkında</a></div>
</div>
</footer>
<script src="js/Article.js"></script>
<script src="js/Translate.js"></script>
</body>
</html>