<?php include "header.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<?php //print_r($_SESSION['cart']); ?>



<div class="container mt-5">
    <div class="row">
        <div class="col-lg-3">
            <form action="manage_cart.php" method="post">
            <div class="card">
                <img src="/image/cooligfan.png" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title">Cooling fan</h5>
                    <p class="card-text">Price: Rs.450</p>
                    <button type="submit" name="Add_To_Cart" class="btn btn-primary">Add to cart</button>
                    <input type="hidden" name="Item_Name" value="Bag 1">
                    <input type="hidden" name="Price" value="450">
                </div>
            </div>
            </form>
        </div>
        <div class="col-lg-3">
            <form action="manage_cart.php" method="post">
                <div class="card">
                    <img src="/image/cooligfan.png" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">Cooling fan2</h5>
                        <p class="card-text">Price: Rs.440</p>
                        <button type="submit" name="Add_To_Cart" class="btn btn-primary">Add to cart</button>
                        <input type="hidden" name="Item_Name" value="Bag 2">
                        <input type="hidden" name="Price" value="440">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3">
            <form action="manage_cart.php" method="post">
                <div class="card">
                    <img src="/image/cooligfan.png" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">Cooling fan3</h5>
                        <p class="card-text">Price: Rs.430</p>
                        <button type="submit" name="Add_To_Cart" class="btn btn-primary">Add to cart</button>
                        <input type="hidden" name="Item_Name" value="Bag 3">
                        <input type="hidden" name="Price" value="430">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3">
            <form action="manage_cart.php" method="post">
                <div class="card">
                    <img src="/image/cooligfan.png" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">Cooling fan</h5>
                        <p class="card-text">Price: Rs.350</p>
                        <button type="submit" name="Add_To_Cart" class="btn btn-primary">Add to cart</button>
                        <input type="hidden" name="Item_Name" value="Bag 5">
                        <input type="hidden" name="Price" value="350">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>