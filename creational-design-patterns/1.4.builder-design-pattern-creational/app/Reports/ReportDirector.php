<?php
// app/Reports/ReportDirector.php

namespace App\Reports;

class ReportDirector
{
    private $builder;

    public function setBuilder(ReportBuilderInterface $builder)
    {
        $this->builder = $builder;
    }

    public function buildSimpleReport()
    {
        $builder = new buildSimpleReport($this->builder);
        $builder->index();
    }

    public function buildComplexReport()
    {
        $builder = new buildComplexReport($this->builder);
        $builder->index();
    }
}
