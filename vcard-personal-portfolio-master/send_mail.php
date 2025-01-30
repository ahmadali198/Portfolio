
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["fullname"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; 
    $mail->SMTPAuth   = true;
    $mail->Username   = 'myidaliahmad321@gmail.com'; // Replace with your Gmail
    $mail->Password   = 'azbq nwzz ebez yaxa'; // Use an App Password
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;
    $mail->setFrom($email, $name);
    $mail->addAddress('myidaliahmad321@gmail.com'); // Recipient email
    $mail->Subject = "New Message from $name";
    $mail->Body = $message;

    if ($mail->send()) {
        // Display professional message to the user
        echo "<div class='confirmation-message' style='background: linear-gradient(to bottom right, hsl(45, 100%, 71%) 0%, hsla(36, 100%, 69%, 0) 50%); color: #2c6b2f; padding: 20px; border: 1px solid #2c6b2f; text-align: center; border-radius: 8px;'>
        <p>Thank you for reaching out, $name. We have received your message and will get back to you shortly regarding your service request or quotation. We appreciate your interest in our services!</p>
      </div>";

    } else {
        echo "Message could not be sent.";
    }
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}
} else {
http_response_code(405);
echo "Method Not Allowed";
}
?>

