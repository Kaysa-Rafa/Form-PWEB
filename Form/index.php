<?php
// index.php (root)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) session_start();

// autoload simple (manual)
require_once __DIR__ . '/controllers/UserController.php';
require_once __DIR__ . '/controllers/MinecraftController.php';

$action = $_GET['action'] ?? 'login';

$userController = new UserController();
$mcController = new MinecraftController();

switch ($action) {
    // User
    case 'login':
        $userController->showLogin();
        break;
    case 'auth':
        $userController->auth();
        break;
    case 'logout':
        $userController->logout();
        break;

    // Minecraft
    case 'dashboard':
        $mcController->dashboard();
        break;
    case 'form':
        $mcController->form();
        break;
    case 'submit':
        $mcController->submit(); // handles POST
        break;
    case 'hasil':
        $mcController->hasil();
        break;
    case 'data':
        $mcController->dataTable();
        break;

    default:
        // unknown -> go to login
        $userController->showLogin();
        break;
}
