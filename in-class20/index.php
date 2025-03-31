<?php
require_once "../app/models/Model.php";
require_once "../app/models/Post.php";
require_once "../app/controllers/PostController.php";



$env = parse_ini_file('../.env');
define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
define('DBPASS', $env['DBPASS']);

use app\controllers\PostController;




$uri = $_GET['url'] ?? '';
$uriArray = explode("/", $uri);




if ($uriArray[1] === 'api' && $uriArray[2] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $postController = new PostController();

    if ($id) {
        $postController->getPostByID($id);
    } else {
        $postController->getAllPosts();
    }
}




if ($uriArray[1] === 'api' && $uriArray[2] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $postController = new PostController();
    $postController->savePost();
}




if ($uriArray[1] === 'api' && $uriArray[2] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'PUT') {
    $postController = new PostController();
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $postController->updatePost($id);
}





if ($uriArray[1] === 'api' && $uriArray[2] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $postController = new PostController();
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $postController->deletePost($id);
}




if ($uri === '/new-post' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $postController = new PostController();
    $postController->postsAddView();
}

if ($uriArray[1] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $postController = new PostController();
    $postController->postsUpdateView();
}

if ($uriArray[1] === 'delete-post' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $postController = new PostController();
    $postController->postsDeleteView();
}

if ($uriArray[1] === '' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $postController = new PostController();
    $postController->postsView();
}

include '../public/assets/views/notFound.html';
exit();
?>
 