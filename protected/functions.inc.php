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
        
        /* 
        The outputEvent and outputAnchorEvent functions take whether or not 'loggedin' is set, and admin status. If you are admin, 
        $_SESSION['admin] would be 1, else it would be 0. Due to this not being set if you are not logged in, I used a ternary 
        operation to first check if it is set, and then if so I use the value in $_SESSION[], if not I simply send 0.
        */
        if($counter == ($anchorLocation-1)){
            echo $event->outputAnchorEvent(isset($_SESSION['loggedin']), isset($_SESSION['admin']) ? $_SESSION['admin'] : 0);
        }else{
            echo $event->outputEvent(isset($_SESSION['loggedin']), isset($_SESSION['admin']) ? $_SESSION['admin'] : 0);
        }
    }
}

function verifyToken($email, $token){
    $database = new UserDB;
    $result = $database->verifyToken($email, $token);
    return $result;
}

?>