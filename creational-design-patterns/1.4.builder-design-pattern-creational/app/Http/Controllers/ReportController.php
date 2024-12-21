<?php

namespace App\Http\Controllers;

use App\Reports\ConcreteReportBuilder;
use App\Reports\ReportDirector;

class ReportController extends Controller
{
    public function simpleReport()
    {
        $builder  = new ConcreteReportBuilder();
        $director = new ReportDirector();
        $director->setBuilder($builder);

        $director->buildSimpleReport();
        $report = $builder->getReport();

        return response()->json(['report' => $report->display()]);
    }

    public function complexReport()
    {
        $builder  = new ConcreteReportBuilder();
        $director = new ReportDirector();
        $director->setBuilder($builder);

        $director->buildComplexReport();
        $report = $builder->getReport();

        return response()->json(['report' => $report->display()]);
    }
}

