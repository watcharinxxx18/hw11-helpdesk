-- 👨‍💻 สร้างตารางโดย: [ใส่รหัสนักศึกษา] [ใส่ชื่อ-นามสกุล ของนาย B]
CREATE DATABASE IF NOT EXISTS `helpdesk_db`;
USE `helpdesk_db`;

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_name` varchar(100) NOT NULL,
  `device_name` varchar(100) NOT NULL,
  `issue_detail` text NOT NULL,
  `status` enum('รอดำเนินการ','กำลังซ่อม','เสร็จสิ้น') DEFAULT 'รอดำเนินการ',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
