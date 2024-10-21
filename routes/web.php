<?php

use App\Http\Controllers\AjaxController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageHomeController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CustomAuthController;
use Illuminate\Support\Facades\Auth;

use Cviebrock\EloquentSluggable\Sluggable;


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
Route::group( [ 'middleware'=>'sitesetting'] , function() {

Route::get('/', [PageHomeController::class,'anasayfa'])-> name('anasayfa');

Route::get('/hakkimizda', [PageController::class,'hakkimizda'])-> name('hakkimizda');

Route::get('/urunler', [PageController::class,'urunler'])-> name('urunler');
Route::get('/erkek/{slug?}', [PageController::class,'urunler'])-> name('erkekurunler');
Route::get('/kadin/{slug?}', [PageController::class,'urunler'])-> name('kadinurunler');
Route::get('/cocuk/{slug?}', [PageController::class,'urunler'])-> name('cocukurunler');
Route::get('/indirimdekiler', [PageController::class,'indirimdekiler'])-> name('indirimdekiler');



Route::get('/urunler/{slug?}', [PageController::class,'urundetay'])-> name('urundetay');

Route::get('/iletisim', [PageController::class,'iletisim'])-> name('iletisim');

Route::post('/iletisim/kaydet', [AjaxController::class,'iletisimkaydet'])-> name('iletisim.kaydet');

Route::get('/sepet', [CardController::class,'index'])-> name('sepet');

Route::post('/sepet/ekle', [CardController::class,'add'])-> name('sepet.add');
Route::post('/sepet/remove', [CardController::class,'remove'])-> name('sepet.remove');

Route::post('/sepet/couponcheck', [CardController::class,'couponcheck'])-> name('coupon.check');

Auth::routes();

Route::get('/cikis', [AjaxController::class,'logout'])-> name('cikis');


});




