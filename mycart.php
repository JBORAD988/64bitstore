<?php include "navbar.php"; ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="css/nav.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 text-center border rounded bg-light mt-5">
            <h1>My Cart</h1>
        </div>
        <div class="col-lg-8">
            <table class="table">
                <thead class="text-center">
                <tr>
                    <th scope="col">Serial No.</th>
                    <th scope="col">Item Nmae</th>
                    <th scope="col">Item price</th>
                    <th scope="col">qty</th>
                </tr>
                </thead>
                <tbody class="text-center">
                <?php
                $total = 0;
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $key => $value) {
                        $total = $total + $value['Price'];
                        $sr = $key + 1;
                        echo "
                        <tr>
                            <th scope=\"row\">$sr</th>
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
            </table>
        </div>
        <div class="col-lg-3 mt-3">
            <div class="border bg-light rounded p-4">
                <h3 class="text-right">Grand Total: <?php echo $total; ?></h3>
                <?php $_SESSION['pay']= $total;
                ?>
                <br>
                <form>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Paypal
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" disabled>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Cash on delivery
                        </label>
                    </div>
<!--                    <button class="btn btn-primary btn-block">Checkout</button>-->
<!--                    <a href="address.php" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a>-->
                    <a href="address.php" class="btn btn-primary btn-block">Checkout <i class="fa fa-angle-right"></i></a>
                </form>
            </div>
        </div>

    </div>
</div>
</body>
</html>


