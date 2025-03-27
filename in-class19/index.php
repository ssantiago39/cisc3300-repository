<?php

require_once "app/models/Model.php";
require_once "app/models/Post.php";
require_once "app/controllers/PostController.php";

$env = parse_ini_file('.env');
define('DBHOST', $env['DBHOST']);
define('DBNAME', $env['DBNAME']);
define('DBUSER', $env['DBUSER']);
define('DBPASS', $env['DBPASS']);
define('DBPORT', $env['DBPORT']);

use app\controllers\PostController;

$uri = strtok($_SERVER["REQUEST_URI"], '?');
$uriArray = explode("/", $uri);

if ($uriArray[1] === 'api' && $uriArray[2] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $postController = new PostController();

    if ($id) {
        $postController->getPostByID($id);
    } else {
        $postController->getPosts();
    }
}

exit;
 