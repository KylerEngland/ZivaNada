<?php
require_once('UserDB.php');

$database = new UserDB;

if (!isset($_POST['registerName'], $_POST['registerLastName'], $_POST['firstPass'], $_POST['registerEmail'])) {
	header('Location: ../loginPage.php?error=1');
} else if (empty($_POST['registerName']) || empty($_POST['registerLastName']) || empty($_POST['firstPass']) || empty($_POST['registerEmail'])) {
    header('Location: ../loginPage.php?error=2');
} else if (!filter_var($_POST['registerEmail'], FILTER_VALIDATE_EMAIL)) {
   header('Location: ../loginPage.php?error=3');
} else {
    // All input is valid, register the user.
    $database->register($_POST['registerName'], $_POST['registerLastName'], $_POST['registerEmail'], $_POST['firstPass']);
    header('Location: ../index.php');
    exit();
}
?>