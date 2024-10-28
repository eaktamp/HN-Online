<?php
require_once './vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable('./');
$dotenv->load();
require("./connect/connectmysql.php");

header('Content-Type: application/json');
header('X-Frame-Options: DENY');
header('X-Content-Type-Options: nosniff');
header('X-XSS-Protection: 1; mode=block');
header('Strict-Transport-Security: max-age=31536000; includeSubDomains; preload');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['csrf_token']) || !isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die(json_encode(['success' => false, 'message' => 'CSRF token validation failed']));
    }

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    try {
        $stmt = $mysqlpdo->prepare("SELECT * FROM usermember WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            session_regenerate_id(true); 
            $_SESSION['admin'] = $user['is_admin'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['loggedin'] = true;
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'ไม่สามารถเข้าสู่ระบบได้']);
        }
    } catch (PDOException $e) {
        error_log($e->getMessage());
        echo json_encode(['success' => false, 'message' => 'เกิดข้อผิดพลาดในการประมวลผล']);
    }
}
