<?php
require_once './vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable('./');
$dotenv->load();
require("./connect/connectmysql.php");

if (!isset($mysqlpdo)) {
    echo json_encode(['success' => false, 'message' => 'ไม่สามารถเชื่อมต่อฐานข้อมูลได้']);
    exit;
}

header('Content-Type: application/json');
header('X-Frame-Options: DENY');
header('X-Content-Type-Options: nosniff');
header('X-XSS-Protection: 1; mode=block');
header('Strict-Transport-Security: max-age=31536000; includeSubDomains; preload');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $csrf_token = $_POST['csrf_token'] ?? '';

    if ($csrf_token !== $_SESSION['csrf_token']) {
        echo json_encode(['success' => false, 'message' => 'CSRF token validation failed']);
        exit;
    }

    $sql = "DELETE FROM patient WHERE txtCid = :id";
    $stmt = $mysqlpdo->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'เกิดข้อผิดพลาดในการลบข้อมูล']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'คำขอไม่ถูกต้อง']);
}
?>
