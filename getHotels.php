<?php

include 'includes/functions.php';
$myapp = new Myapp;

$parkingDays = $myapp->getParkingDays($_POST['ArrivalDate'],$_POST['collectCarDate']);
if($parkingDays == 0){

}elseif($parkingDays <= 8){
	$parkingDays = 8;
}elseif($parkingDays <= 15){
	$parkingDays = 15;
}

$secondRoom = $_POST['SecondRoomType'] !== '0' ? '&SecondRoomType='.$_POST['SecondRoomType'] : '';

$getData 	= '?ABTANumber=AF341&Initials=GHP&key=mytestkey&token=999999999&ArrivalDate='.$_POST['ArrivalDate'].'&Nights='.$_POST['Nights'].'&ParkingDays='.$parkingDays.'&RoomType='.$_POST['roomType'].'&DepartDate='.$myapp->addDays($_POST['ArrivalDate'],$_POST['Nights']).$secondRoom;
$url 		= $myapp->api_domain.'hotel/LGW/lite.js'.$getData;
$api_return	= $myapp->doCurl($url);
$str = '<ul>';
	
	foreach ($api_return->API_Reply->Hotel as $row) {
		#print_r($row);
		$str .= '<li>';
			$str .= '<ul class="hotel-details" MoreInfoURL="'.$row->MoreInfoURL.'" code="'.$row->Code.'" adults="'.$row->Adults.'" price="'.$row->Price.'">';
				//*
				$str .= '<li>Code: '.$row->Code.'</li>
						<li>Name: '.$row->Name.'</li>
						<li>Price: '.$row->Price.'</li>
						<li>noncancellable_nonrefundable: '.(isset($row->noncancellable_nonrefundable) ? 'true' : 'false').'</li>
						<li>PriceWithSurcharge: '.$row->PriceWithSurcharge.'</li>
						<li>RoomCode: '.$row->RoomCode.'</li>
						<li>BoardBasis: '.$row->BoardBasis.'</li>
						<li>Adults: '.$row->Adults.'</li>
						<li>Children: '.$row->Children.'</li>
						<li>ParkingDays: '.$row->ParkingDays.'</li>'; //*/


			$str .= '</ul>';
			$str .= '<div>';
				$str .= '<a href="#hotel" class="ghwp-hotel" MoreInfoURL="'.$row->MoreInfoURL.'">More Info</a>';
			$str .= '</div>';
		$str .= '</li>';
	}
$str .= '</ul>';

echo json_encode(array('result'=>$str));

