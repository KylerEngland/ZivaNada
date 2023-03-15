<?php
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNotEquals;
require_once('TestDB.php');
class EventTest extends \PHPUnit\Framework\TestCase{

    private static $database;

    public static function setUpBeforeClass(): void
    {
        self::$database = new TEST_DB();
    }


    /*
    This test checks to see if posting an Event without a date properly outputs the TBD messsage. 
    Also makes sure the rest of the data gets posted correctly too.
    */
    public function testInsertNoDate(){
       
        self::$database->insertPost(6,"PHP-UnitTest","Description","","11:59:59");
        $posts = self::$database->showPosts(1);
        $id = "";
        foreach($posts as $event){ 
            $id = $event->getPostID();
            $this->assertEquals(6, $event->getUserID());
            $this->assertEquals("PHP-UnitTest", $event->getTitle());
            $this->assertEquals("Description", $event->getDescription());
            $this->assertEquals("Ubrzo više informacija",$event->getEventDate());
            $this->assertEquals("11:59:59",$event->getEventTime());
        }

        if($id != ""){
            self::$database->deletePost($id);
        }
    }

    /*
    This test checks to see if posting an Event with a date properly outputs. 
    Also makes sure the rest of the data gets posted correctly too.
    */
    public function testInsertWithDate(){
        $eventDate = "2015-08-17";
        self::$database->insertPost(6,"PHP-UnitTest","Description",$eventDate,"11:59:59");
        $posts = self::$database->showPosts(1);
        $id = "";
        foreach($posts as $event){ 
            $id = $event->getPostID();
            $this->assertEquals(6, $event->getUserID());
            $this->assertEquals("PHP-UnitTest", $event->getTitle());
            $this->assertEquals("Description", $event->getDescription());
            $this->assertEquals($eventDate,$event->getEventDate());
            $this->assertEquals("11:59:59",$event->getEventTime());
        }

        if($id != ""){
            self::$database->deletePost($id);
        }
    }

    /*
    This test checks to see if posting an Event without a time properly outputs the TBD messsage. 
    Also makes sure the rest of the data gets posted correctly too.
    */
    public function testInsertNoTime(){
       
        self::$database->insertPost(6,"PHP-UnitTest","Description","2015-08-17","");
        $posts = self::$database->showPosts(1);
        $id = "";
        foreach($posts as $event){ 
            $id = $event->getPostID();
            $this->assertEquals(6, $event->getUserID());
            $this->assertEquals("PHP-UnitTest", $event->getTitle());
            $this->assertEquals("Description", $event->getDescription());
            $this->assertEquals("2015-08-17",$event->getEventDate());
            $this->assertEquals("Ubrzo više informacija",$event->getEventTime());
        }

        if($id != ""){
            self::$database->deletePost($id);
        }
    }
    
    /*
    This test checks to see if posting an Event with a time properly outputs. 
    Also makes sure the rest of the data gets posted correctly too.
    */
    public function testIncludeTime(){
        $eventTime = "11:59:59";
        self::$database->insertPost(6,"PHP-UnitTest","Description","2015-08-17",$eventTime);
        $posts = self::$database->showPosts(1);
        $id = "";
        foreach($posts as $event){ 
            $id = $event->getPostID();
            $this->assertEquals(6, $event->getUserID());
            $this->assertEquals("PHP-UnitTest", $event->getTitle());
            $this->assertEquals("Description", $event->getDescription());
            $this->assertEquals("2015-08-17",$event->getEventDate());
            $this->assertEquals($eventTime,$event->getEventTime());
        }

        if($id != ""){
            self::$database->deletePost($id);
        }
    }

    /* 
    This function tests the updating functionality of the database. First it uploads a post to the database,
    then it calls the showPosts function to get the ID of the post (since that is assigned by the database).
    Then it calls the editPost function using that ID, and asserts that the post has been updated to the edited version.
    */
    public function testUpdatingEvent(){
        $userID = "5";
        $newTitle = "This is the replacement title.";
        $newDesc = "This is the replacement description.";
        $newDate = "2001-12-14";
        $newTime = "10:00:00";
        $postID = "";

        self::$database->insertPost(6,"PHP-UnitTest","Description","2015-08-17","11:59:59");
        $posts = self::$database->showPosts(1);

        foreach($posts as $event){ 
            $postID = $event->getPostID();
        }
        self::$database->editPost($postID,$userID, $newTitle, $newDesc, $newDate, $newTime);

        $posts = self::$database->showPosts(1);
        foreach($posts as $event){
            $this->assertEquals(5, $event->getUserID());
            $this->assertEquals("This is the replacement title.", $event->getTitle());
            $this->assertEquals("This is the replacement description.", $event->getDescription());
            $this->assertEquals("2001-12-14",$event->getEventDate());
            $this->assertEquals("10:00:00",$event->getEventTime());
        }

        if($postID != ""){
            self::$database->deletePost($postID);
        }
    }

    /*
    This test makes sure that the delete method of the database functions properly. It inserts
    a post into the database, then calls showPosts to get the ID from the post added, which it 
    uses to delete the post. We then assert that only one row was affected by this. If it was 0, 
    then there would have been nothing deleted, and if it was more than 1 then it would have 
    deleted more than just one row.
    */
    public function testDeletion(){
        
        self::$database->insertPost(6,"PHP-UnitTests","Description","2015-08-17","11:59:59");
        $posts = self::$database->showPosts(1);
        $id = "";
        foreach($posts as $event){ 
            $id = $event->getPostID();
        }

        $result = self::$database->deletePost($id);
        $this->assertEquals(1, $result->rowCount());
     
    }
}

?>