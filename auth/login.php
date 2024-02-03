<?php
// include database and object files
include '../connect.php';
include_once 'user.php';

// get database connection
$db = $con;

// prepare user object
$user = new User($db);
// set ID property of user to be edited
$user->email = $_POST["email"];
$user->password = sha1($_POST["password"]);
// read the details of user to be edited
$stmt = $user->login();
if ($stmt->rowCount() > 0) {
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // create array
    if ($row["users_approve"] == 1) {
        $user_arr = array(
            "status" => "success", "data" => $row, "message" => "you have logged in"
        );
        echo json_encode($user_arr);
    } elseif ($row["users_approve"] == 0) {
        $user_arr = array("status" => "not Approved", "message" => "your account is not approved sign up again");
        echo json_encode($user_arr);
        deleteData("users", "`users_email`='$user->email'");
    }
} else {
    $check_mail = $user->checkEmail();
    if ($check_mail != true) {

        $user_arr = array(
            "status" => "fail", "message" => "you have to sign up"
        );
        echo json_encode($user_arr);
    } else {
        $user_arr = array(
            "status" => "Invalid email or Password",
            "message" => "Invalid email or Password or Not Rigstered Yet",
        );
        echo json_encode($user_arr);
    }
}
// make it json format
