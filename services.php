<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once('includes/style.php');?>
</head>
<body>
    <?php require_once('includes/navbar.php')?>
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Services <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Services</h1>
          </div>
        </div>
      </div>
    </section>

    <?php require_once('includes/services-home.php')?>
    <?php require_once('become-a-driver.php')?>
    <?php require_once('includes/footer.php')?>
    <?php require_once('includes/script.php')?>
</body>
</html>