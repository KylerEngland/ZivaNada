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
    $posts = $database->showPosts($postNum);
    echo outputPost($posts, $anchorLocation);
}

function outputPost($posts, $anchorLocation){
    $foundOne = true;
    $post = '';
    $counter = 0;
    while($row = $posts->fetch()){
        $counter = $counter + 1;
        $foundOne = true;
        if($counter == ($anchorLocation-1)){
            $post .= '<a id="open-here"></a>';
        }
        if($row['eventTime'] == "00:00:00"){
            $row['eventTime'] = "Ubrzo više informacija";
        }
        if($row['eventDate'] == "0000-00-00"){
            $row['eventDate'] = "Ubrzo više informacija";
        }
        $post .=    '<div class="announcement-preview">
                        <h2 class="post-title">' . $row['title'] . '</h2>
                        <h3 class="post-subtitle">' . $row['description'] . '</h3>

                        <button type="button" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button type="button" class="btn btn-primary btn-sm"><i class="fa-solid fa-trash"></i></button>
                        <p class="post-meta">
                            Datum: ' . $row['eventDate'] . ', Vrijeme: ' . $row['eventTime'] . '
                        </p>
                    </div>
                    <hr class="my-4" />';
    }

    if($foundOne){
        return $post;
    }
    return 'No posts found';
}


function verifyToken($email, $token){
    $database = new UserDB;
    $result = $database->verifyToken($email, $token);
    return $result;
}

?>