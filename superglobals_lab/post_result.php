<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    if ($user == "admin" && $pass == "1234") {
        echo "<h3>مرحباً بالمشرف ✅</h3>";
    } else {
        echo "<h3>بيانات غير صحيحة ❌</h3>";
    }
}
?>