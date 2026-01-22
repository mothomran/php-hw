<?php
echo "<h2>Advanced Functions Lab</h2>";
echo "<pre>";

// 1. Closure يحتفظ بمتغير "العملة Currency"
// نستخدم الكلمة المحجوزة 'use' لتمرير المتغير من النطاق الخارجي إلى داخل الـ Closure
$currency = "SAR";
$formatPrice = function($amount) use ($currency) {
    return $amount . " " . $currency;
};

echo "1. Closure (Currency): " . $formatPrice(100) . "\n";


// 2. Currying Function للضريبة
// هي دالة تعيد دالة أخرى، مما يسمح بتثبيت وسيط (الضريبة) وتغيير الآخر (السعر)
function calculateTax($taxRate) {
    return function($price) use ($taxRate) {
        return $price + ($price * $taxRate);
    };
}

$vat15 = calculateTax(0.15); // تثبيت ضريبة 15%
echo "2. Currying (Price with 15% Tax): " . $vat15(200) . "\n";


// 3. Lambda Function لحساب مربع الرقم
// دالة مجهولة الاسم (Anonymous) تُخزن في متغير
$square = fn($n) => $n * $n;

echo "3. Lambda (Square of 5): " . $square(5) . "\n";


// 4. Higher-Order Function (HOF)
// دالة تأخذ دالة أخرى كمعامل (Parameter)
function processArray($array, $callback) {
    $result = [];
    foreach ($array as $item) {
        $result[] = $callback($item);
    }
    return $result;
}

$numbers = [1, 2, 3, 4];
$squaredNumbers = processArray($numbers, $square);
echo "4. Higher-Order Function (Squared Array): ";
print_r($squaredNumbers);


// 5. Function Composition
// دمج دالتين بحيث يكون مخرج الأولى مدخلاً للثانية
$double = fn($n) => $n * 2;
$subtractFive = fn($n) => $n - 5;

function compose($f, $g) {
    return fn($x) => $g($f($x));
}

$doubleThenSubtract = compose($double, $subtractFive);
// العملية: (10 * 2) - 5 = 15
echo "5. Function Composition (Double then Subtract 5): " . $doubleThenSubtract(10) . "\n";

echo "</pre>";
?>