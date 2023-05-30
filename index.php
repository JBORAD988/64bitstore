<?php
session_start();
if($_SESSION['username'] == ""){
  header("location:http://localhost:63342/64bitstore/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>64BITSTORE</title>
  <link rel="stylesheet" href="css/style1.css">
  <link rel="icon" type="image/png" href="64.png">
  <script src="js/main.js"></script>
  <link rel="stylesheet" href="css/nav.css">
  <!--    footer-->
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" href="css/footer.css">



</head>
<body>
<header>
<?php include 'navbar.php';?>
</header>
  <main>
    <h1>Welcome to our B2C website!</h1>
    <p>Here you can buy and sell second-hand computer hardware products for your home.</p>
    <!-- Other content goes here -->

    <!-- <h2>Welcome to our B2C Computer Hardware Marketplace!</h2> -->
    <!-- <p>Here are some of our current deals:</p> -->

    <div class="banner-container">
      <div class="banner">
        <img src="/image/original.jpg" alt="Banner 1">
        <a href="http://localhost:63342/64bitstore/productdetails.php?id=11">Shop now</a>
      </div>
      <div class="banner">
        <img src="/image/omen.jpg" alt="Banner 2">
        <a href="#">Shop now</a>
      </div>
      <div class="banner">
        <img src="/image/ASUS-ROG-Flow-X13-2022%20(1).jpg" alt="Banner 3">
        <a href="#">Shop now</a>
      </div>
      <div class="banner">
        <img src="/image/ASUS-Zenbook-14-Flip-OLED-Vivobook-S-14-and-Vivobook-15-1-1024x534.jpg" alt="Banner 4">
        <a href="#">Shop now</a>
      </div>
    </div>
  </main>

<!--// Purpose: Footer for all pages-->
<footer>



      <hr style="margin-bottom:0px; margin-top:30px; padding:0px;">
      <div class="row" id="sub-two">

        <div class="col-md-4">
          <div class="vertical-line text-center">
            <span class="glyphicon glyphicon-map-marker"></span>
            <h4>TRACK YOUR ORDER</h4>
          </div>
        </div>

        <div class="col-md-4">
          <div class="vertical-line text-center">
            <span class="glyphicon glyphicon-refresh"></span>
            <h4>FREE & EASY RETURNS</h4>
          </div>
        </div>

        <div class="col-md-4">
          <div style="margin:8px;" class="text-center">
            <span class="glyphicon glyphicon-remove-circle"></span>
            <h4 style="color:#6d6c6c;">ONLINE CANCELLATIONS</h4>
          </div>
        </div>


      </div>
      <hr style="margin-bottom:30px; margin-top:0px; padding:0px;">



    </div>
  </div>
  <div style="min-height: 50px;" id="footer-main">

    <ul>
      <li><a href="aboutus.php"><b>About Us</b></a></li>
      <li><a href=""><b>Partner with us</b></a></li>
      <li><a href=""><b>Terms & Conditions</b></a></li>
<!--      <li><a href=""><b>Blog</b></a></li>-->
      <li><a href=""><b>Customer Service</b></a></li>
    </ul>

    <div id="social-menu">
      <ul>
        <li><a href=""><img style="max-width:18px; margin-top: -7px;" src=""></a></li>
        <li><a href=""><img style="max-width:18px; margin-top: -7px;" src=""></a></li>
        <li><a href=""><img style="max-width:18px; margin-top: -7px;" src=""></a></li>
      </ul>
    </div>

  </div>
</footer>

</body>
</html>

