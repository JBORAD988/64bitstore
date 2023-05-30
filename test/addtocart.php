<?php session_start(); ?>
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
    <link rel="stylesheet" href="/css/addtocart.css">
    <link rel="stylesheet" href="/css/nav.css">
</head>
<body style="margin-top: 5%">
<header>
    <?php include 'C:\xampp\htdocs\64bitstore\navbar.php';?>
</header>
<div class="container">
    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
    <tbody>
        <?php
        $total = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $value) {
                $total = $total + $value['Price'];
                $sr = $key + 1;
                echo "
                        <tr>
                            <td>$value[Item_Name]</td>
                            <td>$value[Price]</td>
                            <td><input class=\"text-center\" type='number' value='$value[Quantity]' min='1' max='10'></td>
                            <td>
                            <form action=\"manage_cart.php\" method=\"POST\">
                            <button name='Remove_Item' class='btn btn-sm btn-outline-danger' >Remove </button> 
                            <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
                            </form>
                            </td>
                       
                        </tr>
                    ";
            }
        }
        ?>
        </tbody>
        <tfoot>
        <tr class="visible-xs">
<!--            <td><input type="text" class="form-control form-control-sm w-100 text-center"-->
<!--                       id="subtotal" disabled></td>-->
        </tr>
        <tr>
            <td><a href="allproduct.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"> <h4 class="mr-5 float-right text-success">total:<?php echo $total; ?><span id="subtotal" class="mr-5 text-success"></span></h4></td>
<!--            <td class="hidden-xs text-center"><strong>Total :<span id="demo" class="mr-5 text-success"></span></strong></td>-->
            <td><a href="address.php" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
        </tr>
        </tfoot>
    </table>
</div>

<!---->
<!--<script>-->
<!--    $(document).ready(function(){-->
<!--        let price = $("#price").text();-->
<!--        let qty = $("#qty").val();-->
<!--        let total = parseFloat(price) * parseInt(qty);-->
<!--        $("#total").val(total.toFixed(2));-->
<!--        $('#subtotal').text(total);-->
<!---->
<!--        $("#qty").on("change", function() {-->
<!--            qty = $(this).val();-->
<!--            total = parseFloat(price) * parseInt(qty);-->
<!--            $("#total").val(total.toFixed(2));-->
<!--            $('#subtotal').html('<span class=container text-success>' + total + '</span>');-->
<!--        });-->
<!--    });-->
<!--</script>-->
<!---->
<!---->
<!---->
<!--<script>-->
<!--    $(document).ready(function(){-->
<!--        let totals = []; // Array to store individual totals-->
<!---->
<!--        function updateSubtotal() {-->
<!--            let sum = totals.reduce((acc, val) => acc + val, 0);-->
<!--            $("#subtotal").text(sum.toFixed(2));-->
<!--        }-->
<!---->
<!--        $(".qty").on("change", function() {-->
<!--            let $row = $(this).closest("tr");-->
<!--            let price = parseFloat($row.find(".price").text());-->
<!--            let qty = parseInt($(this).val());-->
<!--            let total = price * qty;-->
<!--            $row.find(".total").val(total.toFixed(2));-->
<!---->
<!--            let index = $(this).data("index");-->
<!---->
<!--            // Update or add total in the array-->
<!--            if (totals[index]) {-->
<!--                totals[index] = total;-->
<!--            } else {-->
<!--                totals.push(total);-->
<!--            }-->
<!---->
<!--            updateSubtotal();-->
<!--        });-->
<!--    });-->
<!--</script>-->




</body>
</html>