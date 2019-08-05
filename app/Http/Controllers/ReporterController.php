<?php

namespace App\Http\Controllers;

use App\Reporter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReporterController extends Controller
{
    public function index()
    {
        $reporters = Reporter::all()->take(100);
        return view('reporter.index', compact('reporters'));
    }

    public function filterbydate(Request $request)
    {
        $daterange = $request->input('daterange3');
        $splitdate = explode(" ", $daterange);
        $startdate = date('Y-m-d', strtotime($splitdate[0]));
        $enddate = date('Y-m-d', strtotime($splitdate[2]));


        $reporters = Reporter::whereBetween('created_at', [$startdate, $enddate])->get();
        return view('reporter.index', compact('reporters'));
    }
}
