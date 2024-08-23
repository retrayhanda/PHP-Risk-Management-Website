<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Illuminate\Support\Facades\DB;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {   
    //     $unit = UnitKerja::all();
    //     $user = User::all();
    //     return view('dashboard.user', ['User' => $user, 'Unit'=>$unit]);
    // }

    public function index()
    {   
        $user = User::with('unitKerja')->get(); 
        return view('dashboard.user', ['User' => $user]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unit = UnitKerja::all();
        return view('dashboard.users.create',['Unit'=>$unit]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // return $request;
        $validatedData = $request->validate([
            'nidn' => 'required|unique:users',
            'role' => 'required',
            'nama' => 'required',
            // 'jabatan' => 'required',
            'unit_id' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            // 'foto' => 'required|image|file|max:2048',
        ]);

        // if ($request->file('foto')) {
        //     $validatedData['foto'] = $request->file('foto')->store('assets/images');
        // }
        // ddd($validatedData);

        $validatedData['password'] = Hash::make($validatedData['password']);
        // ddd($validatedData);
        User::create($validatedData);

        return redirect('users')->with('success', 'Berhasil menambahkan akun');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        //
        // $unit = UnitKerja::all();
        // $user = User::all();
        // return $akun;
        $User = User::findOrFail($id);
        $unitKerja = DB::table('users')
        ->join('unit_kerja', 'users.unit_id', '=', 'unit_kerja.id')
        ->select('unit_kerja.unit_kerja')
        ->where('users.id', $id)
        ->first();
        return view('dashboard.users.show', compact('User', 'unitKerja'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // dd($user);
        $unit = UnitKerja::all();
        return view('dashboard.users.edit', ['User' => $user,'Unit'=>$unit ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'role' => 'required',
            'nama' => 'required',
            'unit_id' => 'required',
            'password' => 'required',
        ];
        
        $user = User::findOrFail($id);
        
        if ($request->nidn != $user->nidn) {
            $rules['nidn'] = 'required|unique:users';
        }
        
        if ($request->email != $user->email) {
            $rules['email'] = 'required|unique:users';
        }
        
        // if ($request->hasFile('foto')) {
        //     $rules['foto'] = 'required|image|file|max:2048';
        // }
        
        $validatedData = $request->validate($rules);
        
        // if ($request->hasFile('foto')) {
        //     $validatedData['foto'] = $request->file('foto')->store('assets/images');
        // } else {
        //     $validatedData['foto'] = $user->foto; // Gunakan foto yang ada jika tidak ada file yang diunggah
        // }
        
        $user->update([
            'nidn' => $validatedData['nidn'] ?? $user->nidn,
            'role' => $validatedData['role'],
            'nama' => $validatedData['nama'],
            // 'jabatan' => $validatedData['jabatan'],
            'unit_id' => $validatedData['unit_id'],
            'email' => $validatedData['email'] ?? $user->email,
            'password' => $validatedData['password'] ?? $user->password,
            // 'foto' => $validatedData['foto'],
        ]);
        
        return redirect('users')->with('success', 'Berhasil mengubah akun');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $filePath = 'assets/images/' . $user->foto;

        // Hapus data dari database
        User::destroy($user->id);

        // Hapus file dari penyimpanan jika alamat file ada
        if ($filePath) {
            Storage::delete($filePath);
        }
        return redirect('users')->with('success', 'Berhasil menghapus akun');
    }
}
