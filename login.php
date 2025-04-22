<?php
session_start();
require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $error = "يرجى إدخال اسم المستخدم وكلمة المرور.";
        header("Location: login.php?error=" . urlencode($error));
        exit();
    }

    // استخدام Prepared Statements لمنع الثغرات
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        
        // التحقق من كلمة المرور باستخدام password_verify
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: index.php");
            exit();
        } else {
            $error = "بيانات الدخول غير صحيحة!";
        }
    } else {
        $error = "بيانات الدخول غير صحيحة!";
    }

    $stmt->close();
    header("Location: login.php?error=" . urlencode($error));
    exit();
} else {
    header("Location: login.php");
    exit();
}

$conn->close();
?>