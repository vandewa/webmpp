<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\AplikasiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\InformasiUmumController;
use App\Http\Controllers\PenyelenggaraController;

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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/news/{id}', [HomeController::class, 'berita'])->name('detail.berita');
Route::get('/news-list', [HomeController::class, 'listNews'])->name('news.list');
Route::get('/page/{id}', [HomeController::class, 'halaman'])->name('halaman');
Route::get('/organisasi/{id}', [HomeController::class, 'organisasi'])->name('organisasi');
Route::get('show-picture', [HelperController::class, 'showPicture'])->name('helper.show-picture');
Route::get('hapus/{id}', [FileController::class, 'hapus'])->name('hapus');


//dokumentasi template
Route::get('docs', function () {
    return File::get(public_path() . '/documentation.html');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');
    Route::get('ganti-password', [DashboardController::class, 'password'])->name('password');
    Route::post('/ganti-password', [DashboardController::class, 'gantiPassword'])->name('ganti.password');
    Route::post('sendCheckbox', [BeritaController::class, 'changeAccess']);
    Route::get('/berita/checkSlug', [BeritaController::class, 'checkSlug']);
    Route::get('sosial-media', [InformasiUmumController::class, 'sosmed'])->name('sosmed');
    Route::post('sosial-media', [InformasiUmumController::class, 'storeSosmed'])->name('sosmed.post');
    Route::get('kontak', [InformasiUmumController::class, 'kontak'])->name('kontak');
    Route::post('kontak', [InformasiUmumController::class, 'storeKontak'])->name('kontak.post');
    Route::get('sampul', [InformasiUmumController::class, 'sampul'])->name('sampul');
    Route::post('sampul', [InformasiUmumController::class, 'storeSampul'])->name('sampul.post');
    Route::get('bupati', [InformasiUmumController::class, 'bupati'])->name('bupati');
    Route::post('bupati', [InformasiUmumController::class, 'storeBupati'])->name('bupati.post');
    Route::get('visi', [InformasiUmumController::class, 'visi'])->name('visi');
    Route::post('visi', [InformasiUmumController::class, 'storeVisi'])->name('visi.post');
    Route::get('arti', [InformasiUmumController::class, 'arti'])->name('arti');
    Route::post('arti', [InformasiUmumController::class, 'storeArti'])->name('arti.post');
    Route::get('operasional', [InformasiUmumController::class, 'operasional'])->name('operasional');
    Route::post('operasional', [InformasiUmumController::class, 'storeOperasional'])->name('operasional.post');
    Route::resource('berita', BeritaController::class);
    Route::resource('file_image', FileController::class);
    Route::resource('attachment', AttachmentController::class);
    Route::resource('aplikasi', AplikasiController::class);
    Route::resource('faq', FaqController::class);
    Route::resource('penyelenggara', PenyelenggaraController::class);
});