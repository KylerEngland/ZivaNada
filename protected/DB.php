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

  
    public static function insertPost($userID, $title, $description, $date, $time){
        try{
            $sql = "INSERT INTO `posts`(
                `id`, `userID`, `title`, `description`, `eventDate`, `eventTime`) 
                VALUES (
                :postID, :userID, :title, :description, :eventDate, :eventTime)";
    
            $query = self::$connection->prepare($sql);
            $query->execute( array( 'postID' => $title, 'userID' => $userID, 'title' => $title, 'description' => $description, 'eventDate' => $date, 'eventTime' => $time ) );
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
            $sql = "SELECT p.id, p.userID, p.title, p.description, p.eventDate, pr.ime, pr.prezime, p.eventTime 
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

    public static function deletePost($id){
        try{
            $sql = "DELETE FROM posts WHERE id = $id";

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
}

?>