<?php 
    require_once('protected/config.inc.php');

    try{
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        die( $e->getMessage() );
    }

?>