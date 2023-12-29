<!-- Start nav -->
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Car<span>Book</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="about-us.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
	          <li class="nav-item"><a href="my-booking.php" class="nav-link">My Booking</a></li>
	          <li class="nav-item"><a href="car.php" class="nav-link">AutoRickshaw</a></li>
	          <!-- <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li> -->
			  <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
			  <?php
			  	if(!isset($_SESSION['user_name'])){
				?>
			  		<li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
			  <?php	
			  	}
				else
				{
			  ?>
					<li class="nav-item"><a href="logout.php" class="nav-link">Logout<br/><span>Welcom : <?php echo $_SESSION['user_name']?></span></a></li>

			  <?php
			  }
			  ?>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->