<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['Add_To_Cart'])) {
        $id = $_POST['Item_ID'];
        $name = $_POST['Item_Name'];
        $price = $_POST['Price'];

        if (isset($_SESSION['cart'])) {
            $myitems = array_column($_SESSION['cart'], 'Item_Name');
            if (in_array($name, $myitems)) {
                echo "<script>
                    alert('Item already added');
                    window.location.href='allproduct.php';
                    </script>";
            } else {
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array('Item_Name' => $name, 'Price' => $price, 'Quantity' => 1);
                echo "<script>
                    alert('Item added');
                    window.location.href='allproduct.php';
                    </script>";
            }
        } else {
            $_SESSION['cart'][0] = array('Item_Name' => $name, 'Price' => $price, 'Quantity' => 1);
            echo "<script>
                alert('Item added');
                window.location.href='index.php';
                </script>";
        }
    } elseif (isset($_POST['Remove_Item'])) {
        $name = $_POST['Item_Name'];
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['Item_Name'] == $name) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                echo "<script>
                    alert('Item removed');
                    window.location.href='mycart.php';
                    </script>";
            }
        }
    }
}
?>
