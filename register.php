<?php
// تضمين ملف الاتصال بقاعدة البيانات (يفضل فصله)
require_once 'db_connect.php';

// التحقق من أن الطلب تم بطريقة POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // استلام البيانات من النموذج
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // التحقق من صحة البيانات الأساسية
    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
        $error = "يرجى ملء جميع الحقول.";
        header("Location: register.html?error=" . urlencode($error));
        exit();
    }

    // التحقق من تطابق كلمة المرور
    if ($password !== $confirmPassword) {
        $error = "كلمة المرور وتأكيد كلمة المرور غير متطابقتين.";
        header("Location: register.html?error=" . urlencode($error));
        exit();
    }

    // التحقق من طول كلمة المرور (مثال: يجب أن تكون 6 أحرف على الأقل)
    if (strlen($password) < 6) {
        $error = "يجب أن تكون كلمة المرور 6 أحرف على الأقل.";
        header("Location: register.html?error=" . urlencode($error));
        exit();
    }

    // التحقق من صحة تنسيق البريد الإلكتروني
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "صيغة البريد الإلكتروني غير صحيحة.";
        header("Location: register.html?error=" . urlencode($error));
        exit();
    }

    // تشفير كلمة المرور قبل تخزينها في قاعدة البيانات (استخدام دالة password_hash الآمنة)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // التحقق مما إذا كان البريد الإلكتروني موجودًا بالفعل في قاعدة البيانات
    $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $error = "هذا البريد الإلكتروني مسجل بالفعل.";
        $stmt->close();
        header("Location: register.html?error=" . urlencode($error));
        exit();
    }

    $stmt->close();

    // إدخال المستخدم الجديد إلى قاعدة البيانات
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashedPassword);

    if ($stmt->execute()) {
        $success = "تم إنشاء الحساب بنجاح!";
        header("Location: register.html?success=" . urlencode($success));
    } else {
        $error = "حدث خطأ أثناء إنشاء الحساب. يرجى المحاولة مرة أخرى.";
        header("Location: register.html?error=" . urlencode($error));
    }

    $stmt->close();
    $conn->close();
} else {
    // إذا تم الوصول إلى هذا الملف بطريقة غير POST
    header("Location: register.html");
    exit();
}
?>