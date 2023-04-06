<?php
require_once('protected/DB.php');
require_once('protected/UserDB.php');

/*
This function is tasked with loading the correct amount of post on the page depending on whether or not the "load"
button has been pushed or not. By default it will load 5 posts. If the load more button is pressed it will load 5 more.
*/
function showPosts(){
    $defaultNumberOfPosts = 5;
    if(isset($_POST['postNum'])){
        $postNum = $_POST['postNum'];
    }else{
        $postNum = $defaultNumberOfPosts;
    }
    $anchorLocation = $postNum;
    
    if(isset($_POST['load'])){
        $postNum = $postNum + $defaultNumberOfPosts;
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

/*
This function is tasked with verifying that the token given in the email matches the doken in the database, so that if
someone tries to reset the password without the token they are unable to.
*/
function verifyToken($email, $token){
    $database = new UserDB;
    $result = $database->verifyToken($email, $token);
    return $result;
}

function redirectTranslation($currentFile){
    $redirectionFile = "vrijednosti.php";
    if($currentFile == "dogadaji.php"){
        return $redirectionFile;
    }else{
        return $currentFile;
    }
}

?>