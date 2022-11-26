<?php

session_start();

if (isset($_POST["firstname"]) && isset($_POST["lastname"])){
    $first = $_POST["firstname"];
    $lastname = $_POST["lastname"];
}

if (isset($_POST["g-recaptcha-response"])) {
    $captcha = $_POST["g-recaptcha-response"];  
}

if (!$captcha) {  // not click captcha
    $_SESSION["error"] = "มึงไม่ได้กด reCAPTCHA ไอ้เวน";
    header("location: index.php");

}else{
    $_SESSION['success'] = "สำเร็จ";
    header("location: index.php");
}

$secretKey = "secret-key";
$verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha);
$resKey = json_decode($verifyResponse,true);

?>