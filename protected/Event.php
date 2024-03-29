<?php

/**
 * This is the event class. All events from the database are put into an array of events that are structured
 * like this. All the data is set in private variables that can be accessed using getters and setters. The
 * event is originally made using the __construct function that sets up the initial data (this data can be updated
 * using the editPost method in the database). It has two main methods: outputEvent and outputAnchorEvent.
 */
class Event{
    private $id;
    private $userID;
    private $title;
    private $description;
    private $eventDate;
    private $eventTime;
    function __construct($id, $userID, $title, $description, $eventDate, $eventTime){
        $this->id = $id;
        $this->userID = $userID;
        $this->title = $title;
        $this->description = $description;
        if($eventDate == "0000-00-00" || $eventDate == NULL){
            $this->eventDate = "Ubrzo više informacija";
        }else{
            $this->eventDate = $eventDate;
        }
        if($eventTime == "00:00:00" || $eventTime == NULL){
            $this->eventTime = "Ubrzo više informacija";
        }else{
            $this->eventTime = $eventTime;
        }
    }

    public function getPostID(){
        return $this->id;
    }

    public function getUserID(){
        return $this->userID;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getEventDate(){
        return $this->eventDate;
    }

    public function getEventTime(){
        return $this->eventTime;
    }

    /**
     * This function is used the most often. It is the function used to output the string meant to be echoed
     * by the PHP into the HTML with all the structure we want an event to have, along with all the data in
     * the correct location.
     */
    public function outputEvent($loggedIn, $admin){
        $post = '
                <div class="announcement-preview">
                    <h2 class="post-title">' . $this->getTitle() . '</h2>
                    <h3 class="post-subtitle">' . $this->getDescription() . '</h3>

                    <p class="post-meta">
                        Datum: ' . $this->getEventDate() . ', Vrijeme: ' . $this->getEventTime(). '
                    </p>';

        if($loggedIn == TRUE && $admin == 1){
            $post.= '
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal'. $this->getPostID() .'">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal'. $this->getPostID() .'">
                        <i class="fa-solid fa-trash"></i>
                    </button>'; 
        }
                        
        $post.= '
                </div>
                <div class="modal fade" id="editModal'. $this->getPostID() .'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" class="post-subtitle" id="exampleModalLabel">Uredi objavu</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <form name="editPost" action="protected/updatePost.inc.php" method="post">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="title" class="col-form-label">Titula:</label>
                                        <input type="text" class="form-control" name="title" value="'. $this->getTitle() . '">
                                    </div>
                                    <div class="mb-3">
                                        <label for="date" class="col-form-label">Datum:</label>
                                        <input type="date" class="form-control" name="date" value="'. $this->getEventDate() . '">
                                    </div>
                                    <div class="mb-3">
                                        <label for="time" class="col-form-label">Vrijeme:</label>
                                        <input type="time" class="form-control" name="time" value="'. $this->getEventTime() . '">
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="col-form-label">Opis:</label>
                                        <textarea class="form-control" name="description">'. $this->getDescription() . '</textarea>
                                        <input type="hidden" name="postID" value="'. $this->getPostID() .'">
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
                <div class="modal fade" id="deleteModal'. $this->getPostID() .'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" class="post-subtitle" id="exampleModalLabel">Izbrisi Dogadaj?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <form name="newPost" action="protected/deletePost.inc.php" method="post">
                                <div class="modal-body">
                                    <div class="mb-1">
                                        <p class="text-center">Jeste li sigurni?</p>
                                        <input type="hidden" name="postID" value="'. $this->getPostID() .'">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
                                    <button type="submit" class="btn btn-danger">Potvrdi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <hr class="my-4" />';
        return $post;
    }

    /**
     * This function is used once at most every time the page is loaded. It is only used if the "load more" button is pressed.
     * If it is pressed, then there is an anchor added with an id of "open-here", used to make sure the page scrolls down to 
     * that location in the code, rather than making the user scroll all the way down.
     */
    public function outputAnchorEvent($loggedIn, $admin){
        $post = '   <a id="open-here"></a>
                    <div class="announcement-preview">
                        <h2 class="post-title">' . $this->getTitle() . '</h2>
                        <h3 class="post-subtitle">' . $this->getDescription() . '</h3>

                        <p class="post-meta">
                            Datum: ' . $this->getEventDate() . ', Vrijeme: ' . $this->getEventTime(). '
                        </p>';
        if($loggedIn == TRUE && $admin == 1){
            $post.= '   <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal'. $this->getPostID() .'">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal'. $this->getPostID() .'">
                            <i class="fa-solid fa-trash"></i>
                        </button>'; 
        }
                        
        $post.= '
                    </div>
                    <div class="modal fade" id="editModal'. $this->getPostID() .'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" class="post-subtitle" id="exampleModalLabel">Uredi objavu</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <form name="editPost" action="protected/updatePost.inc.php" method="post">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="title" class="col-form-label">Titula:</label>
                                            <input type="text" class="form-control" name="title" value="'. $this->getTitle() . '">
                                        </div>
                                        <div class="mb-3">
                                            <label for="date" class="col-form-label">Datum:</label>
                                            <input type="date" class="form-control" name="date" value="'. $this->getEventDate() . '">
                                        </div>
                                        <div class="mb-3">
                                            <label for="time" class="col-form-label">Vrijeme:</label>
                                            <input type="time" class="form-control" name="time" value="'. $this->getEventTime() . '">
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="col-form-label">Opis:</label>
                                            <textarea class="form-control" name="description">'. $this->getDescription() . '</textarea>
                                            <input type="hidden" name="postID" value="'. $this->getPostID() .'">
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
                    <div class="modal fade" id="deleteModal'. $this->getPostID() .'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" class="post-subtitle" id="exampleModalLabel">Izbrisi Dogadaj?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <form name="newPost" action="protected/deletePost.inc.php" method="post">
                                <div class="modal-body">
                                    <div class="mb-1">
                                        <p class="text-center">Jeste li sigurni?</p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Zatvori</button>
                                    <button type="submit" class="btn btn-danger">Potvrdi</button>
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