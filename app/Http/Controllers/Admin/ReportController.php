<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Date;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function treasury(){
        $prices = Price::whereHas('doctors')->get();
        return view('admin.reports.treasury',compact('prices'));
    }
    public function dates(){
        $dates = Date::whereHas('doctors')->get();
        return view('admin.reports.dates',compact('dates'));
    }
   
}
