<?php

session_start();

// Read JSON file
$jsonData = file_get_contents("users.json");
$data = json_decode($jsonData, true);

$inputOTP = $_POST['otp'];
$username = $_SESSION['temp_user'];
$role = $_SESSION['temp_role'];

foreach ($data['users'] as $user) {
    if($user['username'] === $username){

        if (time() > $user['otp_expiration']) {
            echo "OTP has expired. Please log in again.";
            die("OTP already exist!");
        }

        if ($user['otp'] == $inputOTP) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;
            unset($_SESSION['temp_user']);
            unset($_SESSION['temp_role']);
            header("Location: dashboard.php");
            exit();

        } else {
            echo "Invalid OTP. Please try again.";
        }
    }
}
?>