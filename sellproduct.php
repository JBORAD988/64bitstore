<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('location:admin_login.php');
}
include('connect.php');
$error="";
global$conn;
function LOAD_FILE($string)
{
  return $string;
}

if(isset($_POST['submit'])) {
  $name = $_POST['product_name'];
  $company = $_POST['product_company'];
  $owner = $_POST['owner_name'];
  $purchase_date = $_POST['purchase_date'];
  $category = $_POST['product_category'];
  $price = $_POST['price_want'];
  $warranty = $_POST['warranty'];
//    $bill = isset($_POST['product_bill']) && $_POST['product_bill'] === 'Yes' ? 1 : 0;
//    $agreement = isset($_POST['agreement']) && $_POST['agreement'] === 'Yes' ? 1 : 0;
  $bill = $_POST['product_bill'];
  $agreement = $_POST['agreement'];
  $pdetails = $_POST['product_details'];
  $image = $_FILES['upload_file']['name'];
  $tmpname =addslashes(file_get_contents($_FILES['upload_file']['tmp_name'])) ;
  $target = LOAD_FILE("image/").$image;



  move_uploaded_file($tmpname,$target);




  if($price!="" && $name!="" && $tmpname!=""){
        if($_POST['product_bill'] == 'yes') {
            $bill = "Yes";
        } else {
            $bill = "No";
        }
       if ($_POST['agreement'] == 'yes') {
            $agreement = "Yes";
        } else {
           $agreement = "No";
        }

    $image_data = file_get_contents($target);
    $image_base64 = base64_encode($image_data);

//        $sql = "INSERT INTO resell VALUES ( '', $name, $company, $owner, $purchase_date, $category, $price, $warranty, $bill, $agreement, $pdetails, $target)";
    $sql = "INSERT INTO `resell` (`id`, `product_name`, `product_company`, `owner_name`, `purchase_date`, `product_category`, `price_want`, `warranty`, `product_bill`, `agreement`, `product_details`, `product_image`) VALUES ('', '$name', '$company', '$owner', '$purchase_date', '$category', '$price', '$warranty', '$bill', '$agreement', '$pdetails', '$target')";

    $conn->query($sql);
    $error .= "<div class='alert alert-success'>Product added successfully!!</div>";
    header("refresh:1;url=sellproduct.php");
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
  <link rel="stylesheet" href="css/nav.css">

</head>
<body style="background-color: #e9e9e9; margin-top: 5%">
<?php include 'navbar.php'?>
<div class="container mt-5 w-50 p-5 rounded shadow-lg" style="background-color: #232836">
  <span class="text-danger"><?php echo $error;?></span>
  <form method="post" class="text-white" enctype="multipart/form-data">
    <div class="row">
      <div class="form-group col-md-6">
        <label>Product Name</label>
        <input type="text" name="product_name" class="form-control form-control-sm" placeholder="Enter Product Name">
      </div>
      <div class="form-group col-md-6">
        <label>Owners Name</label>
        <input type="text" name="owner_name" class="form-control form-control-sm" placeholder="Enter Product Price">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label>Product Company</label>
        <input type="text" name="product_company" class="form-control form-control-sm" placeholder="Enter Product Price">
      </div>
      <div class="form-group col-md-6">
        <label>price you want</label>
        <input type="text" name="price_want" class="form-control form-control-sm" placeholder="Enter Product Price">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label>Product Details</label>
        <input type="text" name="product_details" class="form-control form-control-sm" placeholder="Enter Product Details" >
      </div>

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
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label>Purchase date</label>
        <input type="date" name="purchase_date" class="form-control form-control-sm" placeholder="Enter Purchase Date">
      </div>
      <div class="form-group col-md-6">
        <label>Warranty till</label>
        <input type="date" name="warranty" class="form-control form-control-sm" placeholder="Enter Warranty Till">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label>Do You Have Original Bill</label>
        <select name="product_bill" class="form-control form-control-sm">
          <option value="">--Select--</option>
          <option value="yes">Yes</option>
          <option value="out of stock">No</option>
        </select>
      </div>
      <div class="form-group col-md-6">
        <label>Send Product for Quality Check </label>
        <select name="agreement" class="form-control form-control-sm">
          <option value="">--Select--</option>
          <option value="yes">I Agree Yes</option>
          <option value="out of stock">Not Agree</option>
        </select>
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
