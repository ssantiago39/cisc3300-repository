<?php
require_once '6b.php';

if ($_SERVER['REQUEST_URI'] == '/posts') {
    echo json_encode((new PostController())->listPosts());
} else {
    http_response_code(404);
    echo json_encode(["error" => "Not Found"]);
}

//_