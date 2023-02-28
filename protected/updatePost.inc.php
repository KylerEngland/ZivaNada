<?php 

require_once('DB.php');
session_start();
$database = new DB;
if (isset($_SESSION['loggedin']) && $_SESSION['admin'] == 1){
    $post = $database->editPost($_POST['postID'], $_SESSION['id'],$_POST['title'],$_POST['description'], $_POST['date'], $_POST['time']);
}else{
    echo("You do not have permission to edit this content.");
}
header('Location: ../index.php');
exit();

?>