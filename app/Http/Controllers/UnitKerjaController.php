<?php

namespace App\Http\Controllers;

use App\Models\UnitKerja;
use Illuminate\Http\Request;

class UnitKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unit = UnitKerja::all();
        // dd($unit);
        return view('dashboard.unit', ['Unit'=>$unit]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'kode_unit_kerja' => 'required|unique:unit_kerja',
            'unit_kerja' => 'required',
        ]);

        UnitKerja::create($validatedData);

        return redirect('unit')->with('success', 'Berhasil menambahkan akun');
    }

    /**
     * Display the specified resource.
     */
    public function show(UnitKerja $unitKerja)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UnitKerja $unitKerja, $id)
    {
        // dd($unitKerja);
        // Mengambil data UnitKerja dari basis data berdasarkan ID
        $unitKerja = UnitKerja::findOrFail($id);
        return view('dashboard.unit.edit', ['unitKerja'=>$unitKerja]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules =[
            'unit_kerja' => 'required',
        ];

        $unitKerja = UnitKerja::findOrFail($id);
        
        if ($request->kode_unit_kerja != $unitKerja->kode_unit_kerja) {
            $rules['kode_unit_kerja'] = 'required|unique:unit_kerja';
        }

        $validatedData = $request->validate($rules);

        $unitKerja->update([
            'kode_unit_kerja'=>$validatedData['kode_unit_kerja'] ?? $unitKerja->kode_unit_kerja,
            'unit_kerja'=>$validatedData['unit_kerja'] ?? $unitKerja->unit_kerja,
        ]);

        return redirect('unit')->with('success', 'Berhasil mengupdate akun');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Mengambil data UnitKerja dari basis data berdasarkan ID
        $unitKerja = UnitKerja::findOrFail($id);
        
        // Menghapus data UnitKerja dari basis data
        $unitKerja->delete();

        // Mengembalikan pengguna ke halaman daftar unit dengan pesan sukses
        return redirect('unit')->with('success', 'Berhasil menghapus unit');
    }
}
