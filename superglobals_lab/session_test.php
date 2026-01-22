<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['my_name'])) {
    $_SESSION['name'] = $_POST['my_name'];
}

if (!isset($_SESSION['name'])) {
    echo '<form method="post">
            <input type="text" name="my_name" placeholder="اكتب اسمك لأول مرة">
            <button type="submit">حفظ في الجلسة</button>
          </form>';
} else {
    echo "مرحباً يا " . $_SESSION['name'] . "، هذه ليست زيارتك الأولى. <br>";
    echo "<a href='?logout=1'>مسح الجلسة (خروج)</a>";
}

// كود إضافي لمسح الجلسة عند الحاجة
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: session_test.php");
}
?>