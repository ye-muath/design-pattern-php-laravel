<?php

namespace App\Http\Controllers;

use App\Reports\Classes\ReportFactory;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function generateReport($type){
        $report = ReportFactory::createReport($type);

        return $result = $report->generate();
    }
}
