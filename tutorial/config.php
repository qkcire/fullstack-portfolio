<?php
$base_url = "http://localhost/tutorial/";

function connection() {
    $host = 'localhost';
    $user = 'eq';
    $password = 'root';
    $database = 'tutorial';
    $conn = mysqli_connect($host, $user, $password, $database);
    
    if (!$conn) {
        return FALSE;
    }
    
    return $conn;
}

function disconnect() {
    mysqli_close($conn);
}