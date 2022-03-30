<?php 
	$url = $_GET['a'];
	
	//print_r (explode('<div class="news-block">',explode('<div class="news-block highlighted">',$html)[1])[0]);
	//echo $url;
	
	
	$group_name=$_POST['group_name'];
	if($group_name != null){
	//$url = 'https://postman-echo.com/post';
	$data = array('group_name' => $group_name);
	$options = array(
		'http' => array(
			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			'method'  => 'POST',
			'content' => http_build_query($data)
		)
	);	
	$context  = stream_context_create($options);
	$response = file_get_contents($url, false, $context);
	echo $response;
	/*if ($response === FALSE) { }
	$json_array=json_decode($response,true); 
	function display_array_recursive($json_rec){
			if($json_rec){
				foreach($json_rec as $key=> $value){
					if(is_array($value)){
						display_array_recursive($value);
					}else{	
						echo $key.'--'.$value.'<br>';
					}	
				}	
			}	
		}
	display_array_recursive($json_array);*/
	}
	else{
		$html = file_get_contents($url);
		echo $html;
	}
?>