<?php
require 'config.php';
include 'layout/header.php';

session_start();

if(isset($_SESSION['is_logged_in'])) {
    $loginSuccessUrl = $base_url.'loginSuccessPage.php';
    header('Location: '.$loginSuccessUrl);
}

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
        $conn = connection();
        $password = md5($password);
        $sql = "SELECT id , email , mobile FROM users WHERE email='$uname' and password='$password'";
        $retval =mysqli_query($conn, $sql);
        
        if (!$retval) {
            echo 'Something wrong:: '.mysqli_error($conn);
            disconnect($conn);
        }
        
        $flag = 0;
        while ($row = mysqli_fetch_array($retval, 1)) {
            $flag = 1;
            $_SESSION['is_logged_in'] = TRUE;
            $_SESSION['uname'] = $uname;
            
            $loginSuccessUrl = $base_url.'loginSuccessPage.php';
            header('Location: '.$loginSuccessUrl);
        }
        
        if ($flag == 0) {
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