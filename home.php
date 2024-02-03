<?php
include "connect.php";

$allData = array();

$allData['status'] = "success";
$userId =
    filterRequest('userID');
//with sale
$stmt
    =  getItems("`e_commerce`.`items`.`items_discount`!=0");
$stmt->execute(array($userId, $userId));
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
/******* */

$categories = getAllData("categories", null, null, true, false);

// $items
// = getAllData("all_items", "items_discount!=0", null, true, false);
$stmt1 = getItems();
$stmt1->execute(array($userId, $userId));
$all_items
    =
    $stmt1->fetchAll(PDO::FETCH_ASSOC);

if ($categories != null || $items != null || $all_items != null) {
    $allData["categories"] = $categories;
    $allData["items"] = $items;
    $allData["all_items"] = $all_items;
    echo json_encode($allData);
} else {
    echo json_encode(array("status" => "failure"));
}
