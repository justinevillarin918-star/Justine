<?php

session_start();

require 'cryptograph_process.php';
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

$jsonData = file_get_contents('users.json');
$data = json_decode($jsonData, true);

    $logUsername = $_POST['username'];
    $logPassword = $_POST['password'];

//authentication process
    foreach($data['users'] as &$users){
        if($users['username'] === $logUsername && password_verify($logPassword, $users['password'])){

                //generate otp - 6 digits OTP
                $otp = rand(100000, 999999);

                //storing of otp expiration to json file
                $users['otp'] = $otp;
                $users['otp_expiration'] = time() + 300;

                file_put_contents("users.json", json_encode($data, JSON_PRETTY_PRINT));

                $_SESSION['temp_user'] = $logUsername;
                $_SESSION['temp_role'] = $users['role'];

                //send email using PHPMailer
                $mail = new PHPMailer(true);
                
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'justinevillarin918@gmail.com';
                    $mail->Password = 'fjmp xesq ikhj jrov';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;

                    $mail->setFrom('justinevillarin918@gmail.com', 'Login Security');
                    $mail->addAddress(decryptionData($users['email']));

                    $mail->Subject = "Your OTP code";
                    $mail->Body = "Your login OTP code is: $otp";

                    $mail->send();

                header("Location: otp_verification.php");
                exit;
        }
    }

        echo "Invalid username or password!";

?>