<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:admin_login.php');
}
//session_start();
//if($_SESSION['user'] == ""){
//    header("location:admin_login.php");
//}
include('connect.php');
$error="";
global$conn;
function LOAD_FILE($string)
{
    return $string;
}

if(isset($_POST['submit'])) {
    $name = $_POST['product_name'];
    $pdetails = $_POST['product_details'];
    $category = $_POST['product_category'];
    $qty = $_POST['product_quantity'];
    $price = $_POST['product_price'];
    $status = $_POST['product_status'];
    $image = $_FILES['upload_file']['name'];
    $tmpname =addslashes(file_get_contents($_FILES['upload_file']['tmp_name'])) ;
    $target = LOAD_FILE("image/").$image;



    move_uploaded_file($tmpname,$target);




    if($qty!="" && $price!="" && $name!="" && $tmpname!=""){
        if($_POST['product_status'] == 'stock') {
            $status = 1;
        } else {
            $status = 0;
        }
        $image_data = file_get_contents($target);
        $image_base64 = base64_encode($image_data);
        $sql = "INSERT INTO products VALUES ('','$name','$pdetails','$category','$qty','$price','$tmpname','$status')";


        $conn->query($sql);
        $error .= "<div class='alert alert-success'>Product added successfully!!</div>";
        header("location:insert_product.php");
    }else{
        $error .= "<div class='alert alert-danger'>Please fill all the fields!!</div>";

    }
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
    <title>Admin panle</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-1ZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/insert_product.css">
</head>
<body style="background-color: #0171d3; margin-top: 5%">
<nav class="navbar navbar-expand-md navbar-dark shadow" style="background-color: #e9e9e9;">
    <a class="navbar-brand" href="#"> <img src="64BitStore.png" alt="logo" style="width: 100%; height: 62px;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="admin.php">Home<span class="sr-only">(current)</span> </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="?action=logout">Logout</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container mt-5 w-50 p-5 rounded shadow-lg" style="background-color: #232836">
    <span class="text-danger"><?php echo $error;?></span>
    <form method="post" class="text-white" enctype="multipart/form-data">
        <div class="row">
            <div class="form-group col-md-6">
                <label>Product Name</label>
                <input type="text" name="product_name" class="form-control form-control-sm" placeholder="Enter Product Name">
            </div>
            <div class="form-group col-md-6">
                <label>Product price $</label>
                <input type="text" name="product_price" class="form-control form-control-sm" placeholder="Enter Product Price">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label>Product Details</label>
                    <input type="text" name="product_details" class="form-control form-control-sm" placeholder="Enter Product Details">
            </div>
            <div class="form-group col-md-6">
                <label>Product Status</label>
                <select name="product_status" class="form-control form-control-sm">
                    <option value="">--Select Status--</option>
                    <option value="stock">in Stock</option>
                    <option value="out of stock">Out of Stock</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                 <label>product category</label>

                    <select name="product_category" class="form-control form-control-sm">
                        <option disabled selected hidden>Product Categories</option>
                        <option>Mother Board</option>
                        <option>CPU</option>
                        <option>RAM and Storage</option>
                        <option>GPU</option>
                        <option>Power Supply</option>
                        <option>Cooling Fan</option>
                        <option>Monitor</option>
                        <option>Keyboard and Mouse</option>
                        <option>Mic & Speaker</option>
                        <option>Printer and Scanner</option>
                        <option>Extra Accessories</option>
                        <option>Personal Computer</option>
                        <option>Laptop</option>
                        <option>Case</option>
                        <option>Custom Pc by 64</option>
                    </select>
            </div>
            <div class="form-group col-md-6">
                <label>Product Quantity</label>
                <input type="text" name="product_quantity" class="form-control form-control-sm" placeholder="Enter Product Quantity">
            </div>
        </div>


        <label for="customFile">Product Image<span><h6>(Image Size Less than 48KB)</h6></span></label>
        <div class="custom-file mb-3">
                <input type="file" name="upload_file" class="custom-file-input" placeholder="Upload Product Image">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>

        <button type="submit" name="submit" class="btn btn-sm text-white shadow" style="background-color: lightseagreen">ADD ITEM</button>
    </form>
</div>

<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        let fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
</body>
</html>
