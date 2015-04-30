<?php 
class Myapp {

	public $base_url 	= 'http://localhost/jerick/2015/GHWP/hotels24seven/';
	public $api_domain 	= 'http://api.holidayextras.co.uk/sandbox/';
	public $image_domain= 'http://secure.holidayextras.co.uk/'; // just add the image link on this

	function __contruct(){

	}

	function checkGetData($data){
		if(isset($data['search-date'],$data['nights'])){
			$date = explode('-', $data['search-date']);
			if(count($date) == 3){
				if(checkdate($date[1], $date[2], $date[0]) and ($data['nights'] > 0 and $data['nights'] <= 3)){
					return true; // return true if date is valid and number of nights is less than or equal to 3
				}
			}
		}
		return false; // if invalid data	
	}

	function getRoomTypes(){
		return array(
			'S10' => 'Single - 1 Adult',
			'D20' => 'Double - 2 Adults',
			'T11' => 'Twin - 1 Adult 1 Child',
			'T20' => 'Twin - 2 Adults',
			'T12' => 'Triple - 1 Adult 2 Children',
			'T21' => 'Triple - 2 Adults 1 Child',
			'T30' => 'Triple - 3 Adults',
			'F13' => 'Family - 1 Adult 3 Children',
			'F22' => 'Family - 2 Adults 2 Children',
			'F23' => 'Family - 2 Adults 3 Children',
			'F31' => 'Family - 3 Adults 1 Child',
			'F32' => 'Family - 3 Adults 2 Children',
		);
	}

	function getSecondRoom(){
		return array(
			'SGL' => 'Single - 1 Adult',
			'DBL' => 'Double - 2 Adults',
			'TWN' => 'Twin - 2 Adults',
			'TRL ' => 'Triple - All combos',
			'QUD' => 'Family room (for four)',
			'FMC' => 'Family room (for four)',
			'FM5' => 'Family room (for five)',
		);
	}

	function _tempRoomTypes(){
		return array(
			'D20' => 'Double',
			'T20' => 'Twin',
			'S10' => 'Single',
		);
	}
	function addDays($date,$days){

		$time = strtotime($date); 
		$time = $time + (86400 * $days); // 86400 is equal to 1 day
		return date("Y-m-d",$time);
	}
	function getParkingDays($arrival,$collect){
		$arrival 		= strtotime($arrival); 
		$collect 	= strtotime($collect);
		$days = ($collect - $arrival) / 86400;
		return $days;
	}

	function doCurl($url){

		$curl 		= curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER 	=> 1,
		    CURLOPT_URL 			=> $url,
		));
		$json 		= curl_exec($curl);
		$api_return = json_decode($json);
		return $api_return;

	}
}

?>