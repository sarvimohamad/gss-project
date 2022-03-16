<?php

use App\Http\Controllers\ServiceController;
use App\Models\City;
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


Route::middleware('captcha')->group(function () {
    Auth::routes();
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('RequestServices', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');

    Route::get('RequestServices/pending', [ServiceController::class, 'index'])->name('index');
    Route::get('RequestServices/create', [ServiceController::class, 'create'])->name('RequestServices')->middleware('user');
    Route::get('RequestServices/{id}/show', [ServiceController::class, 'show'])->name('show');

    Route::post('RequestServices/{id}/messages', [ServiceController::class, 'addMessage'])
        ->name('add.message');



    Route::get('RequestServices/{id}/edit', [ServiceController::class, 'edit'])->name('edit');
    Route::put('RequestServices/update/{id}', [ServiceController::class, 'update'])->name('update');
    Route::post('RequestServices', [ServiceController::class, 'store'])->name('store');
    Route::post('RequestServices/{id}/pend', [ServiceController::class, 'pending'])->name('pending');
    Route::get('RequestServices/PendingList', [ServiceController::class, 'listBank'])->name('ListBank');
    Route::get('RequestServices/accepted', [ServiceController::class, 'accepted'])->name('accepted');
    Route::view('report', 'report')->name('report');
    Route::post('verify/{id}', [ServiceController::class, 'verify'])->name('verify');

    Route::get('RequestServices/list', [ServiceController::class, 'listSendStats'])->name('listSendStats')->middleware('bank');
});

//Route::view('data' , 'services.data')->name('data');
Route::view('data', 'services.data')->name('data');

Route::get('provinces/{id}/cities', function ($id) {
    return City::query()->where('state_id', $id)->get()->all();
});
