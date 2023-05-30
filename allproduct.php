<?php
include 'connect.php';
session_start();
if($_SESSION['username'] == ""){
    header("location:http://localhost:63342/64bitstore/login.php");
}
?>


<!DOCTYPE html>

<html lang="en">
<head>
    <title>ALL Products </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-1ZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/project-s.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nav.css">
<!--    footer-->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="css/footer.css">

</head>
<body>
<div>
    <?php include 'navbar.php'; ?>
</div>
<div class="container">
      <section class="s1">
        <div class="motherboard">
         <a href="prod.php?category=Mother%20Board"> <img src="/image/motherboard.png" alt="MotherBoard" width="150px" height="150px"><p>Motherboard</p></a>
        </div>
        <div class="cpu">
          <a href="prod.php?category=CPU"><img src="/image/cpu.png" alt="CPU" width="150px" height="150px"><p>CPU</p></a>
        </div>
        <div class="ram&storage">
          <a href="prod.php?category=RAM%20and%20Storage"><img src="/image/ram&storage.png" alt="Ram&Storage" width="150px" height="150px"><p>Ram and Storage</p></a>
        </div>
        <div class="gpu">
          <a href="prod.php?category=GPU"><img src="/image/intel-core-i9-11900k-desktop-processor-8-cores-up-to-5-3-ghz-unlocked-lga1200-500x500.jpeg" alt="GPU" width="150px" height="150px"><p> GPU & Processor</p></a>
        </div>
        <div class="powersupply">
          <a href="prod.php?category=Power%20Supply"><img src="/image/powersupply.png" alt="PowerSupply"width="150px" height="150px"><p>
            Power supply</p></a>
        </div>
      </section>
      <section class="s2">
        <div class="coolingfan">
          <a href="prod.php?category=Cooling%20Fan"> <img src="/image/cooligfan.png" alt="CoolingFan" width="150px" height="150px"><p>Cooling Fan</p></a>
         </div>
         <div class="monitor">
           <a href="prod.php?category=Monitor"><img src="/image/monitor.png" alt="Monitor" width="150px" height="150px"><p>Monitor</p></a>
         </div>
         <div class="keyboardandmouse">
           <a href="prod.php?category=Keyboard%20and%20Mouse"><img src="/image/keyboardandmouse.png" alt="Keyboard and Mouse" width="150px" height="150px"><p>Keyboard and Mouse</p></a>
         </div>
         <div class="printerandscanner">
           <a href="prod.php?category=Printer%20and%20Scanner"><img src="/image/printerandscanner.jpg" alt="Printer and Scanner" width="150px" height="150px"><p>Printer and Scanner</p></a>
         </div>
         <div class="extra acccessories">
           <a href="prod.php?category=Extra%20Accessories"><img src="/image/extraaccessories.png" alt="Extra Accessories"width="150px" height="150px"><p>Extra Accessories</p></a>
         </div>
      </section>
      <section class="s3">
        <div class="personalcomputer">
          <a href="prod.php?category=Personal%20Computer"><img src="/image/personalcomputer.png" alt="Personal Computer" width="420px" height="150px"><p>Personal Computer</p></a>
        </div>
        <div class="custompcby64bs">
          <a href="prod.php?category=Custom%20Pc%20by%2064"><img src="/image/custompcby64bs.jpg" alt="Custom PC by 64BS" width="150px" height="150px"><p>Custom Pc by 64BS</p></a>
        </div>
        <div class="laptop">
        <a href="prod.php?category=Laptop"><img src="/image/laptop.png" alt="Laptop" width="420px" height="150px"><p>Laptop</p></a>
      </div>
      </section>

</div>

<!--    Footer-->
      <footer>
          <div style="min-height: 250px;" class="footer" id="footer-sub">
              <div class="container">
                  <div class="row">
                      <div class="col-md-4">
                          <h5> HELP </h5>
                          <ul>
                              <li><a href="">Payments</a><hr></li>
                              <li><a href="">Saved Cards</a><hr></li>
                              <li><a href="">Shipping</a><hr ></li>
                              <li><a href="">Cancellation & Returns</a><hr></li>
                              <li><a href="">FAQ</a></li>
                          </ul>
                      </div>

                      <div class="col-md-4">
                          <h5> COMPANY NAME </h5>
                          <ul>
                              <li><a href="">Contact Us</a><hr></li>
                              <li><a href="">About Us</a><hr></li>
                              <li><a href="">Careers</a><hr></li>
                              <li><a href="">Press</a><hr></li>
                              <li><a href="">Sell on our website</a></li>
                          </ul>
                      </div>

                      <div class="col-md-4">
                          <h5> MISC </h5>
                          <ul>
                              <li><a href="">Online Shopping</a><hr></li>
                              <li><a href="">Affliate Program</a><hr></li>
                              <li><a href="">Gift Card</a><hr></li>
                              <li><a href="">Subscription</a><hr></li>
                              <li><a href="">Sitemap</a></li>
                          </ul>
                      </div>

                  </div>


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
                  <li><a href=""><b>Blog</b></a></li>
                  <li><a href=""><b>Customer Service</b></a></li>
              </ul>

              <div id="social-menu">
                  <ul>
                      <li><a href=""><img style="max-width:18px; margin-top: -7px;" src=""></a></li>
                      <li><a href=""><img style="max-width:18px; margin-top: -7px;" src=""></a></li>
                      <li><a href=""><img style="max-width:18px; margin-top: -7px;" src=""></a></li>
                  </ul>
                  <p style="color: #fcfcfc; font-size: 12px">&copy;2023 64BITSTORE.com.All rights reserved.</p>
              </div>

          </div>

      </footer>
</body>
</html>