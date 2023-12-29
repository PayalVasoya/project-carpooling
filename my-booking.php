<?php
	require_once('includes/connection.php');
	session_start();
	if(isset($_SESSION['user_id']) && strlen($_SESSION['user_id'])>0)
	{
	  
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
			

			<div class="row">
				<div class="col-md-3 col-sm-3">
					<div class="profile-nav">
						<div>
							<ul class="list-unstyled" style="text-align:right;">
								<li><a href="about-us.php" class="py-2 d-block">Manage Profile</a></li>
								<li><a href="services.php" class="py-2 d-block">Update Password</a></li>
								<li><a href="#" class="py-2 d-block">My booking</a></li>
								<li><a href="#" class="py-2 d-block">Sign Out</a></li>
							</ul>
						</div>
					</div>
  				</div>

				<div class="col-md-9 col-sm-6">
					<div class="profile_wrap">
					<h5 class="uppercase underline">My Bookings </h5>
						<table class="table">
							<tbody>
							<?php
										$user_id=$_SESSION['user_id'];
										$sql = "SELECT tbl_auto.auto_img as auto_img,tbl_auto.auto_title as atitle,tbl_auto.auto_id as autoid,tbl_auto.rent_per_hour,tbl_brands.brand_id,tbl_brands.brand_name,tbl_booking.from_date,tbl_booking.from_date,tbl_booking.to_date,tbl_booking.message,tbl_booking.status  from tbl_booking join tbl_auto on tbl_booking.auto_id=tbl_auto.auto_id join tbl_brands on tbl_brands.brand_id=tbl_auto.brand_id where tbl_booking.user_id='".$user_id."'";
										$query=mysqli_query($conn,$sql);
										if($query){
											while($result=mysqli_fetch_array($query)){
									?>
								<tr class="my_vehicles_list">
									<td class="car-image">
										<div class="img m-0" style="background-image:url(admin/<?php echo $result['auto_img'];?>);">
										</div>
									</td>
									<td>
									<h3><?php echo $result['brand_name']; ?>,<?php echo $result['atitle'];?> <b>Rs. </b><span><?php echo $result['rent_per_hour']; ?></span></h3>
									<p style="font-weight: 50;
									opacity: 12px;">From Date: <?php echo $result['from_date']; ?></p>
									<p style="font-weight: 50;
									opacity: 12px;">To Date: <?php echo $result['to_date']; ?></p>
									</td>
									<td>
									
										<div class="vehicle_status m-0"> 
										<?php if($result['status']==1)
                							{ ?>
											<a href="#" class="btn btn-outline-success btn-xs">Confirmed</a>
											<div class="clearfix"></div>
											<?php
										}else if($result['status']==2)
										{?>
										<a href="#" class="btn btn-outline-danger btn-xs">Cancelled</a>
											<div class="clearfix"></div>
											<?php
										}else
										{?>
										<a href="#" class="btn btn-outline-warning btn-xs">Not Confirm yet</a>
											<div class="clearfix"></div>
										<?php
										}?>
												<div><p><b>Message:</b> <?php echo $result['message']; ?> </p></div>					
										</div>	
										
									</td>
								</tr><!-- END TR-->
								<?php
								}
							}?>
							</tbody>
						</table>
  					</div>
				</div>
			</div>
	</section>
	
    <?php require_once('includes/footer.php')?>
    <?php require_once('includes/script.php')?>
</body>
</html>
<?php
}
else
{
	echo '<script>alert("Login first!!")</script>';
    echo '<script>window.location="login.php";</script>';
}?>