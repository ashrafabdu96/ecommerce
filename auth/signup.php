<?php
include "../connect.php";
$userName = filterRequest('username');
$email = filterRequest('email');
$password = sha1($_POST['password']);
$phone = filterRequest('phone');
$verifyCode = rand(10000, 99999);
$stmt = $con->prepare("SELECT * from `users` where `users_email`=? or `users_phone`=?");
$stmt->execute(array($email, $phone));
$count = $stmt->rowCount();
if ($count > 0) {
    jsonStatusMessage("fail", $message = "phone or email is exist");
} else {
    $data =  array(
        "users_name" => $userName,
        "users_email" => $email,
        "users_phone" => $phone,
        "password" => $password,
        "users_verifycode" => $verifyCode,
    );
    sendMail($email, "Verify Code E-Commerce test",
     "Your VerifyCode is $verifyCode");
    $cont = insertData("users", $data);
}
