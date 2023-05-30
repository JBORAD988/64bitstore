<?php
global $conn;
include("connection.php");
error_reporting(0);
?>


<?php
$id = $_GET['id'];

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $d = 0;

    if (!empty($_COOKIE['item']) && is_array($_COOKIE['item'])) {
        foreach ($_COOKIE['item'] as $name => $value) {
            $d = $d + 1;
        }
        $d = $d + 1;
    } else {
        $d = $d + 1;
    }

    $q = "SELECT * FROM `products` WHERE id = " . $_POST['id'];
    $res = $conn->query($q);

    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            $name = $row['product_name'];
            $qty = $row['product_quantity'];
            $price = $row['product_price'];
            $image = base64_encode($row['product_image']);
            $dqty = 1;
            $price1 = $dqty * $price;
        }

        if (!empty($_COOKIE['item']) && is_array($_COOKIE['item'])) {
            $found = 0;

            foreach ($_COOKIE['item'] as $name1 => $value) {
                $value11 = explode("_", $value);

                if ($image == $value11[0]) {
                    $found = 1;
                    $qty1 = $value11[3] + 1;
                    $price1 = $value11[8] * $dqty;
                    setcookie("item[$name1]", $image . "_" . $name . "_" . $price1 . "_" . $qty1 . "_" . $price1, time() + 1800);
                }
            }

            if ($found == 0) {
                setcookie("item[$d]", $id, time() + 1800);
            }
        } else {
            setcookie("item[$d]", $id, time() + 1800);
        }
    }
    header("Location: http://localhost:63342/64bitstore/addtocart.php?msg=Item added to cart successfully");
    exit;
}
?>



