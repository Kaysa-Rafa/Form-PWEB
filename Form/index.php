<?php
// index.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// atur lokasi penyimpanan session
$sessionPath = __DIR__ . '/tmp';
if (!file_exists($sessionPath)) mkdir($sessionPath, 0777, true);
ini_set('session.save_path', $sessionPath);

if (session_status() === PHP_SESSION_NONE) session_start();

require_once __DIR__ . '/controllers/UserController.php';
require_once __DIR__ . '/controllers/MinecraftController.php';

$action = $_GET['action'] ?? 'login';

$userController = new UserController();
$mcController = new MinecraftController();

switch ($action) {
    case 'login':
        $userController->showLogin();
        break;
    case 'auth':
        $userController->auth();
        break;
    case 'logout':
        $userController->logout();
        break;
    case 'dashboard':
        $mcController->dashboard();
        break;
    case 'form':
        $mcController->form();
        break;
    case 'submit':
        $mcController->submit();
        break;
    case 'data':
        $mcController->dataTable();
        break;
    default:
        $userController->showLogin();
        break;
}
