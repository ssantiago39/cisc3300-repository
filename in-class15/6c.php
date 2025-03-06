<?php
require_once '6b.php';

//did movies instead of posts
if ($_SERVER['REQUEST_URI'] == '/movies') {
    echo json_encode((new MovieController())->listMovies());
} else {
    http_response_code(404);
    echo json_encode(["error" => "Not Found"]);
}

//_