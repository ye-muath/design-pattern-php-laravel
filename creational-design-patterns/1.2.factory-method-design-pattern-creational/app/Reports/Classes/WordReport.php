<?php

namespace App\Reports\Classes;
use App\Reports\Interfaces\ReportInterface;
class WordReport implements ReportInterface {

    public function generate()
    {
        return "WORD REPORT GENERATED";
    }
}
?>
