<?php
include "../connect.php";

if (
    isset($_POST["userId"]) &&
    isset($_POST["firstName"]) &&
    isset($_POST["secondName"]) &&
    isset($_POST["lastName"]) &&
    isset($_POST["addressId"]) &&
    isset($_POST["neighborhood"]) &&
    isset($_POST["nearestPlace"]) &&
    isset($_POST["streetName"]) &&
    isset($_POST["phoneNumber"])



) {
    if (
        $_POST["userId"] != null && $_POST["firstName"] != null &&
        $_POST["secondName"] != null && $_POST["lastName"] != null &&
        $_POST["addressId"] != null && $_POST["neighborhood"] != null &&
        $_POST["nearestPlace"] != null && $_POST["streetName"] != null &&
        $_POST["phoneNumber"] != null
    ) {
        $user_id = filterRequest("userId");
        $first_name = filterRequest("firstName");
        $second_name = filterRequest("secondName");
        $last_name = filterRequest("lastName");
        $address_id = filterRequest("addressId");
        $neighborhood = filterRequest("neighborhood");
        $nearest_place = filterRequest("nearestPlace");
        $street_name = filterRequest("streetName");
        $pone_number = filterRequest("phoneNumber");

        $data = array(
            "user_id" => $user_id,
            "first_name" => $first_name,
            "second_name" => $second_name,
            "third_name" => $last_name,
            "address_id" => $address_id,
            "Neighborhood" => $neighborhood,
            "nearest_place" => $nearest_place,
            "street_name" => $street_name,
            "phone_number" => $pone_number
        );
        updateData("user_address", $data, "user_id=$user_id");
        // if ($count > 0) {
        //     jsonStatusMessage("success", "inerted", false);
        // } else {
        //     jsonStatusMessage("fail", "failed insertion", false);
        // }
    } else {
        echo json_encode(array("status" => "the value of any request cant be empty"));
    }
} else {
    echo json_encode(array("status" => "you have to send all the requests"));
}
