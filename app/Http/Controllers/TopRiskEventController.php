<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Risk;
use App\Models\UnitKerja;
class TopRiskEventController extends Controller
{
    public function index()
    {
        $risks = Risk::with('unitKerja')
        ->orderBy('skor_risiko', 'desc')
        ->get();

        return view('dashboard.laporan.topRiskEvent', ['Risk' => $risks]);
    }
    
}
