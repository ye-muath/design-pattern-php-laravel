<?php

namespace App\Reports\Classes;

class ReportFactory {

   public static function createReport($type)
   {
    switch ($type) {
        case "pdf";
        return new PdfReport();
        case "csv";
        return new CsvReport();
        case "word";
        return new WordReport();
        default:
        throw new \InvalidArgumentException("Invalid report type provided: $type");

    }
   }
}
?>


