<?php
include "../../connect.php";

$email = filterRequest("email");
$verifyCode = rand(10000, 99999);



$stmt = $con->prepare("SELECT `users`.`users_email` from `users`
 where `users`.`users_email`=?;");
$stmt->execute(array(
    $email
));

$count = $stmt->rowCount();
if ($count > 0) {

    sendMail($email, "Verify Code E-Commerce test", "Your VerifyCode is $verifyCode");
    $data = array(
        "users_verifycode" => $verifyCode,
    );
    updateData("users", $data, "users_email = '$email'", false);
    $query_data = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode(array("status" => "success", "data" => $query_data, "message" => "email checked"));
} else {
    jsonStatusMessage("fail");
}
