<?php

namespace App\Http\Controllers;

use App\Models\Risk;
use App\Models\UnitKerja;
use Illuminate\Http\Request;

class RiskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $risk = Risk::all();
        return view('dashboard.risk', ['Risk'=>$risk]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unitKerja = UnitKerja::all();
        return view('dashboard.risk.create', ['Unit'=>$unitKerja]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ddd($request);
        $validatedData = $request->validate([
            'kode_risiko' => 'required|unique:risk',
            'status_risiko' => 'required|in:active,retired',
            'ancaman' => 'required|in:threat,opportunity',
            'kategori_risiko' => 'required|in:operational,hazard,finance,strategy&planning',
            'kode_unit' => 'required|integer',
            'sasaran' => 'required|string',
            'periode' => 'required|string',
            'deskripsi_risiko' => 'required|string',
            'akar_penyebab' => 'required|string',
            'indikator_risiko' => 'required|string',
            'faktor_positif' => 'required|string',
            'dampak_kualitatif' => 'required|string',
            'probabilitas' => 'required|integer',
            'dampak' => 'required|integer',
            'pemilik_risiko' => 'required|string',
            'jabatan' => 'required|string',
            'nomor_hp' => 'required|string',
            'email' => 'required|string|email',
            // 'strategi' => 'required|in:mitigate,avoid,accept,transfer,share,enhance',
            // 'penanganan' => 'required|string',
            // 'biaya_risiko' => 'required|integer',
            // 'penanganan_risiko' => 'required|string',
            // 'probabilitas_residual' => 'required|integer',
            // 'dampak_residual' => 'required|integer',
            // 'probabilitas_risiko_residual' => 'required|integer',
            // 'dampak_financial_residual' => 'required|integer',
            // 'departemen' => 'required|string',
            'status' => 'required|in:pengajuan,diterima,pemantauan,ditolak',
            // 
            'skor_risiko' => 'required|integer',
            'tingkat_risiko' => 'required|string',
            'nilai_bersih_risiko' => 'required|integer',
            'nilai_bersih_risiko_residual' => 'required|integer',
            'skor_risiko_residual' => 'required|integer',
            'tingkat_risiko_residual' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();

        // Lakukan perhitungan dan validasi skor_risiko
        $skor_risiko = $validatedData['dampak'] * $validatedData['probabilitas'];
        $validatedData['skor_risiko'] = $skor_risiko;

        // Tentukan tingkat risiko berdasarkan skor_risiko
        if ($skor_risiko >= 1 && $skor_risiko <= 3) {
            $tingkat_risiko = 'Low Risk';
        } elseif ($skor_risiko >= 4 && $skor_risiko <= 6) {
            $tingkat_risiko = 'Medium Risk';
        } elseif ($skor_risiko >= 7 && $skor_risiko <= 12) {
            $tingkat_risiko = 'High Risk';
        } else {
            $tingkat_risiko = 'Extreme Risk';
        }
        $validatedData['tingkat_risiko'] = $tingkat_risiko;

        // Lakukan perhitungan dan validasi nilai_bersih_risiko
        $validatedData['nilai_bersih_risiko'] = ($validatedData['probabilitas_risiko'] / 100) * $validatedData['dampak_financial'];

        // Lakukan perhitungan dan validasi nilai_bersih_risiko_residual
        $validatedData['nilai_bersih_risiko_residual'] = ($validatedData['probabilitas_risiko_residual'] / 100) * $validatedData['dampak_financial_residual'];

        // Lakukan perhitungan dan validasi skor_risiko_residual
        $skor_risiko_residual = $validatedData['dampak_residual'] * $validatedData['probabilitas_residual'];

        // Tentukan tingkat risiko residual berdasarkan skor_risiko_residual
        if ($skor_risiko_residual >= 1 && $skor_risiko_residual <= 3) {
            $tingkat_risiko_residual = 'Low Risk';
        } elseif ($skor_risiko_residual >= 4 && $skor_risiko_residual <= 6) {
            $tingkat_risiko_residual = 'Medium Risk';
        } elseif ($skor_risiko_residual >= 7 && $skor_risiko_residual <= 12) {
            $tingkat_risiko_residual = 'High Risk';
        } else {
            $tingkat_risiko_residual = 'Extreme Risk';
        }
        $validatedData['skor_risiko_residual'] = $skor_risiko_residual;
        $validatedData['tingkat_risiko_residual'] = $tingkat_risiko_residual;

        // ddd($validatedData);
        // Simpan data ke dalam database
        Risk::create($validatedData);
        
        // Redirect ke halaman yang sesuai (misalnya halaman beranda)
        return redirect('/risk')->with('success', 'Data risiko berhasil disimpan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Risk $risk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Risk $risk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Risk $risk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Risk $risk)
    {
        //
    }
}
