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

require("phpMailer/PHPMailer.php");

function mail_send($to, $sub, $body) {
    $mail = new PHPMailer();
    
    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'Your email address';
    $mail->Password = 'password';
    $mail->SMTSecure = 'tls';
    $mail->Port = 587;
    
    $mail->setFrom('test@gmail.com', 'Test');
    
    $mail->addADdress($to);
    
    // Email subject
    $mail->Subject = $sub;
    
    // Email body content
    $mailContent = $body;
    $mail->Body = $mailContent;
    
    if(!$mail->send()) {
        return False;
    } else {
        return TRUE;
    }
}