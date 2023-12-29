<?php
	require_once('includes/connection.php');
	session_start();
	if(strlen($_SESSION['user_id'])==0)
	{
	  header('location:index.php');
  }
  else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once('includes/style.php');?>
	<link rel="stylesheet" href="css/custom.css">
</head>
<body>
    <?php require_once('includes/navbar.php')?>
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <!-- <div class="overlay"></div> -->
		<div class="container">
			<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
				<div class="col-md-9 ftco-animate pb-5">
					<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>My booking <i class="ion-ios-arrow-forward"></i></span></p>
					<h1 class="mb-3 bread">My booking</h1>
				</div>
			</div>
		</div>
    </section>
    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
					<div class="col-md-3 ftco-animate">
						<div class="profile_nav">
							<ul class="list-unstyled" style="text-align:right;">
								<li><a href="about-us.php" class="py-2 d-block">Manage Profile</a></li>
								<li><a href="services.php" class="py-2 d-block">Update Password</a></li>
								<li><a href="#" class="py-2 d-block">My booking</a></li>
								<li><a href="#" class="py-2 d-block">Sign Out</a></li>
							</ul>
						</div>
					</div>
					<!-- <div class="d-flex" style="height: 200px;">
  						<div class="vr"></div>
					</div> -->
					<div class="col-md-9 ftco-animate">
						<div class="profile_wrap">
							<h5 class="uppercase underline">My Bookings </h5>
							<div class="my_vehicles_list">
								<ul class="vehicle_listing">
									<?php
										$user_id=$_SESSION['user_id'];
										$sql = "SELECT tbl_auto.auto_img as auto_img,tbl_auto.auto_title as atitle,tbl_auto.auto_id as autoid,tbl_brands.brand_id,tbl_brands.brand_name,tbl_booking.from_date,tbl_booking.from_date,tbl_booking.to_date,tbl_booking.message,tbl_booking.status  from tbl_booking join tbl_auto on tbl_booking.auto_id=tbl_auto.auto_id join tbl_brands on tbl_brands.brand_id=tbl_auto.brand_id where tbl_booking.user_id='".$user_id."'";
										$query=mysqli_query($conn,$sql);
										if($query){
											while($result=mysqli_fetch_array($query)){
									?>

									<li>
										<div class="vehicle_img">
											<a href="auto-single.php?id=<?php echo $result['autoid'];?>"><img src="admin/<?php echo $result['auto_img']; ?>" alt="image" width="50px" height="50px"></a>
										</div>
										<div class="vehicle_title">
											<h6>
												<a href="auto-single.php?id=<?php echo $result['autoid'];?>"> 
												<?php echo $result['brand_name'];?> ,
										 		<?php echo $result['atitle'];?></a>
											</h6>
											<p><b>From Date:</b> <?php echo $result['from_date']; ?><br> <b>To Date:</b> 
											<?php echo $result['to_date']; ?></p>
										</div>
										<?php if($result['status']==1)
                							{ ?>
										<div class="vehicle_status"> <a href="#" class="btn outline btn-xs">Confirmed</a>
											<div class="clearfix"></div>
										</div>
										<?php
										}else if($result['status']==2)
										{?>
										<div class="vehicle_status"> <a href="#" class="btn outline btn-xs">Cancelled</a>
											<div class="clearfix"></div>
										</div>
										<?php
										}else
										{?>
										<div class="vehicle_status"> <a href="#" class="btn outline btn-xs">Not Confirm yet</a>
											<div class="clearfix"></div>
										</div>
										<?php
										}?>
										<div style="float: left"><p><b>Message:</b> <?php echo $result['message']; ?> </p></div>
									</li>
									<?php
										}
									}
									?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
	</section>
    <?php require_once('includes/footer.php')?>
    <?php require_once('includes/script.php')?>
</body>
</html>
<?php
}?>