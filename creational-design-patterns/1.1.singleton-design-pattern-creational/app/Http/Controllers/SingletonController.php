<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SingletonController extends Controller
{
    private static $instance;
    private static $count = 0;
    private function __construct() {
        self::$count++;
    }
    public static function getInstance() {
        if(!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public static function className() {
        return "Singleton Design Pattern and Count " . self::$count;
    }
}
