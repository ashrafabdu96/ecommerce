<?php
include "../connect.php";
$allData = array();
$allData["status"] = "success";
if (isset($_POST['userId'])) {
    if ($_POST['userId'] != null) {
        $user_id = filterRequest("userId");
        $stmt = $con->prepare(
            "SELECT
            `users`.`users_name`,`users`.`users_id`,
            `cart`.`quantity` as cartQuantity,
            `items`.*
            FROM `users`,`items`,`cart`
            WHERE 
            `users`.`users_id`=`cart`.`users_cart_id`AND
            `items`.`items_id`=`cart`.`item_cart_id` AND
            `cart`.`users_cart_id`=? ;"
        );
        $stmt->execute(array($user_id));
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ///**********total price */

        $stmt1 = $con->prepare(
            " SELECT
           ROUND(SUM((`items`.`items_price`-(`items`.`items_price`*`items`.`items_discount`/100))*(`cart`.`quantity`)),0) as total
            FROM `users`,`items`,`cart`
            WHERE 
            `users`.`users_id`=`cart`.`users_cart_id`AND
            `items`.`items_id`=`cart`.`item_cart_id` AND
            `cart`.`users_cart_id`=?;"
        );
        $stmt1->execute(array($user_id));
        $total_price = $stmt1->fetch(PDO::FETCH_ASSOC);
        if ($data != null || $total_price != null) {
            $allData["data"] = $data;
            $allData["total"] = $total_price["total"];
            echo json_encode($allData);
        } else {
            echo json_encode(array("status" => "failure"));
        }
    } else {
        echo json_encode(array("status" => "the value of any request cant be empty"));
    }
} else {
    echo json_encode(array("status" => "you have to send all the requests"));
}
