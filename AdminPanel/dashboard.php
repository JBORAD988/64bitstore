<?php
global $conn;
session_start();
include 'connect.php';
if (!isset($_SESSION['username'])) {
    header("location:admin_login.php");
}
$message="";


?>
<?php
if(isset($_GET['action']) && ($_GET['action']=="logout")){
    session_destroy();
    header("location:admin_login.php");
}


?>
<?php
//if(isset($_GET['action']) && $_GET['action']=="delete") {
//    $rows = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM productdemo WHERE id=" . $_GET['id']));
//    $id = $rows['id'];
//    $query1 = "DELETE FROM productdemo WHERE id=$id";
//    if (mysqli_query($conn, $query1)) {
//        $message = "Data deleted successfully";
//    } else {
//        $message = "Error deleting data: " . mysqli_error($conn);
//    }
//}
if(isset($_GET['action']) && $_GET['action']=="delete") {
    $id = $_GET['id'];
    if (!empty($id)) {
        $query1 = "DELETE FROM products WHERE `id`=$id";

        if (mysqli_query($conn, $query1)) {
            $message = "Data deleted successfully";
//            header("location:dashboard.php");
            header("refresh:5;url=dashboard.php");
//            exit();
        } else {
            $message = "Error deleting data: " . mysqli_error($conn);
        }
    } else {
        header("location:dashboard.php");
        exit();
    }
}

