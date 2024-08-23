<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Risk;
use App\Models\UnitKerja;

class rekapRisikoController extends Controller
{
    public function index()
    {
        $risks = Risk::select('kode_unit')
            ->selectRaw('COUNT(*) as jumlah_risiko')
            ->selectRaw('SUM(CASE WHEN status = "diterima" THEN 1 ELSE 0 END) as verifikasi_risiko')
            ->selectRaw('SUM(CASE WHEN tingkat_risiko = "Extreme" THEN 1 ELSE 0 END) as extreme_risk')
            ->selectRaw('SUM(CASE WHEN tingkat_risiko = "High" THEN 1 ELSE 0 END) as high_risk')
            ->selectRaw('SUM(CASE WHEN tingkat_risiko = "Medium" THEN 1 ELSE 0 END) as medium_risk')
            ->selectRaw('SUM(CASE WHEN tingkat_risiko = "Low" THEN 1 ELSE 0 END) as low_risk')
            ->groupBy('kode_unit')
            ->with('unitKerja')
            ->get();

        return view('dashboard.laporan.rekapRisiko', ['risks' => $risks]);
    }
}
