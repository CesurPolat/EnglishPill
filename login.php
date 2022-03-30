<?php include("connect.php") ?>
<html>
<head>
<title>EnglishPill - Giriş Yap</title>
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
<!-- <input type="password" name="rpass" placeholder="Yeniden Şifre"/>-->
<div class="LogPanel" style="padding:10px;">
<form method="POST">
  <div id="grplgn">
	<h2>Giriş Yap</h2>
	<hr/>
	<div class="form-group">
      <label for="uname">Kullanıcı Adı:</label>
      <input type="text" class="form-control" placeholder="Kullanıcı Adı" onkeyup="ChkSpace()" name="username">
      <div class="invalid-feedback">Lütfen boşluğu doldurunuz.</div>
    </div>
	<div class="form-group">
      <label for="pwd">Şifre:</label>
      <input type="password" class="form-control" placeholder="Şifre" onkeyup="ChkSpace()" name="pass">
      <div class="invalid-feedback">Lütfen boşluğu doldurunuz.</div>
    </div>
	<input type="submit" name="btn" value="Giriş Yap" class="btn btn-primary"/><br>
	<a href="?a=Signup">Hesabın yok mu?</a>
  </div>
  <div id="grpsgn" style="display:none">
  <h2>Kaydol</h2>
  <hr/>
    <div class="form-group">
      <label for="uname">Kullanıcı Adı:</label>
      <input type="text" class="form-control" placeholder="Kullanıcı Adı" onkeyup="ChkSpace()" name="susername">
      <div class="invalid-feedback">Lütfen boşluğu doldurunuz.</div>
    </div>
    <div class="form-group">
      <label for="pwd">Şifre:</label>
      <input type="password" class="form-control" placeholder="Şifre" onkeyup="ChkSpace()" name="spass" >
      <div class="invalid-feedback">Lütfen boşluğu doldurunuz.</div>
    </div>
	<div class="form-group">
      <label for="pwd">Yeniden Şifre:</label>
      <input type="password" class="form-control" placeholder="Yeniden Şifre" onkeyup="ChkSpace()" name="rpass" >
      <div class="invalid-feedback">Lütfen boşluğu doldurunuz.</div>
    </div>
    <input type="submit" class="btn btn-primary" name="sgnbtn" value="Kaydol"/><br/>
	<a href="login.php">Hesabın var mı?</a>
	</div>
</form>
<script>
if(window.location.search != ""){
	const urlParams = new URLSearchParams(window.location.search);
	const data = urlParams.get('a');
	if(data != ""){
		document.getElementById('grpsgn').style = "display:block";
		document.getElementById('grplgn').style = "display:none";
	}
	else{
		document.getElementById('grplgn').style = "display:block";
		document.getElementById('grpsgn').style = "display:none";
	}
}
function ChkSpace(){
	if(document.getElementsByName("susername")[0].checkValidity()){
			document.getElementsByName("susername")[0].className = "form-control";
			document.getElementsByClassName('invalid-feedback')[2].style = 'display:none';
	}
	
	if(document.getElementsByName("spass")[0].checkValidity()){
			document.getElementsByName("spass")[0].className = "form-control";
			document.getElementsByClassName('invalid-feedback')[3].style = 'display:none';
	}
	
	if(document.getElementsByName("rpass")[0].checkValidity()){
			document.getElementsByName("rpass")[0].className = "form-control";
			document.getElementsByClassName('invalid-feedback')[4].style = 'display:none';
	}
	
	if(document.getElementsByName("username")[0].checkValidity()){
			document.getElementsByName("username")[0].className = "form-control";
			document.getElementsByClassName('invalid-feedback')[0].style = 'display:none';
	}
	
	if(document.getElementsByName("pass")[0].checkValidity()){
			document.getElementsByName("pass")[0].className = "form-control";
			document.getElementsByClassName('invalid-feedback')[1].style = 'display:none';
	}
}

</script>
<?php
	if(isset($_POST["btn"])){
		$username = $_POST["username"];
		$pass = md5($_POST["pass"]);
		$usersqli = mysqli_query($db, "SELECT * FROM `users` WHERE username = '$username' and password = '$pass'");
		if($username != null){
			if(!empty($_POST["pass"])){
				if(mysqli_num_rows($usersqli) == 1){
					$datas = mysqli_fetch_array($usersqli);
					$_SESSION['id'] = $datas['id'];
					echo "<script>window.location = 'index.php'</script>";
				}
				else{
					echo '<div class="alert alert-danger">Kullanıcı Adı veya Şifre <strong>Yanlış!</strong></div>';
				}
			}
			else{
				echo '<script>document.getElementsByName("pass")[0].className = "form-control RInput"</script>';
				echo "<script>document.getElementsByClassName('invalid-feedback')[1].style = 'display:block'</script>";
			}
		}
		else{
			echo '<script>document.getElementsByName("username")[0].className = "form-control RInput"</script>';
			echo "<script>document.getElementsByClassName('invalid-feedback')[0].style = 'display:block'</script>";
		}
		
	}
	
	if(isset($_POST["sgnbtn"])){
		$username = $_POST["susername"];
		$pass = md5($_POST["spass"]);
		$rpass = md5($_POST["rpass"]);
		$usersqli = mysqli_query($db, "SELECT * FROM `users` WHERE username = '$username'");
		if($username != null){
			if(!empty($_POST["spass"])){
				if(!empty($_POST["rpass"])){
					if($pass == $rpass){
						if(mysqli_num_rows($usersqli) == 0){
							mysqli_query($db, "INSERT INTO users(username, password) VALUES ('$username', '$pass')");
							$usersqli = mysqli_query($db, "SELECT * FROM `users` WHERE username = '$username'");
							$datas = mysqli_fetch_array($usersqli);
							$_SESSION['id'] = $datas['id'];
							echo "<script>window.location = 'index.php'</script>";
						}
						else{
							echo '<script>document.getElementsByName("susername")[0].className = "form-control RInput"</script>';
							echo "<script>document.getElementsByClassName('invalid-feedback')[2].style = 'display:block'</script>";
							echo "<script>document.getElementsByClassName('invalid-feedback')[2].innerHTML = 'Bu kullanıcı adı alınmış.'</script>";
						}
					}
					else{
						echo '<script>document.getElementsByName("spass")[0].className = "form-control RInput"</script>';
						echo "<script>document.getElementsByClassName('invalid-feedback')[3].style = 'display:block'</script>";
						echo "<script>document.getElementsByClassName('invalid-feedback')[3].innerHTML = 'Şifreler uyuşmuyor.'</script>";
					}
				}
				else{
					echo '<script>document.getElementsByName("rpass")[0].className = "form-control RInput"</script>';
					echo "<script>document.getElementsByClassName('invalid-feedback')[4].style = 'display:block'</script>";
				}
			}
			else{
				echo '<script>document.getElementsByName("spass")[0].className = "form-control RInput"</script>';
				echo "<script>document.getElementsByClassName('invalid-feedback')[3].style = 'display:block'</script>";
			}
		}
		else{
			echo '<script>document.getElementsByName("susername")[0].className = "form-control RInput"</script>';
			echo "<script>document.getElementsByClassName('invalid-feedback')[2].style = 'display:block'</script>";
		}
		
		
	}
	
?>
</div>
</div>
</body>
</html>