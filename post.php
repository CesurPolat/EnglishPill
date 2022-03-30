<?php include("connect.php") ?>
<?php 
	session_start();
	/*session_destroy();
	session_start();*/
	$internal = true;
	//Update
	$headers = apache_request_headers();
	foreach ($headers as $header => $value) {
		//echo "$header: $value <br />\n";
		if($header == "Sec-Fetch-Site"){
			if($value != "same-origin"){
				$internal = false;
			}
		}
		if($header == "Content-type"){
			if($value != "application/x-www-form-urlencoded"){
				$internal = false;
			}
		}
		if($header == "X-KL-Ajax-Request"){
			$internal = false;
		}
		
	}
	if(isset($_SESSION['id']) && $internal && isset($_POST['sc'])){
		$phpid = $_SESSION['id'];
		$sqli = mysqli_query($db, "SELECT * FROM `users` WHERE id = '$phpid'");
		$datas = mysqli_fetch_array($sqli);
		$schange = $datas['score']+$_POST['sc']."";
		mysqli_query($db, "UPDATE `users` SET score='$schange' WHERE id = '$phpid'");
		echo $schange;
		
	}
	else{
		echo 'Erişim Hakkınız Yok!';
	}
?>