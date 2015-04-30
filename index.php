<?php include 'includes/functions.php'; ?>
<?php include 'includes/header.php'; ?>
	<h1>Welcome! </h1>
	<form class="" action="<?php echo $myapp->base_url; ?>search.php" method="get">
	  	<div class="form-group">
	  		<label for="search-date">Select date</label>
			<input type="date" name="search-date" placeholder="" min="<?php echo date("Y-m-d",time()); ?>" required />
		</div>
	  	<div class="form-group">
	  		<label for="nights"># of night of stay</label>
	  		<select name="nights" required>
	  			<?php for($i = 1; $i <= 3; $i++): ?>
	  				<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
		  		<?php endfor; ?>
	  		</select>
		</div>
		<input type="submit" />
	</form>
<?php include 'includes/footer.php'; ?>