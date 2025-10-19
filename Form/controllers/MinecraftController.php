<?php
// controllers/MinecraftController.php

if (session_status() === PHP_SESSION_NONE) session_start();

require_once __DIR__ . '/../models/MinecraftModel.php';

class MinecraftController {
    private $model;

    public function __construct() {
        $this->model = new MinecraftModel();
    }

    private function authCheck() {
        if (!isset($_SESSION['username'])) {
            header("Location: index.php?action=login");
            exit;
        }
    }

    public function dashboard() {
        $this->authCheck();
        include __DIR__ . '/../views/dashboard.php';
    }

    public function form() {
        $this->authCheck();
        include __DIR__ . '/../views/form.php';
    }

    public function submit() {
        $this->authCheck();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_SESSION['username'];
            $world_name = $_POST['world_name'] ?? '';
            $biome = $_POST['biome'] ?? '';
            $seed = $_POST['seed'] ?? '';

            $screenshotPath = null;
            if (!empty($_FILES['screenshot']['name'])) {
                $targetDir = __DIR__ . '/../uploads/';
                if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
                $screenshotName = time() . '_' . basename($_FILES['screenshot']['name']);
                $screenshotPath = 'uploads/' . $screenshotName;
                move_uploaded_file($_FILES['screenshot']['tmp_name'], $targetDir . $screenshotName);
            }

            $signaturePath = null;
            if (!empty($_POST['signature_data'])) {
                $targetDir = __DIR__ . '/../uploads/';
                if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
                $signatureName = time() . '_signature.png';
                $signaturePath = 'uploads/' . $signatureName;

                $data = $_POST['signature_data'];
                $data = str_replace('data:image/png;base64,', '', $data);
                $data = str_replace(' ', '+', $data);
                file_put_contents($targetDir . $signatureName, base64_decode($data));
            }

            $this->model->insertData($username, $world_name, $biome, $seed, $screenshotPath, $signaturePath);
            include __DIR__ . '/../views/hasil.php';
        } else {
            header("Location: index.php?action=form");
        }
    }

    public function dataTable() {
        $this->authCheck();
        $data = $this->model->getAllData();
        include __DIR__ . '/../views/data_table.php';
    }
}
