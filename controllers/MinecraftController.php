<?php
// controllers/MinecraftController.php
require_once __DIR__ . '/../models/MinecraftModel.php';

class MinecraftController {
    private $model;
    public function __construct() {
        $this->model = new MinecraftModel();
        if (session_status() === PHP_SESSION_NONE) session_start();
    }

    private function requireAuth() {
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?action=login');
            exit;
        }
    }

    public function dashboard() {
        $this->requireAuth();
        include __DIR__ . '/../views/dashboard.php';
    }

    public function form() {
        $this->requireAuth();
        include __DIR__ . '/../views/form.php';
    }

    public function submit() {
        $this->requireAuth();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?action=form'); exit;
        }

        $data = [];
        $data['username'] = $_SESSION['user'];
        $data['world_name'] = trim($_POST['world_name'] ?? '');
        $data['biome'] = trim($_POST['biome'] ?? '');
        $data['seed'] = trim($_POST['seed'] ?? '');
        $data['creation_date'] = $_POST['creation_date'] ?? date('Y-m-d');

        // handle foto upload
        $fotoPath = null;
        if (!empty($_FILES['foto']['name']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
            $targetDir = __DIR__ . '/../uploads/';
            if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
            $filename = 'foto_' . time() . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
            $dest = $targetDir . $filename;
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $dest)) {
                $fotoPath = 'uploads/' . $filename;
            }
        }

        // handle tanda_tangan (base64 dataURL)
        $ttdPath = null;
        if (!empty($_POST['tanda_tangan'])) {
            $imgData = $_POST['tanda_tangan'];
            if (strpos($imgData, 'data:image/png;base64,') === 0) {
                $imgData = str_replace('data:image/png;base64,', '', $imgData);
                $imgData = str_replace(' ', '+', $imgData);
                $targetDir = __DIR__ . '/../uploads/';
                if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
                $file = $targetDir . 'sign_' . time() . '_' . bin2hex(random_bytes(4)) . '.png';
                file_put_contents($file, base64_decode($imgData));
                $ttdPath = 'uploads/' . basename($file);
            }
        }

        $data['foto'] = $fotoPath;
        $data['tanda_tangan'] = $ttdPath;

        $this->model->insert($data);

        // redirect to hasil (we can pass id or just show hasil page)
        header('Location: index.php?action=hasil');
        exit;
    }

    public function hasil() {
        $this->requireAuth();
        include __DIR__ . '/../views/hasil.php';
    }

    public function dataTable() {
        $this->requireAuth();
        $rows = $this->model->getAll();
        include __DIR__ . '/../views/data_table.php';
    }


}
