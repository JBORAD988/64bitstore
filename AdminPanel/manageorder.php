<?php
global $conn,$result,$query;
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

if(isset($_GET['action']) && $_GET['action']=="delete") {
    $id = $_GET['id'];
    if (!empty($id)) {
        $query1 = "DELETE FROM resell WHERE `id`=$id";

        if (mysqli_query($conn, $query1)) {
            $message = "Data deleted successfully";
//            header("location:dashboard.php");
            header("refresh:1;url=verifyresell.php");
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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q&A</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-1ZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/dashboard.css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
        .table{
            width: 1140px;
        }
    </style>
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
<?php
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Querying the database
$query = "SELECT * FROM `resell`";
$result = mysqli_query($conn, $query);

// Displaying the data in a table
function full_load($string)
{
    return str_replace(' ', '%20', $string);
}

if (mysqli_num_rows($result) > 0) {
?><div class="container">
    <div class="row">
        <div class="span5">
            <table class="table table-striped table-condensed" style="background-color: #fcfcfc">
                <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Product Company</th>
                    <th>Buyer name</th>
                    <th>Product Category</th>
                    <th>Price</th>
                    <th>Purchase date</th>
                    <th>Warranty</th>
                    <th>Address</th>
                    <th>Warehouse id</th>
                    <th>Product Details</th>
                    <th>Product Image</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $name = $row['product_name'];
                $company = $row['product_company'];
                $owner = $row['owner_name'];
                $purchase_date = $row['purchase_date'];
                $category = $row['product_category'];
                $price = $row['price_want'];
                $warranty = $row['warranty'];
                $bill = $row['product_bill'];
                $agreement = $row['agreement'];
                $pdetails = $row['product_details'];
                $imageData = $row['product_image'];
                $imageSrc = 'data:image/jpeg;base64,' . base64_encode($imageData);
                //$imageSrc = full_load('data:image/jpeg;base64,' . base64_encode($imageData));

                ?>
                <tr>
                    <td><?php echo $name ?></td>
                    <td><?php echo $company ?></td>
                    <td><?php echo $owner ?></td>
                    <td><?php echo$category ?></td>
                    <td><?php echo$price ?></td>
                    <td><?php echo$purchase_date ?></td>
                    <td><?php echo $warranty ?></td>
                    <td><?php echo $bill ?></td>
                    <td><?php echo$agreement?></td>
                    <td><?php echo$pdetails ?></td>
                    <td><img src="<?php echo $imageSrc; ?>" alt="image" style="width: 100px; height: 100px;"></td>
                    <td><a href="?action=delete&id=<?php echo $id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this data?')">Delete</a></td>
                    <?php
                    } } else {
                        echo "0 results";
                    }
                    ?>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
