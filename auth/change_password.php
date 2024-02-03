<?php
include "../connect.php";


if (
    isset($_POST['oldPassword']) &&
    isset($_POST['newPassword']) &&
    isset($_POST['email'])

) {
    if (
        $_POST['email'] != null &&
        $_POST['oldPassword'] != null &&
        $_POST['newPassword'] != null
    ) {
        $email = filterRequest('email');
        $oldPassword = sha1($_POST['oldPassword']);
        $newPassword = sha1($_POST['newPassword']);
        $stmt = $con->prepare("SELECT `users`.`password` FROM `users` WHERE `users`.`users_email`=? and `users`.`password`=? ");
        $stmt->execute(array($email, $oldPassword));
        $password = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() > 0) {
            $data = array(
                "password" => $newPassword
            );
            updateData("`users`", $data, "users_email='$email'");
        } else {
            echo json_encode(array('status' => "old password is Error"));
        }
    } else {
        echo json_encode(array("status" => "the value of any request cant be empty"));
    }
} else {
    echo json_encode(array("status" => "you have to send all the requests"));
}
