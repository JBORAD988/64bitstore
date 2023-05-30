<?php
include 'connect.php';
session_start();
global$conn;
?>
<?php

$id = $_GET['id'];
$query = "SELECT * FROM products WHERE id = '$id' ";
$result = mysqli_query($conn, $query);
if ($result->num_rows>0){
    while ($rows = $result->fetch_assoc()) {
//$id = $rows['id'];
        $name = $rows['product_name'];
        $details = $rows['product_details'];
        $quantity = isset($rows['product_quantity']) ? $rows['product_quantity'] : '';
        $price = $rows['product_price'];
        $category = isset($rows['product_category']) ? $rows['product_category'] : '';
        $image = base64_encode($rows['product_image']);
    }
}
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Product Detail</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link href="css/productdetails.css" rel="stylesheet">
    <link href="css/nav.css" rel="stylesheet">

    <!--    footer-->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="css/footer.css">

</head>

<body>
<header>
    <?php include 'navbar.php';?>
</header>

<div class="container">
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-6">

                    <div class="preview-pic tab-content">
                        <div class="tab-pane active" id="pic-1"><img src="data:image/png;base64,<?php echo $image; ?>"/></div>
                        <div class="tab-pane" id="pic-2"><img src="data:image/png;base64,<?php echo $image; ?>"/></div>
                        <div class="tab-pane" id="pic-3"><img src="data:image/png;base64,<?php echo $image; ?>"/></div>
                        <div class="tab-pane" id="pic-4"><img src="data:image/png;base64,<?php echo $image; ?>"/></div>
                        <div class="tab-pane" id="pic-5"><img src="data:image/png;base64,<?php echo $image; ?>"/></div>
                    </div>
<!--                    <ul class="preview-thumbnail nav nav-tabs">-->
<!--                        <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>-->
<!--                        <li><a data-target="#pic-2" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>-->
<!--                        <li><a data-target="#pic-3" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>-->
<!--                        <li><a data-target="#pic-4" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>-->
<!--                        <li><a data-target="#pic-5" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>-->
<!--                    </ul>-->

                </div>
                <div class="details col-md-6">
                    <h3 class="product-title"><?php echo $name ?></h3>
                    <div class="rating">
                        <div class="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <span class="review-no">41 reviews</span>
                    </div>
                    <p class="product-description"><?php echo $details ?></p>
                    <h4 class="price">current price: <span><?php echo $price ?></span></h4>
                    <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
                    <h5 class="sizes">QTY:
                        <span class="size" data-toggle="tooltip" title="small"><?php echo $quantity ?></span>
<!--                        <span class="size" data-toggle="tooltip" title="medium">m</span>-->
<!--                        <span class="size" data-toggle="tooltip" title="large">l</span>-->
<!--                        <span class="size" data-toggle="tooltip" title="xtra large">xl</span>-->
                    </h5>
                    <h5 class="colors">colors:
                        <span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
                        <span class="color green"></span>
                        <span class="color blue"></span>
                    </h5>
<!--                    <div class="action">-->
<!--                       <a href="addtocart.php?id=--><?php //echo $id;?><!--"><button class="add-to-cart btn " type="button">add to cart</button> </a>-->
<!--                        <button class="like btn " type="button"><span class="fa fa-heart"></span></button>-->
<!--                    </div>-->
                    <div class="btn">
                        <!--                                    <a href="addtocart.php?id=--><?php //echo $row['id'];?><!--" class="btn btn-danger">Add to Cart</a>-->
                        <form  action="manage_cart.php" method="post">
                            <input type="hidden" name="Item_ID" value="<?php echo $id?>" >
                            <input type="hidden" name="Item_Name" value="<?php echo $name?>" >
                            <input type="hidden" name="Price" value="<?php echo $price?>" >
                            <button type="submit" name="Add_To_Cart" class="btn btn-danger mt-3 btn-sm link"><i>Add to Cart</i> </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--    Footer-->
<footer>
    <div style="min-height: 250px;" class="footer" id="footer-sub">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5> HELP </h5>
                    <ul>
                        <li><a href="">Payments</a><hr></li>
                        <li><a href="">Saved Cards</a><hr></li>
                        <li><a href="">Shipping</a><hr ></li>
                        <li><a href="">Cancellation & Returns</a><hr></li>
                        <li><a href="">FAQ</a></li>
                    </ul>
                </div>

                <div class="col-md-4">
                    <h5> COMPANY NAME </h5>
                    <ul>
                        <li><a href="">Contact Us</a><hr></li>
                        <li><a href="">About Us</a><hr></li>
                        <li><a href="">Careers</a><hr></li>
                        <li><a href="">Press</a><hr></li>
                        <li><a href="">Sell on our website</a></li>
                    </ul>
                </div>

                <div class="col-md-4">
                    <h5> MISC </h5>
                    <ul>
                        <li><a href="">Online Shopping</a><hr></li>
                        <li><a href="">Affliate Program</a><hr></li>
                        <li><a href="">Gift Card</a><hr></li>
                        <li><a href="">Subscription</a><hr></li>
                        <li><a href="">Sitemap</a></li>
                    </ul>
                </div>

            </div>


            <hr style="margin-bottom:0px; margin-top:30px; padding:0px;">
            <div class="row" id="sub-two">

                <div class="col-md-4">
                    <div class="vertical-line text-center">
                        <span class="glyphicon glyphicon-map-marker"></span>
                        <h4>TRACK YOUR ORDER</h4>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="vertical-line text-center">
                        <span class="glyphicon glyphicon-refresh"></span>
                        <h4>FREE & EASY RETURNS</h4>
                    </div>
                </div>

                <div class="col-md-4">
                    <div style="margin:8px;" class="text-center">
                        <span class="glyphicon glyphicon-remove-circle"></span>
                        <h4 style="color:#6d6c6c;">ONLINE CANCELLATIONS</h4>
                    </div>
                </div>


            </div>
            <hr style="margin-bottom:30px; margin-top:0px; padding:0px;">



        </div>
    </div>
    <div style="min-height: 50px;" id="footer-main">

        <ul>
            <li><a href="aboutus.php"><b>About Us</b></a></li>
            <li><a href=""><b>Partner with us</b></a></li>
            <li><a href=""><b>Terms & Conditions</b></a></li>
            <li><a href=""><b>Blog</b></a></li>
            <li><a href=""><b>Customer Service</b></a></li>
        </ul>

        <div id="social-menu">
            <ul>
                <li><a href=""><img style="max-width:18px; margin-top: -7px;" src=""></a></li>
                <li><a href=""><img style="max-width:18px; margin-top: -7px;" src=""></a></li>
                <li><a href=""><img style="max-width:18px; margin-top: -7px;" src=""></a></li>
            </ul>
            <p style="color: #fcfcfc; font-size: 12px">&copy;2023 64BITSTORE.com.All rights reserved.</p>
        </div>

    </div>

</footer>


</body>
</html>

