<?php
require 'config.php';
include 'layout/header.php';
$uname = $password = $unameErr = $passErr = "";
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $uname = $_POST['uname'];
    $password = $_POST['password'];
    if(empty($uname)) {
        $unameErr = "Username is required";
    }
    if (empty($password)) {
        $passErr = "password is required";
    }
    if ($unameErr=="" && $passErr=="") {
        if($uname == "test" && $password == "12345") {
            $loginSuccessUrl = $base_url.'loginSuccessPage.php';
            header('Location: '.$loginSuccessUrl);
        } else {
            echo "Username or password is incorrect";
        }
    }
}

?>

<html>
    <body>
        <form action="" method="POST">
            Enter your username: <input type="text" name="uname" value=<?php echo $uname; ?>> <?php echo $unameErr; ?><br>
            Enter your username: <input type="password" name="password" value=<?php echo $password; ?>><?php echo $passErr?><br>
            <input type="submit" value="submit">
        </form>
    </body>
</html>

<?php
include 'layout/footer.php';
?>