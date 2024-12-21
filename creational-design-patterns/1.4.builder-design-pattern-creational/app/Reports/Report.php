<?php

namespace App\Reports;

class Report
{
    public $title;
    public $content;
    public $footer;
    public $charts;
    public $tables;

    public function display()
    {
        return "Report: \nTitle: {$this->title}\nContent: {$this->content}\nFooter: {$this->footer}";
    }
}

?>
