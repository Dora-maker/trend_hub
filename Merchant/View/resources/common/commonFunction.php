<?php


// Token function 
function getToken($length) {
    $character = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    $randomString = "";

    for ($i=0; $i < $length; $i++) { 
        $index = rand(0, strlen($character) - 1);
        $randomString .= $character[$index];
    }

    return $randomString;
}

// Verify email token function 
function getVerifyEmailToken($length = 4) {
    $character = "0123456789";
    $randomString = "";

    for ($i=0; $i < $length; $i++) { 
        $index = rand(0, strlen($character) - 1);
        $randomString .= $character[$index];
    }

    return $randomString;
}






?>