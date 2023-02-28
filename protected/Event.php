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

                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <p class="post-meta">
                            Datum: ' . $this->eventDate . ', Vrijeme: ' . $this->eventTime. '
                        </p>
                    </div>
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" class="post-subtitle" id="exampleModalLabel">Uredi objavu</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <form name="editPost" action="protected/editPost.inc.php" method="post">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="title" class="col-form-label">Titula:</label>
                                            <input type="text" class="form-control" name="title" value="'. $this->title . '">
                                        </div>
                                        <div class="mb-3">
                                            <label for="date" class="col-form-label">Datum:</label>
                                            <input type="date" class="form-control" name="date" value="'. $this->eventDate . '">
                                        </div>
                                        <div class="mb-3">
                                            <label for="time" class="col-form-label">Vrijeme:</label>
                                            <input type="time" class="form-control" name="time" value="'. $this->eventTime . '">
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="col-form-label">Opis:</label>
                                            <textarea class="form-control" name="description">'. $this->description . '</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Zatvori</button>
                                        <button type="submit" class="btn btn-primary">Objavi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4" />';
        return $post;
    }

    public function outputAnchorEvent(){
        $post = '   <a id="open-here"></a>
                    <div class="announcement-preview">
                        <h2 class="post-title">' . $this->title . '</h2>
                        <h3 class="post-subtitle">' . $this->description . '</h3>

                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                        <p class="post-meta">
                            Datum: ' . $this->eventDate . ', Vrijeme: ' . $this->eventTime. '
                        </p>
                    </div>
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" class="post-subtitle" id="exampleModalLabel">Uredi objavu</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <form name="editPost" action="protected/editPost.inc.php" method="post">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="title" class="col-form-label">Titula:</label>
                                            <input type="text" class="form-control" name="title" value="'. $this->title . '">
                                        </div>
                                        <div class="mb-3">
                                            <label for="date" class="col-form-label">Datum:</label>
                                            <input type="date" class="form-control" name="date" value="'. $this->eventDate . '">
                                        </div>
                                        <div class="mb-3">
                                            <label for="time" class="col-form-label">Vrijeme:</label>
                                            <input type="time" class="form-control" name="time" value="'. $this->eventTime . '">
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="col-form-label">Opis:</label>
                                            <textarea class="form-control" name="description">'. $this->description . '</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Zatvori</button>
                                        <button type="submit" class="btn btn-primary">Objavi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4" />';
        return $post;
    }

}


?>