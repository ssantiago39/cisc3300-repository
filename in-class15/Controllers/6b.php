<?php
require_once '6a.php';


class PostController {
    public function listPosts() {
        return (new Post())->getPosts();
    }
}

//_