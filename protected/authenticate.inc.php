<?php
require_once('UserDB.php');

$database = new UserDB;
session_start();

// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if (!isset($_POST['loginEmail']) || !isset($_POST['loginPass'])) {
    // Could not get the data that should have been sent, 2 means values weren't set.
    header('Location: ../loginPage.php?result=2');
} else if (empty($_POST['loginEmail']) || empty($_POST['loginPass'])) {
    // Could not get the data that should have been sent, 3 means that one of the fields was not filled out.
    header('Location: ../loginPage.php?result=3');
}

$result = $database->login($_POST['loginEmail'], $_POST['loginPass']);
if ($result == 1) {
    header('Location: ../dogadaji.php');
} else {
    //Result 0 means that it was the wrong email or password
    header('Location: ../loginPage.php?result=0');
}
exit();

?>