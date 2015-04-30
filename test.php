
	<?php 
	$url 		= $myapp->base_url.'hotel/LGW/lite.js?ABTANumber=AF341&Initials=GHP&key=mytestkey&token=999999999&ArrivalDate='.$_POST['ArivalDate'].'&Nights=1&ParkingDays=0&RoomType=D20';
	$curl 		= curl_init();
	curl_setopt_array($curl, array(
	    CURLOPT_RETURNTRANSFER 	=> 1,
	    CURLOPT_URL 			=> $url,
	));
	$json 		= curl_exec($curl);
	$api_return = json_decode($json);
	echo '<pre>'; print_r($api_return);
	?>
   