<?php
global $conn, $error;
include('connect.php');
session_start();
if($_SESSION['username'] == ""){
    header("location:http://localhost:63342/64bitstore/login.php");
}
?>

<?php
if(isset($_POST['submit'])) {
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];


if($name!="" && $email!="" && $name!="" && $message!=""){
if($_POST['product_status'] == 'stock') {
$status = 1;
} else {
$status = 0;
}
$sql = "INSERT INTO contactus VALUES ('','$name','$email','$message')";


$conn->query($sql);
$error .= "<div class='alert alert-success'>Product added successfully!!</div>";
//header("location:index.php");
    echo "<script>alert('Message Sent Successfully!')</script>";
//    header("refresh: 2; url=http://localhost:63342/64bitstore/index.php") ;
    header("refresh: 0.5;") ;
}else{
$error .= "<div class='alert alert-danger'>Please fill all the fields!!</div>";

}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>64bitStore Help!</title>
    <link rel="stylesheet" href="/css/contactus.css">
    <link rel="stylesheet" href="/css/nav.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-1ZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style>
        nav{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            padding: 0;
            background-color: #fff;
            border-bottom: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 9999;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
        }
    </style>
</head>
<body>
<header>

    <nav class="w-100">
        <div class="logo">
            <img src="64BitStore.png" alt="64BITSTORE">

        </div>
        <ul class="menu" style="display: flex;">
            <li><a href="http://localhost:63342/64bitstore/index.php">Home</a></li>
            <li><a href="http://localhost:63342/64bitstore/allproduct.php">Products</a></li>
            <!-- <li><a href="#">Sell</a></li> -->
            <li><a href="profile.php">profile</a></li>
<!--            <li><a href="http://localhost:63342/64bitstore/contactus.php">Contact Us</a></li>-->
        </ul>
        <div style="font-family: 'Times New Roman',sans-serif; color: #2196f3">
            <h1>Contact Us</h1>
        </div>
    </nav>

</header>
<h4><span class="text-danger"><?php echo $error;?></span></h4>
<main>
    <form method="post" class="text-white" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea>

        <button type="submit" name="submit" class="btn btn-sm text-white shadow" style="background-color: lightseagreen">ADD ITEM</button>
    </form>

</main>

</body>
</html>
