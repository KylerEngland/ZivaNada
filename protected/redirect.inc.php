<?php

function redirectTranslation($currentFile){
    $redirectionFile = "vrijednosti.php";
    if($currentFile == "dogadaji.php"){
        return $redirectionFile;
    }else{
        return $currentFile;
    }
}



?>