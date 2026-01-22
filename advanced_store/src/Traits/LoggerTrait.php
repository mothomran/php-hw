<?php
namespace App\Traits;

trait LoggerTrait {
    public function logEvent($message) {
        echo "[LOG - " . date("Y-m-d H:i:s") . "]: " . $message . "<br>";
    }
}