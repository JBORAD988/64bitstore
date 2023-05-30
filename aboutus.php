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
    <title>About Us!</title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="icon" type="image/png" href="64.png">
    <script src="js/main.js"></script>
    <link rel="stylesheet" href="css/nav.css">
    <!--    footer-->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="css/footer.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="css/aboutus.css" rel="stylesheet">

</head>

<!------ Include the above in your HEAD tag ---------->

<body style="margin-top: 5%">
<header>
    <?php include 'navbar.php';?>
</header>
<div class="aboutus-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="aboutus">
                    <h2 class="aboutus-title">About Us</h2>
                    <p class="aboutus-text">At 64bitStore, we're passionate about technology and helping our customers get the most out of their devices. We offer a wide selection of new and refurbished computer hardware, including laptops, desktops, and accessories, to fit your needs and budget. Our team of experts is always on hand to answer your questions and provide personalized recommendations to ensure that you get the right hardware for your specific needs.</p>
                    <p class="aboutus-text">But we don't just sell new hardware. We're also committed to sustainability and reducing e-waste by buying old hardware from users and renewing it for resale. Our team of skilled technicians carefully refurbishes and tests each device to ensure that it meets our high standards of quality and performance. By buying renewed hardware from 64bitStore, you can save money and help reduce your environmental impact. At 64bitStore, we're dedicated to providing reliable, affordable, and sustainable technology solutions to our customers.</p>
<!--                    <a class="aboutus-more" href="#">read more</a>-->
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="aboutus-banner">
                    <img src="/image/64BitStore.png" style="height: 205px; width: 255px" alt="">
                </div>
            </div>
            <div class="col-md-5 col-sm-6 col-xs-12">
                <div class="feature">
                    <div class="feature-box">
                        <div class="clearfix">
                            <div class="iconset">
                                <span class="glyphicon glyphicon-cog icon"></span>
                            </div>
                            <div class="feature-content">
                                <h4>Work with heart</h4>
                                <p>At 64bitStore, we believe in more than just getting the job done. We believe in doing it with heart. That means pouring our passion and energy into every project, treating our clients like family, and always going above and beyond to exceed expectations. When you work with us, you can expect a team that not only delivers top-notch results, but also cares about your success and the impact we can make together. So if you're looking for a partner who works with heart, look no further than 64bitStore.</p>
                            </div>
                        </div>
                    </div>
                    <div class="feature-box">
                        <div class="clearfix">
                            <div class="iconset">
                                <span class="glyphicon glyphicon-cog icon"></span>
                            </div>
                            <div class="feature-content">
                                <h4>Reliable services</h4>
                                <p>At 64bitStore, we know that reliability is key to building strong relationships with our clients. That's why we prioritize reliability in everything we do. From our communication to our work ethic, we strive to be consistent, accountable, and dependable. We understand that our clients trust us to deliver on our promises, and we take that responsibility seriously. Whether it's meeting deadlines, providing transparent updates, or being available for support, you can count on us to be there when you need us most. So if you're looking for reliable services that you can trust, look no further than 64bitStore.</p>
                            </div>
                        </div>
                    </div>
                    <div class="feature-box">
                        <div class="clearfix">
                            <div class="iconset">
                                <span class="glyphicon glyphicon-cog icon"></span>
                            </div>
                            <div class="feature-content">
                                <h4>Great support</h4>
                                <p>At 64bitStore, we believe that great support is essential to the success of our clients. That's why we are committed to providing exceptional support every step of the way. From answering questions to troubleshooting issues, we go above and beyond to ensure that our clients feel heard, valued, and supported. Our team is responsive, knowledgeable, and dedicated to helping you achieve your goals. We understand that your success is our success, and we're here to help you every step of the way. So if you're looking for great support that you can count on, look no further than 64bitStore.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>