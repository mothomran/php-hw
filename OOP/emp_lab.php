<?php
// الواجهة (Interface) لضمان سلوك موحد
interface Taxable {
    public function applyTax($salary);
}

// الفئة الأساسية - الوراثة (Inheritance)
abstract class Employee {
    protected $name;
    protected $baseSalary;

    public function __construct($name, $baseSalary) {
        $this->name = $name;
        $this->baseSalary = $baseSalary;
    }

    abstract public function calculatePay(); // تعدد الأشكال (Polymorphism)
}

// موظف دائم
class PermanentEmployee extends Employee {
    public function calculatePay() {
        return $this->baseSalary + 500; // بدل سكن ثابت
    }
}

// مدير - يرث من الموظف الدائم (إعادة استخدام الكود)
class Manager extends PermanentEmployee {
    private $bonus;

    public function __construct($name, $baseSalary, $bonus) {
        parent::__construct($name, $baseSalary);
        $this->bonus = $bonus;
    }

    public function calculatePay() {
        return parent::calculatePay() + $this->bonus;
    }
}

// تجربة الكود
$emp = new PermanentEmployee("خالد", 5000);
$mgr = new Manager("سارة", 8000, 2000);

echo "<h2>نظام الموظفين</h2>";
echo "راتب الموظف خالد: " . $emp->calculatePay() . " SAR<br>";
echo "راتب المدير سارة (مع البونص): " . $mgr->calculatePay() . " SAR";