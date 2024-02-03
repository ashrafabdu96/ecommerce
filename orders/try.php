<?php

$posted_data = array();
$json = $_POST['json'];
$data = json_decode($json, true);
$posted_data = $data;
foreach ($posted_data as $val) {
    foreach ($val as $key => $value) {
        $k[] = $key;
        $v[] = $value;
    }
}
$k1 = implode(",", $k);
$v1 = implode(",", $v);
echo "$k1 \n $v1";
// echo $v1;

// echo $data[0];

// // $posted_data =
// //     json_encode($json);
// // print_r($posted_data);

// // echo $posted_data;
// $posted_data = serialize($posted_data);
// // JSON
// $json = JSON_stringify($posted_data);

// $posted_data = json_encode($json);
// $posted_data = unserialize($posted_data);


// print_r($posted_data);
// for ($i = 0; $i < $data->count(0); $i++) {
//     echo $i;
//     // print($data[$i]);
// }
// foreach ($data as $key => $value) {
//     $k[] = $key;
//     $v[] = "'" . $value . "'";
// }
// $k1 = implode(",", $k);
// $v1 = implode(",", $v);
// echo $k1;
print_r($posted_data);
/**
include "../connect.php";
$stmt = $con->prepare("SELECT max(nvl(`order`.`order_id`,0)+1) FROM `order`;");
$stmt->execute();
$data = $stmt->fetchColumn();
// echo $data;
date_default_timezone_set("Asia/Aden");
$today = date("Y-m-d H:i:s");


// echo $today;



if (isset($_POST['userId'])) {

    $userId = filterRequest('userId');
    $orderData = array(
        "order_id" => $data,
        "user_id_order" => $userId,
        "order_date" => $today,
        "ship_id" => null
    );
    foreach ($orderData as $key => $value) {
        $k[] = $key;
        $v[] = "'" . $value . "'";
    }
    $k1 = implode(",", $k);
    $v1 = implode(",", $v);
    echo $k1;
}
 **/
//     $insertdata = $con->prepare("INSERT INTO `order` (`order_id`, `user_id_order`, `order_date`, `ship_id`)
//  VALUES ('$data', '$userId', '$today', NULL);");
//     $insertdata->execute();
//     if ($insertdata->rowCount() > 0) {
//         echo json_encode(array("status" => "Success"));
//     } else {
//         echo json_encode(array("status" => "fail"));
//     }
// }

// $c = insertData("order", $orderData, false);