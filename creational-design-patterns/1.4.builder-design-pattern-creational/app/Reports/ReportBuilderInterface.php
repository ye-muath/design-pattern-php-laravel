<?php

namespace App\Reports;

interface ReportBuilderInterface
{
    public function setTitle($title);
    public function setContent($content);
    public function setFooter($footer);
    public function addChart($chart);
    public function addTable($table);
    public function getReport(): Report;
}
