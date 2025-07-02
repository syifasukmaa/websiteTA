<?php

use App\Http\Controllers\DuafaController;
use App\Http\Controllers\MustahikController;
use App\Http\Controllers\MuzakkiController;
use App\Http\Controllers\PendaftarQurbanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\YatimPiatuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/admin/login', [UserController::class, 'adminLogin'])->name('admin.login');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified', 'adminRole'])->group(function () {
    // muzakki
    Route::get('/admin/zakat/muzakki', [MuzakkiController::class, 'index'])->name('admin.muzakki.index');
    Route::get('/admin/zakat/muzakki/create', [MuzakkiController::class, 'create'])->name('admin.muzakki.create');
    Route::post('/admin/zakat/muzakki/add', [MuzakkiController::class, 'store'])->name('admin.muzakki.store');
    Route::get('/admin/zakat/muzakki/{id}', [MuzakkiController::class, 'detail'])->name('admin.muzakki.detail');
    Route::get('/admin/zakat/muzakki/edit/{id}', [MuzakkiController::class, 'edit'])->name('admin.muzakki.edit');
    Route::put('/admin/zakat/muzakki/{id}', [MuzakkiController::class, 'update'])->name('admin.muzakki.update');
    Route::delete('/admin/zakat/muzakki/{id}', [MuzakkiController::class, 'delete'])->name('admin.muzakki.delete');

    // mustahik
    Route::get('/admin/zakat/mustahik', [MustahikController::class, 'index'])->name('zakatMustahik.index');
    Route::get('/admin/zakat/mustahik/create', [MustahikController::class, 'create'])->name('zakatMustahik.create');
    Route::get('/admin/zakat/mustahik/{id}', [MustahikController::class, 'detail'])->name('zakatMustahik.detail');
    Route::post('/admin/zakat/mustahik/add', [MustahikController::class, 'store'])->name('zakatMustahik.store');
    Route::get('/admin/zakat/mustahik/edit/{id}', [MustahikController::class, 'edit'])->name('zakatMustahik.edit');
    Route::put('/admin/zakat/mustahik/{id}', [MustahikController::class, 'update'])->name('zakatMustahik.update');
    Route::delete('/admin/zakat/mustahik/{id}', [MustahikController::class, 'delete'])->name('zakatMustahik.delete');
    // Route::get('pdf_generator', [MustahikController::class, 'pdfGenerator'])->name('zakatMustahik.pdf');

    // Qurban
    Route::get('/admin/qurban/pendaftarQurban', [PendaftarQurbanController::class, 'index'])->name('pendaftarQurban.index');
    Route::get('/admin/qurban/pendaftarQurban/kerbau', [PendaftarQurbanController::class, 'kerbau'])->name('pendaftarQurban.kerbau');
    Route::get('/admin/qurban/pendaftarQurban/create', [PendaftarQurbanController::class, 'create'])->name('pendaftarQurban.create');
    Route::get('/admin/qurban/pendaftarQurban/kerbau/create', [PendaftarQurbanController::class, 'createKerbau'])->name('pendaftarQurban.kerbau.create');
    Route::get('/admin/qurban/pendaftarQurban/{id}', [PendaftarQurbanController::class, 'detail'])->name('pendaftarQurban.detail');
    Route::get('/admin/qurban/pendaftarQurban/kerbau/{id}', [PendaftarQurbanController::class, 'detailKerbau'])->name('pendaftarQurban.kerbau.detail');
    Route::post('/admin/qurban/pendaftarQurban/add', [PendaftarQurbanController::class, 'store'])->name('pendaftarQurban.store');
    Route::post('/admin/qurban/pendaftarQurban/addKerbau', [PendaftarQurbanController::class, 'storeKerbau'])->name('pendaftarQurban.kerbau.store');
    Route::get('/admin/qurban/pendaftarQurban/edit/{id}', [PendaftarQurbanController::class, 'edit'])->name('pendaftarQurban.edit');
    Route::put('/admin/qurban/pendaftarQurban/{id}', [PendaftarQurbanController::class, 'update'])->name('pendaftarQurban.update');
    Route::get('/admin/qurban/pendaftarQurban/edit/kerbau/{id}', [PendaftarQurbanController::class, 'editKerbau'])->name('pendaftarQurban.kerbau.edit');
    Route::put('/admin/qurban/pendaftarQurban/kerbau/{id}', [PendaftarQurbanController::class, 'updateKerbau'])->name('pendaftarQurban.kerbau.update');
    Route::delete('/admin/qurban/pendaftarQurban/{id}', [PendaftarQurbanController::class, 'delete'])->name('pendaftarQurban.delete');
    Route::delete('/admin/qurban/pendaftarQurban/kerbau/{id}', [PendaftarQurbanController::class, 'deleteKerbau'])->name('pendaftarQurban.kerbau.delete');

    // Yatim Piatu
    Route::get('/admin/yatimPiatu', [YatimPiatuController::class, 'index'])->name('yatimPiatu.index');
    Route::get('/admin/yatimPiatu/create', [YatimPiatuController::class, 'create'])->name('yatimPiatu.create');
    Route::post('/admin/yatimPiatu/add', [YatimPiatuController::class, 'store'])->name('yatimPiatu.store');
    Route::get('/admin/yatimPiatu/{id}', [YatimPiatuController::class, 'detail'])->name('yatimPiatu.detail');
    Route::get('/admin/yatimPiatu/edit/{id}', [YatimPiatuController::class, 'edit'])->name('yatimPiatu.edit');
    Route::put('/admin/yatimPiatu/{id}', [YatimPiatuController::class, 'update'])->name('yatimPiatu.update');
    Route::delete('/admin/yatimPiatu/{id}', [YatimPiatuController::class, 'delete'])->name('yatimPiatu.delete');

    // Duafa
    Route::get('/admin/duafa', [DuafaController::class, 'index'])->name('duafa.index');
    Route::get('/admin/duafa/create', [DuafaController::class, 'create'])->name('duafa.create');
    Route::post('/admin/duafa/add', [DuafaController::class, 'store'])->name('duafa.store');
    Route::get('/admin/duafa/{id}', [DuafaController::class, 'detail'])->name('duafa.detail');
    Route::get('/admin/duafa/edit/{id}', [DuafaController::class, 'edit'])->name('duafa.edit');
    Route::put('/admin/duafa/{id}', [DuafaController::class, 'update'])->name('duafa.update');
    Route::delete('/admin/duafa/{id}', [DuafaController::class, 'delete'])->name('duafa.delete');

    // Pengguna
    Route::get('/admin/pengguna', [UserController::class, 'index'])->name('pengguna.index');
    Route::get('/admin/pengguna/create', [UserController::class, 'create'])->name('pengguna.create');
    Route::get('/admin/pengguna/{id}', [UserController::class, 'detail'])->name('pengguna.detail');
    Route::put('/admin/pengguna/{id}', [UserController::class, 'update'])->name('pengguna.update');
    Route::post('/admin/pengguna/add', [UserController::class, 'store'])->name('pengguna.store');
    Route::delete('/admin/pengguna/{id}', [UserController::class, 'delete'])->name('pengguna.delete');
});

require __DIR__ . '/auth.php';
