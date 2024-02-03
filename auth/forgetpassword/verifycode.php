<?php
include "../../connect.php";
$email = filterRequest("email");
$verifyCode = filterRequest("verifycode");

$stmt = $con->prepare("SELECT * FROM users WHERE users_email= ? and users_verifycode=? ");
$stmt->execute(array($email, $verifyCode));
$count = $stmt->rowCount();
if ($count > 0) {
    jsonStatusMessage("success");
} else {
    jsonStatusMessage("fail", "the verification code is wrong");
}
