<?php
require_once('protected/DB.php');
require_once('protected/UserDB.php');

function showPosts(){
    if(isset($_POST['postNum'])){
        $postNum = $_POST['postNum'];
    }else{
        $postNum = 5;
    }
    $anchorLocation = $postNum;
    
    if(isset($_POST['load'])){
        $postNum = $postNum + 5;
        $_POST['postNum'] = $postNum;
    }

    $database = new DB;
    $events = $database->showPosts($postNum);

    $counter = 0;
    foreach($events as $event){
        $counter = $counter + 1;
        if($counter == ($anchorLocation-1)){
            echo $event->outputAnchorEvent();
        }else{
            echo $event->outputEvent();
        }
    }
}

function verifyToken($email, $token){
    $database = new UserDB;
    $result = $database->verifyToken($email, $token);
    return $result;
}

?>