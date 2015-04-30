<?php include 'includes/functions.php'; ?>
<?php include 'includes/header.php'; ?>

<?php if(!$myapp->checkGetData($_GET)): ?>
	<?php header('Location: '.$myapp->base_url); ?>
<?php endif; ?>

<div class="container">
	<div class="breadcrumbs">
		Your booking 
			<form class="" action="<?php echo $myapp->base_url; ?>search.php" method="get">
			  	<div class="form-group">
			  		<label for="search-date">Select date</label>
					<input type="date" name="search-date" placeholder="" class="searchDate" min="<?php echo date("Y-m-d",time()); ?>" value="<?php echo $_GET['search-date']; ?>" />
				</div>
			</form>
	</div>

	<div class="ghwp-column1 row">
		<ul>
			<?php foreach ($myapp->_tempRoomTypes() as $key => $value): ?>
				<li><a href="#<?php echo $key; ?>" roomType="<?php echo $key; ?>" class="ghwp-room <?php echo $value == 'Double' ? 'active' : ''; ?>"><?php echo $value; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
	<hr />
	<div class="ghwp-column2 row">
		<ul>
			<li>
				<a href="#parking" class="active withParking ghwp-parking">Parking</a>
				<div class="collectCar">
					<label for="collectCarDate">When are you collecting your car?</label>
					<input type="date" value="" name="collectCarDate" class="collectCarDate" min="<?php echo $_GET['search-date']; ?>" max="<?php echo $myapp->addDays($_GET['search-date'],15); ?>" />
			  		<!-- <select name="collectCarTime">
			  			<option value="0">--select time</option>
			  			<?php for($i = 0; $i < 24; $i++): ?>
			  				<option value="<?php echo $i < 10 ? '0'.$i.'00' : $i.'00'; ?>"><?php echo $i < 10 ? '0'.$i.'00' : $i.'00'; ?></option>
				  		<?php endfor; ?>
			  		</select> -->
			  	</div>
			</li>
			<li><a href="#noParking" class="ghwp-parking" >No Parking</a></li>
			<li>
				<div class="secondRoomSelection">
					<label for="secondRoom">Add Room: </label>
					<select name="secondRoom" class="secondRoom">
						<option value="0">--select room</option>
						<?php foreach ($myapp->_tempRoomTypes() as $key => $value): ?>
							<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
						<?php endforeach; ?>
					</select>
					<button class="addRoom btn btn-default">Add</button>
				</div>
				<div class="secondRoomSelected" style="display: none" secondRoom="0">
					<div class="selectedRoom">

					</div>
					<a href="#remove" style="color: red" class="removeSecondRoom">remove</a>
				</div>
			</li>
		</ul>
	</div>
	<hr />
	<div class="ghwp-locations row">
		
	</div>
	<hr />
	<div class="ghwp-column3 row">
		
	</div>
	<hr />
	<div class="ghwp-column4 row">
		
	</div>
	<hr />

	<div class="ghwp-column5 row">
		<div id="totalCost">
			&nbsp;
		</div>
	</div>

</div>
<?php include 'includes/footer.php'; ?>