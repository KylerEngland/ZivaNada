<?php
require_once('protected/DB.php');
class EventTest extends \PHPUnit\Framework\TestCase{
    public function testNoDate(){
        $database = new DB;
        $database->insertPost(6,"PHP-UnitTest","Description","","");
        $post = $database->showPosts(1);
        $id = "";
        while($row = $post->fetch()){
            $id = $row['id'];
            $this->assertEquals("0000-00-00",$row['eventDate']);
        }
        if($id != ""){
            $database->deletePost($id);
        }
    }

    public function testIncludeDate(){
        $eventDate = "2015-08-17";
        $database = new DB;
        $database->insertPost(6,"PHP-UnitTest","Description",$eventDate,"");
        $post = $database->showPosts(1);
        $id = "";
        while($row = $post->fetch()){
            $id = $row['id'];
            $this->assertEquals("2015-08-17",$row['eventDate']);
        }
        if($id != ""){
            $database->deletePost($id);
        } 
    }

    public function testNoTime(){
        $database = new DB;
        $database->insertPost(6,"PHP-UnitTest","Description","","");
        $post = $database->showPosts(1);
        $id = "";
        while($row = $post->fetch()){
            $id = $row['id'];
            $this->assertEquals("00:00:00",$row['eventTime']);
        }
        if($id != ""){
            $database->deletePost($id);
        }
    }
    public function testIncludeTime(){
        $eventTime = "11:59:59";
        $database = new DB;
        $database->insertPost(6,"PHP-UnitTest","Description","",$eventTime);
        $post = $database->showPosts(1);
        $id = "";
        while($row = $post->fetch()){
            $this->assertEquals("11:59:59",$row['eventTime']);
            $id = $row['id'];
        }
        if($id != ""){
            $database->deletePost($id);
        } 
    }
}

?>