<?php

include "connect.php";

$userId =
  filterRequest('userID');

$categoryId =
  filterRequest('categoryId');
//with sale
$stmt
  =  getItems("`e_commerce`.`items`.`items_categories_id`=?");
$stmt->execute(array($userId, $userId, $categoryId));
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
if ($stmt->rowCount() > 0) {
  echo json_encode(array("status" => "success", "data" => $items));
} else {
  echo json_encode(array("status" => "fail"));
}




// $userId = $_POST['id'];

// $stmt = $con->prepare("SELECT `e_commerce`.`items`.`items_id` AS `items_id`,
// `e_commerce`.`items`.`items_name` AS `items_name`,
// `e_commerce`.`items`.`items_name_ar` AS `items_name_ar`,
// `e_commerce`.`items`.`items_description` AS `items_description`,
// `e_commerce`.`items`.`items_description_ar` AS `items_description_ar`,
// `e_commerce`.`items`.`items_image` AS `items_image`,
// `e_commerce`.`items`.`items_image2` AS `items_image2`,
// `e_commerce`.`items`.`items_image3` AS `items_image3`,
// `e_commerce`.`items`.`items_image4` AS `items_image4`,
// `e_commerce`.`items`.`items_date_create` AS `items_date_create`,
// `e_commerce`.`items`.`items_active` AS `items_active`,
// `e_commerce`.`items`.`items_count` AS `items_count`,
// `e_commerce`.`items`.`items_discount` AS `items_discount`,
// `e_commerce`.`items`.`items_price` AS `items_price`,
// `e_commerce`.`items`.`items_categories_id` AS `items_categories_id`,
// case when (select `e_commerce`.`cart`.`item_cart_id`
//  from (`e_commerce`.`cart` join `e_commerce`.`users`) 
//  where `e_commerce`.`items`.`items_id` = `e_commerce`.`cart`.`item_cart_id`
//   and `e_commerce`.`users`.`users_id` = `e_commerce`.`cart`.`users_cart_id`
// and `e_commerce`.`cart`.`users_cart_id`=?) is null then 'notInCart' else 'inCart' end AS `isInCart`
//  from `e_commerce`.`items`;");
// $stmt->execute(array($userId));
// $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
// echo json_encode(array("status" => "success", "data" => $data));


// sendMail("ashrafabdo6622@gmail.com", "from sndmail function", "hi sned mail");




// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
// require_once 'vendor/autoload.php';
// //declaring my variables 
// $mail = new PHPMailer(); //create object
// //declaring the methods we will use for mailing 
// $mail->isSMTP();
// $mail->SMTPAuth = false; //will inforce us to use user name and password;
// $mail->SMTPDebug = 2; //gives us recive report 
// $mail->Host  = 'smtp.gmail.com';
// $mail->Username = 'ashrafabdo2052@gmail.com';
// $mail->Password = 'ashraf442948';
// $mail->Port = 587;
// $mail->SMTPSecure = 'tls'; //or we can use ssl and the prot will be 465
// //the person who will send
// $mail->From = 'ashrafabdo6622@gmail.com';
// $mail->FromName = 'ashraf abdo';
// $mail->addReplyTo('ashrafabdo6622@gmail.com', 'requist verification code');
// /******************************************************* */
// $mail->Subject = ' verification code is 889988';
// $mail->isHTML(true);
// $mail->Body = '<b>your verification code is 889988<\b>';
// $mail->SMTPOptions = array(
//     'ssl' => array(
//         'verify_peer' => false,
//         'verify_peer_name' => false,
//         'allow_self_signed' => true,

//     ),
// );
// if ($mail->send()) {
//     echo '----Mail sent success------';
// } else {
//     echo '----Mail sent fail------';
// }
/******************************* */
// if (isset($_POST['email'])) {
//     $email = $_POST['email'];
//     $subject = "email from php test";
//     $body = "i love you too";
//     $headers = "From: ashrafabdo2052@gmail.com";
//     if (mail($email, $subject, $body, $headers)) {
//         echo " email sent to $email";
//     } else {
//         echo "  sent failed to $email";
//     }
// } else {
//     echo " please enter email";
// }
/******************************* */
// $to = "ashrafabdo6622@gmail.com";
// $subject = "email from php test"; //title
// $body = "";
// $headers = "From: ashrafabdo2052@gmail.com";
// if (mail($to, $subject, $body, $headers)) {
//     echo " email sent to $to";
// } else {
//     echo "  sent failed to $to";
// }




/******************************************************* */
// // Import PHPMailer classes into the global namespace 
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// // Include library files 
// require 'PHPMailer/Exception.php';
// require 'PHPMailer/PHPMailer.php';
// require 'PHPMailer/SMTP.php';


// // require 'PHPMailer/autoload.php';
// // require 'PHPMailer/composer/autoload_real.php';


// // Create an instance; Pass `true` to enable exceptions 
// $mail = new PHPMailer();

// // Server settings 
// //$mail->SMTPDebug = SMTP::DEBUG_SERVER;    //Enable verbose debug output 
// // $mail->isSMTP();                            // Set mailer to use SMTP 
// $mail->Host = 'smtp.ashraf.com';           // Specify main and backup SMTP servers 
// // $mail->SMTPAuth = true;                     // Enable SMTP authentication 
// // $mail->Username = 'user@ashraf.com';       // SMTP username 
// // $mail->Password = 'ashrafcom';         // SMTP password 
// $mail->SMTPSecure = 'ssl';                  // Enable TLS encryption, `ssl` also accepted 
// $mail->Port = 465;                          // TCP port to connect to 

// // Sender info 
// $mail->setFrom('ashrafabdo2052@gmail.com', 'ashraf coder', 0);
// $mail->addReplyTo('ashrafabdo6622@gmail.com', 'ashraf almekhlafi');

// // Add a recipient 
// $mail->addAddress('recipient@example.com');

// //$mail->addCC('cc@example.com'); 
// //$mail->addBCC('bcc@example.com'); 

// // Set email format to HTML 
// $mail->isHTML(true);

// // Mail subject 
// $mail->Subject = 'Email from Localhost by CodexWorld';

// // Mail body content 
// $bodyContent = '<h1>How to Send Email from Localhost using PHP by CodexWorld</h1>';
// $bodyContent .= '<p>This HTML email is sent from the localhost server using PHP by <b>CodexWorld</b></p>';
// $mail->Body    = $bodyContent;


// // Send email 
// if (!$mail->send()) {
//     echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
// } else {
//     echo 'Message has been sent.';
// }
