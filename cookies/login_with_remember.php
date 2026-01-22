<?php
session_start();

// دالة لإنشاء توكن وحفظه في الكوكي
function create_remember_token($user_id) {
    $token = bin2hex(random_bytes(32)); 
    $expires = time() + (30 * 24 * 60 * 60); // صالح لـ 30 يوم
    
    // ملاحظة: هنا يجب أن يتم التخزين في قاعدة البيانات (DB) ربطاً بالـ user_id
    
    setcookie("remember_token", $token, $expires, "/", "", false, true);
    return $token;
}

echo "<h2>🔑 نظام تذكر المستخدم (Cookies & Tokens)</h2>";

if(isset($_COOKIE['remember_token'])) {
    echo "✅ تم العثور على 'Token' في الكوكيز: <br><code>" . $_COOKIE['remember_token'] . "</code>";
} else {
    echo "❌ لا يوجد توكن حالياً. <br>";
    echo "<a href='?login=1'>محاكاة تسجيل دخول مع تفعيل (تذكرني)</a>";
}

if(isset($_GET['login'])) {
    create_remember_token(101); // محاكاة مستخدم برقم 101
    header("Location: login_with_remember.php");
}
?>