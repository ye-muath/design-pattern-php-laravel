<?php

namespace App\Reports;

class ConcreteReportBuilder implements ReportBuilderInterface
{
    private $report;

    public function __construct()
    {
        $this->report = new Report();
    }

    public function setTitle($title)
    {
        $this->report->title = $title;
    }

    public function setContent($content)
    {
        $this->report->content = $content;
    }

    public function setFooter($footer)
    {
        $this->report->footer = $footer;
    }

    public function addChart($chart)
    {
        $this->report->charts[] = $chart;
    }

    public function addTable($table)
    {
        $this->report->tables[] = $table;
    }

    public function getReport(): Report
    {
        return $this->report;
    }
}
