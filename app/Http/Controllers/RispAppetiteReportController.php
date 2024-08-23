<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Risk;
use App\Models\UnitKerja;
class RispAppetiteReportController extends Controller
{
    public function index()
    {
        $risks = Risk::with('unitKerja')->get();
        return view('dashboard.laporan.riskAppetiteReport', ['Risk' => $risks]);
    }
}
