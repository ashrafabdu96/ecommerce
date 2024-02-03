<?php
include "../connect.php";

date_default_timezone_set("Asia/Aden");
$today = date("Y-m-d H:i:s");
// echo $today;
$responseArray = array();

$responseArray['status'] = "success";
$stmt = $con->prepare("SELECT CASE WHEN max(nvl(`order`.`order_id`,0)+1) is null THEN 1 
ELSE max(nvl(`order`.`order_id`,0)+1)
END as orderId FROM `order`;");
$stmt->execute();
$orderId = $stmt->fetchColumn();
if (
    isset($_POST["userId"]) &&
    isset($_POST["orderDetails"])
) {
    if (
        $_POST['userId'] != null &&
        $_POST['orderDetails'] != null
    ) {
        $userId = filterRequest('userId');
        $total = filterRequest('total');

        $jsonOrder = $_POST["orderDetails"];

        ///inser into head table order 
        $orderData = [
            "order_id" => $orderId,
            "user_id_order" => $userId,
            "total" => $total
        ];
        try {
            $responseArray['order'] = insertDataTwo('`order`', $orderData, true);
            // echo '**********************************';
            //******************************************* */
            ///inser into details table order 
            $j = file_get_contents('php://input');
            $jsondata = json_decode($jsonOrder);
            $arrayData = array();
            foreach ($jsondata as $key => $arrays) {

                foreach ($arrays as $array) {
                    $arrayData = $arrays;
                    (array)$array->order_id = $orderId;
                    // print_r((array)$array->item_id_order);
                    // print_r($userId);

                    $responseArray['orderDetails'] = insertDataTwo("order_details", (array)$array, true);
                    $item_id = $array->item_id_order;
                    // echo ' {' . $item_id . '}';
                    //***** after add an order delete from cart */                    
                    $deleteFromCart = $con->prepare("DELETE FROM `cart` WHERE `users_cart_id` =$userId and `item_cart_id`=$item_id");
                    $deleteFromCart->execute();
                    //******************************************* */
                }
            }
            echo json_encode($responseArray);
        } catch (Exception) {
        }
    } else {
        echo json_encode(array("status" => "the value of any request cant be empty"));
    }
} else {
    echo json_encode(array("status" => "you have to send all the requests"));
}
   // $stmt2 = $con->prepare("INSERT INTO `order` ( order_id,user_id_order) VALUES( ?,?)");
        // $stmt2->execute(
        //     array($orderId, $userId)
        // );

        // if ($stmt2->rowCount() > 0) {
        //     echo json_encode(array('status' => 'success'));
        // } else {
        //     echo json_encode(array('status' => 'success'));
        // }
