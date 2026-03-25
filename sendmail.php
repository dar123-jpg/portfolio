<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'muhammadyousufdar25@gmail.com';
        $mail->Password = 'myd03498927924dar'; // Gmail App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Email settings
        $mail->setFrom('muhammadyousufdar25@gmail.com', 'Website Contact');
        $mail->addAddress('muhammadyousufdar25@gmail.com'); // Where you receive messages

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Message';

        $mail->Body = "
            <h3>New Message</h3>
            <b>Name:</b> $name <br>
            <b>Email:</b> $email <br>
            <b>Message:</b> $message
        ";

        $mail->send();
        echo "Message Sent Successfully ✅";

    } catch (Exception $e) {
        echo "Error: {$mail->ErrorInfo}";
    }
}
?>
