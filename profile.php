<?php
global $conn;
include 'connect.php';
session_start();
if($_SESSION['username'] == ""){
    session_destroy();
    header("location:http://localhost:63342/64bitstore/login.php");
}
?>
<?php
if(isset($_GET['action']) && $_GET['action']=="logout"){
    session_destroy();
    header("location:http://localhost:63342/64bitstore/login.php");
}

?>
<?php
$query = "SELECT * FROM `user_login`";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
$id = $row['id'];
$email = $row['email'];
$password = $row['password'];
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/profile.js"></script>

    <link rel="stylesheet" href="/css/profile.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nav.css">
    <!--    footer-->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="css/footer.css">

</head>
<body>
<header>
    <?php include 'navbar.php'?>
</header>
<main style="margin-top: 5%; margin-bottom: 5%;">

    <div class="container bootstrap snippet">

        <div class="row">
            <div class="col-sm-3"><!--left col-->


                <div class="text-center">
                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
                    <h6>Upload a different photo...</h6>
                    <input type="file" class="text-center center-block file-upload">
                </div></hr><br>

                <div class="panel panel-default">
                    <div class="panel-heading">Social Media</div>
                    <div class="panel-body">
                        <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
                    </div>
                </div>

            </div><!--/col-3-->
            <div class="col-sm-9">
                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <hr>
                        <form class="form" action="#" method="post" id="registrationForm">
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="first_name"><h4>Email</h4></label>
                                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" value="<?php echo $email; ?>" disabled>
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="password"><h4>Password</h4></label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="password" value="<?php echo $password; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
<!--                                    <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>-->
<!--                                    <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>-->
                                </div>
                            </div>
                        </form>

                        <hr>
</main>

<footer>
    <div style="min-height: 50px;" class="footer" id="footer-sub">
        <div class="container">
<!--            <div class="row">-->
<!--                <div class="col-md-4">-->
<!--                    <h5> HELP </h5>-->
<!--                    <ul>-->
<!--                        <li><a href="">Payments</a><hr></li>-->
<!--                        <li><a href="">Saved Cards</a><hr></li>-->
<!--                        <li><a href="">Shipping</a><hr ></li>-->
<!--                        <li><a href="">Cancellation & Returns</a><hr></li>-->
<!--                        <li><a href="">FAQ</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!---->
<!--                <div class="col-md-4">-->
<!--                    <h5> COMPANY NAME </h5>-->
<!--                    <ul>-->
<!--                        <li><a href="">Contact Us</a><hr></li>-->
<!--                        <li><a href="">About Us</a><hr></li>-->
<!--                        <li><a href="">Careers</a><hr></li>-->
<!--                        <li><a href="">Press</a><hr></li>-->
<!--                        <li><a href="">Sell on our website</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!---->
<!--                <div class="col-md-4">-->
<!--                    <h5> MISC </h5>-->
<!--                    <ul>-->
<!--                        <li><a href="">Online Shopping</a><hr></li>-->
<!--                        <li><a href="">Affliate Program</a><hr></li>-->
<!--                        <li><a href="">Gift Card</a><hr></li>-->
<!--                        <li><a href="">Subscription</a><hr></li>-->
<!--                        <li><a href="">Sitemap</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!---->
<!--            </div>-->


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
            <li><a href="?action=logout"><b>Logout</b></a></li>
<!--            <li><a href=""><b>Customer Service</b></a></li>-->
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