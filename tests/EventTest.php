<?php
require_once('protected/DB.php');
class EventTest extends \PHPUnit\Framework\TestCase{
    /*
    This test checks to see if posting an Event without a date properly outputs the TBD messsage. 
    Also makes sure the rest of the data gets posted correctly too.
    */
    public function testInsertNoDate(){
        $database = new DB;
        $database->insertPost(6,"PHP-UnitTest","Description","","11:59:59");
        $posts = $database->showPosts(1);
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
            $database->deletePost($id);
        }
    }

    /*
    This test checks to see if posting an Event with a date properly outputs. 
    Also makes sure the rest of the data gets posted correctly too.
    */
    public function testInsertWithDate(){
        $eventDate = "2015-08-17";
        $database = new DB;
        $database->insertPost(6,"PHP-UnitTest","Description",$eventDate,"11:59:59");
        $posts = $database->showPosts(1);
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
            $database->deletePost($id);
        }
    }

    /*
    This test checks to see if posting an Event without a time properly outputs the TBD messsage. 
    Also makes sure the rest of the data gets posted correctly too.
    */
    public function testInsertNoTime(){
        $database = new DB;
        $database->insertPost(6,"PHP-UnitTest","Description","2015-08-17","");
        $posts = $database->showPosts(1);
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
            $database->deletePost($id);
        }
    }
    
    /*
    This test checks to see if posting an Event with a time properly outputs. 
    Also makes sure the rest of the data gets posted correctly too.
    */
    public function testIncludeTime(){
        $eventTime = "11:59:59";
        $database = new DB;
        $database->insertPost(6,"PHP-UnitTest","Description","2015-08-17",$eventTime);
        $posts = $database->showPosts(1);
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
            $database->deletePost($id);
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

        $database = new DB;
        $database->insertPost(6,"PHP-UnitTest","Description","2015-08-17","11:59:59");
        $posts = $database->showPosts(1);

        foreach($posts as $event){ 
            $postID = $event->getPostID();
        }
        $database->editPost($postID,$userID, $newTitle, $newDesc, $newDate, $newTime);

        $posts = $database->showPosts(1);
        foreach($posts as $event){
            $this->assertEquals(5, $event->getUserID());
            $this->assertEquals("This is the replacement title.", $event->getTitle());
            $this->assertEquals("This is the replacement description.", $event->getDescription());
            $this->assertEquals("2001-12-14",$event->getEventDate());
            $this->assertEquals("10:00:00",$event->getEventTime());
        }

        if($postID != ""){
            $database->deletePost($postID);
        }
    }

    // public function testDeletion(){

    // }
}

?>