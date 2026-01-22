<?php
// فئة المنتج - تطبيق التغليف (Encapsulation)
class Product {
    private $name;
    private $price;
    private $stock;

    public function __construct($name, $price, $stock) {
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
    }

    // حساب السعر بعد الخصم
    public function getPriceAfterDiscount($percent) {
        return $this->price - ($this->price * ($percent / 100));
    }

    public function getPrice() { return $this->price; }
    public function getName() { return $this->name; }
}

// فئة العميل
class Customer {
    private $name;
    private $email;
    private $regDate;

    public function __construct($name, $email, $regDate) {
        $this->name = $name;
        $this->email = $email;
        $this->regDate = new DateTime($regDate);
    }

    public function getMembershipYears() {
        return $this->regDate->diff(new DateTime())->y;
    }
}

// فئة الطلب
class Order {
    private $orderNum;
    private $items = [];

    public function __construct($orderNum) {
        $this->orderNum = $orderNum;
    }

    public function addProduct(Product $p) {
        $this->items[] = $p;
    }

    public function getTotal() {
        $sum = 0;
        foreach ($this->items as $item) { $sum += $item->getPrice(); }
        return $sum;
    }
}

// تجربة الكود
$iphone = new Product("iPhone 15", 4000, 5);
$customer = new Customer("أحمد", "ahmed@mail.com", "2021-05-10");
$order = new Order("ORD-101");
$order->addProduct($iphone);

echo "<h2>نظام المتجر</h2>";
echo "المنتج: " . $iphone->getName() . "<br>";
echo "السعر بعد خصم 10%: " . $iphone->getPriceAfterDiscount(10) . " SAR<br>";
echo "عمر العضوية للعميل: " . $customer->getMembershipYears() . " سنوات<br>";
echo "إجمالي الطلب: " . $order->getTotal() . " SAR";