<?php



define("MB", 1048576);

function filterRequest($requestname)
{
    return  htmlspecialchars(strip_tags($_POST[$requestname]));
}

function getAllData($table, $where = null, $values = null, $isFechAll = true, $json = true)
{
    global $con;
    $data = array();
    if ($where == null) {
        $stmt = $con->prepare("SELECT  * FROM $table ");
    } else {
        $stmt = $con->prepare("SELECT  * FROM $table WHERE   $where ");
    }
    $stmt->execute($values);
    if ($isFechAll == true) {
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    $count  = $stmt->rowCount();
    if ($json == true) {
        if ($count > 0) {
            echo json_encode(array("status" => "success", "data" => $data));
        } else {
            echo json_encode(array("status" => "failure"));
        }
        return $count;
    } else {
        if ($count > 0) {
            return $data;
        } else {
            // echo json_encode(array("status" => "failure"));
        }
    }
}

function insertData($table, $data, $json = true)
{
    global $con;
    try {
        foreach ($data as $field => $v)
            $ins[] = ':' . $field;
        $ins = implode(',', $ins);
        $fields = implode(',', array_keys($data));
        $sql = "INSERT INTO $table ($fields) VALUES ($ins)";

        $stmt = $con->prepare($sql);
        foreach ($data as $f => $v) {
            $stmt->bindValue(':' . $f, $v);
        }
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($json == true) {
            if ($count > 0) {
                echo json_encode(array("status" => "success", "message" => "done", "data" => $data));
            } else {

                echo json_encode(array("status" => "failure", "message" => "fail insert"));
            }
        }
        return $count;
    } catch (PDOException $e) {
        echo json_encode(array("status" => "failureException", "message" => "$e"));
    }
}

//*********************************************** 

function insertDataTwo($table, $data, $json = true)
{
    global $con;
    try {
        foreach ($data as $field => $v)
            $ins[] = ':' . $field;
        $ins = implode(',', $ins);
        $fields = implode(',', array_keys($data));
        $sql = "INSERT INTO $table ($fields) VALUES ($ins)";

        $stmt = $con->prepare($sql);
        foreach ($data as $f => $v) {
            $stmt->bindValue(':' . $f, $v);
        }
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($json == true) {
            if ($count > 0) {
                return array("status" => "success", "message" => "done", "data" => $data);
            } else {

                return array("status" => "failure", "message" => "fail insert");
            }
        }
        return $count;
    } catch (PDOException $e) {
        echo json_encode(array("status" => "failureException", "message" => "$e"));
    }
}

//*********************************************** 





function updateData($table, $data, $where, $json = true)
{
    global $con;
    $cols = array();
    $vals = array();

    foreach ($data as $key => $val) {
        $vals[] = "$val";
        $cols[] = "`$key` =  ? ";
    }
    $sql = "UPDATE $table SET " . implode(', ', $cols) . " WHERE $where";

    $stmt = $con->prepare($sql);
    $stmt->execute($vals);
    $count = $stmt->rowCount();
    if ($json == true) {
        if ($count > 0) {
            echo json_encode(array("status" => "success", "message" => "verified success"));
        } else {
            echo json_encode(array("status" => "failure update", "message" => "verified fail"));
        }
    }
    return $count;
}

function deleteData($table, $where, $json = true)
{
    global $con;
    $stmt = $con->prepare("DELETE FROM $table WHERE $where");
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($json == true) {
        if ($count > 0) {
            echo json_encode(array("status" => "success", "message" => "deleted successfully"));
        } else {
            echo json_encode(array("status" => "fail", "message" => "error"));
        }
    }
    return $count;
}

function imageUpload($imageRequest, $fileName, $imageNameFromDataBase)
{
    global $msgError;
    // $imagename  = random_int(1000, 10000) . $_FILES[$imageRequest]['name'];
    $imagename  = $_FILES[$imageRequest]['name'];
    $imagetmp   = $_FILES[$imageRequest]['tmp_name'];
    $imagesize  = $_FILES[$imageRequest]['size'];
    $allowExt   = array("jpg", "png", "gif", "mp3", "pdf");
    $strToArray = explode(".", $imagename);
    $ext        = end($strToArray);
    $ext        = strtolower($ext);

    if (!empty($imagename) && !in_array($ext, $allowExt)) {
        $msgError = "EXT";
    }
    if ($imagesize > 2 * MB) {
        $msgError = "size";
    }
    if (empty($msgError)) {
        $newImageNem = '';
        $imagename = random_int(1000, 10000) . $imageNameFromDataBase . '.' . $ext;
        $isDone =  move_uploaded_file($imagetmp,  "../upload/" . $fileName . "/" . $imagename);
        // if ($isDone) {
        //     return true;
        // } else {
        //     return false;
        // }
        // move_uploaded_file($imagetmp,  "../upload/" . $fileName . "/" . $imagename);
        return $imagename;
    } else {
        return "fail";
    }
}



function deleteFile($dir, $imagename)
{
    if (file_exists($dir . "/" . $imagename)) {
        unlink($dir . "/" . $imagename);
    }
}

function checkAuthenticate()
{
    if (isset($_SERVER['PHP_AUTH_USER'])  && isset($_SERVER['PHP_AUTH_PW'])) {
        if ($_SERVER['PHP_AUTH_USER'] != "wael" ||  $_SERVER['PHP_AUTH_PW'] != "wael12345") {
            header('WWW-Authenticate: Basic realm="My Realm"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'Page Not Found';
            exit;
        }
    } else {
        exit;
    }

    // End 
}


function   jsonStatusMessage($status, $message = "none")
{
    echo     json_encode(array("status" => $status, "message" => $message));
}


function sendMail($to, $subject, $body)
{

    $headers = "From: ashrafabdo2052@gmail.com";
    mail($to, $subject, $body, $headers);
    // if () {
    //     // echo " email sent to $to";
    // } else {
    //     // echo "  sent failed to $to";
    // }
}

$conn = $con;
function getItems($where = null)
{
    /************************** */
    global $con;

    if ($where == null) {

        $stmt2 =
            $con->prepare("SELECT `e_commerce`.`items`.`items_id` AS `items_id`,
`e_commerce`.`items`.`items_name` AS `items_name`,
`e_commerce`.`items`.`items_name_ar` AS `items_name_ar`,
`e_commerce`.`items`.`items_description` AS `items_description`,
`e_commerce`.`items`.`items_description_ar` AS `items_description_ar`,
`e_commerce`.`items`.`items_image` AS `items_image`,
`e_commerce`.`items`.`items_image2` AS `items_image2`,
`e_commerce`.`items`.`items_image3` AS `items_image3`,
`e_commerce`.`items`.`items_image4` AS `items_image4`,
`e_commerce`.`items`.`items_date_create` AS `items_date_create`,
`e_commerce`.`items`.`items_active` AS `items_active`,
`e_commerce`.`items`.`items_count` AS `items_count`,
`e_commerce`.`items`.`items_discount` AS `items_discount`,
`e_commerce`.`items`.`items_price` AS `items_price`,
`e_commerce`.`items`.`items_categories_id` AS `items_categories_id`,
case when (select `e_commerce`.`cart`.`item_cart_id`
 from (`e_commerce`.`cart` join `e_commerce`.`users`) 
 where `e_commerce`.`items`.`items_id` = `e_commerce`.`cart`.`item_cart_id`
  and `e_commerce`.`users`.`users_id` = `e_commerce`.`cart`.`users_cart_id`
and `e_commerce`.`cart`.`users_cart_id`=?) is null then 'notInCart' else 'inCart' end AS `isInCart`,
case when (select `e_commerce`.`favorite`.`item_fav_id`
 from (`e_commerce`.`favorite` join `e_commerce`.`users`) 
 where `e_commerce`.`items`.`items_id` = `e_commerce`.`favorite`.`item_fav_id`
  and `e_commerce`.`users`.`users_id` = `e_commerce`.`favorite`.`users_fav_id`
and `e_commerce`.`favorite`.`users_fav_id`=?) is null then 'notInFav' else 'inFav' end AS `isInFav`,

(SELECT  round(AVG(`reviews`.`stars`),1) as avg_rating
FROM `reviews`
GROUP BY `reviews`.`item_id_review`
 HAVING `reviews`.`item_id_review`=`e_commerce`.`items`.items_id
)as stars
 from `e_commerce`.`items`");
        return $stmt2;
    } else {

        $stmt =   $con->prepare("SELECT `e_commerce`.`items`.`items_id` AS `items_id`,
`e_commerce`.`items`.`items_name` AS `items_name`,
`e_commerce`.`items`.`items_name_ar` AS `items_name_ar`,
`e_commerce`.`items`.`items_description` AS `items_description`,
`e_commerce`.`items`.`items_description_ar` AS `items_description_ar`,
`e_commerce`.`items`.`items_image` AS `items_image`,
`e_commerce`.`items`.`items_image2` AS `items_image2`,
`e_commerce`.`items`.`items_image3` AS `items_image3`,
`e_commerce`.`items`.`items_image4` AS `items_image4`,
`e_commerce`.`items`.`items_date_create` AS `items_date_create`,
`e_commerce`.`items`.`items_active` AS `items_active`,
`e_commerce`.`items`.`items_count` AS `items_count`,
`e_commerce`.`items`.`items_discount` AS `items_discount`,
`e_commerce`.`items`.`items_price` AS `items_price`,
`e_commerce`.`items`.`items_categories_id` AS `items_categories_id`,
case when (select `e_commerce`.`cart`.`item_cart_id`
 from (`e_commerce`.`cart` join `e_commerce`.`users`) 
 where `e_commerce`.`items`.`items_id` = `e_commerce`.`cart`.`item_cart_id`
  and `e_commerce`.`users`.`users_id` = `e_commerce`.`cart`.`users_cart_id`
and `e_commerce`.`cart`.`users_cart_id`=?) is null then 'notInCart' else 'inCart' end AS `isInCart`,
case when (select `e_commerce`.`favorite`.`item_fav_id`
 from (`e_commerce`.`favorite` join `e_commerce`.`users`) 
 where `e_commerce`.`items`.`items_id` = `e_commerce`.`favorite`.`item_fav_id`
  and `e_commerce`.`users`.`users_id` = `e_commerce`.`favorite`.`users_fav_id`
and `e_commerce`.`favorite`.`users_fav_id`=?) is null then 'notInFav' else 'inFav' end AS `isInFav`,
(SELECT  round(AVG(`reviews`.`stars`),1) as avg_rating
FROM `reviews`
GROUP BY `reviews`.`item_id_review`
 HAVING `reviews`.`item_id_review`=`e_commerce`.`items`.items_id
)as stars
 from `e_commerce`.`items` where $where;");
        return $stmt;
    }
}




// ==========================================================
//  Copyright Reserved Wael Wael Abo Hamza (Course Ecommerce)
// ==========================================================

// define("MB", 1048576);

// function filterRequest($requestname)
// {
//     return  htmlspecialchars(strip_tags($_POST[$requestname]));
// }

// function getAllData($table, $where = null, $values = null)
// {
//     global $con;
//     $data = array();
//     $stmt = $con->prepare("SELECT  * FROM $table WHERE   $where ");
//     $stmt->execute($values);
//     $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     $count  = $stmt->rowCount();
//     if ($count > 0) {
//         echo json_encode(array("status" => "success", "data" => $data));
//     } else {
//         echo json_encode(array("status" => "failure"));
//     }
//     return $count;
// }
// /*$data = array(
//     "users_name" => "wael",
//     "users_email" => "wael@gmail.com",
//     "users_phone" => "324234",
//     "users_verifycode" => "3243243",
// ); */
// function insertData($table, $data, $json = true)
// {
//     global $con;
//     foreach ($data as $field/*keys*/ => $v/*values*/)
//         $ins[] = ':' . $field; //bind vars like :users_name
//     /*( ":users_name" =>,
//     ":users_email" => ,
//     ":users_phone" => ,
//     ":users_verifycode" ,)*/
//     $ins = implode(',', $ins); //to make comma between every field
//     $fields = implode(',', array_keys($data)); //to get the coulmens that we want to insert data to
//     $sql = "INSERT INTO $table ($fields)/*(users_name,users_email...)*/ VALUES ($ins)/*:users_name,:users_phone*/";

//     $stmt = $con->prepare($sql);
//     foreach ($data as $f => $v) {
//         $stmt->bindValue(':' . "`$f`", $v);
//         //instead of execute(array(":user_name"=>"mazen"...))but here is dynamic
//         //we send the bin vars to the execute like this
//     }
//     $stmt->execute();
//     $count = $stmt->rowCount();
//     if ($json == true) {
//         if ($count > 0) {
//             echo json_encode(array("status" => "success"));
//         } else {
//             echo json_encode(array("status" => "failure"));
//         }
//     }
//     return $count;
// }


// function updateData($table, $data, $where, $json = true)
// {
//     global $con;
//     $cols = array();
//     $vals = array();

//     foreach ($data as $key => $val) {
//         $vals[] = "$val";
//         $cols[] = "`$key` =  ? ";
//     }
//     //update users set `users_name`=? ,`users_email`=?
//     //here we use placeholders
//     $sql = "UPDATE $table SET " . implode(', ', $cols) . " WHERE $where";

//     $stmt = $con->prepare($sql);
//     $stmt->execute($vals);
//     $count = $stmt->rowCount();
//     if ($json == true) {
//         if ($count > 0) {
//             echo json_encode(array("status" => "success"));
//         } else {
//             echo json_encode(array("status" => "failure"));
//         }
//     }
//     return $count;
// }

// function deleteData($table, $where, $json = true)
// {
//     global $con;
//     $stmt = $con->prepare("DELETE FROM $table WHERE $where");
//     $stmt->execute();
//     $count = $stmt->rowCount();
//     if ($json == true) {
//         if ($count > 0) {
//             echo json_encode(array("status" => "success"));
//         } else {
//             echo json_encode(array("status" => "failure"));
//         }
//     }
//     return $count;
// }

// function imageUpload($imageRequest)
// {
//     global $msgError;
//     $imagename  = rand(1000, 10000) . $_FILES[$imageRequest]['name'];
//     $imagetmp   = $_FILES[$imageRequest]['tmp_name'];
//     $imagesize  = $_FILES[$imageRequest]['size'];
//     $allowExt   = array("jpg", "png", "gif", "mp3", "pdf");
//     $strToArray = explode(".", $imagename);
//     $ext        = end($strToArray);
//     $ext        = strtolower($ext);

//     if (!empty($imagename) && !in_array($ext, $allowExt)) {
//         $msgError = "EXT";
//     }
//     if ($imagesize > 2 * MB) {
//         $msgError = "size";
//     }
//     if (empty($msgError)) {
//         move_uploaded_file($imagetmp,  "../upload/" . $imagename);
//         return $imagename;
//     } else {
//         return "fail";
//     }
// }



// function deleteFile($dir, $imagename)
// {
//     if (file_exists($dir . "/" . $imagename)) {
//         unlink($dir . "/" . $imagename);
//     }
// }

// function checkAuthenticate()
// {
//     if (isset($_SERVER['PHP_AUTH_USER'])  && isset($_SERVER['PHP_AUTH_PW'])) {
//         if ($_SERVER['PHP_AUTH_USER'] != "wael" ||  $_SERVER['PHP_AUTH_PW'] != "wael12345") {
//             header('WWW-Authenticate: Basic realm="My Realm"');
//             header('HTTP/1.0 401 Unauthorized');
//             echo 'Page Not Found';
//             exit;
//         }
//     } else {
//         exit;
//     }

//     // End 
// }
// function jsonStatus($msg)
// {
//     echo json_encode(array(
//         "status" => $msg,
//     ));
// }
