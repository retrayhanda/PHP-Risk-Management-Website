<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RiskController;
use App\Http\Controllers\ManageRiskController;
use App\Http\Controllers\PenangananRisikoController;
use App\Http\Controllers\RiskRegisterController;
use App\Http\Controllers\UnitKerjaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\rekapRisikoController;
use App\Http\Controllers\TopRiskEventController;
use App\Http\Controllers\RispAppetiteReportController;
use App\Http\Controllers\ProfilRisikoKategori;
use App\Http\Controllers\DeskprisiController;

use App\Http\Controllers\DashboardController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/login', function () {
//     return view('login');
// });

// Route::get('/', function () {
//     return view('login');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard.dashboard');
// });

// Route::get('/risk', function () {
//     return view('dashboard.risk');
// });

// Route::get('/risk/create', function () {
//     return view('dashboard.risk.create');
// });

// Route::get('/users', function () {
//     return view('dashboard.user');
// });

// Route::get('/users/create', function () {
//     return view('dashboard.users.create');
// });

// Route::get('/unit', function () {
//     return view('dashboard.unit');
// });

// Route::get('/unit/create', function () {
//     return view('dashboard.unit.create');
// });



Route::get('/', function () {
    return view('login');
})->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware(['auth', 'AdminMiddleware'])->group(function () {
    Route::resource('/users', UsersController::class);
    Route::resource('/unit', UnitKerjaController::class);
});

Route::resource('/risk', ManageRiskController::class)->middleware('auth');
Route::resource('/risk_register', RiskRegisterController::class)->middleware('auth');
Route::resource('/rekap_risiko', rekapRisikoController::class)->middleware('auth');
Route::resource('/top_risk_event', TopRiskEventController::class)->middleware('auth');
Route::resource('/risk_appetite_report', RispAppetiteReportController::class)->middleware('auth');
Route::resource('/profil_risk_kategori', ProfilRisikoKategori::class)->middleware('auth');
Route::resource('/deskripsi_penanganan', DeskprisiController::class)->middleware('auth');

Route::resource('/penanganan_risiko', PenangananRisikoController::class)->middleware('auth');
Route::resource('/dashboard', DashboardController::class)->middleware('auth');
Route::get('/risk/{id}/show-pdf', [ManageRiskController::class, 'showPdf'])->name('risk.show-pdf');
Route::patch('/risk/{id}/update-status', [ManageRiskController::class, 'updateStatus']);
