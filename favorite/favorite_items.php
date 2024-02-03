<?php
include "../connect.php";
if (isset($_POST['userId'])) {
    if ($_POST['userId'] != null) {
        $user_id = filterRequest("userId");
        $stmt = $con->prepare(
            "SELECT
`users`.`users_name`,`users`.`users_id`,
`items`.*
FROM `users`,`favorite`,`items`
WHERE 
`users`.`users_id`=`favorite`.`users_fav_id`AND
`items`.`items_id`=`favorite`.`item_fav_id` AND
`favorite`.`users_fav_id`=? ;"
        );
        $stmt->execute(array($user_id));
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() > 0) {
            echo json_encode(array("status" => "success", "data" => $data));
        } else {
            echo json_encode(array("status" => "fail"));
        }
    } else {
        echo json_encode(array("status" => "the value of any request cant be empty"));
    }
} else {
    echo json_encode(array("status" => "you have to send all the requests"));
}
