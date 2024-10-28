<?php
require_once './vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable('./');
$dotenv->load();
require("./connect/connectmysql.php");

if (!isset($mysqlpdo)) {
    echo json_encode(['success' => false, 'message' => 'Cannot connect to database']);
    exit;
}

header('Content-Type: application/json');
header('X-Frame-Options: DENY');
header('X-Content-Type-Options: nosniff');
header('X-XSS-Protection: 1; mode=block');
header('Strict-Transport-Security: max-age=31536000; includeSubDomains; preload');

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            echo json_encode(['success' => false, 'message' => 'CSRF token validation failed']);
            exit;
        }

        $username = trim($_POST['username']);
        $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
        $pname = trim($_POST['pname']);
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
        $adminstatus = trim($_POST['adminstatus']);
        $is_admin = $adminstatus === 'Y' ? 1 : 0;

        $stmt = $mysqlpdo->prepare("SELECT COUNT(*) FROM usermember WHERE username = ?");
        $stmt->execute([$username]);
        if ($stmt->fetchColumn() > 0) {
            echo json_encode(['success' => false, 'message' => 'Username already exists']);
            exit;
        }

        $stmt = $mysqlpdo->prepare("INSERT INTO usermember (username, password, pname, fname, lname, adminstatus, is_admin) VALUES (?, ?, ?, ?, ?, ?, ?)");
        if ($stmt->execute([$username, $password, $pname, $fname, $lname, $adminstatus, $is_admin])) {
            echo json_encode(['success' => true, 'message' => 'User added successfully!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Unable to add user']);
        }
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
    error_log($e->getMessage());
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
    error_log($e->getMessage());
}
?>
