<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});



Route::middleware('captcha')->group(function(){
    Auth::routes();
});

Route::group(['middleware' => 'auth'], function (){
Route::get('RequestServices', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');

Route::get('RequestServices/pending', [\App\Http\Controllers\ServiceController::class,'index'])->name('index');
Route::get('RequestServices/create', [\App\Http\Controllers\ServiceController::class,'create'])->name('RequestServices')->middleware('user');
Route::get('RequestServices/{id}/show', [\App\Http\Controllers\ServiceController::class,'show'])->name('show');
Route::get('RequestServices/{id}/edit', [\App\Http\Controllers\ServiceController::class,'edit'])->name('edit');
Route::put('RequestServices/update/{id}', [\App\Http\Controllers\ServiceController::class,'update'])->name('update');
Route::post('RequestServices', [\App\Http\Controllers\ServiceController::class,'store'])->name('store');
Route::post('RequestServices/{id}/pend', [\App\Http\Controllers\ServiceController::class,'pending'])->name('pending');
Route::get('RequestServices/PendingList' , [\App\Http\Controllers\ServiceController::class,'listBank'])->name('ListBank');
Route::get('RequestServices/accepted' , [\App\Http\Controllers\ServiceController::class,'accepted'])->name('accepted');
Route::view('report','report')->name('report');
Route::post('verify/{id}', [\App\Http\Controllers\ServiceController::class,'verify'])->name('verify');

Route::get('RequestServices/list' , [\App\Http\Controllers\ServiceController::class,'listSendStats'])->name('listSendStats')->middleware('bank');
});

//Route::view('data' , 'services.data')->name('data');
Route::view('data' , 'services.data')->name('data');

Route::get('provinces/{id}/cities',function($id) {
    return \App\Models\City::query()->where('state_id',$id)->get()->all();
});
