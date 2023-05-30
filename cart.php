<?php
global $conn;
include 'connect.php';
?>


<?php
$id=$_GET['id'];
$query = "SELECT * FROM products WHERE id = '".$id."'";
$result=mysqli_query($conn,$query);
if($result->num_rows>0)
{
    $rows = $result->fetch_assoc();
    $name = $rows['product_name'];
    $details = $rows['product_details'];
    $quantity = isset($rows['product_quantity']) ? $rows['product_quantity'] : '';
    $price = $rows['product_price'];
    $category = isset($rows['product_category']) ? $rows['product_category'] : '';
    $image = base64_encode($rows['product_image']);


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-1ZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/cart.css">
</head>
<body>
     <div class="container">
         <table class="table">
             <thead>
             <tr>
                 <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
<!--                    <th>Product details</th>-->
<!--                    <th>GST Rate</th>-->
                   <th>total</th>
             </tr>
             </thead>
             <tbody>
             <tr>
                 <td><input type="text" class="form-control form-control-sm text-center"
                     value="<?php echo $name ?>" disabled></td>
                 <td><input type="number" class="form-control form-control-sm w-50 text-center" min="1" id="qty"
                     value="<?php echo $quantity ?>"></td>
                 <td><input type="text" class="form-control form-control-sm w-50 text-center"
                     value="<?php echo $price ?>" id="price" disabled></td>
<!--                 <td><input type="text" class="form-control form-control-sm w-50 text-center"-->
<!--                     value="--><?php //echo $details; ?><!--" id="tex" disabled></td>-->
<!--                 <td><input type="text" class="form-control form-control-sm w-50 text-center" value="--><?php //echo $gst; ?><!--"-->
<!--                     id="gst" disabled></td>-->
                    <td><input type="text" class="form-control form-control-sm w-100 text-center"
                     id="total" disabled></td>
             </tr>
             </tbody>
         </table>
         <h4 class="mr-5 float-right text-success">total:-$<span id="demo" class="mr-5 text-success"></span></h4>

         <div class="row-justify-content-center">
             <div class="col-sm-12 col-md-4 col-lg-4">
                 <div class="card border-0">
                     <img class="card-img" src="data:image/png;base64,<?php echo $image ?>" alt="Card image">
                     <div class="card-body">
                         <h6 class="card-title text-secondary"><?php echo $name ?></h6>
                         <h6 class="card-title">qty:<?php echo $quantity?></h6>
                         <h4 class="card-title text-success">$<?php echo $price ?></h4>
                         <div class="buy d-flex justify-content-between align-items-center">
                             <a class="btn btn-warning mt-3"><i class="fas fa-shopping-cart"></i>Checkout </a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

<script>
    $(document).ready(function(){
       let price = $("#price").val();
       // let text = $("#tex").val();
       let qty = $("#qty").val();
       // let gst = $("#gst").val();
       let add = qty * price;
       $('#price').val(add);
       // let value = price;
       // $('#tex').val(value);
       // let total = parseInt(add) + parseInt(value);
        let total = parseInt(add);
        $('#total').val(total);
        $('#demo').text(total);

       $('#qty').change(function ()
           {
               let qty = $(this).val();
               let add = qty * price;
               $('#price').val(add);
               // let value = $('#price').val() * text / 100;
               // let value = $('#price').val();
               // $('#gst').val(value);
               // let total = parseInt(add) + parseInt(value);
               let total = parseInt(add);
               $('#total').val(total);
                $('#demo').html('<span class=container text-success>' + total + '</span>');


           }
       );



    });
</script>


</body>
</html>
