$('.ghwp-room').click(function(){
	$('.ghwp-column3').html('');
	$('.ghwp-column4').html('');
	$('.ghwp-column5').html('');
	$('.ghwp-room').removeClass('active');
	$('.collectCar').hide();
	$(this).addClass('active');
	$('.ghwp-parking.active').click();
	return false;
});

$('.searchDate').change(function(){
	$(this).closest('form').submit();
});

$('.addRoom').click(function(){
	if($('.secondRoom').val() != 0){
		$('.secondRoomSelection').hide();
		$('.secondRoomSelected').attr('secondRoom',$('.secondRoom').val());
		$('.selectedRoom').text($('.secondRoom option:selected').text());
		$('.secondRoomSelected').show();
		$('.ghwp-parking.active').click();
	}
});

$('.removeSecondRoom').click(function(){
	$('.secondRoomSelected').hide();
	$('.secondRoomSelected').attr('secondRoom','0');
	$('.secondRoomSelection').show();
	$('.ghwp-parking.active').click();
});


$('.collectCarDate').change(function(){
	$('.ghwp-parking.active').click();
});

$(document).on('click','.hotel-details',function(){
	computeTotalCost();
});

$(document).on('click','.addonsCheckbox',function(){
	computeTotalCost();
});

function computeTotalCost(){
	var totalCost = 0;
	totalCost += parseInt($('.hotel-details').attr('price'));
	$('.addonsCheckbox:checked').each(function(){
		totalCost += parseInt($(this).attr('adprice'));
	});
	$('.ghwp-column5').html('£'+totalCost);
}