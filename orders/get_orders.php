<?php
include "../connect.php";



if (isset($_POST['where'])
    //  && isset($_POST['userId'])
) {

    if (
        $_POST['where'] != null
        // && $_POST['userId'] != null
    ) {
        $whereStatment = filterRequest('where');
        // $userId = filterRequest('userId');
        $stmt = $con->prepare("SELECT * FROM `order` WHERE $whereStatment  ORDER BY `order`.`order_date` DESC");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() > 0) {
            echo json_encode(array("status" => "success", "data" => $data));
        }
        // getAllData('`order`', $whereStatment);
    } else {
        echo json_encode(array("status" => "the value of any request cant be empty"));
    }
} else {
    echo json_encode(array("status" => "you have to send all the requests"));
}
