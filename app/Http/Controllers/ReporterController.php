<?php

namespace App\Http\Controllers;

use App\Reporter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReporterController extends Controller
{
    public function index(Request $request)
    {
        $reporters = Reporter::all()->take(100);

        $daterange = $request->input('daterange3');
        if (!$daterange) {
            return view('reporter.index',compact('reporters','daterange'));
        }
        $splitdate = explode(" ", $daterange);
        $startdate = date('Y-m-d', strtotime($splitdate[0]));
        $enddate = date('Y-m-d', strtotime($splitdate[2]));


        $reportersFilter = Reporter::whereBetween('created_at', [$startdate, $enddate])->get();
        return view('reporter.index', compact('reporters', 'reportersFilter','daterange'));
    }
}
