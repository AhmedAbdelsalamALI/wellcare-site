<?php
$servername = "localhost"; // غالبًا ما يكون "localhost"
$username = "root";      // اسم مستخدم قاعدة البيانات الافتراضي لـ XAMPP
$password = "";          // كلمة مرور قاعدة البيانات الافتراضية لـ XAMPP (عادةً ما تكون فارغة)
$dbname = "wellcare_db"; // اسم قاعدة البيانات التي ستستخدمها

// إنشاء اتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من وجود أخطاء في الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// تعيين ترميز الاتصال إلى UTF-8 لدعم اللغة العربية
$conn->set_charset("utf8");
?>