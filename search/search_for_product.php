<?php
include '../connect.php';


if (isset($_POST['query'])) {
    if ($_POST['query'] != null) {
        $query = filterRequest('query');
        $stmt = $con->prepare(
            "SELECT `items`.`items_id`,
                            `items`.`items_name`,   
                            `items`.`items_name_ar`,
                            `items`.`items_description`,
                            `items`.`items_description_ar`,
                            `items`.`items_image`,
                            `items`.`items_price`,
                            `items`.`items_discount`
                            from `items`
                       where upper(`items`.`items_name`) like upper('%$query%') or `items`.`items_name_ar` like '%$query%';"

        );
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() > 0) {
            echo json_encode(array("status" => "success", "data" => $data));
        } else {
            echo json_encode(array("status" => "not found", "data" => ['Not Found']));
        }
    } else {
        echo json_encode(array("status" => "not found", "data" => ['Not Found']));
    }
} else {
    echo json_encode(array("status" => "you have to send all the requests"));
}
// xohaf24031@prolug.com