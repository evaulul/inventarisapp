<?php

use App\Http\Controllers\administratorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\GenerateLaporanController;
use App\Http\Controllers\inventarisController;
use App\Http\Controllers\jenisController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ruangController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\validasipengembalianController;
use App\Models\inventaris;
use Illuminate\Routing\RedirectController;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'guest'], function() {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'dologin']);

});

// untuk superadmin dan pegawai
Route::group(['middleware' => ['auth', 'checkrole:1,2,3']], function() {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/redirect', [RedirectController::class, 'cek']);
});


// untuk superadmin
Route::group(['middleware' => ['auth', 'checkrole:1']], function() {
    Route::get('/administrator', [BerandaController::class, 'admin']);
    Route::get('/beranda', [BerandaController::class, 'admin']);

    Route ::get('/petugas', [PetugasController::class, 'index'] );
    Route ::get('/petugas/create', [PetugasController::class, 'create'] );
    Route ::post('/petugas/store', [PetugasController::class, 'store'] );
    Route ::get('/petugas/edit/{idpetugas}', [PetugasController::class, 'edit'] );
    Route ::post('/petugas/update', [PetugasController::class, 'update'] );
    Route ::get('/petugas/hapus/{idpetugas}', [PetugasController::class, 'destroy'] );

    Route::get('/peminjamanadmin', [PeminjamanController::class,'indexadmin']);
    Route::get('/tambahpeminjamanadmin', [PeminjamanController::class,'createadmin']);
    Route::post('/storeadmin', [PeminjamanController::class,'storeadmin']);

    Route::post('/peminjaman/{id_peminjaman}/validasi', [validasipengembalianController::class, 'validasiadmin'])->name('peminjaman.validasiadmin');   
    Route::get('/pengembalianadmin', [ValidasiPengembalianController::class,'pengembalianadmin']);
    Route::post('/peminjaman/{id_peminjaman}/kembalikanadmin', [ValidasiPengembalianController::class, 'kembalikanadmin'])->name('peminjaman.kembalikanadmin');   

    Route::get('/laporanadmin', [GenerateLaporanController::class,'laporanadmin']);
    Route::get('/datalaporan', [GenerateLaporanController::class,'datalaporan']);
    Route::get('/peminjaman/pdfadmin', [GenerateLaporanController::class,'generatePdfadmin']);
});

// untuk pegawai
Route::group(['middleware' => ['auth', 'checkrole:2']], function() {
    Route::get('/operator', [BerandaController::class, 'operator']);
    Route::get('/dashboard', [BerandaController::class, 'operator']);

    Route::get('/peminjamanoperator', [PeminjamanController::class,'indexoperator']);
    Route::get('/tambahpeminjamanoperator', [PeminjamanController::class,'createoperator']);
    Route::post('/storepeminjamanoperator', [PeminjamanController::class,'storeoperator']);
    Route::post('/peminjaman/{id_peminjaman}/kembalikanoperator', [ValidasiPengembalianController::class, 'kembalikanoperator'])->name('peminjaman.kembalikanoperator');
});
Route::group(['middleware' => ['auth', 'checkrole:3']], function() {
    Route::get('/kepalagudang', [BerandaController::class, 'kepalagudang']);
    Route::get('/dashboard', [BerandaController::class, 'kepalagudang']);

    Route::get('/peminjamankp', [PeminjamanController::class,'indexkepalagudang']);
    Route::post('/peminjaman/{id_peminjaman}/validasikp', [ValidasiPengembalianController::class, 'validasikp'])->name('peminjaman.validasikp');   

    Route::get('/laporankp', [GenerateLaporanController::class,'laporankp']);
    Route::get('/datalaporankp', [GenerateLaporanController::class,'datalaporankp']);
    Route::get('/peminjaman/pdfkp', [GenerateLaporanController::class,'generatePdfkp']);
});

// Route::get('/', function () {
//     return view('welcome');
// });

//Route ::get('/', [BerandaController::class, 'index']);

Route::get('/jenis', [JenisController::class,'index']);
Route::get('/jenis/create', [JenisController::class,'create']);
Route::post('/jenis/store', [JenisController::class,'store']);
Route::get('/jenis/edit/{idjenis}', [JenisController::class,'edit']);
Route::post('/jenis/update', [JenisController::class,'update']);
Route::get('/jenis/hapus/{idjenis}', [JenisController::class,'destroy']);

Route::get('/ruang', [ruangController::class,'index']);
Route::get('/ruang/create', [ruangController::class,'create']);
Route::post('/ruang/store', [ruangController::class,'store']);
Route::get('/ruang/edit/{idjenis}', [ruangController::class,'edit']);
Route::post('/ruang/update', [ruangController::class,'update']);
Route::get('/ruang/hapus/{idjenis}', [ruangController::class,'destroy']);



Route::get('/pegawai', [PegawaiController::class,'index']);
Route::get('/pegawai/create', [PegawaiController::class,'create']);
Route::post('/pegawai/store', [PegawaiController::class,'store']);
Route::get('/pegawai/edit/{idpegawai}', [PegawaiController::class,'edit']);
Route::post('/pegawai/update', [pegawaiController::class,'update']);
Route::get('/pegawai/hapus/{idpegawai}', [pegawaiController::class,'destroy']);

Route::get('/inventaris', [InventarisController::class,'index']);
Route::get('/tambahinventaris', [InventarisController::class,'create']);
Route::post('/storeinventaris', [InventarisController::class,'store']);
Route::get('/editinventaris{id_inventaris}', [InventarisController::class,'edit']);
Route::post('/updateinventaris', [InventarisController::class,'update']);
Route::get('/hapusinventaris{id_inventaris}', [InventarisController::class,'destroy']);




