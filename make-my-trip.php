<?php
	require_once('includes/connection.php');
	session_start();
	

	if(isset($_POST['booknow'])){
		date_default_timezone_set('Asia/calcutta');

		$auto_id;
		//$user_id=$_SESSION['user_id'];
		if(isset($_GET['id'])){
			$auto_id = $_GET['id'];
		}
		$user_id=$_SESSION['user_id'];
		$pickup_city_id = $_POST['pickup_city_id'];
		$pickup_city_area_id = $_POST['pickup_city_area_id']; 
		$dropoff_city_id = $_POST['dropoff_city_id']; 
		$dropoff_city_area_id = $_POST['dropoff_city_area_id']; 
		$from_date = $_POST['from_date'];
		$to_date = $_POST['to_date'];
		$message = $_POST['message'];
		$pickup_time = $_POST['pickup_time'];

		$sql = "Insert Into tbl_booking (user_id,auto_id,pickup_city_id,pickup_city_area_id,dropoff_city_id,dropoff_city_area_id,from_date,to_date,message,pickup_time) values ('$user_id','$auto_id','$pickup_city_id','$pickup_city_area_id','$dropoff_city_id','$dropoff_city_area_id','$from_date','$to_date','$message','$pickup_time')";
   $query = mysqli_query($conn,$sql);
    if($query)
    {
      echo "<h3 align='center'>Insert successfully</h3>";
      header('Refresh:3,my-booking.php');
      //header('Location: add-transmission-type.php');
    }
    else
    {
      echo("Something is wrong " . $mysqli -> error);
    }
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once('includes/style.php');?>
	<style>

		.form-select {
			border: transparent !important;
			border: 1px solid rgba(255, 255, 255, 0.3) !important;
			height: 40px !important;
			background: transparent !important;
			color: rgba(0, 0, 53, 0.8) !important;
			font-size: 12px;
			border-radius: 0px;
			-webkit-box-shadow: none !important;
			box-shadow: none !important;
		}
	</style>
	<?php require_once('includes/navbar.php');
    	require_once('includes/slider.php');
		?>
</head>
<body>
<section class="ftco-section ftco-no-pt bg-light">
    	<div class="container">
    		<div class="row no-gutters">
			<!-- <div class="col-md-12	featured-top"> -->
				<div class="col-md-12 featured-top">
						<div class="row no-gutters">
							<div class="col-md-4 d-flex align-items-center">
								<form method="POST" class="request-form ftco-animate bg-primary">
									<h2>Make your trip</h2>
									
									<div class="d-flex">
										<div class="form-group mr-2">
											<label class="label">Pick-up city</label>
											<select class="form-select" name="pickup_city_id">
												<option selected disabled>Please Select Ciy</option>
												<?php
												//select city
												$sql = "SELECT * FROM tbl_cities";
												$query = mysqli_query($conn,$sql);
												
												while ($row = mysqli_fetch_assoc($query)) {
														
												?>
												<option value="<?php echo $row['city_id'];?>"><?php echo $row['city_name'];?></option>
												<?php
													}
												?>
											</select>
										</div>
										<div class="form-group mr-2">
											<label class="label">Pick-up city area</label>
											<select class="form-select" name="pickup_city_area_id">
												<option selected disabled>Please Select area</option>
												<?php
												//select city area
												$sql1 = "SELECT * FROM tbl_city_area";
												$query1 = mysqli_query($conn,$sql1);
													while ($row1 = mysqli_fetch_assoc($query1)) {
														
												?>
												<option value="<?php echo $row1['area_id']?>"><?php echo $row1['area_name']?></option>
												<?php
												}
												?>
											</select>
										</div>
									</div>
									<div class="d-flex">
										<div class="form-group mr-2">
											<label class="label">Drop-off city</label>
											<select class="form-select" name="dropoff_city_id">
												<option selected disabled>Please Select Ciy</option>
												<?php
												//select city
												$sql2 = "SELECT * FROM tbl_cities";
												$query2 = mysqli_query($conn,$sql2);
													while ($row2 = mysqli_fetch_assoc($query2)) {
														
												?>
												<option value="<?php echo $row2['city_id'];?>"><?php echo $row2['city_name'];?></option>
												<?php
													}
												?>
											</select>
										</div>
										<div class="form-group mr-2">
											<label class="label">Drop-off city area</label>
											<select class="form-select" name="dropoff_city_area_id">
												<option selected disabled>Please Select area</option>
												<?php
												//select city area
												$sql3 = "SELECT * FROM tbl_city_area";
												$query3 = mysqli_query($conn,$sql3);
													while ($row3 = mysqli_fetch_assoc($query3)) {
														
												?>
												<option value="<?php echo $row3['area_id']?>"><?php echo $row3['area_name']?></option>
												<?php
												}
												?>
											</select>
										</div>
									</div>
									<div class="d-flex">
										<div class="form-group mr-2">
											<label class="label">Pick-up date</label>
											<input type="text" class="form-control" id="book_pick_date" name="from_date" placeholder="Date">
										</div>
										<div class="form-group ml-2">
											<label class="label">Drop-off date</label>
											<input type="text" class="form-control" id="book_off_date" name="to_date" placeholder="Date">
										</div>
									</div>
									<div class="form-group">
										<label class="label">Message</label>
										<textarea class="form-control" id="message" name="message" placeholder="Message"></textarea>
									</div>
									<div class="form-group">
										<label class="label">Pick-up time</label>
										<input type="text" class="form-control" id="time_pick" name="pickup_time" placeholder="Time">
									</div>
									<div class="form-group">
										<input type="submit" value="Rent A Car Now" class="btn btn-secondary py-3 px-4" name="booknow">
									</div> 
								</form>
							</div>
							<div class="col-md-8 d-flex align-items-center">
								<div class="services-wrap rounded-right w-100">
									<h3 class="heading-section mb-4">Better Way to Rent Your Perfect Cars</h3>
									<div class="row d-flex mb-4">
								<div class="col-md-4 d-flex align-self-stretch ftco-animate">
									<div class="services w-100 text-center">
									<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
									<div class="text w-100">
										<h3 class="heading mb-2">Choose Your Pickup Location</h3>
									</div>
									</div>      
								</div>
								<div class="col-md-4 d-flex align-self-stretch ftco-animate">
									<div class="services w-100 text-center">
									<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span></div>
									<div class="text w-100">
										<h3 class="heading mb-2">Select the Best Deal</h3>
									</div>
									</div>      
								</div>
								<div class="col-md-4 d-flex align-self-stretch ftco-animate">
									<div class="services w-100 text-center">
									<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"></span></div>
									<div class="text w-100">
										<h3 class="heading mb-2">Reserve Your Rental Car</h3>
									</div>
									</div>      
								</div>
								</div>
								<p><a href="#" class="btn btn-primary py-3 px-4">Reserve Your Perfect Car</a></p>
								</div>
							</div>
						</div>
				</div>
			</div>
  		</div>
</section>
<?php 
    	require_once('includes/footer.php');

require_once('includes/script.php')?>
</body>
</html>