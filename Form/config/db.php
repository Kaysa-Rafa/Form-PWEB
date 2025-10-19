<?php
class Database {
    private $host = 'sql304.infinityfree.com';
    private $port = '3306';
    private $dbname = 'if0_40201227_minecraft_db';
    private $user = 'if0_40201227';
    private $password = 'ThundK05';
    public $conn;

    public function connect() {
        if ($this->conn) return $this->conn;
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname};port={$this->port}",
                $this->user,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Koneksi gagal: " . $e->getMessage());
        }
        return $this->conn;
    }
}
