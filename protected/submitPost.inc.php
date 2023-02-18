<?php
    require_once('DB.php');
    session_start();
    $database = new DB;
    $post = $database->insertPost($_SESSION['id'],$_POST['title'],$_POST['description'], $_POST['date'], $_POST['time']);
    header('Location: ../index.php');
    exit();
?>