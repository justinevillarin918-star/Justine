<?php

// Cipher key - 32 characters maximumm for openSsl encryption/decryption library(256bits)
define('SECRET_KEY', 'my_secret_key_123456'); // 20  char

//encryption process
function encryptionData($data){
    $key = hash('sha256', SECRET_KEY);
    $iv = substr(hash('sha256', 'iv_secret'), 0, 16);

    return openssl_encrypt($data, 'AES-256-CBC', $key, 0, $iv);
}

//decryption process
function decryptionData($data){
    $key = hash('sha256', SECRET_KEY);
    $iv = substr(hash('sha256', 'iv_secret'), 0, 16);

    return openssl_decrypt($data, 'AES-256-CBC', $key, 0, $iv);
}

?>