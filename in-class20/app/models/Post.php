<?php

namespace app\models;

use app\models\Model;

class Post extends Model {

    public function getAllPosts() {
        $query = "SELECT * FROM posts ORDER BY created_at DESC";
        return $this->query($query);
    }

    public function getPostById($id) {
        $query = "SELECT * FROM posts WHERE id = :id";
        return $this->query($query, ['id' => $id]);
    }

    public function savePost($inputData) {
        $query = "INSERT INTO posts (title, body) VALUES (:title, :body)";
        return $this->query($query, $inputData);
    }

    public function updatePost($inputData) {
        $query = "UPDATE posts SET title = :title, body = :body WHERE id = :id";
        return $this->query($query, $inputData);
    }

    public function deletePost($inputData) {
        $query = "DELETE FROM posts WHERE id = :id";
        return $this->query($query, $inputData);
    }
}
 