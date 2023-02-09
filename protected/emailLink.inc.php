<?php
require_once('UserDB.php');
require_once('config.inc.php');


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require ('/xampp/htdocs/ZivaNada/vendor/autoload.php');

$token = md5(uniqid(mt_rand()));

$database = new UserDB();
if($database->findEmail($_POST['resetEmail'])==0){
    header('Location: ../loginPage.php');
    exit();
}

$database->updateToken($_POST['resetEmail'], $token);


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'kylerengl@gmail.com';                  //SMTP username
    $mail->Password   = APP_PASS;                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('kylerengl@gmail.com', 'zivanada.hr');
    $mail->addAddress($_POST['resetEmail']);                    //Add a recipient
  
    // Content
    $mail->Subject = 'Zaboravili lozinku?';
    $mail->isHTML(true);                                  //Set email format to HTML
    // $mail->Body    = 'To reset your password, go to <b> ZivaNada/resetPassword.php?token=' . $token . '&email=' . $_POST['resetEmail'] . '</b>, or go to <a href="localhost/ZivaNada/resetPassword.php?token=' . $token . '&email=' . $_POST['resetEmail'] . '">Here</a>';
    $mail->Body    = 'Da bi promijenili lozinku, kliknite <a href="localhost/ZivaNada/resetPassword.php?token=' . $token . '&email=' . $_POST['resetEmail'] . '">Ovje</a>';

    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

header('Location: ../loginPage.php');

?>