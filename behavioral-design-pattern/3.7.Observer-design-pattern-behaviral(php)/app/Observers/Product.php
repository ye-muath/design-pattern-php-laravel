<?php

namespace App\Observers;

use App\Observers\ObserveInterface;
use App\Observers\SubjectInterface;
// تنفيذ الموضوع
class Product implements SubjectInterface {
    private $observers = []; // قائمة المراقبين
    private $state;          // الحالة الحالية للمنتج

    // إضافة مراقب
    public function attach(ObserveInterface $observer) {
        $this->observers[] = $observer;
    }

    // إزالة مراقب
    public function detach(ObserveInterface $observer) {
        foreach ($this->observers as $key => $obs) {
            if ($obs === $observer) {
                unset($this->observers[$key]);
            }
        }
    }

    // إشعار المراقبين
    public function notify() {
        foreach ($this->observers as $observer) {
            $observer->update("تم تغيير حالة المنتج إلى: {$this->state}");
        }
    }

    // تغيير حالة المنتج
    public function setState($state) {
        $this->state = $state;
        $this->notify(); // إشعار جميع المراقبين بالتغيير
    }
}