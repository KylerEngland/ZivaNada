<?php 
require_once('config.inc.php');
class DB{


    private static $connection;
    private static $settings = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    );

    function __construct(){
        if (!isset(self::$connection)) {
            try {
                self::$connection = new PDO(
                        DBCONNSTRING,
                        DBUSER,
                        DBPASS,
                        self::$settings
                );
            } catch (PDOException $e) {
                throw new PDOException($e->getMessage(), (int) $e->getCode());
            }
        }
    }

  
    public static function insertPost($userID, $title, $description){
        try{
            $postID ="";
    
            $sql = "INSERT INTO `posts`(
                `id`, `userID`, `title`, `description`) 
                VALUES (
                :postID, :userID, :title, :description )";
    
            $query = self::$connection->prepare($sql);
            $query->execute( array( 'postID' => $title, 'userID' => $userID, 'title' => $title, 'description' => $description ) );
        }
        catch(PDOException $e){
            die( $e->getMessage() );
        }
        finally{
            $pdo = null;
        }
    }

    public static function showPosts($postNum){
        try{
            $sql = "SELECT p.id, p.userID, p.title, p.description, p.createdDate, pr.ime, pr.prezime 
                    FROM posts AS p 
                    INNER JOIN profiles AS pr 
                    ON p.userID = pr.id 
                    ORDER BY p.id DESC LIMIT $postNum";

            $statement = self::$connection->prepare($sql);
            $statement->execute();
            return $statement;
        }
        catch(PDOException $e){
            die( $e->getMessage() );
        }
        finally {
            $pdo = null;
        }
    }
    public static function getPostsNumber(){
        try{
            $sql = "SELECT COUNT(*) FROM posts";
            $statement = self::$connection->prepare($sql);
            $statement->execute();
            $result = $statement->fetch();
            return $result['COUNT(*)'];
        }
        catch(PDOException $e){
            die( $e->getMessage() );
        }
        finally {
            $pdo = null;
        }
    }
}

?>