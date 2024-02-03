<?php
include "../connect.php";
// $items_categories_id = filterRequest("items_categories_id");
// getAllData("all_items", "items_categories_id=?", array($items_categories_id), true);


if (isset($_POST["items_categories_id"])) {
    if ($_POST["items_categories_id"] != null) {
        $items_categories_id = filterRequest("items_categories_id");
        getAllData("all_items", "items_categories_id=?", array($items_categories_id),true ,true);
    } else {
        echo json_encode(array("status" => "the value of any request cant be empty"));
    }
} else {
    echo json_encode(array("status" => "you have to send all the requests"));
}
