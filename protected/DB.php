<?php 
require_once('config.inc.php');
require_once('Event.php');
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
                        `userID`,
                        `title`,
                        `description`,
                        `eventDate`,
                        `eventTime`
                    )
                    VALUES(
                        :userID,
                        :title,
                        :description,
                        :eventDate,
                        :eventTime
                    )";
    
            $statement = self::$connection->prepare($sql);

            $statement->bindParam(':userID', $userID);
            $statement->bindParam(':title', $title);
            $statement->bindParam(':description', $description);
            $statement->bindParam(':eventDate', $date);
            $statement->bindParam(':eventTime', $time);
            
            $statement->execute();
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
            $sql = "SELECT
                        p.id,
                        p.userID,
                        p.title,
                        p.description,
                        p.eventDate,
                        pr.ime,
                        pr.prezime,
                        p.eventTime
                    FROM
                        posts AS p
                    INNER JOIN PROFILES AS pr
                    ON
                        p.userID = pr.id
                    ORDER BY
                        p.id DESC LIMIT :postNum";

            $statement = self::$connection->prepare($sql);
            $statement->bindParam(':postNum', $postNum, PDO::PARAM_INT);
            $statement->execute();

            $events = array();

            while($row = $statement->fetch()){
                $newEvent = new Event($row['id'], $row['userID'], $row['title'], $row['description'], $row['eventDate'], $row['eventTime']);
                array_push($events, $newEvent);
            }

            return $events;
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

    public static function editPost($id, $userID, $title, $description, $eventDate, $eventTime){

        try{
            $sql = "UPDATE
                        `posts`
                    SET
                        `userID` = :userID,
                        `title` = :title,
                        `description` = :description,
                        `eventDate` = :eventDate,
                        `eventTime` = :eventTime
                    WHERE
                        `id` = :id";

            $statement = self::$connection->prepare($sql);

           
            $statement->bindParam(':userID', $userID);
            $statement->bindParam(':title', $title);
            $statement->bindParam(':description', $description);
            $statement->bindParam(':eventDate', $eventDate);
            $statement->bindParam(':eventTime', $eventTime);
            $statement->bindParam(':id', $id);
          
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

    public static function deletePost($id){
        try{
            $sql = "DELETE FROM posts WHERE id = :id";

            $statement = self::$connection->prepare($sql);
            $statement->bindParam(':id', $id);
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