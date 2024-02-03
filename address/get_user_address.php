<?php
include "../connect.php";

$allData = array();
if (isset($_POST["userId"])) {
    if ($_POST["userId"] != null) {
        $userId = filterRequest("userId");
        $stmt = $con->prepare(
            "SELECT DISTINCT user_address.first_name,user_address.second_name,user_address.third_name,
            user_id,
           user_address.address_id,
            user_address.Neighborhood,
            user_address.street_name,
            user_address.nearest_place,
            city.city_name,
            city.city_id as cityNumber,
            address.region,
            phone_number
            FROM `user_address`,`address`,`city`
            WHERE user_id=? AND
            user_address.address_id=address.address_id AND 
            address.city_id_address=city.city_id;"
        );
        $stmt->execute(array($userId));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        ///****cities */
        $stmt2 = $con->prepare("SELECT * FROM city;");
        $stmt2->execute();
        $citiesData = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() > 0 || $stmt2->rowCount() > 0) {
            $allData['status'] = "success";
            $allData['data'] = $data;
            $allData['cities'] = $citiesData;

            echo json_encode($allData);
        } else {
            echo json_encode(array("status" => "fail"));
        }
    } else {
        echo json_encode(array("status" => "the value of any request cant be empty"));
    }
} else {
    echo json_encode(array("status" => "you have to send all the requests"));
}
