<?php
require_once __DIR__ . '/../config/db.php';

class MinecraftModel {
    private $conn;
    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

        public function insertData($username, $world_name, $biome, $seed, $screenshot, $signature) {
            $sql = "INSERT INTO minecraft_data (username, world_name, biome, seed, screenshot, signature)
                    VALUES (:username, :world_name, :biome, :seed, :screenshot, :signature)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':username' => $username,
                ':world_name' => $world_name,
                ':biome' => $biome,
                ':seed' => $seed,
                ':screenshot' => $screenshot,
                ':signature' => $signature
            ]);
        }

    public function getAllData() {
        $sql = "SELECT * FROM minecraft_data ORDER BY id ASC";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
