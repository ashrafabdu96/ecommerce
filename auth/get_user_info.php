<?php

include "../connect.php";


if (isset($_GET['userId'])) {
    if ($_GET['userId'] != null) {
        $userId = $_GET['userId'];
        $stmt = $con->prepare("SELECT users_id as userId ,
        users_name as userName,
        users_email as userEmail,
        users_phone as userPhone,
        users_image as imageUrl
         from users where users_id=$userId");

        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() > 0) {
            $data['status'] = "success";
            echo json_encode($data);
        } else {
            echo json_encode(array("status" => "Fail"));
        }
    }
}
