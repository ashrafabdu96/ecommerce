<?php
include "../connect.php";

if (isset($_POST["cityIdAddress"])) {
    if ($_POST["cityIdAddress"] != null) {
        $cityId = filterRequest("cityIdAddress");
        // $data=array($cityId);
        getAllData("address", "address.city_id_address=$cityId");
    } else {
        echo json_encode(array("status" => "the value of any request cant be empty"));
    }
} else {
    echo json_encode(array("status" => "you have to send all the requests"));
}
