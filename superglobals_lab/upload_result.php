<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $file = $_FILES['my_file'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($file["name"]);
    
    // 1. تحقق من الحجم (مثلاً أقل من 2 ميجا)
    if ($file["size"] > 2000000) {
        echo "الملف كبير جداً!";
    } else {
        // 2. نقل الملف
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            echo "تم رفع الملف بنجاح: " . htmlspecialchars(basename($file["name"]));
        } else {
            echo "حدث خطأ أثناء الرفع.";
        }
    }
}
?>