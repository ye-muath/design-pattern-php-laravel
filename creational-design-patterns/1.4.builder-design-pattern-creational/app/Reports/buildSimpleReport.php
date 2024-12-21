<?php
namespace App\Reports;

class buildSimpleReport
{
    private $builder;
    public function __construct(ReportBuilderInterface $builder)
    {
        $this->builder = $builder;
    }

    public function index()
    {
        $this->builder->setTitle('Simple Report');
        $this->builder->setContent('This is the content of the simple report.');
        $this->builder->setFooter('Simple Report Footer');
    }
}
