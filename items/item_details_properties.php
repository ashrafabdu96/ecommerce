<?php
include "../connect.php";

if (isset($_POST["items_id"])) {
    if ($_POST["items_id"] != null) {
        $items_id = filterRequest("items_id");
        $stmt = $con->prepare("SELECT item_configuration.image_name,
colors_options.color_value,
colors_options.color_name,
size_options.size_value
FROM
size_options,
colors_options,
item_configuration
where
item_configuration.color_option_id=colors_options.id and 
item_configuration.size_option_id=size_options.id and 
item_configuration.item_id_config=?;");
        $stmt->execute(array($items_id));
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() > 0) {
            echo json_encode(array("status" => "success", "data" => $data));
        } else {
            echo json_encode(array("status" => "fail"));
        }
    } else {
        echo json_encode(array("status" => "the value of any request cant be empty"));
    }
} else {
    echo json_encode(array("status" => "you have to send all the requests"));
}
