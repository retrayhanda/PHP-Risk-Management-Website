<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Risk;
use App\Models\UnitKerja;

class RiskRegisterController extends Controller
{
    public function index()
    {
        $Risk = Risk::with('unitKerja')->get();
        return view('dashboard.laporan.riskRegister', ['Risk' => $Risk]);
    }
    
}
