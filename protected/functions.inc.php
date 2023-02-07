<?php
require_once('protected/DB.php');
require_once('protected/UserDB.php');

function showPosts(){
    $postNum = isset($_POST['postNum']) ? $_POST['postNum'] : 5;
    if(isset($_POST['load'])){
        $postNum = $postNum + 5;
        $_POST['postNum'] = $postNum;
    }

    $database = new DB;
    $posts = $database->showPosts($postNum);
    echo outputPost($posts);
}

function outputPost($posts){
    $foundOne = true;
    $post = '';
    while($row = $posts->fetch()){
        $foundOne = true;
        $post .=    '<div class="announcement-preview">
                        <a href="announcement.php">
                            <h2 class="post-title">' . $row['title'] . '</h2>
                            <h3 class="post-subtitle">' . $row['description'] . '</h3>
                        </a>
                        <p class="post-meta">
                            Objavio
                            <a href="#!">' . $row['ime'] . " " . $row['prezime'] .'</a>
                            na ' . $row['createdDate'] . '
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