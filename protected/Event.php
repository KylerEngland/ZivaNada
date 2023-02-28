<?php

class Event{

    protected $userID;
    protected $title;
    protected $description;
    protected $eventDate;
    protected $eventTime;
    function __construct($userID, $title, $description, $eventDate, $eventTime){
        $this->userID = $userID;
        $this->title = $title;
        $this->description = $description;
        if($eventDate == "0000-00-00"){
            $this->eventDate = "Ubrzo više informacija";
        }else{
            $this->eventDate = $eventDate;
        }
        if($eventTime == "00:00:00"){
            $this->eventTime = "Ubrzo više informacija";
        }else{
            $this->eventTime = $eventTime;
        }
    }

    public function outputEvent(){
        $post = '   <div class="announcement-preview">
                        <h2 class="post-title">' . $this->title . '</h2>
                        <h3 class="post-subtitle">' . $this->description . '</h3>

                        <button type="button" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button type="button" class="btn btn-primary btn-sm"><i class="fa-solid fa-trash"></i></button>
                        <p class="post-meta">
                            Datum: ' . $this->eventDate . ', Vrijeme: ' . $this->eventTime. '
                        </p>
                    </div>
                    <hr class="my-4" />';
        return $post;
    }

    public function outputAnchorEvent(){
        $post = '   <a id="open-here"></a>
                    <div class="announcement-preview">
                        <h2 class="post-title">' . $this->title . '</h2>
                        <h3 class="post-subtitle">' . $this->description . '</h3>

                        <button type="button" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button type="button" class="btn btn-primary btn-sm"><i class="fa-solid fa-trash"></i></button>
                        <p class="post-meta">
                            Datum: ' . $this->eventDate . ', Vrijeme: ' . $this->eventTime. '
                        </p>
                    </div>
                    <hr class="my-4" />';
        return $post;
    }
}


?>