<?php
// models/UserModel.php
require_once __DIR__ . '/../config/db.php';

class UserModel {
    private $conn;
    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getByUsername($username) {
        $sql = "SELECT * FROM users WHERE username = :u LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['u' => $username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
