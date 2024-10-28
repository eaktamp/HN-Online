<?php
require_once './vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable('./');
$dotenv->load();

require("./connect/connectpostgre.php");
require("./connect/connectmysql.php");

header('Content-Type: application/json');
header('X-Frame-Options: DENY');
header('X-Content-Type-Options: nosniff');
header('X-XSS-Protection: 1; mode=block');
header('Strict-Transport-Security: max-age=31536000; includeSubDomains; preload');

$timeLimit = 60;
$maxRequests = 15;

try {
    if (!isset($_SESSION['request_count'])) {
        $_SESSION['request_count'] = 0;
        $_SESSION['start_time'] = time();
    }
    if (time() - $_SESSION['start_time'] > $timeLimit) {
        $_SESSION['request_count'] = 1;
        $_SESSION['start_time'] = time();
    } else {
        $_SESSION['request_count']++;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
            die(json_encode(['success' => false, 'message' => 'CSRF token validation failed']));
        }
    }

    if ($_SESSION['request_count'] > $maxRequests) {
        header('HTTP/1.1 429 Too Many Requests');
        die(json_encode(['success' => false, 'message' => 'Rate limit exceeded. Please try again later.']));
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $txtCid = trim($_POST['txtCid']); 
        $bdDay = $_POST['txtBd'];
        $bdMonth = $_POST['txtBm'];
        $bdYear = $_POST['txtBy'];

        if (empty($txtCid)) {
            echo json_encode(['success' => false, 'message' => 'ไม่พบข้อมูลสำหรับรหัสประจำตัวประชาชนนี้']);
            exit;
        }

        $bdYearGregorian = $bdYear - 543;
        $bd = $bdYearGregorian . '-' . str_pad($bdMonth, 2, '0', STR_PAD_LEFT) . '-' . str_pad($bdDay, 2, '0', STR_PAD_LEFT);

        $txtHN = '0';
        $mysqlQuery = "SELECT * FROM patient WHERE txtCid = :txtCid AND txtHN = :txtHN AND txtBd = :txtBd AND txtBm = :txtBm AND txtBy = :txtBy";
        $stmt_mysql = $mysqlpdo->prepare($mysqlQuery);
        $stmt_mysql->bindParam(':txtCid', $txtCid, PDO::PARAM_STR);
        $stmt_mysql->bindParam(':txtHN', $txtHN, PDO::PARAM_STR);
        $stmt_mysql->bindParam(':txtBd', $bdDay, PDO::PARAM_STR);
        $stmt_mysql->bindParam(':txtBm', $bdMonth, PDO::PARAM_STR); 
        $stmt_mysql->bindParam(':txtBy', $bdYear, PDO::PARAM_STR); 
        $stmt_mysql->execute();
        $mysqlData = $stmt_mysql->fetch(PDO::FETCH_ASSOC);

        if ($mysqlData) {
            echo json_encode(['success' => false, 'message' => 'รออนุมัติ']);
            exit;
        }

        $hisQuery = "SELECT cid, hn, pname, fname, lname, birthday FROM patient WHERE cid = :cid LIMIT 1";
        $stmt = $pdo->prepare($hisQuery);
        $stmt->bindParam(':cid', $txtCid, PDO::PARAM_STR);
        $stmt->execute();
        $hisdata = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($hisdata) {
            if ($hisdata['birthday'] !== $bd) {
                echo json_encode(['success' => false, 'message' => 'มีรหัสประจำตัวประชาชนนี้ในระบบแล้ว แต่ข้อมูลวันเดือนปีเกิดไม่ถูกต้อง']);
            } else {
                $hn = $hisdata['hn'];
                $pname = $hisdata['pname'];
                $fname = $hisdata['fname'];
                $lname = $hisdata['lname'];
                echo json_encode([
                    'success' => true,
                    'hn' => $hn,
                    'pname' => $pname,
                    'fname' => $fname,
                    'lname' => $lname,
                ]);
            }
        } else {
            echo json_encode(['success' => false, 'redirect' => true, 'cid' => $txtCid, 'bdDay' => $bdDay, 'bdMonth' => $bdMonth, 'bdYear' => $bdYear]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'ไม่พบข้อมูล']);
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'เกิดข้อผิดพลาดในการเชื่อมต่อ: ' . $e->getMessage()]);
}
?>