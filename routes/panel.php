<?php

use App\Http\Controllers\AjaxController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\ProductController;



Route::group( [ 'middleware'=>['panelsetting','auth'] ,'prefix'=>'panel','as'=>'panel.'] , function() {

Route::get('/', [DashboardController::class,'index'])-> name('index');

Route::get('/slider', [SliderController::class,'index'])-> name('slider.index');
Route::get('/slider/ekle', [SliderController::class,'create'])-> name('slider.create');
Route::get('/slider/{id}/edit', [SliderController::class,'edit'])-> name('slider.edit');
Route::post('/slider/store', [SliderController::class,'store'])-> name('slider.store');
Route::put('/slider/{id}/update', [SliderController::class,'update'])-> name('slider.update');
Route::delete('/slider/destroy', [SliderController::class,'destroy'])-> name('slider.destroy');

Route::post('/slider-durum/update', [SliderController::class,'status'])-> name('slider.status');


Route::get('/slider', [SliderController::class,'index'])-> name('slider.index');
Route::get('/slider/ekle', [SliderController::class,'create'])-> name('slider.create');
Route::get('/slider/{id}/edit', [SliderController::class,'edit'])-> name('slider.edit');
Route::post('/slider/store', [SliderController::class,'store'])-> name('slider.store');
Route::put('/slider/{id}/update', [SliderController::class,'update'])-> name('slider.update');
Route::delete('/slider/destroy', [SliderController::class,'destroy'])-> name('slider.destroy');
Route::post('/slider-durum/update', [SliderController::class,'status'])-> name('slider.status');

Route::resource('/category',CategoryController::class)->except('destory');
Route::delete('/category/destory',[CategoryController::class,'destory'])->name('category.destory');
Route::post('/slider-durum/status', [CategoryController::class,'status'])-> name('category.status');

Route::resource('/product', ProductController::class)->except('destroy');
Route::get('/product-export', [ProductController::class,'export'])->name('product.export');




Route::delete('/product/destroy', [ProductController::class,'destroy'])->name('product.destroy');
Route::post('/product-durum/update', [ProductController::class,'status'])->name('product.status');


Route::get('/about',[AboutController::class,'index'])->name('about.index');
Route::post('/about/update',[AboutController::class,'update'])->name('about.update');


Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/contact/{id}/edit', [ContactController::class, 'edit'])->name('contact.edit');
Route::put('/contact/{id}/update', [ContactController::class, 'update'])->name('contact.update');
Route::post('/contact/destroy', [ContactController::class, 'destroy'])->name('contact.destroy');
Route::post('/contact/status', [ContactController::class, 'status'])->name('contact.status'); // Corrected 'delete' to 'post'



Route::get('/setting', [SettingController::class,'index'])-> name('setting.index');
Route::get('/setting/create', [SettingController::class,'create'])-> name('setting.create');

Route::post('/setting/store', [SettingController::class,'store'])-> name('setting.store');
Route::get('/setting/{id}/edit', [SettingController::class,'edit'])-> name('setting.edit');
Route::put('/setting/{id}/update', [SettingController::class,'update'])-> name('setting.update');
Route::delete('/contact/destroy', [SettingController::class, 'destroy'])->name('setting.destroy'); // Corrected 'destory' to 'destroy'


});




