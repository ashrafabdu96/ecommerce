<?php

include "../connect.php";
$stmt = $con->prepare("SELECT `items_id`,`items_name`,`items_description`,`items_date_create` from `items` where `items_id`='1' ");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt2
    = $con->prepare("SELECT items_images.items_image,items_images.items_image2,items_images.items_image3,items_images.items_image4  FROM `items` AS items_images WHERE items_images.items_id='1';");
$stmt2->execute();
$data2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
$data[1] = $data2;
$merged = array_merge($data, $data2);
echo json_encode(array("data" => $data));
