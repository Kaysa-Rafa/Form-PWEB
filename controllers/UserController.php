<?php
// controllers/UserController.php
require_once __DIR__ . '/../models/UserModel.php';

class UserController {
    private $model;
    public function __construct() {
        $this->model = new UserModel();
        if (session_status() === PHP_SESSION_NONE) session_start();
    }

    public function showLogin() {
        // don't include navbar on login
        include __DIR__ . '/../views/login.php';
    }

    public function auth() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?action=login'); exit;
        }
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        $user = $this->model->getByUsername($username);
        if ($user) {
            // $user['password'] is bcrypt (from crypt in SQL) -> password_verify compatible
            if (password_verify($password, $user['password']) || crypt($password, $user['password']) === $user['password']) {
                $_SESSION['user'] = $user['username'];
                header('Location: index.php?action=dashboard');
                exit;
            }
        }
        // failed
        header('Location: index.php?action=login&error=1');
        exit;
    }

    public function logout() {
        session_unset();
        session_destroy();
        header('Location: index.php?action=login');
        exit;
    }
}
