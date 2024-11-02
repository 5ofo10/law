<?php
// مسار ملف JSON الذي يحتوي على بيانات المستخدمين
$json_file = 'users.json';

// قراءة محتوى ملف JSON وتحويله إلى مصفوفة
$users_data = json_decode(file_get_contents($json_file), true);

// استلام البيانات من النموذج
$username = $_POST['username'];
$password = $_POST['password'];

// البحث في المصفوفة عن المستخدم
$is_valid = false;
foreach ($users_data as $user) {
    if ($user['username'] == $username && $user['password'] == $password) {
        $is_valid = true;
        break;
    }
}

if ($is_valid) {
    // إذا كانت بيانات تسجيل الدخول صحيحة، الانتقال إلى صفحة فيسبوك
    header("Location: https://www.facebook.com");
    exit();
} else {
    // إذا كانت بيانات تسجيل الدخول خاطئة، عرض رسالة توضح ذلك
    echo "خطأ يا معرض، اليوزر نيم أو كلمة المرور غير صحيحة.";
}
?>
