		<script src="<?php echo $myapp->base_url; ?>assets/js/jquery-1.11.2.js"></script>
		<script src="<?php echo $myapp->base_url; ?>assets/js/jquery-ui.js"></script>
		<script src="<?php echo $myapp->base_url; ?>assets/js/bootstrap.js"></script> 
		<script src="<?php echo $myapp->base_url; ?>assets/js/modernizr.full.min.js"></script> 
		<script src="<?php echo $myapp->base_url; ?>assets/js/attrchange.js"></script> 
		<script src="<?php echo $myapp->base_url; ?>assets/js/jva.js"></script>

		<?php if($myapp->checkGetData($_GET)): ?> 
			<script>

				$(document).on('click','.ghwp-hotel',function(){
					alert("You've click More Info...");
				});

				$(document).on('click','.hotel-details',function(){
					$('.hotel-details').removeClass('selected');
					$(this).addClass('selected');
					$('.ghwp-column4').html('<em>Please wait...</em>');
					$.ajax({
						url: "<?php echo $myapp->base_url; ?>getAddOns.php",
						dataType: 'json',
						type: 'post',
						data: { code: $(this).attr('code'), ArrivalDate : "<?php echo $_GET['search-date']; ?>", nights : "<?php echo $_GET['nights']; ?>", Adults : $(this).attr('adults'), },
						success: function(data){
							$('.ghwp-column4').html(data.result);
						},
					});
				});


				$('.ghwp-parking').click(function(){


					if($(this).hasClass('withParking')){
						$('.collectCar').show();
					}else{
						$('.collectCar').hide();
					}

					$('.ghwp-parking').removeClass('active');
					$(this).addClass('active');


					if($('.collectCarDate').val() == '' && $('.withParking').hasClass('active')){
						return false; // return no date if click parking and there's no collect date yet
					}
					$('.ghwp-column3').html('<em>Please wait...</em>');
					$('.ghwp-column4').html('');
					$('.ghwp-column5').html('');

					var parkType = 0;
					if($('.withParking').hasClass('active')){
						parkType = 1;
					}

					$.ajax({
					  url: "<?php echo $myapp->base_url; ?>getHotels.php",
					  dataType: 'json',
					  type: 'post',
					  data: { ArrivalDate : "<?php echo $_GET['search-date']; ?>", parkingType : parkType, collectCarDate : $('.collectCarDate').val(), Nights : "<?php echo $_GET['nights']; ?>", roomType : $('.ghwp-room.active').attr('roomType'), SecondRoomType : $('.secondRoomSelected').attr('secondRoom'), },
					  success: function(data){
					  	$('.ghwp-column3').html(data.result);
					  },
					});
		
					return false;
				});

		
			</script>
		<?php endif; ?>

	</body>	
</html>