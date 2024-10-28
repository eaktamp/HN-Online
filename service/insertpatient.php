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

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (is_csrf_valid()) {
            die(json_encode(['success' => false, 'message' => 'CSRF token validation failed']));
        }

        $fields = [
            'txtPrename', 'txtName', 'txtLname', 'txtGender', 'txtStatus',
            'txtBd', 'txtBm', 'txtBy', 'txtCid', 'txtNationality',
            'txtReligion', 'txtEmail', 'txtOccupation', 'txtEducation',
            'txtName2', 'txtLname2', 'txtNameDad', 'txtLnameDad',
            'txtNameMom', 'txtLnameMom', 'txtNo', 'txtMo', 'txtAlley',
            'txtSubDistrict', 'txtDistrict', 'txtProvince', 'txtPostCode',
            'txtTel'
        ];
        
        $data = array_map(fn($field) => filter_var($_POST[$field] ?? '', FILTER_SANITIZE_SPECIAL_CHARS), $fields);
        $data['txtHN'] = 0;
        $data['txtConfirm'] = 0;

        $sql = "INSERT INTO Patient (" . implode(', ', $fields) . ", txtHN, txtConfirm, txtadmin) VALUES (" . str_repeat('?, ', count($fields)) . "?, ?, '0')";
        $stmt = $mysqlpdo->prepare($sql);

        if ($stmt->execute(array_values($data))) {
            echo json_encode(['success' => true, 'message' => 'เราได้รับข้อมูลของท่านเรียบร้อยแล้ว']);
        } else {
            echo json_encode(['success' => false, 'message' => 'เกิดข้อผิดพลาดในการบันทึกข้อมูล']);
        }
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'เกิดข้อผิดพลาด: ' . $e->getMessage()]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'เกิดข้อผิดพลาด: ' . $e->getMessage()]);
}
?>
