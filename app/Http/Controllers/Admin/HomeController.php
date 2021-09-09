<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Charts as Charts;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::put('language','vi');
        $chart["cart"]= new Charts\CartAllChart();
        $chart["revenue"]= new Charts\RevenueChart();
        $chart["tag"]= new Charts\TagChart();
        return view('admin.layout.home')->with('chart', $chart);
    }
}
