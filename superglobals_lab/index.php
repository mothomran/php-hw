<?php
echo "<h2>بيانات السيرفر المحفوظة في \$_SERVER</h2>";
echo "<pre>";
print_r($_SERVER);
echo "</pre>";

echo "<hr>";
echo "<b>طريقة الطلب (REQUEST_METHOD): </b>" . $_SERVER['REQUEST_METHOD'] . "<br>";
echo "<b>عنوان IP الخاص بك (REMOTE_ADDR): </b>" . $_SERVER['REMOTE_ADDR'] . "<br>";
echo "<b>معلومات المتصفح (HTTP_USER_AGENT): </b>" . $_SERVER['HTTP_USER_AGENT'] . "<br>";
?>