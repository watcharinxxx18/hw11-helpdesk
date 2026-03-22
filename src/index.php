<?php
require_once 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_name = $_POST['student_name'];
    $device_name = $_POST['device_name'];
    $issue_detail = $_POST['issue_detail'];

    try {
        $sql = "INSERT INTO tickets (student_name, device_name, issue_detail) VALUES (:student_name, :device_name, :issue_detail)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['student_name' => $student_name, 'device_name' => $device_name, 'issue_detail' => $issue_detail]);
        $success = "บันทึกข้อมูลแจ้งซ่อมสำเร็จ! ช่างกำลังเตรียมตัวลงพื้นที่ครับ";
    } catch(PDOException $e) {
        $error = "เกิดข้อผิดพลาดในการบันทึก: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>SPUC Helpdesk - แจ้งซ่อม</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex flex-col items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">
        <h2 class="text-3xl font-extrabold text-blue-600 mb-6 text-center">🛠️ แจ้งซ่อม IT SPUC</h2>
        
        <?php if(isset($success)) echo "<div class='bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-center'>$success</div>"; ?>
        <?php if(isset($error)) echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-center'>$error</div>"; ?>

        <form method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">👤 ชื่อผู้แจ้ง</label>
                <input type="text" name="student_name" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">💻 อุปกรณ์ที่พัง</label>
                <input type="text" name="device_name" required placeholder="เช่น คอมพิวเตอร์, โปรเจคเตอร์" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">📝 อาการเบื้องต้น</label>
                <textarea name="issue_detail" rows="3" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 rounded-lg hover:bg-blue-700 transition duration-300 shadow-md">ส่งเรื่องแจ้งซ่อม</button>
        </form>
    </div>
    
    <div class="mt-8 text-sm text-gray-500 font-medium bg-white px-4 py-2 rounded-full shadow-sm">
        ✨ พัฒนาส่วนหน้าบ้าน (Frontend) โดย: [67706660] [วัชรินทร์ สมบุญผลปรีชา]
    </div>
</body>
</html>
