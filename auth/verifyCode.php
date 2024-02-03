<?php
include "../connect.php";
$email = filterRequest('email');
$verifyCode = filterRequest('verifycode');

$stmt = $con->prepare("SELECT * FROM users WHERE users_email= ? and users_verifycode=? ");
$stmt->execute(array($email, $verifyCode));
$count = $stmt->rowCount();
if ($count > 0) {
    $queryData = $stmt->fetch(PDO::FETCH_ASSOC);
    $data = array(
        "users_approve" => "1"
    );
    $is_updated = updateData("users", $data, "users_email='$email'", false);
    if ($is_updated > 0) {
        echo json_encode(array("status" => "success", "data" => $queryData, "message" => "verified success"));
    } else {
        echo json_encode(array("status" => "used_before", "message" => "this verified had been used before"));
    }
} else {
    jsonStatusMessage("fail", "the verification code is wrong");
}
