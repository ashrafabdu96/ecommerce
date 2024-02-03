<?php
include "../connect.php";
try {
    if (isset($_POST["userId"]) && isset($_POST["itemId"])) {
        if ($_POST["userId"] != null && $_POST["itemId"] != null) {
            $userId = filterRequest("userId");
            $itemId = filterRequest("itemId");
            $data = array(
                "users_cart_id" => $userId,
                "item_cart_id" => $itemId,
            );
            insertData("cart", $data);
        } else {
            echo json_encode(array("status" => "the value of any request cant be empty"));
        }
    } else {
        echo json_encode(array("status" => "you have to send all the requests"));
    }
} catch (PDOException $e) {
    if ($e->getMessage() == "SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '41-1' for key 'PRIMARY'") {
        echo json_encode(array("status" => "duplecated"));
    } else {
        echo json_encode(array("status" => "fail", "message" => "duplecated"));
    }
}
