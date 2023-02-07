<?php
require_once('UserDB.php');


$database = new UserDB;
$database->updatePassword($_POST['email'], $_POST['newPassword']);

header('Location: ../loginPage.php');
?>