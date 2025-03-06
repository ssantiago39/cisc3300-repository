<?php
require_once '6a.php';

//movie instead of post
class MovieController {
    public function listMovies() {
        return (new Movie())->getMovies();
    }
}

//_