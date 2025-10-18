<?php
// config/db.php
class Database {
    private $host = 'localhost';
    private $port = '5432';
    private $dbname = 'minecraft_db';
    private $user = 'postgres';
    private $password = 'ThundK05';
    public $conn;

    public function connect() {
        if ($this->conn) return $this->conn;
        try {
            $this->conn = new PDO(
                "pgsql:host={$this->host};port={$this->port};dbname={$this->dbname}",
                $this->user,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // safe error message
            die("Koneksi gagal: " . $e->getMessage());
        }
        return $this->conn;
    }
}
