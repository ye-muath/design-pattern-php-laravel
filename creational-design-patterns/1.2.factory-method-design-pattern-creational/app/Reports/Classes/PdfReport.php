<?php

namespace App\Reports\Classes;
use App\Reports\Interfaces\ReportInterface;
class PdfReport implements ReportInterface {

    public function generate()
    {
        return "PDF REPORT GENERATED";
    }
}
?>
