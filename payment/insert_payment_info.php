<?php
include "../connect.php";

if (
    isset($_POST["userId"]) &&
    isset($_POST["senderName"]) &&
    isset($_POST["paymentTypeId"]) &&
    isset($_POST["accountNumber"]) &&
    isset($_POST["amount"]) &&
    isset($_POST["phoneNumber"]) &&
    isset($_POST["remittanceNumber"])

) {
    $user_id = filterRequest("userId");
    $senderName = filterRequest("senderName");
    $paymentTypeId = filterRequest("paymentTypeId");
    $accountNumber = filterRequest("accountNumber");
    $amount = filterRequest("amount");
    $phoneNumber = filterRequest("phoneNumber");
    $remittanceNumber = filterRequest("remittanceNumber");

    $data = array(
        "user_id_pay" => $user_id,
        "pay_type_id" => $paymentTypeId,
        "sender_name" => $senderName,
        "account_number" => $accountNumber,
        "amount" => $amount,
        "phone_number" => $phoneNumber,
        "remittance_number" => $remittanceNumber,
    );
    $count = insertData("payment_method", $data, true);
} else {
    echo json_encode(array("status" => "you have to send all the requests"));
}
