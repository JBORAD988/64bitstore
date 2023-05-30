<?php
global $conn, $message;
session_start();

?>

<?php
include("connect.php");
error_reporting(0);
?>

<?php
//
//session_start();
//if (isset($_POST['login'])) {
//    $email = $_POST['email'];
//    $password = $_POST['password'];
//
//    // connect to the database
//    $email_search = "SELECT * FROM user_login WHERE email='$email'";
//    $query = mysqli_query($conn, $email_search);
//    $email_count = mysqli_num_rows($query);
//    if ($email_count) {
//        $email_pass = mysqli_fetch_assoc($query);
//        $db_pass = $email_pass['password'];
//
//        // verify the password
//        $pass_decode = password_verify($password, $db_pass);
//        if ($pass_decode) {
//            // set the session variable and redirect to the index page
//            $_SESSION['username'] = $email_pass['email'];
//            header('Location: indexlogin.php');
//            exit();
//        } else {
//            echo "Incorrect password";
//        }
//
//    } else {
//        echo "Invalid email";
//    }
//    mysqli_close($conn);
//}
//
//
//?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login and Signup </title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<!--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-1ZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>-->
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>-->
    <style>
        @media (min-width: 1200px) {
            .container, .container-lg, .container-md, .container-sm, .container-xl {
                max-width: 100%;
            }
        }
    </style>

</head>

<body>
    <?php
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $email_search = "select * from user_login where email='$email'";
        $query = mysqli_query($conn, $email_search);
        $email_count = mysqli_num_rows($query);
        if ($email_count) {
            $email_pass = mysqli_fetch_assoc($query);
            $db_pass = $email_pass['password'];

            $_SESSION['username']=$email_pass['password'];

             $pass_decode = password_verify($password, $db_pass);
            //tobe continueee
  //          if ($pass_decode)
            if ($db_pass == $password)
                {
                    echo "login successfully";
    //                ?>
                <script>
                    location.replace("index.php");
                </script>

<?php
            } else{
                echo "password incorrect";
            }

        } else {
            echo "invalid email";
        }
    }
?>



    <section class="container forms">
        <div class="form login">
            <div class="form-content">
                <header>Login</header>
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                    <div class="field input-field">
                        <input type="email" placeholder="Email" name="email" class="input">
                    </div>

                    <div class="field input-field">
                        <input type="password" placeholder="Password" name="password" class="password">
                        <i class='bx bx-hide eye-icon'></i>
                    </div>

                    <div class="form-link">
                        <a href="forgotpg.php" class="forgot-pass">Forgot
                            password?</a>
                    </div>

                    <div class="field button-field">
<!--                        <button type="login" name="login" >Login</button>-->
                        <button type="submit" name="login">Login</button>

                    </div>
                </form>

                <div class="form-link">
                    <span>Don't have an account? <a href="#" class="link signup-link">Signup</a></span>
                </div>
            </div>
        </div>

        <!-- Signup Form -->

<!--        <div class="form signup">-->
<!---->
<!--            <div class="form-content">-->
<!--                <header>Signup</header>-->
<!--                <form action="#" method="post">-->
<!--                    <div class="field input-field">-->
<!--                        <input type="email" placeholder="Email" name="email" class="input">-->
<!--                    </div>-->
<!---->
<!--                    <div class="field input-field">-->
<!--                        <input type="password" placeholder="Create password" name="password" class="password">-->
<!--                    </div>-->
<!---->
<!--                    <div class="field input-field">-->
<!--                        <input type="password" placeholder="Confirm password" name="confirmpassword" class="password">-->
<!--                        <i class='bx bx-hide eye-icon'></i>-->
<!--                    </div>-->
<!---->
<!--                    <div class="field button-field">-->
<!--                        <button>Signup</button>-->
<!--                    </div>-->
<!--                </form>-->
<!---->
<!--                <div class="form-link">-->
<!--                    <span>Already have an account? <a href="login.php" class="link login-link">Login</a></span>-->
<!--                </div>-->
<!--            </div>-->

        <div class="form signup">
            <div class="form-content">
                <header>Signup</header>
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                    <div class="field input-field">
                        <input type="email" placeholder="Email" name="email" class="input">
                    </div>
                    <div class="field input-field">
                        <input type="password" placeholder="Create password" name="password" class="password">
                    </div>
                    <div class="field input-field">
                        <input type="password" placeholder="Confirm password" name="confirmpassword" class="password">
                        <i class='bx bx-hide eye-icon'></i>
                    </div>
                    <div class="field button-field">
                        <button type="submit" name="signup">Signup</button>
                    </div>
                </form>
                <div class="form-link">
                    <span>Already have an account? <a href="login.php" class="link login-link">Login</a></span>
                </div>
            </div>
        </div>




    </section>
    <?php
    if (isset($_POST['signup'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        // $password=password_hash($_POST['password'], PASSWORD_BCRYPT);
        $confirmpassword = $_POST['confirmpassword'];




        // check if email already exists in the database
        $email_search = "SELECT * FROM user_login WHERE email = ?";
        $stmt = $conn->prepare($email_search);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $email_count = $result->num_rows;

        if ($email_count > 0) {
            echo "Email already exists!";
        } else {
    $insert_query = "INSERT INTO user_login (email, password, confirmpassword) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("sss", $email, $password, $confirmpassword);

            if ($stmt->execute()) {
                echo "Signup successful!";
            } else {
                echo "Error: " . $stmt->error;
            }
        }
    }
    ?>



    <!-- JavaScript -->
    <script src="js/script.js"></script>
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            let fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
</body>

</html>