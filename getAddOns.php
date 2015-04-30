<?php include 'includes/functions.php';
$myapp = new Myapp;


$ArrivalDate 	= strtotime($_POST['ArrivalDate']);
$DepartDate		= $ArrivalDate + (86400 * $_POST['nights']);

$ArrivalDate 	= date('d/m/y',$ArrivalDate);
$DepartDate 	= date('d/m/y',$DepartDate);


$url = $myapp->api_domain.'upgrade/'.$_POST['code'].'.js?AdultsCount='.$_POST['Adults'].'&ArrivalDate='.$ArrivalDate.'&DepartDate='.$DepartDate.'&key=mytestkey&token=999999999';
$api_return	= $myapp->doCurl($url);
#print_r($api_return);

$str = '<ul>';
foreach ($api_return->API_Reply->Supplement as $row) {
	$str .= '<li>';
		$str .= '<input type="checkbox" class="addonsCheckbox" code="'.$row->Code.'" AdPrice="'.(isset($row->AdPrice) ? $row->AdPrice : '0').'">'; 
		$str .= '<ul>';
			$str .= '
			<li>Code: '.$row->Code.'</li>
			<li>Name: '.$row->Name.'</li>
			<li>AdPrice: '.(isset($row->AdPrice) ? $row->AdPrice : '0').'</li>
			<li>NonDiscAdPrice: '.(isset($row->NonDiscAdPrice) ? $row->NonDiscAdPrice : '0').'</li>
			<li>AdDiscAmt: '.(isset($row->AdDiscAmt) ? $row->AdDiscAmt : '0').'</li>
			<li>Per: '.$row->Per.'</li>
			<li>Canx: '.$row->Canx.'</li>
			<li>description: '.$row->description.'</li>
			<li>supplement_type: '.$row->supplement_type.'</li>
			<li>Date: '.$row->Date.'</li>';
		$str .= '</ul>';
	$str .= '</li>';
}

$str .= '</ul>';


echo json_encode(array('result'=>$str));