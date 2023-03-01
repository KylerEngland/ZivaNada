<?php 

require_once('DB.php');
session_start();
$database = new DB;
if (isset($_SESSION['loggedin']) && $_SESSION['admin'] == 1){
    $post = $database->deletePost($_POST['postID']);
}else{
    echo("You do not have permission to delete this content.");
}
header('Location: ../index.php');
exit();

?>