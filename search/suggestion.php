<?php
include '../connect.php';
$stmt = $con->prepare(
    "SELECT `items`.`items_id`,
                            `items`.`items_name`,   
                            `items`.`items_name_ar`,
                            `items`.`items_description`,
                            `items`.`items_description_ar`,
                            `items`.`items_image`,
                            `items`.`items_price`,
                            `items`.`items_discount`
                            from `items`;"
);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
if ($stmt->rowCount() > 0) {
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "not found", "data" => ['Not Found']));
}

// xohaf24031@prolug.com