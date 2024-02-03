<?php

// include "../connect.php";

// if (isset($_POST["items_id"])) {
//     if ($_POST["items_id"] != null) {
//         $items_id = filterRequest("items_id");
//         getAllData("all_items", "items_id=?", array($items_id), false, true);
//     } else {
//         echo json_encode(array("status" => "the value of any request cant be empty"));
//     }
// } else {
//     echo json_encode(array("status" => "you have to send all the requests"));
// }

include "../connect.php";

if (isset($_POST["items_id"])) {
    if ($_POST["items_id"] != null) {
        $items_id = filterRequest("items_id");
        $userId = filterRequest('userId');
        $stmt = $con->prepare(
            "SELECT `e_commerce`.`items`.*,
case when (select `e_commerce`.`cart`.`item_cart_id`
 from (`e_commerce`.`cart` join `e_commerce`.`users`) 
 where `e_commerce`.`items`.`items_id` = `e_commerce`.`cart`.`item_cart_id`
  and `e_commerce`.`users`.`users_id` = `e_commerce`.`cart`.`users_cart_id`
and `e_commerce`.`cart`.`users_cart_id`=$userId) is null then 'notInCart' else 'inCart' end AS `isInCart`,
case when (select `e_commerce`.`favorite`.`item_fav_id`
 from (`e_commerce`.`favorite` join `e_commerce`.`users`) 
 where `e_commerce`.`items`.`items_id` = `e_commerce`.`favorite`.`item_fav_id`
  and `e_commerce`.`users`.`users_id` = `e_commerce`.`favorite`.`users_fav_id`
and `e_commerce`.`favorite`.`users_fav_id`=$userId) is null then 'notInFav' else 'inFav' end AS `isInFav`,

  (SELECT DISTINCT `reviews`.`stars` FROM (`reviews` JOIN`users`)
  WHERE `reviews`.`item_id_review`=`e_commerce`.`items`.`items_id` 
   AND `reviews`.`user_id`=`users`.`users_id` AND `users`.`users_id`=$userId ) AS stars,
   (SELECT  round(AVG(`reviews`.`stars`),1) as avg_rating
FROM `reviews`
GROUP BY `reviews`.`item_id_review`
 HAVING `reviews`.`item_id_review`=`e_commerce`.`items`.items_id 
)as public_rating

 from `e_commerce`.`items` where `e_commerce`.`items`.`items_id`=?;"
        );
        $stmt->execute(array($items_id));
        if ($stmt->rowCount() > 0) {
            $items = $stmt->fetch(PDO::FETCH_ASSOC);

            echo json_encode(array('status' => 'success', 'data' => $items));
        }








        // getAllData("all_items", "items_id=?", array($items_id), false, true);






    } else {
        echo json_encode(array("status" => "the value of any request cant be empty"));
    }
} else {
    echo json_encode(array("status" => "you have to send all the requests"));
}
