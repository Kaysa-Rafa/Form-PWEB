<?php
// models/MinecraftModel.php
require_once __DIR__ . '/../config/db.php';

class MinecraftModel {
    private $conn;
    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function insert($data) {
        $sql = "INSERT INTO minecraft_data
                (username, world_name, biome, seed, creation_date, foto, tanda_tangan)
                VALUES (:username, :world_name, :biome, :seed, :creation_date, :foto, :tanda_tangan)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':username' => $data['username'],
            ':world_name' => $data['world_name'],
            ':biome' => $data['biome'],
            ':seed' => $data['seed'],
            ':creation_date' => $data['creation_date'],
            ':foto' => $data['foto'],
            ':tanda_tangan' => $data['tanda_tangan']
        ]);
    }

    public function getAll() {
        $sql = "SELECT * FROM minecraft_data ORDER BY id DESC";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM minecraft_data WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
