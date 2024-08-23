<?php

namespace App\Http\Controllers;

use App\Models\PenangananRisk;
use Illuminate\Http\Request;
use App\Models\ManageRisk;
use App\Models\UnitKerja;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenangananRisikoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'superadmin') {
            $risks = ManageRisk::where('status', 'diterima')->get();
        } else {
            $risks = ManageRisk::where('status', 'diterima')
                        ->where('kode_unit', $user->unit_id)
                        ->get();
        }

        return view('dashboard.penangananRisiko', ['risks' => $risks]);
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
    public function show(ManageRisk $manageRisk, $id)
    {
        $Risk = ManageRisk::findOrFail($id);
        $unitKerja = DB::table('risk')
        ->join('unit_kerja', 'risk.kode_unit', '=', 'unit_kerja.id')
        ->select('unit_kerja.unit_kerja')
        ->where('risk.id', $id)
        ->first();
        // return view('dashboard.risk.show', ['Unit'=>$unitKerja,'Risk'=>$manageRisk]);
        return view('dashboard.penanganan_risiko.show', compact('Risk', 'unitKerja'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ManageRisk $manageRisk, $id)
    {
        $manageRisk = ManageRisk::findOrFail($id);
        $unitKerja = UnitKerja::all();
        return view('dashboard.penanganan_risiko.edit', ['Unit'=>$unitKerja,'Risk'=>$manageRisk]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'kode_risiko' => 'required|unique:risk,kode_risiko,' . $id,
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
            'nomor_hp' => 'required|string', // Sesuaikan dengan format nomor HP yang diharapkan
            'email' => 'required|string|email',
            'probabilitas_risiko' => 'required|integer',
            'strategi' => 'required|in:mitigate,avoid,accept,transfer,share,enhance',
            'penanganan' => 'required|string',
            'biaya_risiko' => 'required|integer',
            'penanganan_risiko' => 'required|string',
            'probabilitas_residual' => 'required|integer',
            'dampak_residual' => 'required|integer',
            'dampak_financial' => 'required|integer',
            'probabilitas_risiko_residual' => 'required|integer',
            'dampak_financial_residual' => 'required|integer',
            'departemen' => 'required|string',
            // 'status' => 'in:pengajuan,diterima,pemantauan,ditolak',
        ]);

        // Lakukan perhitungan skor_risiko
        $skor_risiko = $validatedData['dampak'] * $validatedData['probabilitas'];
        $validatedData['skor_risiko'] = $skor_risiko;

        // Tentukan tingkat risiko berdasarkan skor_risiko
        if ($skor_risiko >= 1 && $skor_risiko <= 3) {
            $tingkat_risiko = 'Low';
        } elseif ($skor_risiko >= 4 && $skor_risiko <= 6) {
            $tingkat_risiko = 'Medium';
        } elseif ($skor_risiko >= 7 && $skor_risiko <= 12) {
            $tingkat_risiko = 'High';
        } else {
            $tingkat_risiko = 'Extreme';
        }
        $validatedData['tingkat_risiko'] = $tingkat_risiko;

        // Lakukan perhitungan nilai_bersih_risiko
        $nilai_bersih_risiko = ($validatedData['probabilitas_risiko'] / 100) * $validatedData['dampak_financial'];
        $validatedData['nilai_bersih_risiko'] = $nilai_bersih_risiko;

        // Lakukan perhitungan nilai_bersih_risiko_residual
        $nilai_bersih_risiko_residual = ($validatedData['probabilitas_risiko_residual'] / 100) * $validatedData['dampak_financial_residual'];
        $validatedData['nilai_bersih_risiko_residual'] = $nilai_bersih_risiko_residual;

        // Lakukan perhitungan skor_risiko_residual
        $skor_risiko_residual = $validatedData['dampak_residual'] * $validatedData['probabilitas_residual'];

        // Tentukan tingkat risiko residual berdasarkan skor_risiko_residual
        if ($skor_risiko_residual >= 1 && $skor_risiko_residual <= 3) {
            $tingkat_risiko_residual = 'Low';
        } elseif ($skor_risiko_residual >= 4 && $skor_risiko_residual <= 6) {
            $tingkat_risiko_residual = 'Medium';
        } elseif ($skor_risiko_residual >= 7 && $skor_risiko_residual <= 12) {
            $tingkat_risiko_residual = 'High';
        } else {
            $tingkat_risiko_residual = 'Extreme';
        }
        $validatedData['skor_risiko_residual'] = $skor_risiko_residual;
        $validatedData['tingkat_risiko_residual'] = $tingkat_risiko_residual;
        
        // Temukan data risiko yang akan diupdate
        $manageRisk = ManageRisk::findOrFail($id);

        // Lakukan pembaruan data risiko
        $manageRisk->update($validatedData);
        
        // Redirect ke halaman yang sesuai (misalnya halaman beranda) dan sertakan pesan sukses
        return redirect('/penanganan_risiko')->with('success', 'Penanganan Risiko risiko berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PenangananRisk $penangananRisk)
    {
        //
    }
}
