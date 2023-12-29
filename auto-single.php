<?php
require_once('includes/connection.php');
session_start();
if(isset($_GET['id'])){
	
	$auto_id = $_GET['id'];

	$sql = "SELECT au.*, b.brand_id, b.brand_name, f.fule_id, f.fule_name, t.transmission_id, t.transmission_name FROM tbl_auto au 
	JOIN tbl_brands b ON au.brand_id = b.brand_id
	JOIN tbl_fule_types f ON au.fule_id=f.fule_id
	JOIN tbl_transmission_type t ON au.transmission_id=t.transmission_id AND au.auto_id = $auto_id";

	//$sql = "SELECT * FROM tbl_auto";
	$query = mysqli_query($conn,$sql);
	$fetch = mysqli_fetch_array($query);
}else{
	echo "<h3 align='center'>No Data Found.</h3>";
      header('Refresh:3,auto-single.php');
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Carbook - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <?php require_once('includes/style.php');?>

  </head>
  <body>
    
    <?php require_once('includes/navbar.php')?>
	<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>auto details <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">AutoDetails</h1>
          </div>
        </div>
      </div>
    </section> 

	<section class="ftco-section ftco-car-details">
      <div class="container">
      	<div class="row justify-content-center">
      		<div class="col-md-12">
      			<div class="car-details">
      				<div class="img rounded" style="background-image: url(admin/<?php echo $fetch['auto_img']?>);"></div>
      				<div class="text text-center">
      					<span class="subheading"><?php echo $fetch['model_no']?></span>
      					<h2><?php echo $fetch['brand_name']?></h2>
      				</div>
      			</div>
      		</div>
      	</div>
      	<div class="row">
      		
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-pistons"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Transmission
		                	<span><?php echo $fetch['transmission_name']?></span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car-seat"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Seats
		                	<span><?php echo $fetch['seats']?> Persons</span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-diesel"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Fuel
		                	<span><?php echo $fetch['fule_name']?></span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
      	</div>
      	<div class="row">
      		<div class="col-md-12 pills">
						<div class="bd-example bd-example-tabs">
							<div class="d-flex justify-content-center">
							  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

							    <li class="nav-item">
							      <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Features</a>
							    </li>
							    <li class="nav-item">
							      <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Description</a>
							    </li>
							    <li class="nav-item">
							      <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">Review</a>
							    </li>
							  </ul>
							</div>

						  <div class="tab-content" id="pills-tabContent">
						    <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
						    	<div class="row">
						    		<div class="col-md-4">
						    			<ul class="features">
											<?php
												$sql1 = "SELECT f.*, au.auto_id, au.model_no FROM tbl_features f 
												JOIN tbl_auto au ON f.auto_id = au.auto_id AND f.auto_id = $auto_id";
												//$sql1 = "SELECT * FROM tbl_features where auto_id=$auto_id";
												$query1 = mysqli_query($conn,$sql1);
										
												while($fetch1 = mysqli_fetch_array($query1))
												{
											?>
						    				<li class="check"><span class="ion-ios-checkmark"></span><?php echo $fetch1['feature_name']?></li>
											<?php
											}?>
						    			</ul>
						    		</div>
						    	</div>
						    </div>

						    <div class="tab-pane fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
						      <p><?php echo $fetch['descriptions']?></p>
						    </div>

						    <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
						      <div class="row">
							   		<div class="col-md-7">
							   			<h3 class="head">23 Reviews</h3>
							   			<div class="review d-flex">
									   		<div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
									   		<div class="desc">
									   			<h4>
									   				<span class="text-left">Jacob Webb</span>
									   				<span class="text-right">14 March 2018</span>
									   			</h4>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
								   					</span>
								   					<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
									   			</p>
									   			<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
									   		</div>
									   	</div>
									   	<div class="review d-flex">
									   		<div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
									   		<div class="desc">
									   			<h4>
									   				<span class="text-left">Jacob Webb</span>
									   				<span class="text-right">14 March 2018</span>
									   			</h4>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
								   					</span>
								   					<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
									   			</p>
									   			<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
									   		</div>
									   	</div>
									   	<div class="review d-flex">
									   		<div class="user-img" style="background-image: url(images/person_3.jpg)"></div>
									   		<div class="desc">
									   			<h4>
									   				<span class="text-left">Jacob Webb</span>
									   				<span class="text-right">14 March 2018</span>
									   			</h4>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
								   					</span>
								   					<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
									   			</p>
									   			<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
									   		</div>
									   	</div>
							   		</div>
							   		<div class="col-md-5">
							   			<div class="rating-wrap">
								   			<h3 class="head">Give a Review</h3>
								   			<div class="wrap">
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(98%)
								   					</span>
								   					<span>20 Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(85%)
								   					</span>
								   					<span>10 Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(70%)
								   					</span>
								   					<span>5 Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(10%)
								   					</span>
								   					<span>0 Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(0%)
								   					</span>
								   					<span>0 Reviews</span>
									   			</p>
									   		</div>
								   		</div>
							   		</div>
							   	</div>
						    </div>
						  </div>
						</div>
		      </div>
				</div>
      </div>
    </section>

    <section class="ftco-section ftco-no-pt">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">Choose Car</span>
            <h2 class="mb-2">Related Cars</h2>
          </div>
        </div>
        <div class="row">
        	<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(images/car-1.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.html">Mercedes Grand Sedan</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Cheverolet</span>
	    						<p class="price ml-auto">$500 <span>/day</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car-single.html" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(images/car-2.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.html">Range Rover</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Subaru</span>
	    						<p class="price ml-auto">$500 <span>/day</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car-single.html" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(images/car-3.jpg);">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="car-single.html">Mercedes Grand Sedan</a></h2>
    						<div class="d-flex mb-3">
	    						<span class="cat">Cheverolet</span>
	    						<p class="price ml-auto">$500 <span>/day</span></p>
    						</div>
    						<p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car-single.html" class="btn btn-secondary py-2 ml-1">Details</a></p>
    					</div>
    				</div>
    			</div>
        </div>
    	</div>
    </section>
    

 <!-- content end -->
 <?php require_once('includes/footer.php')?>
 <?php require_once('includes/script.php')?>
    
  </body>
</html>