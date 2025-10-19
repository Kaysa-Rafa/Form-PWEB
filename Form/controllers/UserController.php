<?php
// controllers/UserController.php

if (session_status() === PHP_SESSION_NONE) session_start();

require_once __DIR__ . '/../models/UserModel.php';

class UserController {
    private $model;

    public function __construct() {
        $this->model = new UserModel();
    }

    public function showLogin() {
        include __DIR__ . '/../views/login.php';
    }

    public function auth() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = $this->model->getByUsername($username);

            if ($user && $user['password'] === $password) {
                $_SESSION['username'] = $username;
                header("Location: index.php?action=dashboard");
                exit;
            } else {
                $error = "Login gagal! Username atau password salah.";
                include __DIR__ . '/../views/login.php';
            }
        } else {
            $this->showLogin();
        }
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?action=login");
        exit;
    }
}
