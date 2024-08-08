<?php

use App\Models\Pengaturan;
use App\Events\MonitorqrEvent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RfidController;
use App\Http\Controllers\Absencontroller;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\QrscanController;
use App\Http\Controllers\KategoriController;

use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MonitorqrController;
use App\Http\Controllers\TasemeterController;
use App\Http\Controllers\PengaturanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/cetak/{id}', [TasemeterController::class, 'cetak'])->name('cetak');
Route::get('/rfid/{id}', [RfidController::class, 'rfid'])->name('rfid');
// Route::get('/send-event' , function(){
//     broadcast(new MonitorqrEvent);
// });

Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/registrasi', [AuthController::class, 'registrasi'])->name('registrasi');
    Route::post('/post', [AuthController::class, 'post'])->name('login.post');
    Route::post('/store', [AuthController::class, 'store'])->name('registrasi.store');
});


Route::group(['middleware' => ['auth']], function () {

    Route::get('/profile', [PenggunaController::class, 'profile'])->name('profile');
 
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // qrscan
    Route::get('/scan', [QrscanController::class, 'index'])->name('scan');
    Route::get('/storeabsen', [QrscanController::class, 'store'])->name('scanabsen');
});

 
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// admin
Route::group(['middleware' => ['auth', 'checkRole:Sekdes']], function () {

  

   
    Route::get('/monitorqr', [MonitorqrController::class, 'index'])->name('qr');
    Route::get('/send-event', [MonitorqrController::class, 'qrevent'])->name('send-event');
 

    // tasemeter
    Route::get('/tasemeter', [TasemeterController::class, 'index'])->name('tasemeter');
    Route::get('/tasemeter/create', [TasemeterController::class, 'create'])->name('tasemeter.create');
    Route::post('/tasemeter/store', [TasemeterController::class, 'store'])->name('tasemeter.store');
    Route::get('/tasemeter/edit/{id}', [TasemeterController::class, 'edit'])->name('tasemeter.edit');
    Route::post('/tasemeter/update/{id}', [TasemeterController::class, 'update'])->name('tasemeter.update');
    Route::get('/tasemeter/delete/{id}', [TasemeterController::class, 'destroy'])->name('tasemeter.delete');
    Route::get('/absen/{id}', [TasemeterController::class, 'show'])->name('tasemeter.show');




    // jadwal
    Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal');
    Route::get('/jadwal/create/{id}', [JadwalController::class, 'create'])->name('jadwal.create');
    Route::post('/jadwal/store', [JadwalController::class, 'store'])->name('jadwal.store');
    Route::get('/jadwal/edit/{id}', [JadwalController::class, 'edit'])->name('jadwal.edit');
    Route::post('/jadwal/update/{id}', [JadwalController::class, 'update'])->name('jadwal.update');
    Route::get('/jadwal/delete/{id}', [JadwalController::class, 'delete'])->name('jadwal.delete');

    //pengguna
    Route::get('/karyawan/edit/{id}', [PenggunaController::class, 'edit'])->name('pengguna.edit');
    Route::get('/karyawan', [PenggunaController::class, 'index'])->name('pengguna.index');
    Route::post('/karyawan/update/{id}', [PenggunaController::class, 'update'])->name('pengguna.update');

    Route::post('/karyawan/store/', [PenggunaController::class, 'store'])->name('pengguna.store');
    Route::get('/karyawan/create/', [PenggunaController::class, 'create'])->name('pengguna.create');
    Route::get('/karyawan/delete/{id}', [PenggunaController::class, 'delete'])->name('pengguna.delete');

    // Manajemen absensi
    Route::get('/manajemen-absensi', [AbsenController::class, 'manajemenabsen'])->name('manajemenabsen');
    Route::get('/izin-absen/{id}', [AbsenController::class, 'izinabsen'])->name('izinabsen');
    Route::post('/izin-absen/update/{id}', [AbsenController::class, 'izinabsen_update'])->name('izinabsen.update');

    // Pengaturan
    Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('pengaturan');
    Route::get('/pengaturan/create/', [PengaturanController::class, 'create'])->name('pengaturan.create');
    Route::post('/pengaturan/store/', [PengaturanController::class, 'store'])->name('pengaturan.store');
    Route::get('/pengaturan/edit/{id}', [PengaturanController::class, 'edit'])->name('pengaturan.edit');
    Route::post('/pengaturan/update/{id}', [PengaturanController::class, 'update'])->name('pengaturan.update');
    Route::get('/pengaturan/delete/{id}', [PengaturanController::class, 'delete'])->name('pengaturan.delete');

});


//ROlE USER
Route::group(['middleware' => ['auth', 'checkRole:Sekdes,Pegawai,Kepala Desa ']], function () {

    Route::get('pegawai/karyawan', [PenggunaController::class, 'index'])->name('pegawai-karyawan');


    // absen saya
    Route::get('/absensaya', [AbsenController::class, 'index'])->name('absen');
    Route::get('pegawai/lihatabsen/{id}', [AbsenController::class, 'show'])->name('pegawai-lihatabsen');
});

    // kepala desa

Route::group(['middleware' => ['auth', 'checkRole:Kepala Desa']], function () {

    //    Absen saya
    Route::get('kades/absensaya', [AbsenController::class, 'index'])->name('kades-absen');
    Route::get('kades/lihatabsen/{id}', [AbsenController::class, 'show'])->name('kades-lihatabsen');

    // Lihat Karyawan
    Route::get('kades/karyawan', [PenggunaController::class, 'index'])->name('kades-karyawan');

    // Laporan karyawan
    Route::get('kades/pengaturan', [TasemeterController::class, 'index'])->name('kades-tasemeter');
    Route::get('kades/absen/{id}', [TasemeterController::class, 'show'])->name('kades-tasemeter.show');
    Route::get('kades/cetak', [TasemeterController::class, 'cetak'])->name('kades-cetak');
    
});