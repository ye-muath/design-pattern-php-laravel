<?php

namespace App\Observers;

use App\Observers\ObserveInterface;

// تعريف واجهة الموضوع (Subject)
interface SubjectInterface {
    public function attach(ObserveInterface $observer);  // إضافة مراقب
    public function detach(ObserveInterface $observer);  // إزالة مراقب
    public function notify();                    // إشعار المراقبين
}