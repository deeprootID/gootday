<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use App\Product;

class chartController extends Controller
{
    public function index()
    {
        $chart = Charts::database(Product::all(), 'bar', 'highcharts')
            ->elementLabel("Total")
            ->dimensions(1000, 500)
            ->responsive(false)
            ->groupBy('nama');
        
        return view('chart', ['chart' => $chart]);
    }
}
