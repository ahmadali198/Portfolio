
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; 
    $mail->SMTPAuth   = true;
    $mail->Username   = 'myidaliahmad321@gmail.com'; // Replace with your Gmail
    $mail->Password   = 'azbq nwzz ebez yaxa'; // Use an App Password
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom($_POST['email'], $_POST['fullname']);
    $mail->addAddress('myidaliahmad321@gmail.com'); // Your receiving email

    $mail->Subject = "New Contact Form Message from " . $_POST['fullname'];
    $mail->Body    = "Name: " . $_POST['fullname'] . "\nEmail: " . $_POST['email'] . "\n\nMessage:\n" . $_POST['message'];

    $mail->send();
    echo "success";
} catch (Exception $e) {
    echo "Error: {$mail->ErrorInfo}";
}
?>
