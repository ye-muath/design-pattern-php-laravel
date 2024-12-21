<?php

namespace App\Reports\Classes;
use App\Reports\Interfaces\ReportInterface;
class CsvReport implements ReportInterface {

    public function generate()
    {
        return "CSV REPORT GENERATED";
    }
}
?>
