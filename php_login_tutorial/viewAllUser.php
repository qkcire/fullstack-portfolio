<?php

require 'config.php';
include 'layout/header.php';

    
    $conn = connection();
    $sql = "SELECT id, email, mobile FROM users";
    $retval = mysqli_query($conn, $sql);
    
    if (!$retval) {
        echo 'SOMETHING WENT WRONG::  '.mysqli_error($conn);
        disconnect($conn);
    }
    echo "<h2>List of all users</h2>";
    echo "<table border='1'><tr><th>User ID</th><th>Email</th><th>Mobile Number</th></tr>";
    while($row = mysqli_fetch_array($retval, 1)) {
        echo "<tr><td>".$row['id']."</td><td>".$row['email']."</td><td>".$row['mobile']."</td></tr>";
    }
    echo "</table>";

include 'layout/footer.php';
?>
