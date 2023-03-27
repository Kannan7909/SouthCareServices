<?php

$conn = new mysqli("localhost", "root", "", "southcareservice");
if($conn->connect_error){
    die("<h1>Database connection failed");   
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$message = mysqli_real_escape_string($conn, $message);

$sql = "INSERT INTO contact (name, phone, email, subject, message) VALUES ('$name','$phone','$email','$subject','$message')";
$result = mysqli_query($conn, $sql);
$insertId = mysqli_insert_id($conn);

if($result){
    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'mail.southcareserviceuk.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'admin@southcareserviceuk.com';                     //SMTP username
        $mail->Password   = '}vrF_gNE[MTA';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('admin@southcareserviceuk.com', 'South Care Services Ltd');
        $mail->addAddress("kannanaa21@gmail.com");              //info@southcareserviceuk.com
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "South Care Services Ltd- Contact Submission";
        $mail->Body    = "Name : $name <br> Phone : $phone <br> Email : $email <br> Subject : $subject <br> Message : $message";
    
        if($mail->send()){
            echo 1;
        }
        
    } catch (Exception $e) {
        echo 0;
    }
}
else{
    echo 0;
}


?>