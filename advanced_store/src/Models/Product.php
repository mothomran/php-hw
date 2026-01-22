<?php
namespace App\Models;
use App\Traits\LoggerTrait;

class Product {
    use LoggerTrait;

    private $name;
    private $price;
    private $stock;

    public function __construct($name, $price, $stock) {
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
        $this->logEvent("تم إنشاء المنتج: $name");
    }

    public function setPrice($newPrice) {
        $oldPrice = $this->price;
        $this->price = $newPrice;
        $this->logEvent("تعديل سعر المنتج '{$this->name}' من $oldPrice إلى $newPrice");
    }

    public function getPrice() { return $this->price; }
}