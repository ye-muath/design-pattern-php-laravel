<?php

namespace App\Observers;


// تعريف واجهة المراقب
interface ObserveInterface {
    public function update($message);
}
