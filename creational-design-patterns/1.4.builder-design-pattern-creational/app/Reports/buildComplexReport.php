<?php
namespace App\Reports;

class buildComplexReport
{
    private $builder;
    public function __construct(ReportBuilderInterface $builder)
    {
        $this->builder = $builder;
    }

    public function index()
    {
        $this->builder->setTitle('Complex Report');
        $this->builder->setContent('This is the content of the complex report.');
        $this->builder->setFooter('Complex Report Footer');
        $this->builder->addChart('Sales Chart');
        $this->builder->addChart('Growth Chart');
        $this->builder->addTable('Sales Data Table');
        $this->builder->addTable('Growth Data Table');
    }
}
