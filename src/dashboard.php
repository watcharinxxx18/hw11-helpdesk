<?php
require_once 'config/db.php';

// ดึงข้อมูลการแจ้งซ่อมทั้งหมด เรียงจากล่าสุดไปเก่าสุด
$stmt = $conn->query("SELECT * FROM tickets ORDER BY created_at DESC");
$tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - SPUC Helpdesk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 p-6 md:p-10 flex flex-col min-h-screen">
    <div class="max-w-6xl mx-auto bg-white p-6 md:p-8 rounded-xl shadow-lg flex-grow w-full border-t-4 border-blue-600">
        <h2 class="text-3xl font-extrabold text-gray-800 mb-6 flex items-center">
            <span class="mr-3 text-4xl">📊</span> รายการแจ้งซ่อมทั้งหมด
        </h2>
        
        <div class="overflow-x-auto rounded-lg border border-gray-200">
            <table class="w-full text-left border-collapse bg-white">
                <thead>
                    <tr class="bg-gray-800 text-white text-sm uppercase tracking-wider">
                        <th class="p-4 font-medium">รหัส</th>
                        <th class="p-4 font-medium">ผู้แจ้ง</th>
                        <th class="p-4 font-medium">อุปกรณ์</th>
                        <th class="p-4 font-medium">อาการ</th>
                        <th class="p-4 font-medium">สถานะ</th>
                        <th class="p-4 font-medium">เวลาแจ้ง</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php if (count($tickets) > 0): ?>
                        <?php foreach($tickets as $row): ?>
                        <tr class="hover:bg-blue-50 transition duration-150 ease-in-out">
                            <td class="p-4 font-mono text-gray-500">#<?= $row['id'] ?></td>
                            <td class="p-4 font-bold text-blue-700"><?= htmlspecialchars($row['student_name']) ?></td>
                            <td class="p-4 text-gray-800 font-medium"><?= htmlspecialchars($row['device_name']) ?></td>
                            <td class="p-4 text-sm text-gray-600 max-w-xs truncate" title="<?= htmlspecialchars($row['issue_detail']) ?>">
                                <?= htmlspecialchars($row['issue_detail']) ?>
                            </td>
                            <td class="p-4">
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-800 border border-yellow-200 rounded-full text-xs font-bold shadow-sm">
                                    <?= $row['status'] ?>
                                </span>
                            </td>
                            <td class="p-4 text-xs text-gray-500 font-mono"><?= $row['created_at'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="p-8 text-center text-gray-500 font-medium">🎉 ยังไม่มีรายการแจ้งซ่อมในขณะนี้</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="mt-8 text-center text-sm text-gray-500 font-medium bg-white max-w-max mx-auto px-6 py-2 rounded-full shadow-sm">
        ⚙️ จัดการระบบ Database & Backend โดย: [ใส่รหัสนักศึกษา] [ใส่ชื่อ-นามสกุล ของนาย B]
    </div>
</body>
</html>