<?php
$product_category=$_GET['category'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Products </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-1ZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/nav.css">
<!--    <link rel="stylesheet" href="prod.css">-->
<!--        <base href="prod.css">-->
<!--        <link rel="stylesheet" href="prod.css">-->

<!--    footer-->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="css/footer.css">

    <style>
        /* *{ */
        /* box-sizing: border-box; */
        /* } */
        /* html, body { */
        /* margin: 0; */
        /* padding: 0; */
        /* font-family: Arial, sans-serif; */
        /* font-size: 16px; */
        /* line-height: 1.4; */
        /* } */
        /*      */
        /* header { */
        /* background-color: #4CAF50; */
        /* color: #fff; */
        /* padding: 20px; */
        /* } */
        /*      */
        /* header .container { */
        /* display: flex; */
        /* justify-content: space-between; */
        /* align-items: center; */
        /* } */
        /*      */

        /* General styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
        }

        a {
            text-decoration: none;
            color: #333;
        }

        ul {
            list-style: none;
        }

        /* Navigation styles */
        /* Navigation bar styles */
        nav {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            padding: 0;
            background-color: #fff;
            border-bottom: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 9999;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            max-width: 100%;
            height: 62px;
        }
        .logo {
            /*background-image: url('https://i.ibb.co/SNYBkVb/64-Bit-Store.png');*/
            background-image: url("64BitStore.png");
            width: 100px;
            height: 60px;
            background-size: contain;
            background-repeat: no-repeat;
        }


        .menu {
            display: flex;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .menu li {
            margin-right: 20px;
        }

        .menu li:last-child {
            margin-right: 0;
        }

        .menu a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        .sell-btn a {
            display: block;
            padding: 10px;
            background-color: #2196f3;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
        }

        .sell-btn a:hover {
            background-color: #0d6efd;
        }

        .search-bar {
            display: flex;
        }

        .search-bar input[type="text"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px 0 0 5px;
            border: none;
        }

        .search-bar button[type="submit"] {
            padding: 10px;
            background-color: #2196f3;
            color: white;
            border: none;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }

        .search-bar button[type="submit"]:hover {
            background-color: #0d47a1;
            color: #fff;
        }


        /*.help a,*/
        /*nav .cart a {*/
        /*    color: #000000;*/
        /*    text-decoration: none;*/
        /*    font-size: 16px;*/
        /*    display: flex;*/
        /*    align-items: center;*/
        /*}*/

        /*.cart i {*/
        /*    margin-right: 5px;*/
        /*}*/


        .help a {
            margin-right: 20px;
        }

        .cart a {
            display: flex;
            align-items: center;
            background-color: #2196f3;
            color: #fff;
            border-radius: 5px;
            padding: 10px 20px;
            transition: all 0.3s ease-in-out;
        }

        .cart i {
            font-size: 24px;
            margin-right: 10px;
        }

        /* Media queries for responsive design */
        @media only screen and (max-width: 768px) {
            nav {
                flex-direction: column;
            }

            .logo {
                margin-bottom: 20px;
            }

            .menu {
                margin-bottom: 20px;
                flex-direction: column;
            }

            .menu li {
                margin-right: 0;
                margin-bottom: 10px;
            }

            .sell-btn a {
                margin-bottom: 20px;
            }
        }


        /* CSS */

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            color: #333;
        }

        .container h1 {
            text-align: center;
            margin-top: 15px;
        }

        .product-title {
            padding-top: 80px; /* adjust the value as needed */
        }


        /* Navigation bar */
        /* nav { */
        /* background-color: #f8f8f8; */
        /* color: #fff; */
        /* display: flex; */
        /* align-items: center; */
        /* padding: 1rem; */
        /* } */
        /*  */
        /* nav img { */
        /* height: 50px; */
        /* margin-right: auto; */
        /* } */
        /*  */
        /* nav ul { */
        /* display: flex; */
        /* list-style: none; */
        /* } */
        /*  */
        /* nav ul li { */
        /* margin-right: 1rem; */
        /* } */
        /*  */
        /* nav ul li a { */
        /* color: #fff; */
        /* text-decoration: none; */
        /* padding: 0.5rem; */
        /* } */
        /*  */
        /* nav ul li a:hover { */
        /* background-color: #fff; */
        /* color: #4d4d4d; */
        /* } */
        /*  */
        /* nav button { */
        /* background-color: #fff; */
        /* color: #4d4d4d; */
        /* border: none; */
        /* padding: 0.5rem; */
        /* margin-right: 1rem; */
        /* cursor: pointer; */
        /* } */
        /*  */
        /* Banner section */
        .banner {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 2rem auto;
        }

        .banner img {
            width: 100%;
            margin-bottom: 1rem;
        }

        .heading{
            background-color: #fff;
            padding: 4rem;
            margin: 1rem;
            /* border: 1px solid #ccc; */
            flex-basis: calc(33.33% - 2rem);
            text-align: center;
        }


        /* Product section */


        /*.product {*/
        /*    background-color: #fff;*/
        /*    padding: 1rem;*/
        /*    margin: 1rem;*/
        /*    border: 1px solid #ccc;*/
        /*    flex-basis: calc(33.33% - 2rem);*/
        /*    text-align: center;*/
        /*}*/

        /*.product img {*/
        /*    max-width: 210px;*/
        /*    margin: 10px;*/
        /*    height: 165px;*/
        /*    width: 206px;*/
        /*    max-height: 165px;*/
        /*}*/

        /*.product h3 {*/
        /*    margin: 0.5rem 0;*/
        /*    font-size: 1.2rem;*/
        /*}*/

        /*.product p {*/
        /*    margin-bottom: 1rem;*/
        /*}*/

        .product span {
            font-size: 1.5rem;
            color: #4d4d4d;
            font-weight: bold;
        }
        /*.product-grid {*/
        /*    display: grid;*/
        /*    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));*/
        /*    grid-gap: 20px;*/
        /*}*/

        /*.product {*/
        /*    border: 1px solid #ddd;*/
        /*    padding: 20px;*/
        /*    text-align: center;*/
        /*    min-height: 300px;*/
        /*    min-width: 250px;*/
        /*}*/

        /*.product img {*/
        /*    max-width: 100%;*/
        /*    height: auto;*/
        /*}*/

        .product-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .product {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            min-width: 300px; /* set a minimum width */
            min-height: 500px; /* set a minimum height */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .product img {
            width: 100%;
            height: auto;
            object-fit: contain;
            margin-bottom: 20px;
        }

        .card-title {
            margin-bottom: 5px;
            font-size: 18px;
        }

        .buy {
            margin-top: auto;
        }

        .btn {
            width: 100%;
        }

        /*!* Footer section *!*/
        /*footer {*/
        /*    background-color: #4d4d4d;*/
        /*    color: #fff;*/
        /*    padding: 1rem;*/
        /*    margin-top: 2rem;*/
        /*}*/

        /*footer ul {*/
        /*    display: flex;*/
        /*    list-style: none;*/
        /*    margin-bottom: 1rem;*/
        /*}*/

        /*footer ul li {*/
        /*    margin-right: 1rem;*/
        /*}*/

        /*footer ul li a {*/
        /*    color: #fff;*/
        /*    text-decoration: none;*/
        /*}*/

        /*footer p {*/
        /*    text-align: center;*/
        /*}*/

        /* Media queries */
        @media (max-width: 768px) {
            .container {
                max-width: 90%;
            }

            nav {
                flex-wrap: wrap;
            }

            nav img {
                margin-right: 0;
                margin-bottom: 1rem;
            }

            nav button {
                margin-top: 1rem;
                margin-right: 0;
            }

            nav ul {
                width: 100%;
                justify-content: space-between;
            }

            nav ul li {
                margin-right: 0;
                margin-bottom: 1rem;
            }

            .banner {
                flex-direction: column;
            }

            .banner img {
                margin-bottom: 0;
            }

            .product {
                flex-basis: calc(50% - 2rem);
            }

            @media (max-width: 576px) {
                .product {
                    flex-basis: 100%;
                }
            }

            /* Responsive images */
            img {
                max-width: 100%;
                height: auto;
            }



            /* Product page */
            /* .product-page { */
            /* background-color: #fff; */
            /* padding: 1rem; */
            /* } */

            /* .product-page h2 { */
            /* margin-top: 0; */
            /* } */

            /* .product-page .product-list { */
            /* display: flex; */
            /* flex-wrap: wrap; */
            /* justify-content: space-between; */
            /* } */

            /* .product-page .product { */
            /* background-color: #fff; */
            /* padding: 1rem; */
            /* margin-bottom: 1rem; */
            /* border: 1px solid #ccc; */
            /* flex-basis: calc(33.33% - 2rem); */
            /* text-align: center; */
            /* } */

            /* .product-page .product img { */
            /* max-width: 100%; */
            /* } */

            /* .product-page .product h3 { */
            /* margin: 0.5rem 0; */
            /* font-size: 1.2rem; */
            /* } */

            /* .product-page .product p { */
            /* margin-bottom: 1rem; */
            /* } */

            /* .product-page .product span { */
            /* font-size: 1.5rem; */
            /* color: #4d4d4d; */
            /* font-weight: bold; */
            /* } */

            /* Responsive product page */
            @media (max-width: 768px) {
                .product-page .product {
                    flex-basis: calc(50% - 2rem);
                }

                @media (max-width: 576px) {
                    .product-page .product {
                        flex-basis: 100%;
                    }
                }
            }
        }
    </style>

</head>
<body>
    <header>
        <?php include 'navbar.php';?>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-title">
                        <h2>Our Products</h2>
                    </div>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                $query ="SELECT * FROM `products` where product_status='1' AND product_category='$product_category'";
           //     $query ="SELECT * FROM `products` where product_status='1'";

                $result = $conn->query($query);

                if($result->num_rows > 0)
                {
                    while ($row = $result->fetch_assoc()){
                        $name=$row['product_name'];
                        $qty=$row['product_quantity'];
                        $price=$row['product_price'];
                        $image = base64_encode($row['product_image']);
                        ?>
                        <div class="product-grid">
                            <div class="product">

                                <a href="productdetails.php?id=<?php echo $row['id']; ?>"> <img src="data:image/png;base64,<?php echo $image; ?>" class="card-img-top" alt="Product Image"></a>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $name; ?></h5>
                                    <p class="card-text">Qty:<?php echo $qty; ?></p>
                                    <p class="card-text text-success">Price:<?php echo $price; ?></p>
<!--                                    <form method="post">-->
<!--                                        <input type="hidden" name="id" value="--><?php //echo $row['id']; ?><!--" id="id">-->
<!--                                        <button class="btn btn-danger mt-3 btn-sm link"><i>Add to Cart</i> </button>-->
<!--                                    </form>-->

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
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </main>


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

