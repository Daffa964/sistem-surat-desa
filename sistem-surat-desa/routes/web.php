<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KepalaDesaController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\VerifikasiController;

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

// Public routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/verifikasi', [VerifikasiController::class, 'index'])->name('verifikasi.index');
Route::post('/verifikasi', [VerifikasiController::class, 'verify'])->name('verifikasi.verify');
Route::get('/verifikasi/{id}', [VerifikasiController::class, 'show'])->name('verifikasi.show');

// Authentication routes
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Warga routes
Route::middleware(['auth', 'role:warga'])->group(function () {
    Route::get('/warga/dashboard', [WargaController::class, 'dashboard'])->name('warga.dashboard');
    Route::get('/warga/profile', [WargaController::class, 'profile'])->name('warga.profile');
    Route::post('/warga/profile', [WargaController::class, 'updateProfile'])->name('warga.update-profile');
    Route::get('/warga/surat', [WargaController::class, 'surat'])->name('warga.surat');
    Route::get('/warga/surat/ajukan/{id}', [WargaController::class, 'ajukanSurat'])->name('warga.ajukan-surat');
    Route::post('/warga/surat/ajukan/{id}', [WargaController::class, 'storeAjukanSurat'])->name('warga.store-ajukan-surat');
    Route::get('/warga/riwayat', [WargaController::class, 'riwayat'])->name('warga.riwayat');
    Route::get('/warga/surat/download/{id}', [WargaController::class, 'downloadSurat'])->name('warga.download-surat');
});

// Admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/admin/profile', [AdminController::class, 'updateProfile'])->name('admin.update-profile');
    Route::get('/admin/pengajuan', [AdminController::class, 'pengajuan'])->name('admin.pengajuan');
    Route::get('/admin/pengajuan/{id}', [AdminController::class, 'detailPengajuan'])->name('admin.detail-pengajuan');
    Route::post('/admin/pengajuan/{id}', [AdminController::class, 'verifikasiPengajuan'])->name('admin.verifikasi-pengajuan');
    Route::get('/admin/riwayat', [AdminController::class, 'riwayat'])->name('admin.riwayat');
});

// Kepala Desa routes
Route::middleware(['auth', 'role:kepala_desa'])->group(function () {
    Route::get('/kepala-desa/dashboard', [KepalaDesaController::class, 'dashboard'])->name('kepala-desa.dashboard');
    Route::get('/kepala-desa/profile', [KepalaDesaController::class, 'profile'])->name('kepala-desa.profile');
    Route::post('/kepala-desa/profile', [KepalaDesaController::class, 'updateProfile'])->name('kepala-desa.update-profile');
    Route::get('/kepala-desa/pengajuan', [KepalaDesaController::class, 'pengajuan'])->name('kepala-desa.pengajuan');
    Route::get('/kepala-desa/pengajuan/{id}', [KepalaDesaController::class, 'detailPengajuan'])->name('kepala-desa.detail-pengajuan');
    Route::post('/kepala-desa/pengajuan/{id}', [KepalaDesaController::class, 'verifikasiPengajuan'])->name('kepala-desa.verifikasi-pengajuan');
    Route::get('/kepala-desa/riwayat', [KepalaDesaController::class, 'riwayat'])->name('kepala-desa.riwayat');
});

// Surat management routes (admin only)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/surat', [SuratController::class, 'index'])->name('surat.index');
    Route::get('/surat/create', [SuratController::class, 'create'])->name('surat.create');
    Route::post('/surat', [SuratController::class, 'store'])->name('surat.store');
    Route::get('/surat/{id}/edit', [SuratController::class, 'edit'])->name('surat.edit');
    Route::put('/surat/{id}', [SuratController::class, 'update'])->name('surat.update');
    Route::delete('/surat/{id}', [SuratController::class, 'destroy'])->name('surat.destroy');
});
