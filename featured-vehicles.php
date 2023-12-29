<?php
require_once('includes/connection.php');
session_start();
$sql = "SELECT au.*, b.brand_id, b.brand_name, f.fule_id, f.fule_name, t.transmission_id, t.transmission_name FROM tbl_auto au 
        JOIN tbl_brands b ON au.brand_id = b.brand_id
        JOIN tbl_fule_types f ON au.fule_id=f.fule_id
        JOIN tbl_transmission_type t ON au.transmission_id=t.transmission_id LIMIT 6";
//$sql = "SELECT * FROM tbl_auto";
$query = mysqli_query($conn,$sql);
?>
<section class="ftco-section ftco-no-pt bg-light">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">What we offer</span>
            <h2 class="mb-2">Featured Vehicles</h2>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-12">
    				<div class="carousel-car owl-carousel">
					<?php
						while($row = mysqli_fetch_assoc($query))
						{
					?>
    					<div class="item">
    						<div class="car-wrap rounded ftco-animate">
		    					<div class="img rounded d-flex align-items-end" style="background-image: url(admin/<?php echo $row['auto_img']?>);">
		    					</div>
		    					<div class="text">
		    						<h2 class="mb-0"><a href="#"><?php echo $row['brand_name']?></a></h2>
		    						<div class="d-flex mb-3">
			    						<span class="cat"><?php echo $row['model_no']?></span>
			    						<p class="price ml-auto">Rs.&nbsp;<?php echo $row['rent_per_hour']?> <span>/day</span></p>
		    						</div>
		    						<p class="d-flex mb-0 d-block"><a href="make-my-trip.php?id=<?php echo $row['auto_id']?>" class="btn btn-primary py-2 mr-1">Book now</a> <a href="auto-single.php?id=<?php echo $row['auto_id']?>" class="btn btn-secondary py-2 ml-1">Details</a></p>
		    					</div>
		    				</div>
    					</div>
    				<?php
						}
					?>
    					
    				</div>
    			</div>
    		</div>
    	</div>
    </section>