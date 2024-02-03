<?php

include "../connect.php";
if (isset($_POST['itemId'])) {
    $itemId = filterRequest('itemId');

    $getItemReviews = $con->prepare(" SELECT
                        `reviews`.`stars`,
                        `reviews`.`content`,
                        `users`.`users_name`
                        FROM `reviews`,`users`
                        WHERE `users`.`users_id`=`reviews`.`user_id` 
                        AND
                        `reviews`.`item_id_review`=?;");
    $getItemReviews->execute(array($itemId));
    $data = $getItemReviews->fetchAll(PDO::FETCH_ASSOC);
    if ($getItemReviews->rowCount() > 0) {
        echo json_encode(array("status" => "success", "data" => $data));
    } else {
        echo json_encode(array("status" => "fail"));
    }
}
