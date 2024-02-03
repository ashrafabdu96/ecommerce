<?php
include "../connect.php";

if (isset($_FILES['image'])) {
    if ($_FILES['image'] != null) {
        $image = $_FILES["image"];
        $userId = filterRequest("userId");
        $stmt = $con->prepare("SELECT concat(`users`.`users_id`,'_',REPLACE(`users`.`users_name`, ' ', '')) as imageName,`users_image` 
        FROM `users` where `users`.`users_id`=$userId;");
        $stmt->execute();
        $userName = $stmt->fetch(PDO::FETCH_ASSOC);
        deleteFile("../upload/users_images", $userName['users_image']);
        $imageNameToDb = imageUpload('image', 'users_images', $userName["imageName"]);
        $data = array("users_image" => $imageNameToDb);

        $count =  updateData("users", $data, "users_id =$userId", false);
        if ($count > 0) {
            echo json_encode(array('status' => "success"));
        } else {
            echo json_encode(array('status' => "fail"));
        }
    } else {
        echo json_encode(array("status" => "the value of any request cant be empty"));
    }
} else {
    echo json_encode(array("status" => "you have to send all the requests"));
}



//************************************************************ */
// if (isset($_POST['imageName']) && isset($_POST['image64'])) {
//     if ($_POST['imageName'] != null && $_POST['image64'] != null) {
//         $imageName = filterRequest('imageName');
//         $image = base64_decode($_POST['image64']);
//         $userId = filterRequest("userId");



//         $stmt = $con->prepare("SELECT concat(`users`.`users_id`,'_',`users`.`users_name`) as imageName 
//         FROM `users` where `users`.`users_id`=$userId;");
//         $stmt->execute();
//         $userName = $stmt->fetch(PDO::FETCH_ASSOC);
//         $strToArray = explode(".", $imageName);
//         $extention = end($strToArray);
//         $imageName = $userName["imageName"] . '.' . $extention;
//         $data = array("users_image" => $imageName);

//         $count =  updateData("users", $data, "users_id =$userId", false);


//         if (file_put_contents("../upload/users_images/" . $imageName, $image) && $count > 0) {
//             echo json_encode(array('status' => "success"));
//         } else {
//             echo json_encode(array('status' => "fail"));
//         }
//     } else {
//         echo json_encode(array("status" => "the value of any request cant be empty"));
//     }
// } else {
//     echo json_encode(array("status" => "you have to send all the requests"));
// }
