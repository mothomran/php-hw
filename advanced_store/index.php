<?php
// 3. Autoloading: تحميل الفئات تلقائياً بناءً على الـ Namespace
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/src/';
    $len = strlen($prefix);
    
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

use App\Models\Product;

// تجربة النظام
$item = new Product("Laptop", 5000, 10);
$item->setPrice(4500);