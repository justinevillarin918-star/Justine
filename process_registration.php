<?php

require 'cryptograph_process.php';



$jsonData = file_get_contents('users.json');
$data = json_decode($jsonData, true);


    $fullname = ($_POST['fullname']);
    $civilstatus = encryptionData($_POST['civilstatus']);
    $phonenumber = encryptionData($_POST['phonenumber']);
    $regUsername = $_POST['username'];
    $regPassword = $_POST['password'];
    $regEmail = encryptionData($_POST['email']);
    $confirm_password = $_POST['confirm_password'];
    

    //user validation
    foreach($data['users'] as $users){
        if($users['username'] === $regUsername){
            die("Username already exist!");
        }
    }

    //strong password policy
    if
    (
        strlen($regPassword) < 8 || //string length
        !preg_match("/[A-Z]/", $regPassword) ||//upper case
        !preg_match("/[a-z]/", $regPassword) || //lower case
        !preg_match("/[0-9]/", $regPassword) || //number
        !preg_match("/[\W]/", $regPassword) //special chars
    )
    {
        die("Password doesn't meet security requirements!");
    };

    //confirmation of password
    if($regPassword !== $confirm_password){
        die("Password do not match!");
    };

    //password hash
    $hashedPass = password_hash($regPassword, PASSWORD_DEFAULT);

    $data['users'][] = [
        'fullname' => $fullname,
        'civilstatus' => $civilstatus,
        'phonenumber' => $phonenumber,
        'username' => $regUsername,
        'email' => $regEmail,
        'password' => $hashedPass
    ];

    file_put_contents('users.json', json_encode($data, JSON_PRETTY_PRINT));

    echo "Registration complete!";

?>

<a href="login.php">Click here!</a>