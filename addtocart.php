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
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/addtocart.css">
</head>
<body style="margin-top: 5%">
<header>
    <?php include 'navbar.php';?>
</header>
<div class="container">
    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td data-th="Product">
                <div class="row">
                    <div class="col-sm-2 hidden-xs"><img src="data:image/png;base64,<?php echo $image ?>" alt="..." class="img-responsive"/></div>
                    <div class="col-sm-10">
                        <h4 class="nomargin"><?php echo $name ?></h4>
                        <p><?php echo $details ?></p>
                    </div>
                </div>
            </td>
            <td id="price" data-th="Price"><?php echo $price ?></td>
<!--            <td><input type="text" class="form-control form-control-sm w-50 text-center"-->
<!--                       value="--><?php //echo $price ?><!--" id="price" disabled></td>-->
            <td data-th="Quantity">
                <input type="number" class="form-control text-center" value="1" min="1" id="qty">
            </td>
            <td><input type="text" class="form-control form-control-sm w-100 text-center"
                       id="total" disabled></td>

<!--            <td data-th="Subtotal" class="text-center">1.99</td>-->
            <td class="actions" data-th="">
                <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
            </td>
        </tr>
        </tbody>
        <tfoot>
        <tr class="visible-xs">
<!--            <td><input type="text" class="form-control form-control-sm w-100 text-center"-->
<!--                       id="subtotal" disabled></td>-->
        </tr>
        <tr>
            <td><a href="allproduct.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"> <h4 class="mr-5 float-right text-success">total:<span id="subtotal" class="mr-5 text-success"></span></h4></td>
<!--            <td class="hidden-xs text-center"><strong>Total :<span id="demo" class="mr-5 text-success"></span></strong></td>-->
            <td><a href="address.php" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
        </tr>
        </tfoot>
    </table>
</div>


<script>
    $(document).ready(function(){
        let price = $("#price").text();
        let qty = $("#qty").val();
        let total = parseFloat(price) * parseInt(qty);
        $("#total").val(total.toFixed(2));
        $('#subtotal').text(total);

        $("#qty").on("change", function() {
            qty = $(this).val();
            total = parseFloat(price) * parseInt(qty);
            $("#total").val(total.toFixed(2));
            $('#subtotal').html('<span class=container text-success>' + total + '</span>');
        });
    });
</script>



<script>
    $(document).ready(function(){
        let totals = []; // Array to store individual totals

        function updateSubtotal() {
            let sum = totals.reduce((acc, val) => acc + val, 0);
            $("#subtotal").text(sum.toFixed(2));
        }

        $(".qty").on("change", function() {
            let $row = $(this).closest("tr");
            let price = parseFloat($row.find(".price").text());
            let qty = parseInt($(this).val());
            let total = price * qty;
            $row.find(".total").val(total.toFixed(2));

            let index = $(this).data("index");

            // Update or add total in the array
            if (totals[index]) {
                totals[index] = total;
            } else {
                totals.push(total);
            }

            updateSubtotal();
        });
    });
</script>




</body>
</html>