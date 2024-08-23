<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Risk; 
use App\Models\UnitKerja;
use App\Models\User;
use App\Charts\RiskChart1;
use ArielMejiaDev\LarapexCharts\LarapexChart;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menghitung jumlah risiko
        $totalRisk = Risk::count();

        // Menghitung jumlah penanganan risiko dengan status "diterima"
        $totalAcceptedRisks = Risk::where('status', 'diterima')->count();

        // Menghitung jumlah unit kerja
        $totalUnits = UnitKerja::count();

        // Menghitung jumlah pengguna
        $totalUsers = User::count();

        // Membuat objek LarapexChart
        $chart = new LarapexChart();
        $chart2 = new LarapexChart();
        $chart3 = new LarapexChart();

        // Membuat instance dari RiskChart1 dengan menyediakan objek LarapexChart yang dibutuhkan
        $riskChart = new RiskChart1($chart, $chart2, $chart3);

        // Memanggil metode build untuk mendapatkan data grafik yang sudah dibangun
        $dataChart = $riskChart->build();
        $dataChart2 = $riskChart->build2();
        $dataChart3 = $riskChart->build3();

        $riskProfile = [];
        for ($prob=1; $prob <= 5; $prob++) { 
            for ($dampak=1; $dampak <= 5; $dampak++) { 
                $riskProfile[$prob][$dampak] = Risk::select('id')->where(['probabilitas' => $prob, 'dampak' => $dampak])->get();
            }
        }
        $risk = Risk::select('dampak', 'probabilitas', 'id', 'dampak_residual')->get();

        // Melewatkan data grafik dan total ke tampilan
        return view('dashboard.dashboard', [
            'chart' => $dataChart,
            'chart2' => $dataChart2,
            'chart3' => $dataChart3,
            'totalRisk' => $totalRisk,
            'totalAcceptedRisks' => $totalAcceptedRisks,
            'totalUnits' => $totalUnits,
            'totalUsers' => $totalUsers,
            'riskProfile' => $riskProfile,
            'risk' => $risk,
        ]);
    }


    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
