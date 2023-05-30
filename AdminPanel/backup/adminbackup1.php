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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-1ZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/insert_product.css">
</head>
<body style="background-color: #0171d3">
<nav class="navbar navbar-expand-md navbar-dark shadow " style="background-color: #232836;">
    <a class="navbar-brand" href="#"> <img src="../64BitStore.png" alt="logo" style="width: 100%; height: 62px;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../admin.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../dashboard.php">Manage Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost:63342/64bitstore/admin_panel.php">Manage Order</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost:63342/64bitstore/admin_panel.php">Manage User</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">verify resell</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Customer help</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="http://localhost:63342/64bitstore/allproduct.php">Product Page</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?action=logout">Logout</a>
            </li>
        </ul>
    </div>
</nav>
</body>
</html>
