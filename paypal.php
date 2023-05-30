<?php //global $conn;
//session_start();
//include 'connect.php';
//include 'navbar.php';?>
<!---->
<?php
//if (!empty($_SESSION['pay'])) {
//$id= $_SESSION['pay'];
//}
//if (!empty($_SESSION['order_id'])) {
//    $id = $_SESSION['order_id'];
//    $query = "SELECT * FROM deleveryform WHERE a_id = '$id'";
//    $result = mysqli_query($conn, $query);
//    $row = mysqli_fetch_array($result);
//    $fullname = $row['fullname'];
//    $mobile = $row['mobile'];
//    $pincode = $row['pincode'];
//    $state = $row['state'];
//    $city = $row['city'];
//    $address1 = $row['address1'];
//    $address2 = $row['address2'];
//    $place = $row['place'];
//}
//?>
<!---->
<!--<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="buyCredits" name="buyCredits">-->
<!---->
<!--    <input type="hidden" name="cmd" value="_xclick"/>-->
<!--    <input type="hidden" name="business" value="sb-47qs7d26041652_api1.business.example.com"/>-->
<!---->
<!--    <input type="hidden" name="cmd" value="_xclick"/>-->
<!---->
<!--    <input type="hidden" name="amount" value="--><?php //$pay = $_SESSION['pay']; echo $pay ?><!--">-->
<!--    <input type="hidden" name="currency_code" value="IND"/>-->
<!---->
<!--    <input type="hidden" name="return" value="http://localhost:63342/64bitstore/success.php?id=--><?php //echo $id;?><!--"/>-->
<!--</form>-->
<!--<script type="text/javascript">-->
<!--    document.getElementById("buyCredits").submit();-->
<!--</script>-->

<?php
global $conn;
session_start();
include 'connect.php';
include 'navbar.php';

if (!empty($_SESSION['pay'])) {
    $id = $_SESSION['pay'];
}

if (!empty($_SESSION['order_id'])) {
    $id = $_SESSION['order_id'];
    $query = "SELECT * FROM deleveryform WHERE a_id = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $fullname = $row['fullname'];
    $mobile = $row['mobile'];
    $pincode = $row['pincode'];
    $state = $row['state'];
    $city = $row['city'];
    $address1 = $row['address1'];
    $address2 = $row['address2'];
    $place = $row['place'];
}
?>


<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="buyCredits" name="buyCredits">
    <input type="hidden" name="cmd" value="_xclick"/>
    <input type="hidden" name="business" value="sb-47qs7d26041652_api1.business.example.com"/>
    <input type="hidden" name="cmd" value="_xclick"/>
    <input type="hidden" name="amount" value="<?php $pay = $_SESSION['pay']; echo $pay ?>">
    <input type="hidden" name="currency_code" value="IND"/>
    <input type="hidden" name="return" value="http://localhost:63342/64bitstore/success.php?id=<?php echo $id;?>"/>
</form>


<script type="text/javascript">
    document.getElementById("buyCredits").submit();
</script>
