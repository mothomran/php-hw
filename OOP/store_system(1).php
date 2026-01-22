<?php

// 1. فئة المنتج (Product)
class Product {
    // 2 & 5: جعل الخصائص private لحماية البيانات من التعديل المباشر
    private $name;
    private $price;
    private $stock;

    // 3. استخدام Constructor لتعيين القيم عند إنشاء الكائن
    public function __construct($name, $price, $stock) {
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
    }

    // دالة للخصم (إمكانية الخصم)
    public function applyDiscount($percentage) {
        $this->price -= ($this->price * ($percentage / 100));
    }

    public function getPrice() {
        return $this->price;
    }

    public function getName() {
        return $this->name;
    }

    // 4. دالة سحرية لعرض تفاصيل المنتج كـ String
    public function __toString() {
        return "المنتج: {$this->name} | السعر: {$this->price} SAR";
    }
}

// 1. فئة العميل (Customer)
class Customer {
    private $name;
    private $email;
    private $registrationDate;

    public function __construct($name, $email, $registrationDate) {
        $this->name = $name;
        $this->email = $email;
        $this->registrationDate = new DateTime($registrationDate);
    }

    // حساب عمر العضوية بالسنوات
    public function getMembershipYears() {
        $now = new DateTime();
        $interval = $this->registrationDate->diff($now);
        return $interval->y;
    }
}

// 1. فئة الطلب (Order)
class Order {
    private $orderNumber;
    private $date;
    private $status;
    private $items = []; // مصفوفة لتخزين كائنات المنتجات

    public function __construct($orderNumber) {
        $this->orderNumber = $orderNumber;
        $this->date = date("Y-m-d");
        $this->status = "Pending";
    }

    public function addProduct(Product $product) {
        $this->items[] = $product;
    }

    // حساب المبلغ الإجمالي
    public function calculateTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getPrice();
        }
        return $total;
    }
}

// --- تجربة النظام ---
$p1 = new Product("iPhone 15", 4000, 10);
$p1->applyDiscount(10); // خصم 10%

$user = new Customer("محمد", "m@test.com", "2020-01-01");

$order = new Order("#8891");
$order->addProduct($p1);

echo "إجمالي الطلب: " . $order->calculateTotal() . " SAR" . PHP_EOL;
echo "عمر العضوية: " . $user->getMembershipYears() . " سنوات";