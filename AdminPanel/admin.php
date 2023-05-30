<?php
include 'connect.php';
session_start();
if($_SESSION['user'] == ""){
    header("location:admin_login.php");
}

?>
<?php
if(isset($_GET['action']) && $_GET['action']=="logout"){
    session_destroy();
    header("location:admin_login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
    <link rel="stylesheet" id="bootstrap-css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-1ZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/insert_product.css">
    <link rel="stylesheet" href="css/admincard.css">
</head>
<body style="background-color: #0171d3">
<nav class="navbar navbar-expand-md navbar-dark shadow " style="background-color: #e9e9e9;">
    <a class="navbar-brand" href="#"> <img src="64BitStore.png" alt="logo" style="width: 100%; height: 62px;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="admin.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?action=logout">Logout</a>
            </li>
        </ul>
    </div>
</nav>

<main>
    <section class="our-webcoderskull padding-lg">
        <div class="container">
            <div class="row heading heading-icon">
                <h2>Main Dashboard</h2>
            </div>
            <ul class="row">
                <li class="col-12 col-md-6 col-lg-3">
                    <div class="cnt-block equal-hight" style="height: 349px;">
                        <figure><img src="/image/product-management.png" class="img-responsive" alt=""></figure>
                        <h3><a href="dashboard.php">Manage Inventory</a></h3>
                        <p>manage Inventory and all product</p>
                    </div>
                </li>
                <li class="col-12 col-md-6 col-lg-3">
                    <div class="cnt-block equal-hight" style="height: 349px;">
                        <figure><img src="/image/ecommerce.png" class="img-responsive" alt=""></figure>
                        <h3><a href="http://localhost:63342/64bitstore/allproduct.php">Product Page</a></h3>
                        <p>Product page</p>
                    </div>
                </li>
                <li class="col-12 col-md-6 col-lg-3">
                    <div class="cnt-block equal-hight" style="height: 349px;">
                        <figure><img src="/image/usermanage.png" class="img-responsive" alt=""></figure>
                        <h3><a href="http://localhost:63342/64bitstore/AdminPanel/manageuser.php">Manage User </a></h3>
                        <p>user data control</p>
                    </div>
                </li>
                <li class="col-12 col-md-6 col-lg-3">
                    <div class="cnt-block equal-hight" style="height: 349px;">
                        <figure><img src="/image/cargo.png" class="img-responsive" alt=""></figure>
                        <h3><a href="manageorder.php">Manage Order</a></h3>
                        <p>order management page</p>
                    </div>
                </li>

                <li class="col-12 col-md-6 col-lg-3">
                    <div class="cnt-block equal-hight" style="height: 349px;">
                        <figure><img src="/image/productvery.png" class="img-responsive" alt=""></figure>
                        <h3><a href="http://localhost:63342/64bitstore/AdminPanel/verifyresell.php">Verify Resell</a></h3>
                        <p>Product Verification center</p>
                    </div>
                </li>
                <li class="col-12 col-md-6 col-lg-3">
                    <div class="cnt-block equal-hight" style="height: 349px;">
                        <figure><img src="/image/helpdesk.png" class="img-responsive" alt=""></figure>
                        <h3><a href="http://localhost:63342/64bitstore/AdminPanel/customerhelp.php">User Help</a></h3>
                        <p>User Help and Q&A</p>
                    </div>
                </li>

                <li class="col-12 col-md-6 col-lg-3">
                    <div class="cnt-block equal-hight" style="height: 349px;">
                        <figure><img src="/image/warehouse.png" class="img-responsive" alt=""></figure>
                        <h3><a href="#">Warehouse Inventory</a></h3>
                        <p>manage inventory in warehouse</p>
                    </div>
                </li>

                <li class="col-12 col-md-6 col-lg-3">
                    <div class="cnt-block equal-hight" style="height: 349px;">
                        <figure><img src="/image/paymentveryfication.png" class="img-responsive" alt=""></figure>
                        <h3><a href="#">Payment verification </a></h3>
                        <p>Verification of payment and payment type</p>
                    </div>
                </li>
            </ul>
        </div>
    </section>
</main>
</body>
</html>
