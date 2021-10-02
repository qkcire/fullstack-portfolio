<?php
require 'config.php';
include 'layout/header.php';

$email = $enaukErr="";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $POST['email'];
    $key = md5($email);
    $conn = connection();
    $sql = "SELECT id FROM users WHERE email='$email'";
    $retval = mysqli_query($conn, $sql);
    
    $flag = 0;
    while($row = mysqli_fetch_array($retval, 1)) {
        $flag = 1;
    }
    if ($flag == 1) {
        
    } else {
        echo "Email note matched in database";
    }
}
?>

<html>
    <body>
        <form action='' method='POST'>
            Enter your email : <input type="email" name ="email" required><br>
            <input type='submit' value='Send Email'>
        </form> 
    </body>
</html>