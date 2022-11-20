<?php
    require_once('protected/DB.php');
    $database = new DB;
    $post = $database->insertPost(1,$_POST['title'],$_POST['description']);
    header('Location: index.php');
    exit();
?>