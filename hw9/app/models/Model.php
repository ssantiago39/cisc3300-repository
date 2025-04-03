<?php
namespace app\models;
use PDO;
use PDOException;

abstract class Model {
    private function connect() {
        $dsn = "mysql:host=" . DBHOST . ";dbname=" . DBNAME;
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        try {
            return new PDO($dsn, DBUSER, DBPASS, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), $e->getCode());
        }
    }

    public function fetchAll($query) {
        $pdo = $this->connect();
        return $pdo->query($query)->fetchAll();
    }

    public function fetchAllWithParams($query, $data = []) {
        $pdo = $this->connect();
        $stmt = $pdo->prepare($query);
        $stmt->execute($data);
        return $stmt->fetchAll();
    }
}
