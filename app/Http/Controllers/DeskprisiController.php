<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Risk;

class DeskprisiController extends Controller
{
    public function index()
    {
        $risks = Risk::all();
        return view('dashboard.laporan.deskripsi', ['risks'=>$risks]);
    }
}
