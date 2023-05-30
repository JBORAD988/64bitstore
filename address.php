<?php

$servername ="localhost";
$username ="root";
$password ="";
$dbname ="64bitstore";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{
//  echo "connection ok";
}
else{
echo "error".mysqli_connect_error();}
?>
<?php
if (isset($_POST['submit'])) {
//    $a_id = $_GET['id'];
    $fullname = $_POST['fn'];
    $mobile = $_POST['mn'];
    $pincode = $_POST['pc'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $place = $_POST['place'];

    $query = "INSERT INTO deleveryform VALUES ('', '$fullname', '$mobile', '$pincode', '$state', '$city', '$address1', '$address2', '$place')";

    if (!$conn->query($query)) {
        echo "INSERT failed: (" . $conn->errno . ") " . $conn->error;
        echo "Failed to continue";
    } else {
        $a_id = $conn->insert_id;
        $_SESSION['order_id'] = $a_id;
        header("Location: http://localhost:63342/64bitstore/paypal.php");
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
    <title>Addressfild</title>
    <link rel="stylesheet" href="css/s4.css">

   
   
</head>
<body>
<!--<header>-->
<!--    --><?php //include 'navbar.php';?>
<!--</header>-->
    <h1>Add delivery address:</h1>
    <section class="s">
        <form action="" method="POST" name="addressdata">
        <div class="d1">
            <input type="text" id="i" placeholder="Full Name (Required)*" name="fn">
        </div>
        <div class="d2">
            <input type="tel" id="i" placeholder="Mobile Number (Required)*" name="mn">
        </div>
        <div class="d3">
            <div class="d31"><input type="tel" placeholder="Pincode (Required)*" name="pc"></div>
            <div class="d32">
                <img src="/image/l.png" alt="location" height="50px" width="50px">
                <button id="mylocationbutton"> my Location</button>
            </div>
        </div>
        <div class="d4">
            <div class="d41">
                <select name="state">
                    <option disabled="" selected="" hidden=""   >State (Required)*</option>
                    <option value="Gujrat">Gujarat</option>
                    <option value="maharastra">Maharastra</option>
                    <option value="Delhi">Delhi</option>
                    <option value="MP">Mp</option>
                    <option value="Kolkata">kolkata</option>
                    <option value="Rajasthan">Rajasthan</option>
                </select>
            </div>
            <div class="d42">
                <select name="city">
                    <option disabled="" selected="" hidden=""   >city (Required)*</option>
                    <option value="Ahmedabad">Ahmedabad</option>
                    <option value="Palanpur">Palanpur</option>
                    <option value="miraroad">Miraroad</option>
                    <option value="ghandhinagar">Ghandinagar</option>
                    <option value="Jogeshwari">Jogeshwari</option>
                    <option value="grandroad">Grandroad</option>
                </select>
            </div>
        </div>
        <div class="d5">
            <input type="text" placeholder="House No.,Building Name(Required)*" name="address1">
        </div>
        <div class="d6">
            <input type="text" placeholder="Road name, Area, Colony (Required)*" name="address2">
        </div>
        <div class="d7">
            <div class="d71">
                <div class="d711">
                    <img src="/image/h.png" alt="home" height="50px" width="50px">
                    <input type="checkbox"  id="home" name="place" value="home">
                    <label for="home">Home</label><br>
                    <!-- <span class="checkmark"></span> -->
                </div>
            </div>
            <div class="d72">
                <div class="d721">
                    <img src="/image/w.png" alt="work" height="50px" width="50px">
                    <input type="checkbox" name="place" value="work">
                    <label for="work">Work</label><br>
                    <!-- <span class="checkmark"></span> -->
                </div>
            </div>
        </div>
        
            <br />
            <iframe width="150" height="150" frameborder="0" scrolling="no" marginheight="0"
                marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Mumbai&amp;aq=&amp;sll=19.056545,72.853394&amp;sspn=0.010121,0.021136&amp;ie=UTF8&amp;hq=&amp;hnear=Mumbai,+Maharashtra&amp;t=m&amp;z=10&amp;ll=19.075984,72.877656&amp;output=embed">
            </iframe>
            <br />
            <small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Mumbai&amp;aq=&amp;sll=19.056545,72.853394&amp;sspn=0.010121,0.021136&amp;ie=UTF8&amp;hq=&amp;hnear=Mumbai,+Maharashtra&amp;t=m&amp;z=10&amp;ll=19.075984,72.877656"
                style="color: #0000FF; text-align: left"></a></small>
        
    </section>
    <div>
        <input type="submit" value="Save & Next" name="submit" >
    </div>
    </form>
</body>
</html>

