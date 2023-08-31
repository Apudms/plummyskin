<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\CartComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\TokoComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\DistriResellerComponent;
use App\Http\Livewire\CheckoutComponent;

use App\Http\Controllers\PesananController;
use App\Http\Controllers\CRUDDistriController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\CRUDProductController;
use App\Http\Controllers\LoginDistriController;
use App\Http\Controllers\PenghasilanController;
use App\Http\Controllers\RepeatOrderController;
use App\Http\Controllers\CRUDEduMitraController;
use App\Http\Controllers\CRUDResellerController;
use App\Http\Controllers\LoginResellerController;
use App\Http\Controllers\SettingAccountController;
use App\Http\Controllers\CRUDMarketingKitController;
use App\Http\Controllers\DataResellerController;
use App\Http\Controllers\DistributorAccountController;
use App\Http\Controllers\DownloadFileController;
use App\Http\Controllers\OrderController;
use App\Http\Livewire\BerhasilComponent;
use App\Http\Livewire\DetailTransaksiComponent;
use App\Http\Livewire\EdukasiMitraComponent;
use App\Http\Livewire\MarketingKitComponent;
use App\Http\Livewire\MyProfileComponent;
use App\Http\Livewire\TransaksiComponent;

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

// Reseller
Route::prefix('/')->group(function () {
    Route::get('/', HomeComponent::class)->name('reseller.home');
    Route::get('/distritoko', DistriResellerComponent::class);
    Route::get('/distritoko/{slug}', TokoComponent::class)->name('distritoko.detail');
    Route::get('/distritoko/produk/{slug}', DetailsComponent::class)->name('produk.detail')->middleware('reseller');
    Route::get('/keranjang', CartComponent::class)->name('reseller.keranjang')->middleware('reseller');
    Route::get('/pesan', CheckoutComponent::class)->name('reseller.pesan')->middleware('reseller');
    Route::get('/pesan/berhasil', BerhasilComponent::class)->name('berhasil')->middleware('reseller');

    Route::get('/login', [LoginResellerController::class, 'login'])->name('reseller.login.index')->middleware('guest');
    Route::post('/logout', [LoginResellerController::class, 'logout'])->name('reseller.logout');
    Route::post('/login', [LoginResellerController::class, 'handleLogin'])->name('reseller.handleLogin');

    Route::get('/profil/profilsaya', MyProfileComponent::class)->name('reseller.profil.profilsaya')->middleware('reseller');
    Route::put('/profil/profilsaya/update', MyProfileComponent::class)->name('reseller.profil.profilsaya.update')->middleware('reseller');
    Route::get('/profil/marketingkit', MarketingKitComponent::class)->name('reseller.profil.marketingkit')->middleware('reseller');

    Route::get('/file-download/{kit}', [DownloadFileController::class, 'download'])->name('file.download')->middleware('reseller');

    Route::get('/profil/edukasimitra', EdukasiMitraComponent::class)->name('reseller.profil.edukasimitra')->middleware('reseller');
    Route::get('/profil/transaksi', TransaksiComponent::class)->name('reseller.profil.transaksi')->middleware('reseller');
    Route::get('/profil/transaksi/{order_id}', DetailTransaksiComponent::class)->name('transaksi.detail')->middleware('reseller');
});

// Administrator
Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginAdminController::class, 'login'])->name('admin.login')->middleware('guest');
    Route::post('/login', [LoginAdminController::class, 'handleLogin'])->name('admin.handleLogin');
    Route::get('/', [LoginAdminController::class, 'index'])->name('admin.index')->middleware('admin');
    Route::post('/logout', [LoginAdminController::class, 'logout'])->name('admin.logout');
    Route::resource('/distributors', CRUDDistriController::class)->middleware('admin');
    Route::resource('/reseller', CRUDResellerController::class)->middleware('admin');
    Route::resource('/marketingkit', CRUDMarketingKitController::class)->middleware('admin');
    Route::resource('/edukasimitra', CRUDEduMitraController::class)->middleware('admin');
    Route::resource('/repeat-order', RepeatOrderController::class)->middleware('admin');
    Route::resource('/pengaturan-akun', SettingAccountController::class)->middleware('admin');
});

// Distributor
Route::prefix('distributor')->group(function () {
    Route::get('/', [LoginDistriController::class, 'index'])->name('distributor.index')->middleware('distributor');
    Route::get('/login', [LoginDistriController::class, 'login'])->name('distributor.login')->middleware('guest');
    Route::post('/logout', [LoginDistriController::class, 'logout'])->name('distributor.logout');
    Route::post('/login', [LoginDistriController::class, 'handleLogin'])->name('distributor.handleLogin');
    Route::resource('/produk', CRUDProductController::class)->middleware('distributor');
    Route::resource('/data-reseller', DataResellerController::class)->middleware('distributor');
    Route::resource('/pesanan', OrderController::class)->middleware('distributor');
    // Route::resource('/penghasilan', PenghasilanController::class)->middleware('distributor');
    Route::resource('/akun-saya', DistributorAccountController::class)->middleware('distributor');
});
