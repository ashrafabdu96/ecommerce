<?php
include '../connect.php';
$jsonMessage = array();

if (isset($_POST["itemId"]) && isset($_POST["userId"])) {
    $itemId = filterRequest("itemId");
    $userId = filterRequest("userId");

    $checkIfBoughStmt = $con->prepare("SELECT item_name_order
     FROM `order_details`,
     `order` WHERE `order`.`order_id`=`order_details`.`order_id` AND
     `order`.`user_id_order`=? AND `order_details`.`item_id_order`=?;");
    $checkIfBoughStmt->execute(array($userId, $itemId));
    $data = $checkIfBoughStmt->fetch(PDO::FETCH_ASSOC);
    if ($checkIfBoughStmt->rowCount() > 0) {
        $jsonMessage["status"] = "Bought";
        $jsonMessage["message"] = null;




        if (isset($_POST["stars"]) && isset($_POST["content"])) {
            $stars = filterRequest('stars');
            $content = filterRequest('content');
            $data = array(
                "stars" => $stars,
                "content" => $content,
                "item_id_review" => $itemId,
                "user_id" => $userId
            );
            $checkIfReviewedByUserStmt = $con->prepare("SELECT `reviews`.`id` FROM `reviews`  
                WHERE `reviews`.`user_id`=? AND `reviews`.`item_id_review`=?;");
            $checkIfReviewedByUserStmt->execute(array($userId, $itemId));
            if ($checkIfReviewedByUserStmt->rowCount() > 0) {
                $count = updateData('reviews', $data, "`reviews`.`user_id`=$userId AND `reviews`.`item_id_review`=$itemId", false);
                if ($count > 0) {
                    $jsonMessage["message"] = "review updated";
                }
            } else {
                $count =  insertData('`reviews`', $data, false);
                if ($count > 0) {
                    $jsonMessage["message"] = "review inserted";
                }
            }
            //we will do select  if the is it reviewed we will do update else insert


        }

        echo json_encode($jsonMessage);
    } else {
        echo json_encode(array("status" => "notBought"));
    }
} else {
    echo json_encode(array("status" => "you have to send all the requests"));
}
