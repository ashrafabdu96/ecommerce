<?php
include "../connect.php";

if (isset($_POST['cartQuantity'])) {
    if ($_POST['cartQuantity'] != null) {
        $cartQuantity = filterRequest('cartQuantity');
        $itemId = filterRequest('itemId');

        $data = array(
            "quantity" => $cartQuantity
        );
        updateData('cart', $data, "cart.item_cart_id=$itemId");
    } else {
        echo json_encode(array("status" => "the value of any request cant be empty"));
    }
} else {
    echo json_encode(array("status" => "you have to send all the requests"));
}
