<?php

namespace App\Observers;

use App\Observers\ObserveInterface;

// تنفيذ المراقب
class User implements ObserveInterface {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    // استقبال الإشعار من الموضوع
    public function update($message) {
        echo "المستخدم {$this->name} تلقى إشعار: {$message}\n";
    }
}

