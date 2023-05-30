<?php global $conn;
include("connect.php");
 session_start();
$message="";
if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['user'] = $username;
    $sql = "SELECT * FROM admin_login WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("location:admin.php");
    } else {
        $message = "Invalid username or password!!";
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panle</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-1ZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/login.css">
</head>
<!--<body style="background-color: #0171d3">-->
<body>
<div class="box">
    <div class="triangle"></div>
    <h2 class="card-header">Admin Login</h2>
    <form class="container" method="post">
        <h2 style="margin-left: 15px; color: red; font-family: Arial,serif"><?php echo $message; ?></h2>
        <p><label>
                <input type="text" name="username" placeholder="username">
            </label></p>
        <p><label>
                <input type="password" name="password" placeholder="password">
            </label></p>
        <p><input type="submit" name="submit" value="Log in"></p>
    </form>
</div>
</body>
</html>