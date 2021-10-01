<?php

require 'config.php';
session_start();
//$login = $base_url.'login.php';

if(!isset($_SESSION['is_logged_in'])) {
    echo "login first";
    include 'login.php';
} else {
    unset($_SESSION['is_logged_in']);
    echo "Logged out successful";
    include 'login.php';
    session_destroy();
}
