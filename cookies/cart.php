<?php
session_start();

// تهيئة العربة إذا لم تكن موجودة
if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// 1. إضافة منتج للعربة
if(isset($_GET['add'])) {
    $product_id = $_GET['add'];
    if(isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]++;
    } else {
        $_SESSION['cart'][$product_id] = 1;
    }
}

// 2. إفراغ العربة
if(isset($_GET['clear'])) {
    session_destroy();
    header("Location: cart.php");
    exit();
}

echo "<h2>🛒 عربة التسوق</h2>";

// 3. عرض المحتويات
if(empty($_SESSION['cart'])) {
    echo "العربة فارغة حالياً.";
} else {
    foreach($_SESSION['cart'] as $id => $qty) {
        echo "المنتج #$id — الكمية: $qty <br>";
    }
}

echo "<hr>";
echo "<a href='?add=" . rand(1, 100) . "'>➕ إضافة منتج عشوائي</a> | ";
echo "<a href='?clear=1' style='color:red;'>🗑️ إفراغ العربة</a>";
?>