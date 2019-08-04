<?php

namespace App\Http\Controllers;

use App\Reporter;
use Composer\DependencyResolver\Transaction;
use Illuminate\Http\Request;

class ReporterController extends Controller
{
    public function index()
    {
        $reporters = Reporter::all()->take(100);
        return view('reporter.index', compact('reporters'));
    }

    public function filterbydate(Request $request)
    {
        $datestart = $request->input('datestart');
        $dateend = $request->input('dateend');
        $reporters=Reporter::whereBetween('created_at', [$datestart, $dateend])->get();
        return view('reporter.filterbydate',compact('reporters','datestart','dateend'));
    }
}