?>
<?php
// Check if the form was submitted
if(isset($_POST['submit'])) {

    // Get the form data
    $id = $_POST['id'];
    $name = $_POST['name'];
    $details= $_POST['details'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $sql = "UPDATE products SET product_name='$name', product_details='$details', Product_category='$category', product_quantity='$quantity', product_price='$price' WHERE id=$id";
    mysqli_query($conn, $sql);
    mysqli_close($conn);

    // Redirect to the page where the data was updated
    header("Location: dashboard.php?action=update&id=$id");
    exit();
}
?>

<?php
if(isset($_GET['action']) && $_GET['action'] == 'active' && isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $sql =  "UPDATE `products` SET `product_status` = '1' WHERE `products`.`id` = $id";
    mysqli_query($conn, $sql);
    header("location:dashboard.php");
}
if(isset($_GET['action']) && $_GET['action'] == 'deactivate' && isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $sql =  "UPDATE `products` SET `product_status` = '0' WHERE `products`.`id` = $id";
    mysqli_query($conn, $sql);
    header("location:dashboard.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control panel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-1ZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body style="background-color: #0171d3; margin-top: 5%;">
<nav class="navbar navbar-expand-md navbar-dark shadow" style="background-color: #e9e9e9; position: fixed;">
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
<div class="container mt-">
    <h6 ><?php echo $message; ?></h6>
    <div class="row">
        <a href="insert_product.php" class="badge btn-danger text-white ml-auto p-2 mr-5">Add item</a>
    </div>
        <table class="table text-center mt-1 table-bordered" style="background-color: #fcfcfc">
            <thead>
            <tr>
                <th>Image</th>
                <th>ID</th>
                <th>Product name</th>
                <th>Product Details</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>category</th>
                <th class="text-center">Action</th>
                <th colspan="3">Status</th>
            </tr>
            </thead>
            <?php
                $query = "SELECT * FROM products";
                $result = mysqli_query($conn, $query);
                if ($result->num_rows>0){
                    while ($rows = $result->fetch_assoc()){
//                        $id = $rows['id'];
//                        $name = $rows['name'];
//                        $quantity = $rows['quantity'];
//                        $price = $rows['price'];
//                        $category = $rows['category'];
//                        $image = base64_encode($rows['image']);
                        $id = $rows['id'];
                        $name = $rows['product_name'];
                        $details=$rows['product_details'];
                        $quantity = isset($rows['product_quantity']) ? $rows['product_quantity'] : '';
                        $price = $rows['product_price'];
                        $category = isset($rows['product_category']) ? $rows['product_category'] : '';
                        $image = base64_encode($rows['product_image']);
                    ?>
            <tbody>
            <tr>

            <form method="post" enctype="multipart/form-data">
                <td><img src="data:image/png;base64,<?php echo $image; ?>" alt="image" style="width: 100px; height: 100px;"></td>
                <td>
                        <input type="text" class="form-control form-control-sm" name="id" value="<?php echo $id; ?>" disabled>
                    </td>
                <td>
                        <input type="text" class="form-control form-control-sm" name="name" value="<?php echo $name; ?>" disabled>
                    </td>
                <td>
                    <input type="text" class="form-control form-control-sm" name="details" value="<?php echo $details; ?>" disabled>

                </td>
                <td>
                        <input type="text" class="form-control form-control-sm" name="quantity" value="<?php echo $quantity; ?>" disabled>
                    </td>
                <td>
                        <input type="text" class="form-control form-control-sm" name="price" value="<?php echo $price; ?>" disabled>
                    </td>
                <td>
                    <select name="category"  class="form-control form-control-sm" value="<?php echo $category; ?>" >
                        <option disabled selected hidden><?php echo $category?></option>
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
                </td>
                <td>
                    <div class="btn-group">
                        <button type="submit" name="submit" class="add btn" title="Save" onclick="return confirm('Confirm Changes')" >
                            <i class="badge bg-success text-white" data-toggle="tooltip">Save</i>
<!--                            <a href="--><?php //echo $id; ?><!--" class="badge bg-success text-white" data-toggle="tooltip">Save</a>-->
                             </button>

            </form>
                <a class="edit btn" title="Edit" data-toggle="tooltip"><i class="material-icons material-symbols-outlined text-warning"> &#xe147; </i></a>
                      <button class="add btn" title="save" data-toggle="tooltip"><a href="?action=delete&id=<?php echo $id; ?>" class="badge bg-danger text-white"
                                   onclick="return confirm('Are you Sure to delete this data')">Delete</a>
                      </button>
                    </div>

    <?php if ($rows['product_status'] == 0){ ?>
        <td> <button type="submit" name="submit" class="add1 btn" title="Upload">
                <a href="?action=active&id=<?php echo $id; ?>" class="badge bg-danger text-warning" data-toggle="tooltip">
                    <i>out of Stock</i></a>
            </button> </td>

    <?php } else { ?>
        <td>   <button type="submit" name="submit" class="add1 btn" title="Upload">
                <a href="?action=deactivate&id=<?php echo $id; ?>"  data-toggle="tooltip">
                    <i class="badge bg-success text-white" >Stock</i></a>
        </td>
    <?php } ?>

    </tr>
            </tbody>
            <?php }} ?>
        </table>

     <script type="text/javascript">
         $(document).ready(function() {
             $('[data-toggle="tooltip"]').tooltip();

             // Append table with add row form on add new button click
             $(document).on("click", ".edit", function () {
                 let input = $(this).parents("tr").find("input[type='text']");
                 // document.getElementsByName("category")[].removeAttribute("disabled");
                 input.each(function () {
                        $(this).removeAttr("disabled");
                    });
                 input.each(function () {
                     $(this).removeAttr("disabled");
                 });
                 $(this).parents("tr").find(".add, .edit").toggle();
             });
         });


     </script>
<script>

    function toggleButton(buttonElement) {
        if (buttonElement.innerText === 'UP') {
            buttonElement.innerText = 'Down';
            buttonElement.classList.remove('bg-success', 'text-white');
            buttonElement.classList.add('text-success', 'text-warning');
            buttonElement.href = buttonElement.href.replace('action=deactivate', 'action=active');
            buttonElement.title = 'Click to Deactivate';
        }
        else {
            buttonElement.innerText = 'UP';
            buttonElement.classList.remove('text-success', 'text-warning');
            buttonElement.classList.add('bg-success', 'text-white');
            buttonElement.href = buttonElement.href.replace('action=active', 'action=deactivate');
            buttonElement.title = 'Click to Active';
        }
    }


</script>
</body>
</html>
