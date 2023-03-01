<?php
require_once('protected/DB.php');
class EventTest extends \PHPUnit\Framework\TestCase{
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
}

?>