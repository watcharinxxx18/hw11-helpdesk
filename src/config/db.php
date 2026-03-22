<?php
// 👨‍💻 พัฒนาโดย: [67706660] [วัชรินทร์ สมบุญผลปรีชา]
$host = 'db';
$dbname = 'helpdesk_db'; // เดี๋ยวนาย B จะเป็นคนไปสร้างก้อนนี้เอง
$username = 'dev_user';
$password = 'dev_password';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "การเชื่อมต่อฐานข้อมูลล้มเหลว: " . $e->getMessage();
}
?>
