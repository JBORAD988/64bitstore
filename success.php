<?php global $conn;
include "navbar.php";
include "connect.php";
$order_id = $_GET['id'];

$query = "SELECT * FROM deleveryform WHERE a_id = '$order_id'";
$result = mysqli_query($conn, $query);
if ($result->num_rows>0){
    while ($rows= $result->fetch_assoc()){
        $fullname = $rows['fullname'];
        $mobile = $rows['mobile'];
        $pincode = $rows['pincode'];
        $state = $rows['state'];
        $city = $rows['city'];
        $address1 = $rows['address1'];
        $address2 = $rows['address2'];
        $place = $rows['place'];
    }
}
$query2 = "INSERT INTO orders VALUES ('', '$fullname', '$mobile', '$pincode', '$state', '$city', '$address1', '$address2', '$place')";
$conn->query($query2);
$order_id= $conn->insert_id;

foreach ($_COOKIE['item'] as $name1 => $value) {
    $values11 = explode("__", $value);

    $query3 = "INSERT INTO orderdetails VALUES ('', '$order_id', '$values11[0]', '$values11[1]', '$values11[2]', '$values11[3]', '$values11[4]', '$values11[5]')";
    $conn->query($query3);
}
echo "<script>alert('Your order has been placed successfully. Thank you')</script>";

if (!empty($_COOKIE['item']) && is_array($_COOKIE['item'])  ) {
    foreach ($_COOKIE['item'] as $name1 => $value) {
        setcookie("item[$name1]", "", time() - 1800);
    }
}
?>

<script>
    setTimeout(function () {
        window.location.href = "allproduct.php";
    }, 3000
</script>
