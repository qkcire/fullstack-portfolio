<?php

require 'config.php';
include 'layout/header.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    
    $conn = connection();
    $password = md5($password);
    $sql = "INSERT INTO `users` (`id`, `email`, `mobile`, `password`, `forgot_password_code`) VALUES ('0', '$email', '$mobile', '$password', 'null')";
    $retval = mysqli_query($conn, $sql);
    
    if (!$retval) {
        echo 'SOMETHING WENT WRONG::  '.mysqli_error($conn);
        disconnect($conn);
    } else {
        echo "User registered successfully.";
        disconnect($conn);
        exit();
    }
}

?>

<html>
    <body>
        <form action="" method="POST">
            Enter your email: <input type="email" name="email"><br>
            Enter your mobile #: <input type="number" name="mobile"><br>
            Enter your password: <input type="password" name="password"><br>
            <input type="submit" value="submit">
        </form>
    </body>
</html>
<?php

include 'layout/footer.php';