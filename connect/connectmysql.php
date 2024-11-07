<?php
$servername = $_ENV['MYDB_HOST'];
$username = $_ENV['MYDB_USERNAME'];
$password = $_ENV['MYDB_PASSWORD'];
$dbname = $_ENV['MYDB_DBNAME'];
try {
    $dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8";
    $mysqlpdo = new PDO($dsn, $username, $password);
    $mysqlpdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ไม่สามารถเชื่อมต่อฐานข้อมูลได้: " . $e->getMessage());
}
?>
