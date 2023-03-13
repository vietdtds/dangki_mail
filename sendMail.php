<?php

include('configs.php');
$conn = connectDB();
$email = $_POST['email'];
$sql = "SELECT * FROM users WHERE email = '$email'";
$stsm = $conn->query($sql);
$data = $stsm->fetch();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


if (isset($_POST["send"])) {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'vietdtds@gmail.com';
    $mail->Password = 'tbsghcuwknrlmalf';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('vietdtds@gmail.com');

    $mail->addAddress($_POST["email"]);

    $mail->isHTML(true);
    $id = $data['uid'];
    $mail->Subject = 'Xác minh tài khoản';
    $mail->CharSet['utf-8'];
    $mail->Body = "http://localhost/DANGKY/check.php?id=$id";;

    $mail->send();

    echo
    "
        <script>
        alert('Sent Successfully');
        docoment.location.href = 'index.php';
        </script>
        ";
}
