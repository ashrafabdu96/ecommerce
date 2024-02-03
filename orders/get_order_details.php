<?php
include "../connect.php";



if (isset($_POST['orderId'])
    //  && isset($_POST['userId'])
) {

    if (
        $_POST['orderId'] != null
        // && $_POST['userId'] != null
    ) {
        $orderId = filterRequest('orderId');
        $stmt = $con->prepare('SELECT `order_details`.*,`items`.`items_image` FROM `order_details`,`items`
        where `items`.`items_id`=`order_details`.`item_id_order` and `order_details`.`order_id`=?;');
        $stmt->execute(array($orderId));
        $count = $stmt->rowCount();
        if ($count > 0) {
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode(array("status" => "success", "data" => $data));
        } else {
            echo json_encode(array("status" => "failure"));
        }
    } else {
        echo json_encode(array("status" => "the value of any request cant be empty"));
    }
} else {
    echo json_encode(array("status" => "you have to send all the requests"));
}
